<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function checkout(Request $request)
    {
        //  $stripe = new \Stripe\StripeClient
        return view('frontend.pages.checkout');
    }
}
