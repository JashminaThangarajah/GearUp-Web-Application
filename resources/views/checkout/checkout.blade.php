@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Checkout</h2>
        <div class="row">
            <div class="col-md-6">
                <!-- Order Details -->
                <h3>Order Details</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <!-- Add more columns if needed -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $item)
                            <tr>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->product->price }}</td>
                                <td>{{ $item->quantity }}</td>
                                <!-- Add more columns if needed -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <!-- Customer Details -->
                <h3>Customer Details</h3>
                <!-- Customer Details Form -->
                <form method="POST" action="{{ route('placeOrder') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number">
                    </div>
                    <!-- Add more form fields for customer details as needed -->
                    <button type="submit" class="btn btn-primary">Proceed to Checkout</button>
                </form>
            </div>
        </div>
    </div>
@endsection

