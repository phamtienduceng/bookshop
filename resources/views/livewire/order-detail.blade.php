<div class="container">
    <h1>Order Details for Order ID: {{ $order->id }}</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Customer: {{ $order->customer_name }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Order Total: {{ $order->order_total }}</h6>
            <p class="card-text">Created At: {{ $order->created_at }}</p>
        </div>
    </div>

    <h2>Products:</h2>
    <ul class="list-group">
        @foreach($order->orderItems as $orderItem)
        <li class="list-group-item">
            {{ $orderItem->product->name }} - Quantity: {{ $orderItem->quantity }}
        </li>
        @endforeach
    </ul>

    <div class="mt-4">
        <a href="{{ route('order.edit', $order->id) }}" class="btn btn-primary">Edit</a>
        <button wire:click="deleteOrder" class="btn btn-danger">Delete</button>
    </div>
</div>
