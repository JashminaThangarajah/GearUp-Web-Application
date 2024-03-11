<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Import the Product model


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

    
}

