<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    // Checking out 
    public function checkout()
    {
        $user = Auth::user();
        $cartItems = $user->cart->cart_items()->with('product')->get();
        $total = $cartItems->sum(function ($item) {
            return $item->product->price;
        });
        return view('cart.checkout', compact('cartItems', 'total'));
    }




    // Making the order
    public function add(Request $request)
    {
        $user = Auth::user();
        // Validation the form
        $request->validate(
            [
                'name' => 'required|string',
                'email' => 'required|email',
                'phone_number' => 'required|regex:/[0-9]/',
                'address' => 'required|string',
            ]
        );


        $orderId = uniqid('ORD-'); //creating a unique id for each order
        Order::create(
            [
                'client_name' => $request->name,
                'order_id' => $orderId,
                'total_price'      => $request->total_price,
                'email' => $request->email,
                'address' => $request->address,
                'phone' => $request->phone_number,
            ]

        );

        //Deleting the cart after making the order.
        $user->cart->cart_items()->delete();
        return redirect(route('home'));
    }


    // View all orders
    public function view()
    {
        $orders = Order::all();
        return view('orders', compact('orders'));
    }
}
