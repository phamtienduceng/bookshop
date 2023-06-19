<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        // Add your payment processing logic here

        // If payment is successful, redirect to the success page
        return redirect()->route('checkout.success')->with('success', 'Payment processed successfully.');

        // If payment fails, redirect to the cancel page
        return redirect()->route('checkout.cancel')->with('error', 'Payment processing failed.');
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
