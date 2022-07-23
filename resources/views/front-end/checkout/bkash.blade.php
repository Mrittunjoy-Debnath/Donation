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
            <div class="col-md-8">
                <div class="card">
                    <form class="form-horizontal" action="{{ route('save-payment') }}" method="post">
                        @csrf
                        <div class="card-body">
                                            <h2 class="text-center my-2">Our  Marcent: +8801986126112</h2>
                                            <h6 class="text-center my-2">Please, Send Your Donation Money in this account number</h6>
                            <div class="form-group row">
                                <label  class="col-sm-3 text-right control-label col-form-label">Your  Number</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="bkash_number" placeholder=" Number">
                                    <span class="text-danger">{{ $errors->has('bkash_number') ? $errors->first('bkash_number') : ''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 text-right control-label col-form-label">Transection Id#</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="bkash_transection" placeholder="Bkash Transection Id#">
                                    <span class="text-danger">{{ $errors->has('bkash_transection') ? $errors->first('bkash_transection') : ''}}</span>
                                </div>
                            </div>

                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                {{-- <input type="submit"  class="btn btn-primary" value="Submit"> --}}
                                <button type="submit" name="btn" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
