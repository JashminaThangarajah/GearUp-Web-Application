@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Checkout</h2>
        @if ($product)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">Description: {{ $product->description }}</p>
                    <p class="card-text">Price: ${{ $product->price }}</p>
                    <!-- You can include more product details here if needed -->
                    <a href="#" class="btn btn-primary">Proceed to Payment</a>
                </div>
            </div>
        @else
            <div class="alert alert-danger">Product not found</div>
        @endif
    </div>
@endsection
