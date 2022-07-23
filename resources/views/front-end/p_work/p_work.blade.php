@extends('front-end.master')
@section('title','Donation || Previous Work')
@push('css')

@endpush
@section('body')

    <div class="container">
        <hr>
        <h3 class="text-center mt-5 mb-5">Previous Work Image</h3><br>
        <div class="row text-center mt-5">
            @foreach($p_work as $work)
            <div class="col-md-4 p-1">
                <img src="{{asset($work->work_image)}}" height="250px" width="100%" />
                <a href="{{route('details-work',$work->id)}}" class="bg-success btn btn-block">{{$work->name}}</a>
                <hr>
{{--                <p class="lead text-justify">{{$work->long_description}}</p>--}}
            </div>
            @endforeach
{{--            <div class="col-md-4">--}}
{{--                <i class="fa fa-5x fa-desktop" style="color: #34ce57"></i>--}}
{{--                <h3>Web Development</h3>--}}
{{--                <hr>--}}
{{--                <p class="lead text-justify">--}}
{{--                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aliquid asperiores assumenda ducimus earum, eligendi eos excepturi ipsam iusto minima, minus molestias non nulla quidem soluta totam ullam voluptates voluptatum!--}}
{{--                </p>--}}
{{--            </div>--}}
{{--            <div class="col-md-4">--}}
{{--                <i class="fa fa-5x fa-cloud-upload" style="color: #005cbf"></i>--}}
{{--                <h3>Cloud Server</h3>--}}
{{--                <hr>--}}
{{--                <p class="lead text-justify">--}}
{{--                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aliquid asperiores assumenda ducimus earum, eligendi eos excepturi ipsam iusto minima, minus molestias non nulla quidem soluta totam ullam voluptates voluptatum!--}}
{{--                </p>--}}
{{--            </div>--}}
        </div>

    </div>

@endsection
@push('js')
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
@endpush
