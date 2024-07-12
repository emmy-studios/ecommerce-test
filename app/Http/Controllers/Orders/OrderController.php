<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Shoppingcarts\Shoppingcart;
use App\Models\Orders\Order;
use App\Models\Orders\OrderItem;
use App\Models\Customers\Address;

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

        // Order Items
        $orderItems = OrderItem::where('order_id', $id)->get();

        return view('pages.order-detail', compact('order', 'createdAt', 'user', 'orderItems'));
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
        // Obtener la información del usuario
        $username = Auth::user()->name;
        $user_id = Auth::id();
        $timestamp = now()->format('YmdHis');
        $order_code =  $username . $timestamp;

        // Crear la orden
        $order = new Order();
        $order->user_id = $user_id;
        $order->order_code = $order_code;
        $order->subtotal = 0; // Calcular el subtotal más tarde
        $order->total = 0;    // Calcular el total más tarde
        $order->save();

        // Crear los items de la orden
        $subtotal = 0;
        foreach ($request->products as $productId => $product) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $productId;
            $orderItem->color = $product['color'];
            $orderItem->size = $product['size'];
            $orderItem->quantity = $product['quantity'];
            $orderItem->save();

            $subtotal += $product['price'] * $product['quantity'];
        }

        // Actualizar los totales de la orden
        $order->subtotal = $subtotal;
        $order->total = $subtotal; // Ajustar según los descuentos o impuestos
        $order->save();

        // Send Email
        

        return redirect()->route('dashboard')->with('success', 'Order created successfully.');
    }
}
