<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payment Success</title>

    <!-- Import Bootstrap for styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />

    <style>
    body {
      background-color: #f8f9fa;  /* Set light grey background */
    }

    .container {
      max-width: 500px;
      margin-top: 100px;
      padding: 30px;
      border-radius: 5px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Box shadow for the container */
      background-color: #ffffff;  /* White container */
      text-align: center;
    }

    h1 {
      color: #28a745; /* Green color for the title */
    }

    h2 {
      margin-top: 30px;
    }

    p {
      margin-bottom: 20px;
    }

    #counter {
      font-size: 24px;
      font-weight: bold;
      color: #dc3545; /* Red color for the countdown */
    }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="display-4">Payment Successful</h1>
        <p class="lead"> Your payment has been processed successfully. </p>
        <p class="lead">
            <b>Thank you very much for choosing DucTriBookshop.</b>
        </p>
        <p class="lead"> The summary of your order is as follows: </p>
        <h2 class="mt-4">Order Summary:</h2>
        <p>Order ID: {{ $orderID }}</p>
        <p>Total Amount: {{ $totalAmount }} VND</p><!-- Display amount in VND -->
        <!-- More order details as needed -->
        <p class="mt-4"> Your order will be delivered within 3 - 5 days. </p>
        <p class="mt-4">
            You will be redirected to the home page in <span id="counter">5</span> seconds.
        </p>
    </div>


    <script>
    document.addEventListener("DOMContentLoaded", function() {
      let counter = 5;

      // Start the countdown
      const countdown = setInterval(() => {
        counter--;
        document.getElementById('counter').textContent = counter; // Update the counter on the page

        // When the countdown is finished, redirect to the home page
        if (counter === 0) {
          clearInterval(countdown);
          window.location.href = "{{ route('home') }}";
        }
      }, 1000); // countdown updates every second
    });
    </script>

    <!-- Import Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
