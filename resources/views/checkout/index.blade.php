<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Checkout</h1>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <form action="{{ route('checkout.processPayment') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="payment_method">Payment Method:</label>
                        <select class="form-control" id="payment_method" name="payment_method">
                            <option value="credit_card">Credit Card</option>
                            <option value="paypal">PayPal</option>
                            <!-- Add more payment options as needed -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="payment_amount">Payment Amount:</label>
                        <input type="text" class="form-control" id="payment_amount" name="payment_amount">
                    </div>
                    <button type="submit" class="btn btn-primary">Process Payment</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
