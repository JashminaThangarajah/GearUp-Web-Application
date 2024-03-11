<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CheckoutController extends Controller
{
    public function index($productId)
    {
        // Retrieve the product details using the provided product ID
        $product = Product::findOrFail($productId);
        
        // Pass the product details to the checkout view
        return view('checkout', compact('product'));
    }
}
