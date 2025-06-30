<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('products')->where('user_id', auth()->id())->latest()->get();
        return view('orders', compact('orders'));
    }
    
    public function show($code)
    {
        $order_code = Order::with('products')->where('user_id', auth()->id())->Where('order_code', $code)->get();
        foreach($order_code as $data)
        {
            $order = Order::with('products')->where('user_id', auth()->id())->findOrFail($data->id);
        }
        return view('order_detail', compact('order'));

    }
}
