@extends('front-end.master')

@section('body')
<div class="container">
    <div class="register">
        <div class="col-md-6 register-top-grid">
            <h2>Please, Give us your Donating info</h2>
		<form class="form-horizontal" action="{{ route('new-shipping') }}" method="post">
            @csrf
            <div class="form-group row">
                <label  class="col-sm-3 text-right control-label col-form-label">Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}">
                    <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : ''}}</span>
                </div>
            </div>
            <div class="form-group row">
                <label  class="col-sm-3 text-right control-label col-form-label">E-Mail Address</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="email" value="{{ auth()->user()->email }}">
                    <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : ''}}</span>
                </div>
            </div>
            <div class="form-group row">
                <label  class="col-sm-3 text-right control-label col-form-label">Phone</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{ auth()->user()->phone }}">
                    <span class="text-danger">{{ $errors->has('phone') ? $errors->first('phone') : ''}}</span>
                </div>
            </div>
            <div class="form-group row">
                <label  class="col-sm-3 text-right control-label col-form-label">Address</label>
                <div class="col-sm-9">
                    {{-- <input type="text"  class="form-control" name="address" placeholder="Full Address"> --}}
                    <textarea class="form-control" name="address" placeholder="level-6, house: #197, road-5, block-d, Basundhara."></textarea>
                    <span class="text-danger">{{ $errors->has('address') ? $errors->first('address') : ''}}</span>
                </div>
            </div>
            <div class="border-top">
                <div class="card-body ">
                    <label  class="col-sm-3 text-right control-label col-form-label"></label>
                    <div class="col-sm-9">
                    <input type="submit"  class="btn btn-success btn-block " value="Submit">
                    </div>
                    {{-- <button type="submit" name="btn" class="btn btn-primary">Submit</button> --}}
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
