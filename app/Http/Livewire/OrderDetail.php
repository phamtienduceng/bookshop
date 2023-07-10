<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;

class OrderDetail extends Component
{
    public Order $order;

    public function mount(Order $order)
    {
        $this->order = $order;
    }

    public function render()
    {
        return view('livewire.order-detail');
    }
}
