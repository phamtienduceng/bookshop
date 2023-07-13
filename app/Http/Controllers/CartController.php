<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\OrderItem;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $quantity = $request->quantity;

        $cartItem = CartItem::where('product_id', $product->id)->first();

        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            CartItem::create([
                'product_id' => $product->id,
                'quantity' => $quantity,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully.');
    }

    public function index()
    {
        $cartItems = CartItem::all();
        $totalPrice = $this->calculateTotalPrice($cartItems);

        return view('cart.index', compact('cartItems', 'totalPrice'));
    }

    public function updateQuantity(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $quantity = $request->quantity;

        $cartItem = CartItem::where('product_id', $product->id)->first();

        if ($cartItem) {
            $cartItem->quantity = $quantity;
            $cartItem->save();
        }

        return response()->json(['newQuantity' => $cartItem ? $cartItem->quantity : 0]);
    }

    public function removeItem(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        CartItem::where('product_id', $product->id)->delete();

        return response()->json(['success' => true]);
    }

    private function calculateTotalPrice($cartItems)
    {
        $totalPrice = 0;

        foreach ($cartItems as $cartItem) {
            $product = Product::findOrFail($cartItem->product_id);
            $totalPrice += $product->price * $cartItem->quantity;
        }

        return $totalPrice;
    }

    // xử lý quá trình thanh toán
    public function processPayment(Request $request)
    {
        // Lấy thông tin các mục trong giỏ hàng từ bảng cart_items
        $cartItems = CartItem::all();

        // Tạo đơn hàng mới
        $order = Order::create([
            'user_id' => auth()->user()->id,
            // Đổi thành phương thức lấy ID người dùng hiện tại của bạn
            'total_price' => $this->calculateTotalPrice($cartItems),
        ]);

        // Lưu các mục trong giỏ hàng vào bảng order_items
        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
            ]);
        }

        // Xóa các mục trong giỏ hàng
        CartItem::truncate();

        // Chuyển hướng đến trang xác nhận thanh toán thành công
        return redirect()->route('checkout.success');
    }

    public function success()
    {
        return view('checkout.success');
    }

    public function cancel()
    {
        return view('checkout.cancel');
    }
}
