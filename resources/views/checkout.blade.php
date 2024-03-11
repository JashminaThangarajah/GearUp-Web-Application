@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Checkout</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">Description: {{ $product->description }}</p>
                <p class="card-text">Price: ${{ $product->price }}</p>
                <!-- You can include more product details here if needed -->
                <a href="#" class="btn btn-primary">Proceed to Payment</a>
            </div>
        </div>
    </div>
@endsection
