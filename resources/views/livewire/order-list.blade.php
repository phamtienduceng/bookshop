<div>
    <h1>Order Management</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Order Total</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->customer_name ?? 'Gabriel Belmont' }}</td>
                <td>{{ $order->order_total }}</td>
                <td>{{ $order->created_at }}</td>
                <td>
                    <button wire:click="deleteOrder({{ $order->id }})" class="btn btn-danger">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
