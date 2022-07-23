@extends('front-end.master')
@section('title','Donation || Details Work')
@push('css')

@endpush
@section('body')

    <div class="container">
        <hr>
        <h3 class="text-center mt-5 mb-5">Previous Work Image</h3><br>
        <div class="row mt-5">
                <div class="col-md-2"></div>
                <div class="col-md-8 ">
                    <h2 >{{$work->name}}</h2>
                    <img src="{{asset($work->work_image)}}" height="250px" width="100%" />
                    <hr>
                    <p class="lead text-justify">{{$work->long_description}}</p>
                </div>
            <div class="col-md-2"></div>
        </div>

    </div>

@endsection
@push('js')
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
@endpush
