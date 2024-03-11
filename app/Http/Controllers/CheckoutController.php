<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItems;
use App\Models\Cart;

class CheckoutController extends Controller
{
    public function index($productId = null)
    {
        $product = null;

        if ($productId) {
            // If a product ID is provided, fetch the product details
            $product = Product::findOrFail($productId);
        }

        return view('checkout', compact('product'));
    }




public function view()
{
    // Retrieve cart items with associated products
    $cartItems = Cart::with('product')->get();

    return view('\checkout\checkout', ['cartItems' => $cartItems]);
}

}
