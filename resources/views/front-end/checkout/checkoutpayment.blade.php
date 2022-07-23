@extends('front-end.master')

@section('body')
<div class="container">
    <div class="register">
        <div class="col-md-6 register-top-grid">
            <h2>Please, Give us your Donation info</h2>
		<form class="form-horizontal" action="{{ route('new-order') }}" method="post">
            @csrf
            <div class="form-group row">
                <input type="radio" name="payment_type" value="Bkash" checked>Bkash
            </div>

            <div class="form-group row">
                <input type="radio" name="payment_type" value="Paypal">Paypal
            </div>


            <div class="form-group row">
                    <input type="radio" name="payment_type" value="Cash" >Cash On Donate
            </div>

            <div class="border-top">
                <div class="card-body ">
                    {{-- <label  class="col-sm-4 text-right control-label col-form-label"></label> --}}
                    <input type="submit"  class="btn btn-success" value="Place Order">

                    {{-- <button type="submit" name="btn" class="btn btn-primary">Submit</button> --}}
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
