<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->search;
        $data = Order::where('name','Like','%'.$search.'%')->orWhere('product_name','Like','%'.$search.'%')
        ->get();

        return view('admin.orders.orders',[
            'data' => $data,
        ]);
    }
}
