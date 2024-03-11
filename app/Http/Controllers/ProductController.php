<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Import the Product model
use App\Models\CartItems;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve products from the database using the Product model
        $products = Product::all();

        // Pass the products data to the view
    
       if($products)
       {
        return view('products', compact('products'));
       }
      
    }

    public function showProductDetails($productId)
    {
        $product = Product::findOrFail($productId);
        return view('productdetails', compact('product'));
    }
    
}

