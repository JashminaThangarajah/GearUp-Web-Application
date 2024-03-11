<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
    <h1>Products Page</h1>

    <!-- Display products here -->
    <div>
        <h2>List of Products</h2>
      @if(isset($products) && is_countable($products) && count($products) > 0)
    @foreach($products as $product)
        <li>
            <strong>{{ $product->name }}</strong><br>
            <span>Description: {{ $product->description }}</span><br>
            <span>Price: ${{ $product->price }}</span><br>
            <span>Quantity: {{ $product->quantity }}</span><br>
        </li>
    @endforeach
@else
    <li>No products found</li>
@endif


    </div>
</body>
</html>


