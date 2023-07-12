<!--// File: C:\xampp\htdocs\bookshop1\resources\views\livewire\order-list.blade.php-->
<!-- Order Management Page -->
<div>
    <h1>Order Management</h1>

    <!-- Display a table of orders -->
    <table class="table">
        <!-- Table headers -->
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Order Total (VND)</th>
                <th>Status</th>
                <th>Payment Method</th>
                <th>Created At</th>
                <th>Actions</th>
                <th>Order Details</th>
            </tr>
        </thead>

        <!-- Table body -->
        <tbody>
            <!-- Loop through each order and display its info -->
            @foreach ($orders as $order)
            <tr>
                <!-- Order info -->
                <td>{{ $order->id }}</td>
                <td>{{ $order->customer_name ?? 'Administrator' }}</td>
                <td>{{ number_format($order->order_total, 0, ',', '.') }} đ</td><!-- Format the order_total with thousand separator -->
                <td>{{ $order->status ?? 'Pending' }}</td>
                <td>{{ $order->payment_method ?? 'Cash' }}</td>
                <td>{{ $order->created_at }}</td>

                <!-- Delete order button -->
                <td>
                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>

                <!-- View detail order -->
                <td>
                    <a href="{{ route('order.detail', ['id' => $order->id]) }}">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
