<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //admin controller
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|max:255|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'description' => 'required',
            'quantity' => 'required|numeric',
            'is_featured' => 'required|boolean',
        ]);
        $product = new Product();
        $product->category_id = $this->getCategoryId($request->category);
        $product->image = $product->saveImage($request->image);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->is_featured = $request->is_featured;
        $product->save();
        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|max:255|string',
            'description' => 'required',
            'quantity' => 'required|numeric',
            'is_featured' => 'required|boolean',

        ]);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $this->getCategoryId($request->category);
        $product->quantity = $request->quantity;
        $product->is_featured = $request->is_featured;
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            ]);
            $product->deleteImage($product->image);
            $product->image = $product->saveImage($request->image);
        }
        $product->save();
        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }
    public function destroy(Product $product)
    {
        //can't delete product if it has orders ,  orders and products has no relationship  because we used json data to store product_id(s) with quantity in orders table
        $orders = Order::all();
        foreach ($orders as $order) {
            $order->products = json_decode($order->products);
            foreach ($order->products as $item) {
                if ($product->id == $item->id) {
                    return redirect()->route('products.index')->with('error', 'You cannot delete product');
                }
            }
        }

        $product->deleteImage($product->image);
        if ($product->delete()) {
            return redirect()->route('products.index')->with('success', 'Product deleted successfully');
        }
    }

    public function getCategoryId($category_name)
    {
        $category = Category::where('name', $category_name)->first();
        if ($category) {
            return $category->id;
        } else {
            $category = new Category();
            $category->name = $category_name;
            $category->save();
            return $category->id;
        }
    }

    public function getProducts()
    {
        $categories = Category::all();
        $products = Product::paginate(12);
        return view('products.index', compact('products', 'categories'));
    }
    public function getProductByCategory($category_id)
    {
        $categories = Category::all();
        $products = Product::where('category_id', $category_id)->paginate(12);
        return view('products.index', compact('products', 'categories'));
    }

    public function getProduct(Product $product)
    {
        $products = Product::where('category_id', $product->category_id)->where('id' ,'!=',$product->id)->paginate(8);
        return view('products.show', compact('product', 'products'));
    }
}
