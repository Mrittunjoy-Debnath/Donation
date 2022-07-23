@extends('front-end.master')
@section('body')
<div class="contact">
    <div class="container">
        <h4 class="text-center text-success font-weight-bold">{{ Session::get('success') }}</h4>
        <h3 style="color: green;">Contact</h3>
        <div class="contact-grids">
            <div class="contact-form">
                <form action="{{ route('save-contact') }}" method="post">
                    @csrf
                    <div class="contact-bottom">
                        <div class="col-md-4 in-contact">
                            <span>Name</span>
                            <input type="text" name="name">
                        </div>
                        <div class="col-md-4 in-contact">
                            <span>Email</span>
                            <input type="text" name="email" >
                        </div>
                        <div class="col-md-4 in-contact">
                            <span>Phonenumber</span>
                            <input type="text" name="phonenumber">
                        </div>
                        <div class="clearfix"> </div>
                    </div>

                    <div class="contact-bottom-top">
                        <span>Message</span>
                        <textarea  name="message"> </textarea>
                        </div>
                    <input type="submit" value="Send">
                </form>
            </div>
            <div class="address">
                <div class=" address-more">
                    <h2 style="color: green;">Address</h2>
                    {{-- <div class="col-md-4 address-grid">
                        <i class="glyphicon glyphicon-map-marker"></i>
                        <div class="address1">
                            <p>Lorem ipsum dolor</p>
                            <p>TL 19034-88974</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div> --}}
                    <div class="col-md-4 address-grid ">
                        <i class="glyphicon glyphicon-phone"></i>
                        <div class="address1">
                            <p>0174 763 0403</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>

                    <div class="col-md-2 address-grid ">
                        {{-- <i class="glyphicon glyphicon-phone"></i> --}}
                        <div class="address1">
                            {{-- <p>0174 763 0403</p> --}}
                        </div>
                        <div class="clearfix"> </div>
                    </div>

                    <div class="col-md-6 address-grid">
                        <i class="glyphicon glyphicon-envelope"></i>
                        <div class="address1">
                            <p><a href="mailto:contact@premiumdairybd.com"> contact@premiumdairybd.com</a></p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--//content-->
<!--map-->
<div class="map">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3648.5364127699813!2d90.30377251439079!3d23.870590290092437!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c20f64ad5139%3A0x78e556a07c016cab!2zUm9hZCAjIDQsIEJsb2NrIOKAkyBD!5e0!3m2!1sen!2sbd!4v1648379149973!5m2!1sen!2sbd" width="100%" height="" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
@endsection
{{-- https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3279847.2716062404!2d145.46948275!3d-36.60289065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad4314b7e18954f%3A0x5a4efce2be829534!2sVictoria%2C+Australia!5e0!3m2!1sen!2sin!4v1443674224626 --}}
