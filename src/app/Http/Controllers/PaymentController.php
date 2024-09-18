<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use Exception;

class PaymentController extends Controller
{
    public function payView()
    {
        return view('payment');
    }

    public function store(Request $request)
    {
        try {
            Stripe::setApiKey(config('stripe.stripe_secret_key'));

            $customer = Customer::create(array(
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken
            ));

            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => 1000,
                'currency' => 'jpy'
            ));

            return back();
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }
}
