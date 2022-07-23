<?php

namespace App\Http\Controllers;

use App\OnlinePayment;
use App\Order;
use App\OrderDetail;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function savePayment(Request $request)
    {
        $this->validate($request,[
            'bkash_number' => 'required',
            'bkash_transection' => 'required',
        ]);

        $onlinePayment = new OnlinePayment();
        $onlinePayment->customer_id = Auth::user()->id;
        $onlinePayment->customer_name = Auth::user()->name;
        $onlinePayment->number = $request->bkash_number;
        $onlinePayment->trnxid = $request->bkash_transection;
        $onlinePayment->save();

        return redirect('/complete/order');
    }
}
