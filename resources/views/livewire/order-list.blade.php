<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Order List</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered sortOrder" id="myTable" width="100%" cellspacing="0" wire:ignore>
                <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Order Total (VND)</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Order Details</th>
            </tr>
        </thead>
        @foreach ($orders as $order)
            <tr>
                <!-- Order info -->
                <td>{{ $order->id }}</td>
                <td>{{ $order->customer_name }}</td>
                <td>{{ number_format($order->order_total, 0, ',', '.') }} đ</td><!-- Format the order_total with thousand separator -->
                <td>{{ $order->status ?? 'Pending' }}</td>
                <td>{{ $order->created_at }}</td>
                <td>
                    <a href="{{ route('order.detail', ['id' => $order->id]) }}" class="action-item btn btn-info btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-info-circle"></i>
                        </span>
                        <span class="text">View</span>
                    </a>
                </td>
            </tr>
            @endforeach
                </table>
            </div>
        </div>
    </div>

</div>