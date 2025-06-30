<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->latest()->get();

        $title = 'Hapus Pesanan!';
        $text  = 'Apakah anda yakin ingin menghapus pesanan ini?';
        confirmDelete($title, $text);

        return view('backend.order.index', compact('orders'));
    }

    public function show($code)
    {
        $order_code = Order::with('user', 'products')->where('order_code', $code)->get();
        foreach($order_code as $data)
        {
            $order = Order::with('products', 'user')->findOrFail($data->id);
        }
        return view('backend.order.show', compact('order'));
    }

    public function destroy($id)
    {
        $order = Order::with('products')->where('id', $id)->findOrFail($id);
        $order->products()->detach();
        $order->delete();
        toast('Pesanan berhasil dihapus', 'success');
        return redirect()->route('backend.orders.index');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,success,cancel',
        ]);

        $order         = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        toast('Status order berhasil diperbarui', 'success');
        return redirect()->back();
    }

}