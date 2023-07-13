<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;

class OrderList extends Component
{
    public $orders;

    public function render()
{
    $this->orders = Order::latest()->get();
    return view('livewire.order-list');
}


    public function deleteOrder($orderId)
    {
        // Implement delete order logic
        $order = Order::find($orderId);
        $order->delete();
    }
}
