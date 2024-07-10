<?php

namespace App\Http\Controllers\Invoices;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Orders\Order;
use App\Models\Orders\OrderItem;

class InvoiceController extends Controller
{
    public function generateInvoice($id)
    {
        $user = Auth::user();
        $order = Order::findOrFail($id);
        $orderItems = OrderItem::where('order_id', $id)->get();
        $createdAt = $order->created_at->format('d F Y \a\t h:i A');    

        $pdf = Pdf::loadView('pages.generate-invoice', compact('user', 'order', 'orderItems', 'createdAt'));
        return $pdf->download('invoice.pdf');

    }
}
