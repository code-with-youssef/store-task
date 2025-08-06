<?php

namespace App\Http\Controllers;


use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $user = Auth::user();

        // Creating a cart of the user, if he doesn't have. 
        $cart = $user->cart()->firstOrCreate([
            'user_id' => $user->id,
        ]);

        // Checking if the product is already in the cart
        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartItem) {
            return response()->json(['message' => 'Product already in cart'], 200);
        }

        // Creating the cart item if it was not in the cart.
        CartItem::create([
            'cart_id' => $cart->id,
            'product_id' => $request->product_id,
        ]);

        return response()->json(['message' => 'The product was added to the cart'], 200);
    }


    // Showing all the cart items.
    public function view(){
        $user = Auth::user();
        $cartItems = $user->cart->cart_items()->with('product')->get();
        return view('cart.index',compact('cartItems'));
    }


}
