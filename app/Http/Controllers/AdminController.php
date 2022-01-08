<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{


    public function index()
    {
        $newOrders = Order::where('status', 'pending')->get()->count();
        $orders = Order::count();
        $products = Product::count();
        $users = User::where('isAdmin', 0)->count();
        return view('admin.dashboard', compact('newOrders', 'orders', 'products', 'users'));

    }
}
