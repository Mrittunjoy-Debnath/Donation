@extends('front-end.master')
@section('title','Donation || House')
@push('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{asset('css/bootstrap.min.css')}}"></script>

@endpush
@section('body')
    <div class="container">
        <hr>
        <h2 class="text-center mt-5">House Creation</h2>
        <br>
        @php($i=1)
        @foreach($about as $row)
            @if($i%2==1)
                <div class="row mt-3">
                    <div class="col-md-6">
                        <img src="{{asset($row->house_image)}}" width="80%" height="350px" style="border: 5px solid #eee; border-radius: 5px ;">
                    </div>
                    <div class="col-md-6">
                        <h3 class="border">{{$i++}}. {{$row->name}}</h3><br>
                        {!! $row->long_description !!}
                    </div>
                </div>
            @else
                <div class="row mt-3">

                    <div class="col-md-6">
                        <h3 class="border">{{$i++}}. {{$row->name}}</h3><br>
                        <p class="lead text-justify" style="font-size: 14px;">{!! $row->long_description !!}</p>
                    </div>

                    <div class="col-md-6" style="text-align: right">
                        <img src="{{asset($row->house_image)}}" width="80%" height="350px" style="border: 5px solid #eee;border-radius: 5px ;">
                    </div>

                </div>
            @endif
            <br>
        @endforeach
    </div>
    {{--        <div class="container">--}}
    {{--            <hr>--}}
    {{--            <h3 class="text-center mt-5 mb-5">Services</h3><br>--}}
    {{--            <div class="row text-center mt-5">--}}
    {{--                <div class="col-md-4">--}}
    {{--                    <i class="fa fa-5x fa-cog" style="color: #b21f2d"></i>--}}
    {{--                    <h3>IT Provider</h3>--}}
    {{--                    <hr>--}}
    {{--                    <p class="lead text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem eius est explicabo inventore laboriosam minima nam natus quae, quidem soluta! A aspernatur, deserunt pariatur perspiciatis possimus ratione? Explicabo, perspiciatis, quaerat!</p>--}}
    {{--                </div>--}}
    {{--                <div class="col-md-4">--}}
    {{--                    <i class="fa fa-5x fa-desktop" style="color: #34ce57"></i>--}}
    {{--                    <h3>Web Development</h3>--}}
    {{--                    <hr>--}}
    {{--                    <p class="lead text-justify">--}}
    {{--                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aliquid asperiores assumenda ducimus earum, eligendi eos excepturi ipsam iusto minima, minus molestias non nulla quidem soluta totam ullam voluptates voluptatum!--}}
    {{--                    </p>--}}
    {{--                </div>--}}
    {{--                <div class="col-md-4">--}}
    {{--                    <i class="fa fa-5x fa-cloud-upload" style="color: #005cbf"></i>--}}
    {{--                    <h3>Cloud Server</h3>--}}
    {{--                    <hr>--}}
    {{--                    <p class="lead text-justify">--}}
    {{--                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aliquid asperiores assumenda ducimus earum, eligendi eos excepturi ipsam iusto minima, minus molestias non nulla quidem soluta totam ullam voluptates voluptatum!--}}
    {{--                    </p>--}}
    {{--                </div>--}}
    {{--            </div>--}}

    {{--        </div>--}}

@endsection
@push('js')
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>

@endpush
