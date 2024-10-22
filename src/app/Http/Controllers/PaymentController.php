<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use Exception;
use App\Models\Reservation;

class PaymentController extends Controller
{

    public function store(Request $request)
    {
        try {
            Stripe::setApiKey(config('stripte.stripe_secret_key'));

            $customer = Customer::create(array(
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken
            ));



            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => $request->pay,
                'currency' => 'jpy'
            ));
            $reservation = [
                'payment_flag' => true,
            ];
            Reservation::find($request->reservation_id)->update($reservation);


            return back();
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }
}
