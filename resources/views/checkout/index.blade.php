<!--// File: C:\xampp\htdocs\bookshop1\resources\views\checkout\index.blade.php-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0-beta1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS for more vibrant look */
        body {
            background-color: #fdfdff;
        }

        .container {
            background-color: #f7f9fc;
            border-radius: 20px;
            padding: 30px;
            margin-top: 30px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        .btn-primary {
            background-color: #ff5722;
            border-color: #ff5722;
        }

        .btn-primary:hover {
            background-color: #e64a19;
            border-color: #e64a19;
        }
    </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <!-- Checkout header -->
        <h1 class="text-center text-primary">Checkout</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Error Message -->
                @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <!-- Checkout Form -->
                <form action="{{ route('checkout.processPayment') }}" method="POST">
                    @csrf
                   <!-- Customer Name -->
                    <div class="form-group">
                        <label for="customer_name">Customer Name:</label>
                        <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Customer Name" value="{{ old('customer_name') ?: 'Administrator' }}" required>
                    </div>

                    <!-- Order Total -->
                    <div class="form-group">
                        <label for="order_total">Order Total:</label>
                        <input type="text" class="form-control" id="order_total" name="order_total" value="{{ session('total') }}" readonly>
                    </div>
                    <!-- Payment Method -->
                    <div class="form-group">
                        <label for="payment_method">Payment Method:</label>
                        <select class="form-control" id="payment_method" name="payment_method" required>
                            <option value="">Select Payment Method</option>
                            <option value="credit_card">Credit Card</option>
                            <option value="paypal">PayPal</option>
                        </select>
                    </div>
                    <!-- Shipping Units -->
                    <div class="form-group">
                        <label for="shipping_units">Shipping Units:</label>
                        <select class="form-control" id="shipping_units" name="shipping_units" required>
                            <option value="">Select Shipping Units</option>
                            <option value="unit1">Shipping Unit 1</option>
                            <option value="unit2">Shipping Unit 2</option>
                        </select>
                    </div>
                    <!-- Payment Amount -->
                    <div class="form-group">
                        <label for="payment_amount">Payment Amount:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Việt Nam Đồng</span>
                            </div>
                            <input type="text" class="form-control" id="payment_amount" name="payment_amount" value="{{ session('total') }}" readonly>
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Process Payment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>
    <!-- Including jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to add commas as thousand separators
            function numberWithCommas(x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }

            // Apply the formatting to 'payment_amount'
            var payment_amount = $('#payment_amount').val();
            $('#payment_amount').val(numberWithCommas(payment_amount));

            // Apply the formatting to 'order_total'
            var order_total = $('#order_total').val();
            $('#order_total').val(numberWithCommas(order_total));

            // Function to remove commas
            function removeCommas(x) {
                return x.replace(/,/g, '');
            }

            // When form is submitted
            $('form').on('submit', function(e) {
                // Remove commas from 'payment_amount' and 'order_total'
                var payment_amount_no_commas = removeCommas($('#payment_amount').val());
                var order_total_no_commas = removeCommas($('#order_total').val());

                // Set the values of 'payment_amount' and 'order_total' to the values without commas
                $('#payment_amount').val(payment_amount_no_commas);
                $('#order_total').val(order_total_no_commas);
            });
        });
    </script>
</body>
</html>
