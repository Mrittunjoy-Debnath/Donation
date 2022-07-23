<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\OrderDetail;
use App\Orderdone;
use Barryvdh\DomPDF\Facade as PDF;
use App\Ordermove;
use App\OrdermoveShipping;
use App\Shipping;
use App\User;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function showOrders()
    {
        // $data = Order::all();
        // $data = DB::table('orders')
        //         ->leftJoin('users','orders.customer_id','=','users.id')
        //         ->get();

        $data = DB::table('users')
                ->rightJoin('orders','users.id','=','orders.customer_id')
                ->get();

        $shipping = Shipping::all();
        return view('admin.orders.orders',[
            'data' =>$data,
            'shipping' =>$shipping,
        ]);
    }

    public function orderDone($order_id,$customer_id)
    {
        // dd($order_id);

        $data = OrderDetail::where('order_id','=',$order_id)
                            ->get();

        $grand_total=0;

        foreach($data as $data2)
        {
            // if($grand_total==$data2->total_bill)
            // {
            //     $grand_total = $data2->total_bill;
            // }
            // else
            {
                $grand_total += ($data2->product_price * $data2->product_quantity);
            }
        }

        $datajoin = User::find($customer_id);
        // $datajoin = DB::table('orders')
        // ->leftJoin('users','orders.customer_id','=','users.id')
        // ->get();

        return view('admin.orders.orderdone',[
            'data' => $data,
            'datajoin' => $datajoin,
            'grand_total' =>$grand_total,
        ]);
    }

    public function downloadPdf($order_id,$customer_id)
    {
        $data = OrderDetail::where('order_id','=',$order_id)
        ->get();

        $grand_total=0;

        foreach($data as $data2)
        {
            // $name = $data2->name;
            // $address = $data2->address;

            // if($grand_total==$data2->total_bill)
            // {
            //     $grand_total = $data2->total_bill;
            // }
            // else
            // {
            //     $grand_total += $data2->total_bill;
            // }
            $grand_total += ($data2->product_price * $data2->product_quantity);
        }

        // $datajoin = User::find($customer_id);
        $datajoin = Shipping::find($order_id);

        $pdf = PDF::loadView('admin.orders.orderdownload',[
            'data'=>$data,
            'datajoin'=>$datajoin,
            'grand_total' =>$grand_total,
        ]);
        return $pdf->download('invoice.pdf');

    }
//     //order move download

//     public function orderMoveDownloadPdf($phone)
//     {
//         $data = Ordermove::where('phone','=',$phone)
//         ->get();

//         $grand_total=0;

//         foreach($data as $data2)
//         {
//             $name = $data2->name;
//             $address = $data2->address;

//             if($grand_total==$data2->total_bill)
//             {
//                 $grand_total = $data2->total_bill;
//             }
//             else
//             {
//                 $grand_total += $data2->total_bill;
//             }
//         }

//         $pdf = PDF::loadView('admin.orders.orderdownload',[
//             'data'=>$data,
//             'name' => $name,
//             'phone'=>$phone,
//             'address' =>$address,
//             'grand_total' =>$grand_total,
//         ]);
//         return $pdf->download('invoice.pdf');

//     }

    //order move download

    public function orderMove($order_id,$customer_id)
    {
        // $data = Order::where('phone','=',$phone)
        // ->get();
        $data = OrderDetail::where('order_id','=',$order_id)
        ->get();

        foreach($data as $data)
        {
            $order = new Ordermove();
            $order->product_name = $data->product_name;
            $order->product_price = $data->product_price;
            $order->product_quantity = $data->product_quantity;
            $order->customer_id = $customer_id;
            $order->order_id = $order_id;
            // $order->total_bill = $data->total_bill;
            // $order->total_qty = $data->total_qty;
            // $order->name  = $data->name;
            // $order->phone = $data->phone;
            // $order->address = $data->address;
            $order->save();

            $data->delete();


        }
        // dd($order_id);
        // $data = Order::where('id','=',$order_id)
        // ->get();
        $data = Order::find($order_id);
        $orderDone = new Orderdone();
        $orderDone->customer_id = $data->customer_id;
        $orderDone->shipping_id = $data->shipping_id;
        $orderDone->order_total = $data->order_total;
        $orderDone->order_status = $data->order_status;
        $order->order_id = $order_id;
        $orderDone->save();

        $data->delete();

        $data = Shipping::find($order_id);
        $moveShipping = new OrdermoveShipping();
        $moveShipping->name = $data->name;
        $moveShipping->email = $data->email;
        $moveShipping->phone = $data->phone;
        $moveShipping->address = $data->address;
        $order->order_id = $order_id;
        $moveShipping->save();

        $data->delete();

        return redirect()->back()->with('success','Order Done Successfully');
    }

    public function doneOrder()
    {
        $data = OrdermoveShipping::all();
        // $data = DB::table('users')
        //         ->rightJoin('ordermoves','users.id','=','ordermoves.customer_id')
        //         ->get();


        return view('admin.orders.ordermove',[
            'data' =>$data,
        ]);
    }

    public function orderMoveDone($phone)
    {

        $data = Ordermove::where('phone','=',$phone)
        ->get();

        $grand_total = 0;

        foreach($data as $data2)
        {
            $name = $data2->name;
            $address = $data2->address;
            if($grand_total==$data2->total_bill)
            {
                $grand_total = $data2->total_bill;
            }
            else
            {
                $grand_total += $data2->total_bill;
            }

        }

        return view('admin.orders.ordermovedone',[
            'data' => $data,
            // 'name' => $name,
            // 'phone'=>$phone,
            // 'address' =>$address,
            'grand_total' =>$grand_total,
        ]);
    }

//     public function orderMoveDelete($phone)
//     {
//         $data = Ordermove::where('phone','=',$phone)
//         ->get();


//         foreach($data as $data)
//         {
//             $data->delete();
//         }

//         return redirect()->back()->with('success','Deleted Successfully');
//     }

}
