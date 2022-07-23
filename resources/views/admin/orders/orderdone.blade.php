@extends('admin.master')

@section('body')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @if($message = Session::get('success'))
                <div class="alert alert-success">
                    <p class="font-weight-bold m-1">{{$message}}</p>
                </div>
            @endif
        </div>
            <div class="col-md-12">
                        <div class="card">

                            <div class="card-body">

                                <h4 class="card-title text-center p-2 bg-success text-white fw-bold">Person Orders Product </h4>
                                <div class="table-responsive">
                                    <table id="zero_config"
                                    class="table table-striped table-bordered">
                                        <thead >
                                            <th></th>
                                            <th class="fw-bold">Name</th>
                                            <th class="fw-bold">Phone</th>
                                            <th class="fw-bold">Address</th>
                                            <th></th>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td></td>
                                            <td>{{ $datajoin->name }}</td>
                                            <td>{{ $datajoin->phone }}</td>
                                            <td>{{ $datajoin->email }}</td>
                                            <td></td>
                                        </tr>


                                        </tbody>
                                        {{--  <tfoot class="bg-success">
                                            <th class="fw-bold">Name</th>
                                            <th class="fw-bold">Phone</th>
                                            <th class="fw-bold">Address</th>
                                        </tfoot>  --}}

                                        <thead >
                                            <th class="fw-bold">SL NO.</th>
                                            <th class="fw-bold">FoodName</th>
                                            <th class="fw-bold">Price</th>
                                            <th class="fw-bold">Quantity</th>
                                            <th class="fw-bold">Total Price</th>

                                        </thead>
                                        <tbody>
                                        @php($i=1)
                                        @foreach($data as $data)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $data->product_name }}</td>
                                            <td>{{ $data->product_price }} T.K.</td>
                                            <td>{{ $data->product_quantity }}</td>
                                            <td>{{ $data->product_price * $data->product_quantity }}TK.</td>

                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Shipping</td>
                                            <td> {{ $shipping=50 }} TK.</td>

                                        </tr>
                                        <tr>
                                            <td class="bg-success text-white text-center fw-bold" colspan="4">Total bill: {{ $grand_total+$shipping }} TK.</td>
                                            <td class="bg-success"><a class="text-white" href="{{ route('download-pdf',['order_id'=>$data->order_id,'customer_id'=>$datajoin->id]) }}">Download</a></td>
                                        </tr>
                                        </tbody>

                                        {{--  <tfoot class="bg-success">
                                            <th class="fw-bold">SL NO.</th>
                                            <th class="fw-bold">FoodName</th>
                                            <th class="fw-bold">Price</th>
                                            <th class="fw-bold">Quantity</th>
                                            <th class="fw-bold">Total Price</th>

                                        </tfoot>  --}}
                                    </table>
                                </div>







                            </div>
                        </div>
            </div>
    </div>
</div>
@endsection
