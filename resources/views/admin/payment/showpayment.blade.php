@extends('admin.master')

@section('body')
    <div class="container-fluid">
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
                                    <th>Transection Id</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach ($payments as $payment)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $payment->customer_name }}</td>
                                        <td>{{ $payment->number }}</td>
                                        <td>{{ $payment->trnxid}}</td>

                                        <td>
{{--                                            @if($brand->publication_status ==1)--}}
{{--                                                <a href="{{ route('unpublished-brand',['id'=> $brand->id]) }}" class="btn btn-primary">--}}
{{--                                                    <span><i class="fa fa-arrow-up"></i></span>--}}
{{--                                                </a>--}}
{{--                                            @else--}}
{{--                                                <a href="{{ route('published-brand',['id'=> $brand->id]) }}" class="btn btn-warning">--}}
{{--                                                    <span><i class="fa fa-arrow-down"></i></span>--}}
{{--                                                </a>--}}
{{--                                            @endif--}}
{{--                                            <a href="{{ route('edit-brand',['id'=>$brand->id]) }}" class="btn btn-success">--}}
{{--                                                <span><i class="fa fa-edit"></i></span>--}}
{{--                                            </a>--}}
                                            <a href="{{ route('delete-payment',['id'=>$payment->id]) }}" onclick="return confirm('Are you sure want to delete?')" class="btn btn-danger">
                                                <span><i class="fa fa-trash"></i></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>SL No.</th>
                                    <th> Name</th>
                                    <th>Number</th>
                                    <th>Transection Id</th>
                                    <th>Action</th>
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
