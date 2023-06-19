<?php

namespace App\Http\Controllers;

use Stripe;

use Notification;

use App\Models\myCart;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    

     public function paymentPost(Request $request)
    {
	       
	Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $request->sub*100,   // RM10  10=10 cen 10*100=1000 cen
                "currency" => "MYR",
                "source" => $request->stripeToken,
                "description" => "This payment is testing purpose of southern online",
        ]);
           
        $items=$request->input('cid');//mycart.blade line 38 (name='cid[])
        foreach($items as $item=>$value){
            $carts=mycart::find($value);
            $carts->orderID='1001';//temp OrderID //finally orderID need get from the new order ID generate by funtion
            $carts->save();
    
    }

        $email=''; //own email
	    Notification::route('mail', $email)->notify(new \App\Notifications\orderPaid($email));


        return back();
    }
}
