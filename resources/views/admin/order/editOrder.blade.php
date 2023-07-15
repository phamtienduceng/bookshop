@extends('admin.layout.layout')

@section('contents')

<div class="container">
    <h1><span class="glitter">Order ID:</span> {{ $order->id }}</h1>
    
    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" id="updateOrderForm">
        @csrf
        @method('PUT')

        <!-- Customer Name -->
        <div class="form-group">
            <label for="customer_name">Customer Name: </label> <span>{{$order->customer_name}}</span>
        </div>

        <!-- Order Total -->
        <div class="form-group">
            <label for="order_total">Order Total: </label> <span>{{ number_format($order->order_total, 0, ',', '.') }}₫</span>
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
@endsection