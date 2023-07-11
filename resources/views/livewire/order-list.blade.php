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
                <th>Order Total</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <!-- Table body -->
        <tbody>
            <!-- Loop through each order and display its info -->
            @foreach ($orders as $order)
            <tr>
                <!-- Order info -->
                <td>{{ $order->id }}</td>

                <!-- Display 'Gabriel Belmont' if customer_name is null -->
                <td>{{ $order->customer_name ?? 'Gabriel Belmont' }}</td>
                <td>{{ $order->order_total }}</td>
                <td>{{ $order->created_at }}</td>
                <!-- Delete order button -->
                <td>
                    <button wire:click="deleteOrder({{ $order->id }})" class="btn btn-danger">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
