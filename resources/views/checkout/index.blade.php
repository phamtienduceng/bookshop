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
    <h1 class="text-center">Checkout</h1>
    <div class="row justify-content-center">
      <div class="col-md-6">
        @if (session('error'))
          <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form action="{{ route('checkout.processPayment') }}" method="POST">
          @csrf
          <!-- Additional fields for order -->
          <div class="form-group">
            <label for="customer_name">Customer Name:</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Customer Name" required>
          </div>
          <div class="form-group">
            <label for="order_total">Order Total:</label>
            <input type="text" class="form-control" id="order_total" name="order_total" value="{{ session('total') }}" readonly>
          </div>
          <!-- Rest of the form -->
          <div class="form-group">
            <label for="payment_method">Payment Method:</label>
            <select class="form-control" id="payment_method" name="payment_method" required>
              <option value="">Select Payment Method</option>
              <option value="credit_card">Credit Card</option>
              <option value="paypal">PayPal</option>
              <!-- Add more payment options as needed -->
            </select>
          </div>
          <div class="form-group">
            <label for="shipping_units">Shipping Units:</label>
            <select class="form-control" id="shipping_units" name="shipping_units" required>
              <option value="">Select Shipping Units</option>
              <option value="unit1">Shipping Unit 1</option>
              <option value="unit2">Shipping Unit 2</option>
              <!-- Add more shipping units as needed -->
            </select>
          </div>
          <div class="form-group">
            <label for="payment_amount">Payment Amount:</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">VND</span>
              </div>
              <input type="text" class="form-control" id="payment_amount" name="payment_amount" value="{{ session('total') }}" readonly>
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Process Payment</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
