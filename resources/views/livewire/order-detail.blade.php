<div>
    <h1>Order Details for Order ID: {{ $order->id }}</h1>

    <h2>Customer: {{ $order->customer_name }}</h2>

    <h2>Order Total: {{ $order->order_total }}</h2>

    <h2>Created At: {{ $order->created_at }}</h2>

    <h2>Products:</h2>

    <ul>
        @foreach($order->orderItems as $orderItem)
        <li>{{ $orderItem->product->name }} - Quantity: {{ $orderItem->quantity }}</li>
        @endforeach
    </ul>
</div>
