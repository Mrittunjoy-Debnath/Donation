@extends('front-end.master')

@section('body')
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">
            <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">Checkout</li>
        </ol>
    </div>
</div>
<!---->
<div class="container">
<div class="check-out">
    <h2>Cart</h2>
        <table >
      <tr>
        <th>Item</th>
        <th>Qty</th>
        <th>Prices</th>
        <th>Delivery details</th>
        <th>Sub total</th>
      </tr>
      @php($sum=0)
      @foreach ($cartProducts as $cartProduct)

      <tr>
        <td class="ring-in"><a href="single.html" class="at-in"><img src="{{ asset($cartProduct->attributes->image) }}" class="img-responsive" alt=""></a>
        <div class="sed">
            <h5>{{ $cartProduct->name }}</h5>

        </div>
        <div class="clearfix"> </div></td>
        <form action="{{ route('update-cart') }}" method="post">
            @csrf
            <td class="check">
                <input type="text" name="quantity" value="{{ $cartProduct->quantity }}">
                <input type="hidden" name="rowId" value="{{ $cartProduct->id }}">
                <input type="submit" name="btn" value="Update Donation">
            </td>
        </form>
        <td>Tk. {{ $cartProduct->price }}</td>
        <td>FREE SHIPPING</td>
        <td>Tk. {{ $total = $cartProduct->quantity*$cartProduct->price }}</td>
        <td>
            <a href="{{ route('delete-cart-item',['id'=>$cartProduct->id]) }}" class="btn btn-danger">
            <i class="">Delete</i>
            </a>
        </td>
      </tr>
        @php($sum=$sum+$total)
      @endforeach
</table>
<div class="row">
    <div class="col-md-8">

    </div>
    <div class="col-md-4 ml-auto">
        <table class="table">
            <tr>
                <th>Item Total</th>
                <td>Tk. {{ $sum }}</td>
            </tr>
            <tr>
                <th>Delivery Charge</th>
                <td>Tk. {{ $del=50 }}</td>
            </tr>
            <tr>
                <th>Grand Total</th>
                <td>Tk. {{ $orderTotal = $sum+$del }}</td>
                {{ Session::put('orderTotal',$orderTotal) }}
            </tr>
        </table>

    </div>
    <div class="col-md-8">
        <a href="{{ route('home') }}" class="to-buy">Continue Donating</a>
    </div>
    <div class="col-md-4">
        {{ Session::put('customerId',auth()->user()->id) }}
        <a href="{{ route('checkout') }}" class="to-buy">Proceed TO Donate</a>
    </div>
</div>


<div class="clearfix"> </div>
</div>
</div>
@endsection
