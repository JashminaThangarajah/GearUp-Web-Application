@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Cart</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $totalAmount = 0; ?>
                @foreach ($cartItems as $item)
                    <?php 
                        $subtotal = $item->product->price * $item->quantity;
                        $totalAmount += $subtotal;
                    ?>
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>${{ $item->product->price }}</td>
                        <td>
                            <!-- Quantity controls -->
                            <div class="quantity-controls">
                                <button class="quantity-btn" onclick="updateQuantity({{ $item->product->id }}, -1)">-</button>
                                <span class="quantity" id="quantity_{{ $item->product->id }}">{{ $item->quantity }}</span>
                                <button class="quantity-btn" onclick="updateQuantity({{ $item->product->id }}, 1)">+</button>
                            </div>
                        </td>
                        <td>${{ $subtotal }}</td>
                        <td>
                            <form action="{{ route('removeFromCart', ['cartId' => $item->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            <h4>Total Amount: $<span id="totalAmount">{{ $totalAmount }}</span></h4>
        </div>
        
       <center><a href="{{ route('checkout', ['totalAmount' => $totalAmount]) }}" class="btn btn-primary">Buy Now</a></center> 
    </div>

    <!-- JavaScript function for updating quantity -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Load quantity from local storage if available
            var quantities = JSON.parse(localStorage.getItem('cartQuantities'));
            if (quantities) {
                for (var productId in quantities) {
                    document.getElementById('quantity_' + productId).innerText = quantities[productId];
                }
                updateTotalAmount();
            }
        });

        function updateQuantity(productId, change) {
            var quantityElement = document.getElementById('quantity_' + productId);
            var quantity = parseInt(quantityElement.innerText) + change;
            if (quantity >= 0) {
                quantityElement.innerText = quantity;
                updateTotalAmount();
                // Save quantity to local storage
                var quantities = JSON.parse(localStorage.getItem('cartQuantities')) || {};
                quantities[productId] = quantity;
                localStorage.setItem('cartQuantities', JSON.stringify(quantities));
            }
        }

        function updateTotalAmount() {
            var totalAmount = 0;
            var rows = document.querySelectorAll('tbody tr');
            rows.forEach(function(row) {
                var quantity = parseInt(row.querySelector('.quantity').innerText);
                var price = parseFloat(row.querySelector('td:nth-child(2)').innerText.replace('$', ''));
                totalAmount += quantity * price;
            });
            document.getElementById('totalAmount').innerText = totalAmount.toFixed(2);
        }
    </script>
@endsection
