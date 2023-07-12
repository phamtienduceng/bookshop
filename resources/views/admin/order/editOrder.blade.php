<!--// File: C:\xampp\htdocs\bookshop1\resources\views\admin\order\editOrder.blade.php-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        .glitter {
            background-image: linear-gradient(to right, #ff00cc, #333399, #00ccff);
            background-size: 200% auto;
            color: #fff;
            display: inline-block;
            animation: glitter-effect 2s linear infinite;
            padding: 0.2em 0.5em;
        }

        .glitter-button {
            background-image: linear-gradient(to right, #ff00cc, #333399, #00ccff);
            background-size: 200% auto;
            color: #fff;
            border-color: #fff;
            animation: glitter-effect 2s linear infinite;
        }

        @keyframes glitter-effect {
            0% { background-position: 0 0; }
            50% { background-position: 100% 0; }
            100% { background-position: 0 0; }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><span class="glitter">Edit Order ID:</span> {{ $order->id }}</h1>
        
        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" id="updateOrderForm">
            @csrf
            @method('PUT')

            <!-- Customer Name -->
            <div class="form-group">
                <label for="customer_name">Customer Name</label>
                <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ old('customer_name', $order->customer_name ?: 'Administrator') }}">
            </div>

            <!-- Order Total -->
            <div class="form-group">
                <label for="order_total">Order Total (VNĐ)</label>
                <input type="number" step="0.01" class="form-control" id="order_total" name="order_total" value="{{ $order->order_total }}" onchange="updateTotal()">
            </div>

            <!-- Status -->
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="">-- Select Status --</option>
                    <option value="Pending" {{ $order->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Completed" {{ $order->status === 'Completed' ? 'selected' : '' }}>Completed</option>
                    <option value="Processing" {{ $order->status === 'Processing' ? 'selected' : '' }}>Processing</option>
                </select>
            </div>

            <!-- Payment Method -->
            <div class="form-group">
                <label for="payment_method">Payment Method</label>
                <select class="form-control" id="payment_method" name="payment_method">
                    <option value="cash" {{ $order->payment_method === 'cash' ? 'selected' : '' }}>Cash</option>
                    <option value="card" {{ $order->payment_method === 'card' ? 'selected' : '' }}>Card</option>
                </select>
            </div>

            <!-- Add other fields as needed -->

            <!-- Update Button -->
            <button type="submit" name="submit" class="btn btn-primary glitter-button">Update</button>
   
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- Script for updating the order total -->
    <script>
        function updateTotal() {
            let totalInput = document.getElementById('order_total');
            let totalPrice = Number(totalInput.value);
            // Add your calculations here to calculate the new total
            totalInput.value = totalPrice.toFixed(2);
        }
    </script>
</body>
</html>
