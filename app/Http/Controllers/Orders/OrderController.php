<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Mail\NewOrderMail;
use App\Models\Core\Websiteinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Shoppingcarts\Shoppingcart;
use App\Models\Orders\Order;
use App\Models\Orders\OrderItem;
use App\Models\Customers\Address;
use App\Models\Discounts\Discount;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    
    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', Auth::id())->get();
        return view('pages.order-history', compact('orders'));
    }

    public function show($id)
    {   
        $user = Auth::user();
        $order = Order::findOrFail($id); 
        $createdAt = $order->created_at->format('d F Y \a\t h:i A');    
        $websiteInfo = Websiteinfo::first();    

        // Order Items
        $orderItems = OrderItem::where('order_id', $id)->get();

        return view('pages.order-detail', compact('order', 'createdAt', 'user', 'orderItems', 'websiteInfo'));
    }  

    public function create()
    {   
        // Obtener Información del usuario
        $user = Auth::user();

        // Obtener el carrito de compras del usuario
        $shoppingcart = Shoppingcart::where('user_id', Auth::id())->first();

        if ($shoppingcart) {
        // Cargar los productos con sus detalles
            $products = $shoppingcart->products()->with('productDetails.color', 'productDetails.size', 'productImages')->get();
        } else {
            $products = collect(); // Si no hay carrito, crear una colección vacía
        }

        // Calcular Total y Subtotal
        if ($shoppingcart) {
            $subtotal = $shoppingcart->products()->sum('unit_price');
            $total = $subtotal;
        } else {
            $subtotal = 0;
            $total = 0;
        }

        // Mostrar Datetime
        $currentDateTime = now()->format('d F Y \a\t h:i A');

        // Calcular Numero de orders
        $orderCount = Order::where('user_id', $user->id)->count();

        return view('pages.order-create', compact('shoppingcart', 'products', 'user', 'subtotal', 'total', 'currentDateTime', 'orderCount'));
    }

    public function store(Request $request)
    {   
        // Get the Customer Information
        $username = Auth::user()->name;
        $user_id = Auth::id();
        $timestamp = now()->format('YmdHis');
        $order_code =  $username . $timestamp;

        // Create New Empty Order
        $order = new Order();
        $order->user_id = $user_id;
        $order->order_code = $order_code;
        $order->subtotal = 0;
        $order->total = 0;
        $order->save();
        
        // Add the Items to the Order
        $subtotal = 0;
        $totalDiscount = 0;

        foreach ($request->products as $productId => $product) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $productId;
            $orderItem->color = $product['color'];
            $orderItem->size = $product['size'];
            $orderItem->quantity = $product['quantity'];
            $orderItem->unit_price = $product['price'];
            $orderItem->save();

            $subtotal += $product['price'] * $product['quantity']; // Subtotal Before Discounts

            // Check for Discount on the Product
            $discount = Discount::whereHas('products', function ($query) use ($productId) {
                $query->where('product_id', $productId);
            })->first();

            if ($discount) {
                $discountAmount = ($product['price'] * $product['quantity']) * ($discount->discount_percentage / 100);
                $totalDiscount += $discountAmount;
            }
        }

        // Update Total After the Discounts
        $order->subtotal = $subtotal;
        $order->total = $subtotal - $totalDiscount; 
        $order->save();

        // Send Email to the Admin
        $websiteInfo = Websiteinfo::first();
        $user = Auth::user();
        $data = [
            'username' => $user->name,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'user_phone' => $user->phone_code . ' ' . $user->phone_number,
            'order_code' => $order->order_code,
            'order_subtotal' => $order->subtotal,
            'total' => $order->total,
            'website_name' => $websiteInfo->website_name,
        ]; 
        Mail::to($websiteInfo->main_mail)->send(new NewOrderMail($data));

        return redirect()->route('dashboard')
            ->with('success', 'New Order Created Successfully. Click on details for invoice and check email!');
    }



}
