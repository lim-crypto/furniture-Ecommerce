<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user() ? Auth::user()->isAdmin : false) {
            return redirect()->route('admin.index');
        }

        $featured = Product::where('is_featured', true)->take(3)->get();
        $new_products = Product::orderBy('created_at', 'desc')->take(3)->get();
        return view('home', compact('featured', 'new_products'));

    }
}
