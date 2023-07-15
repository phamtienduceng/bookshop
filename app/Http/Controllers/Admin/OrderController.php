<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;


class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('id', 26)->get();
        return view('admin.order.viewOrder', compact('orders'));
    }

    public function create()
    {
        return view('admin.order.createOrder');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_name' => 'required|max:255',
            'order_total' => 'required|numeric',
            'products' => 'required|array', // you may need to validate the structure of the products array
        ]);

        $order = Order::create($validatedData);

        // creating the OrderItems
        foreach ($request->input('products') as $product) {
            $orderItem = new OrderItem([
                'product_id' => $product['id'],
                'quantity' => $product['quantity'],
                'price' => $product['price'],
            ]);
            $order->orderItems()->save($orderItem);
        }

        return redirect()->route('orders.index');
    }


    public function edit(Order $order)
    {
        return view('admin.order.editOrder', compact('order'));
    }

    public function show($id)
    {
        $order = Order::find($id);
        return view('admin.order.editOrder', compact('order'));
    }



    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        if (!$order) {
            // Xử lý khi không tìm thấy order
        }

        // Cập nhật dữ liệu order
        $order->status = $request->input('status');

        // Cập nhật các trường khác theo cần thiết

        $order->save();

        // Xử lý sau khi cập nhật thành công

        return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully');
    }


    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index');
    }
}
