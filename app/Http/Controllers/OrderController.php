<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'phone' => 'required|string',
            // Add validation rules for other fields if needed
        ]);

        // Retrieve cart items from the session or wherever they are stored
        $cartItems = Cart::with('product')->get();

        // Create a new order for each cart item
        foreach ($cartItems as $cartItem) {
            // Create a new order instance
            $order = new Order();
            $order->product_id = $cartItem->product_id;
            $order->quantity = $cartItem->quantity;
            $order->name = $validatedData['name'];
            $order->email = $validatedData['email'];
            $order->address = $validatedData['address'];
            $order->phone = $validatedData['phone'];
            $order->save();
        }

        // Clear the cart after placing the order
        // You can implement this based on your cart implementation
        // For example, if you're using session-based cart, you can clear it like this:
        // $request->session()->forget('cart');

        // Redirect the user or perform any other action
        return redirect()->route('thankyou')->with('success', 'Order placed successfully!');
    }
}
