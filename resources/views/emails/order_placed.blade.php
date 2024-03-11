<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Order Confirmation</title>
</head>
<body>
    <h2>Order Confirmation</h2>
    
    <p>Dear {{ $order->name }},</p>

    <p>Your order has been successfully placed with the following details:</p>

    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $order->product->name }}</td>
                <td>{{ $order->quantity }}</td>
                <td>${{ $order->product->price }}</td>
            </tr>
            <!-- Add more rows if there are multiple products in the order -->
        </tbody>
    </table>

    <p>Shipping Address: {{ $order->address }}</p>
    <p>Phone Number: {{ $order->phone }}</p>

    <p>Thank you for shopping with us!</p>
</body>
</html>
