<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\ShippingAddress;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (auth()->user()->isAdmin) {
            $orders = Order::all()->sortByDesc('created_at');
            foreach ($orders as $order) {
                $order->products = json_decode($order->products);
            }
            return view('admin.orders.index', compact('orders'));
        } else {
            $orders = auth()->user()->orders->sortByDesc('created_at');
            foreach ($orders as $order) {
                $order->products = json_decode($order->products);
            }
            return view('orders.index', compact('orders'));
        }
    }

    public function show(Order $order)
    {
        $order->products = json_decode($order->products);
        if (auth()->user()->isAdmin) {
            return view('admin.orders.show', compact('order'));
        }
        if (auth()->user()->id == $order->user_id) {
            return view('orders.show', compact('order'));
        } else {
            return redirect()->route('orders.index')->with('error', 'You are not authorized to view this order!');
        }
    }
    public function printOrder(Order $order)
    {
        $order->products = json_decode($order->products);
        return view('orders.printOrder', compact('order'));
    }

    public function cancelOrder(Order $order)
    {
        if (auth()->user()->id == $order->user_id) {

            if ($order->status == 'pending') {
                $order->status = 'cancelled';
                $order->cancelled_at = now();
                $order->save();
                return redirect()->route('orders.index')->with('success', 'Order has been cancelled successfully!');
            } else {
                return redirect()->route('orders.index')->with('error', 'You cannot cancel this order!');
            }
        } else {
            return redirect()->route('orders.index')->with('error', 'You are not authorized to cancel this order!');
        }
    }
    public function updateStatus(Request $request, Order $order)
    {
        $this->validate($request, [
            'status' => 'required',
        ]);
        $order->status = $request->status;
        if ($order->status == 'packed') {
            $order->packed_at = now();
        } elseif ($request->status == 'shipped') {
            $order->shipped_at = now();
        } elseif ($request->status == 'delivered') {
            $order->delivered_at = now();
        } elseif ($request->status == 'cancelled') {
            $order->cancelled_at = now();
        }
        $order->save();
        $order->products = json_decode($order->products);
        return view('admin.orders.show', compact('order'))->with('success', 'Order status updated successfully!');
    }
    public function destroy(Order $order)
    {
        if ($order->status == 'cancelled') {
            $order->delete();
            return redirect('/orders')->with('success', 'Order deleted successfully!');
        }
        return redirect('/orders')->with('error', 'You cannot delete this order!');
    }

}
