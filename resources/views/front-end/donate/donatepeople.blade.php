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

    {{--    <div class="container">--}}
    {{--        <div class="register">--}}
    {{--            <div class="col-md-6 register-top-grid">--}}
    {{--                <h2>Our Bkash Marcent: +8801986126112</h2>--}}
    {{--                <h6>Please, Send Your Donation Money in this account number</h6>--}}
    {{--                <form action="" method="POST">--}}
    {{--                    @csrf--}}
    {{--                    --}}
    {{--                </form>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                        <div class="card-body">
                            <h5 class="text-center my-2">Our  Marcent: +8801986126112</h5>
                            <h3 class="text-center my-2">Respected Person List are given here</h3>

                        </div>

                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Online Payment</h5>
                        <h4 class="text-center text-success font-weight-bold">{{ Session::get('success') }}</h4>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>SL No.</th>
                                    <th> Name</th>
                                    <th>Number</th>
                                    <th>Date</th>
{{--                                    <th>Action</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach ($payments as $payment)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $payment->customer_name }}</td>
                                        <td>{{ $payment->number }}</td>
                                        <td>{{ $payment->created_at}}</td>

{{--                                        <td>--}}
{{--                                            <a href="#"  class="btn btn-danger">--}}
{{--                                                <span><i class="fa fa-trash"></i></span>--}}
{{--                                            </a>--}}
{{--                                        </td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>SL No.</th>
                                    <th> Name</th>
                                    <th>Number</th>
                                    <th>Date</th>
{{--                                    <th>Action</th>--}}
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
