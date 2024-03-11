<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    // Method to display the cart
    public function index()
    {
        $cartItems = Cart::with('product')->get();
        return view('cart', ['cartItems' => $cartItems]);
    }

    public function view()
    {
        // Retrieve cart items with associated products
        $cartItems = CartItem::with('product')->get();

        return view('checkout', ['cartItems' => $cartItems]);
    }
    // Method to add a product to the cart
    public function addToCart($productId)
    {
        // Assuming you've retrieved the product details by $productId
        $product = Product::find($productId);

        // Add the product to the cart
        $cart = new Cart();
        $cart->product_id = $productId;
        $cart->quantity = 1; // Default quantity
        $cart->save();

        return redirect()->route('cart');
    }

    // Method to remove a product from the cart
    public function removeFromCart($cartId)
    {
        Cart::destroy($cartId);
        return redirect()->route('cart');
    }
}
