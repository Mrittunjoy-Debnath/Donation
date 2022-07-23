@extends('front-end.master')

@section('body')
<div class="container">
	<div class="register">
        <div class="col-md-6 register-top-grid">
            <h2>If you are new member then Register here</h2>
		<form class="form-horizontal" action="{{ route('register') }}" method="post">
            @csrf
            <div class="form-group row">
                <label  class="col-sm-3 text-right control-label col-form-label">Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="name" placeholder="Name">
                    <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : ''}}</span>
                </div>
            </div>
            <div class="form-group row">
                <label  class="col-sm-3 text-right control-label col-form-label">E-Mail Address</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="email" placeholder="Email">
                    <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : ''}}</span>
                </div>
            </div>
            <div class="form-group row">
                <label  class="col-sm-3 text-right control-label col-form-label">Phone No.</label>
                <div class="col-sm-9">
                    <input type="string" class="form-control" name="phone" placeholder="Phone no.">
                    <span class="text-danger">{{ $errors->has('phone') ? $errors->first('phone') : ''}}</span>
                </div>
            </div>
            <div class="form-group row">
                <label  class="col-sm-3 text-right control-label col-form-label">Password</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" name="password" placeholder="password">
                    <span class="text-danger">{{ $errors->has('password') ? $errors->first('password') : ''}}</span>
                </div>
            </div>
            <div class="form-group row">
                <label  class="col-sm-3 text-right control-label col-form-label">Confirm Password</label>
                <div class="col-sm-9">
                    <input type="password"  class="form-control" name="password_confirmation" placeholder="Password Confirmation">
                    <span class="text-danger">{{ $errors->has('password_confirmation') ? $errors->first('password_confirmation') : ''}}</span>
                </div>
            </div>
            <div class="border-top">
                <div class="card-body ">
                    <label  class="col-sm-3 text-right control-label col-form-label"></label>
                    <div class="col-sm-9">
                    <input type="submit"  class="btn btn-block bg-success" style="color: green;" value="Submit">
                    </div>
                    {{-- <button type="submit" name="btn" class="btn btn-primary">Submit</button> --}}
                </div>
            </div>
        </form>
        </div>

        <div class="col-md-6 register-top-grid">
            <h2>If you are an existing member then Login here</h2>
		<form class="form-horizontal" action="{{ route('login') }}" method="post">
            @csrf

            <div class="form-group row">
                <label  class="col-sm-3 text-right control-label col-form-label">E-Mail Address</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="email" placeholder="email">
                    <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : ''}}</span>
                </div>
            </div>
            <div class="form-group row">
                <label  class="col-sm-3 text-right control-label col-form-label">Password</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" name="password" placeholder="password">
                    <span class="text-danger">{{ $errors->has('password') ? $errors->first('password') : ''}}</span>
                </div>
            </div>

            <div class="border-top ">
                <div class="card-body">
                    <label  class="col-sm-3 text-right control-label col-form-label"></label>
                    <div class="col-sm-9">
                    <input type="submit"  class="btn bg-success btn-block " style="color: green; " value="Submit">
                    </div>
                    {{-- <button type="submit" name="btn" class="btn btn-primary">Submit</button> --}}
                </div>
            </div>
        </form>
        </div>

	</div>
</div>
@endsection
