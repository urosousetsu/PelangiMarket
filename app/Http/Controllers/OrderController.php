<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //cart index
    public function cartIndex()
    {
        $cart = session()->get('cart', []);

        return view('keranjang', compact('cart'));
    }

    //store order
    public function store(Request $request)
    {
        $cart = session()->get('cart', []);

        // Process the order
        if (!isset($cart) || empty($cart)) {
            return redirect()->route('keranjang')->with('error', 'Your cart is empty.');
        }

        $total_price = 0;
        foreach ($cart as $item) {
            $total_price += $item['price'] * $item['quantity'];
        }


        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        // Create item details for Midtrans
        $itemDetails = [];
        foreach ($cart as $key => $item) {
            $itemDetails[] = [
                'id' => $key,
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'name' => $item['name'],
            ];
        }

        $params = [
            'transaction_details' => [
                'order_id' => rand(),
                'gross_amount' => $total_price,
            ],
            'item_details' => $itemDetails,
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
            ],
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        smilify('success', 'Order placed successfully!');
        echo $snapToken;
    }

    public function update(Request $request)
    {
        $json = json_decode($request->get('json'));
        $order_id = json_decode($request->get('order_id'));
        $order = Order::find($order_id);
        $cart = session()->get('cart', []);
        $total_price = 0;
        foreach ($cart as $item) {
            $total_price += $item['price'] * $item['quantity'];
        }
        $order = new Order();
        $order->user_id = auth()->id();
        $order->total_price = $total_price;
        $order->created_at = now();
        $order->updated_at = now();

        if ($json->transaction_status == 'settlement' || $json->transaction_status == 'capture') {
            $order->payment_status = 'Paid';
            $order->payment_date_time = now();
            session()->forget('cart');
        } else if ($json->transaction_status == 'pending') {
            $order->payment_status = 'Pending';
        } else if ($json->transaction_status == 'deny') {
            $order->payment_status = 'Denied';
        } else if ($json->transaction_status == 'expire') {
            $order->payment_status = 'Expired';
        } else if ($json->transaction_status == 'cancel') {
            $order->payment_status = 'Canceled';
        }
        $order->save();

        foreach ($cart as $key => $item) {
            $order->products()->attach($key, [
                'quantity' => $item['quantity'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        smilify('success', 'Order status updated successfully!');
        return redirect()->route('keranjang');
    }
}
