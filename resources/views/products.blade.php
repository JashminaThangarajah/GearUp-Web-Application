@extends('layouts.app')

@section('content')
    @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <div class="container">
        <h2 class="mb-4">Our Products</h2>
        <div class="row">
            @forelse($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="product-card">
                        <div class="product-card-img">
                            @if($product->quantity > 0)
                                <span class="stock bg-success">In Stock</span>
                            @else
                                <span class="stock bg-danger">Out of Stock</span>
                            @endif
                        </div>
                        <div class="product-card-body">
                            <h5 class="product-name">{{ $product->name }}</h5>
                            <p class="product-description">{{ $product->description }}</p>
                            <p class="selling-price">Rs: {{ $product->price }}</p>
                            <!-- Quantity controls -->
                            <div class="quantity-controls">
                                <p>Quantity :</p>
                                <button class="quantity-btn" onclick="decrementQuantity({{ $product->id }})">-</button>
                                <span class="quantity" id="quantity_{{ $product->id }}">1</span>
                                <button class="quantity-btn" onclick="incrementQuantity({{ $product->id }})">+</button>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <!-- Add to Cart button -->
                                <form action="{{ route('addToCart', ['productId' => $product->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-warning">Add to Cart</button>
                                </form>
                                <!-- Buy Now button -->
                                
                                <a href="{{ route('buy', ['productId' => $product->id]) }}" class="btn btn-primary">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <div class="alert alert-warning">No products available</div>
                </div>
            @endforelse
        </div>
    </div>

    <!-- JavaScript functions for Quantity controls, Add to Cart, and Buy Now buttons -->
    <script>
        function decrementQuantity(productId) {
            var quantityElement = document.getElementById('quantity_' + productId);
            var quantity = parseInt(quantityElement.innerText);
            if (quantity > 1) {
                quantityElement.innerText = quantity - 1;
            }
        }

        function incrementQuantity(productId) {
            var quantityElement = document.getElementById('quantity_' + productId);
            var quantity = parseInt(quantityElement.innerText);
            quantityElement.innerText = quantity + 1;
        }
    </script>
@endsection
