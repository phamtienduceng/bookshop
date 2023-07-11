<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout.index');
    }

    public function processPayment(Request $request)
    {
        $paymentMethod = $request->input('payment_method');
        $paymentAmount = $request->input('payment_amount');

        // Process the payment using the selected payment method and amount
        $paymentSuccessful = $this->processPaymentMethod($paymentMethod, $paymentAmount);
        if ($paymentSuccessful) {
            // Payment is successful, create the order
            $order = $this->createOrder($request);

            if ($order instanceof Order) { // Check if $order is an Order instance
                // Clear the cart data
                $this->clearCartData($request);
                // Redirect to success page with order ID
                return redirect()->route('checkout.success')->with('success', 'Payment processed successfully. Order ID: ' . $order->id);
            } else {
                // In case of a RedirectResponse, simply return it
                return $order;
            }
        }

        // If payment fails or order creation fails, redirect to the cancel page
        return redirect()->route('checkout.cancel')->with('error', 'Payment processing failed.');
    }


    private function createOrder(Request $request)
    {
        // Retrieve the necessary data from the request
        $customerName = $request->input('customer_name');
        $orderTotal = $request->input('order_total');
        $products = $request->session()->get('cart');

        // Get the user ID
        $user = auth()->user();
        if ($user === null) {
            // Handle the situation where no user is logged in, perhaps by redirecting to a login page.
            return redirect()->route('login')->with('error', 'You must be logged in to complete the checkout process.');
        }
        $userId = $user->id;

        // Create the order
        $order = Order::create([
            'user_id' => $userId,
            // Set the user ID
            'customer_name' => $customerName,
            'order_total' => $orderTotal,
            // Add any other relevant fields for the order
        ]);

        // Check if $products is not null
        if ($products !== null) {
            // Create and associate the order items
            foreach ($products as $product) {
                if (isset($product['id'])) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $product['id'],
                        'quantity' => $product['quantity'],
                        'price' => $product['price'],
                    ]);
                }
            }
        }

        return $order;
    }

    private function processPaymentMethod($paymentMethod, $paymentAmount)
    {
        // Add your payment processing logic here

        // Return true if payment is successful, false otherwise
        // Placeholder return
        return true;
    }

    private function clearCartData($request)
    {
        $request->session()->forget('cart');
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
