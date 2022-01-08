<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->only('index');
    }

    public function index()
    {
        $users = User::all()->except(Auth::id())->sortByDesc('created_at');
        return view('admin.users.index', compact('users'));
    }
    public function show(User $user)
    {
        $shippingAddresses = auth()->user()->shipping_addresses;
        return view('user.profile', compact('user', 'shippingAddresses'));
    }
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_number' => 'required',
        ]);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->contact_number = $request->contact_number;
        $user->save();
        return redirect()->back()->with('success', 'Profile updated successfully');
    }

}
