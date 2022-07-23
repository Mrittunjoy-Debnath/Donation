<?php

namespace App\Http\Controllers;
use Cart;
use App\Order;
use App\Payment;
use App\Shipping;
use App\OrderDetail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class CheckoutController extends Controller
{
    public function index()
    {
        return view('front-end.checkout.shipping-form');
    }

    public function newShipping(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $shipping = new Shipping();
        $shipping->name = $request->name;
        $shipping->email = $request->email;
        $shipping->phone = $request->phone;
        $shipping->address = $request->address;
        $shipping->save();

        Session::put('shippingId',$shipping->id);

        return redirect('/checkout/payment');
    }

    public function checkoutPayment()
    {
        return view('front-end.checkout.checkoutpayment');
    }

    public function newOrder(Request $request)
    {
        $paymentType = $request->payment_type;

        if($paymentType=='Cash')
        {
            $order = new Order();
            $order->customer_id = Session::get('customerId');
            $order->shipping_id = Session::get('shippingId');
            $order->order_total = Session::get('orderTotal');
            $order->save();

            $payment = new Payment();
            $payment->order_id = $order->id;
            $payment->payment_type = $request->payment_type;
            $payment->save();

            $cartProducts = Cart::getContent();

            foreach($cartProducts as $cartProduct)
            {
                $orderDetails = new OrderDetail();
                $orderDetails->order_id = $order->id;
                $orderDetails->product_id = $cartProduct->id;
                $orderDetails->product_name = $cartProduct->name;
                $orderDetails->product_price = $cartProduct->price;
                $orderDetails->product_quantity = $cartProduct->quantity;
                $orderDetails->save();
            }

            // Cart::destroy();
            Cart::clear();
            Cart::session($order->customer_id)->clear();
            Session::put('orderTotal',0);
            return redirect('/complete/order');

        }elseif($paymentType=='Bkash')
        {
            $order = new Order();
            $order->customer_id = Session::get('customerId');
            $order->shipping_id = Session::get('shippingId');
            $order->order_total = Session::get('orderTotal');
            $order->save();

            $payment = new Payment();
            $payment->order_id = $order->id;
            $payment->payment_type = $request->payment_type;
            $payment->save();

            $cartProducts = Cart::getContent();

            foreach($cartProducts as $cartProduct)
            {
                $orderDetails = new OrderDetail();
                $orderDetails->order_id = $order->id;
                $orderDetails->product_id = $cartProduct->id;
                $orderDetails->product_name = $cartProduct->name;
                $orderDetails->product_price = $cartProduct->price;
                $orderDetails->product_quantity = $cartProduct->quantity;
                $orderDetails->save();
            }

            // Cart::destroy();
            Cart::clear();
            Cart::session($order->customer_id)->clear();
            Session::put('orderTotal',0);
//            return redirect('/complete/order');

            return view('front-end.checkout.bkash');

        }elseif($paymentType=='Paypal')
        {
            $order = new Order();
            $order->customer_id = Session::get('customerId');
            $order->shipping_id = Session::get('shippingId');
            $order->order_total = Session::get('orderTotal');
            $order->save();

            $payment = new Payment();
            $payment->order_id = $order->id;
            $payment->payment_type = $request->payment_type;
            $payment->save();

            $cartProducts = Cart::getContent();

            foreach($cartProducts as $cartProduct)
            {
                $orderDetails = new OrderDetail();
                $orderDetails->order_id = $order->id;
                $orderDetails->product_id = $cartProduct->id;
                $orderDetails->product_name = $cartProduct->name;
                $orderDetails->product_price = $cartProduct->price;
                $orderDetails->product_quantity = $cartProduct->quantity;
                $orderDetails->save();
            }

            // Cart::destroy();
            Cart::clear();
            Cart::session($order->customer_id)->clear();
            Session::put('orderTotal',0);
//            return redirect('/complete/order');

            return view('front-end.checkout.paypal');
        }
    }

    public function orderComplete()
    {
        return view('front-end.checkout.completeorder');
    }
}
