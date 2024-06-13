<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    private $order;
    public function __construct(Order $order)
    {
        $this->order = $order;
    }
    public function index(){
        $orders = Order::paginate(10); // Adjust pagination as needed
        return view('admin.orders.index', compact('orders'));
    }
    public function changeStatus(Request $request)
    {
        $order = $this->order->find($request->id);
        $order->status = $request->status;
        $order->save();
        return response()->json(['message' => 'Order status updated successfully.']);
    }
}
