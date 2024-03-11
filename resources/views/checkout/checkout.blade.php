<div class="container">
    <h2>Checkout</h2>
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
