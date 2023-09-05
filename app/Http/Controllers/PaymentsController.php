<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Notifications\OrderCreatedNotification;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification ;
use Stripe\Charge;
use Stripe\Stripe;
use Stripe\StripeClient;

class PaymentsController extends Controller
{



    public function create($order_id)
    {
        $order = Order::find($order_id);
        return view('frontend.payments.paymentForm', [
            'order' => $order,
        ]);
    }
    public function createStripePaymentIntent(Order $order)
    {

        $amount = $order->items->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        /**
         * @var \Stripe\StripeClient
         */
        $stripe = new StripeClient(config('services.stripe.sk'));

        $paymentIntent = $stripe->paymentIntents->create([
            'amount' => $amount,
            'currency' => 'usd',
            'payment_method_types' => ['card'],
        ]);

        try {
            // Create payment
            $payment = new Payment();
            $payment->forceFill([
                'order_id' => $order->id,
                'amount' => $paymentIntent->amount,
                'currency' => $paymentIntent->currency,
                'method' => 'stripe',
                'status' => 'pending',
                'transaction_id' => $paymentIntent->id,
                'transaction_data' => json_encode($paymentIntent),
            ])->save();
        } catch (QueryException $e) {
            echo $e->getMessage();
            return;
        }

        return [
            'clientSecret' => $paymentIntent->client_secret,
        ];


    }

    public function confirm(Request $request, Order $order)
    {

        /**
         * @var \Stripe\StripeClient
         */
        $stripe = new StripeClient(config('services.stripe.sk'));
        $paymentIntent = $stripe->paymentIntents->retrieve(
            $request->query('payment_intent'),
            []
        );


        if ($paymentIntent->status == 'succeeded') {
            try {
                // Update payment
                $payment = Payment::where('order_id', $order->id)->first();
                $payment->forceFill([
                    'status' => 'completed',
                    'transaction_data' => json_encode($paymentIntent),
                ])->save();
            } catch (QueryException $e) {
                echo $e->getMessage();
                return;
            }

            event('payment.created', $payment->id);

        //   DELETE CART ITEM  PRODUCT AFTER PAYMENT
            $cartItems = Cart::where('user_id', Auth::user()->id)->get();
            foreach ($cartItems as $item) {
                $item->delete();
            }

            return redirect()->route('home')->with([
                'success' => 'Payment completed successfully.',

            ]);
        }


        return redirect()->route('orders.payments.create', [
            'order' => $order->id,
            'status' => $paymentIntent->status,
        ]);


    }
}
