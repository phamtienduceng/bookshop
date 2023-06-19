<title>My Cart</title>
</head>
<body>
    <div class="container mt-5">
        <h1>My Cart</h1>
        <h2><a href="{{ route('home') }}" class="btn btn-primary">Go to Home</a></h2>
        <div class="row">
            <div class="col">
                @if(count($cartItems) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartItems as $item)
                        <tr>
                            <td>{{ $item['product']['title'] }}</td>
                            <td><img src="{{ asset('images/' . $item['product']['image']) }}" alt="{{ $item['product']['title'] }}" style="width: 100px;"></td>
                            <td>{{ $item['product']['price'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>{{ $item['product']['price'] * $item['quantity'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="total-price">
                    <h3>Total Price: {{ $totalPrice }}</h3>
                </div>
                <div class="checkout-button">
                    <a href="{{ route('checkout.index') }}" class="btn btn-success">Checkout</a>
                </div>
                @else
                <p>Your cart is empty.</p>
                @endif
            </div>
        </div>
    </div>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
