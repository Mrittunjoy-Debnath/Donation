<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\OnlinePayment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function showPayment()
    {
        $payments = OnlinePayment::latest()->get();
        return view('admin.payment.showpayment',[
            'payments' =>$payments,
        ]);
    }
    public function deletePayment($id)
    {
        $payment = OnlinePayment::find($id);
        $payment->delete();
        return redirect()->back()->with('success','Payment delete successfully');
    }
}
