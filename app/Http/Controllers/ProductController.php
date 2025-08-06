<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        // Fetch all products 
        $products = Product::all();
        
        // Determine the current authenticated user's role (if logged in) to pass both products and role to the home view
        $role = null;
        if (Auth::user()) {
            $role = Auth::user()->role;
        }

        return view('home', compact('products', 'role'));
    }
}
