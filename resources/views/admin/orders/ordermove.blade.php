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
            @php($i=1)
                            {{-- <div class="card-body"> --}}
                                <h4 class="card-title text-center p-2 bg-success">Orders Product</h4>

                                <form action="{{ route('search') }}" method="post">
                                    @csrf

                                    {{--  <input type="text" name="search" style="color: blue;" placeholder="name">
                                    <input type="submit" value="submit" class="btn btn-success">  --}}
                                </form>

                                <table id="zero_config"
                                class="table table-striped table-bordered">
                                    <thead class="bg-success">
                                        <th class="fw-bold">SL NO.</th>
                                        <th class="fw-bold">Name</th>
                                        <th class="fw-bold">Phone</th>
                                        <th class="fw-bold">Address</th>
                                        {{--  <th class="fw-bold">FoodName</th>
                                        <th class="fw-bold">Price</th>
                                        <th class="fw-bold">Quantity</th>
                                        <th class="fw-bold">Total Price</th>
                                        <th class="fw-bold">Grand Total</th>  --}}
                                        <th class="fw-bold">Action</th>
                                    </thead>
                                    @foreach($data as $data)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->phone }}</td>
                                        <td>{{ $data->email }}</td>
                                        {{--  <td>{{ $data->product_name }}</td>
                                        <td>{{ $data->product_price }}$</td>
                                        <td>{{ $data->quantity }}</td>
                                        <td>{{ $data->product_price * $data->quantity }}$</td>
                                        <td>{{ $data->total_bill }}</td>  --}}
                                        <td>
                                            {{-- <a class="mx-3" href="{{ route('order-move-done',['order_id'=>$data->id,'customer_id'=>$data->customer_id]) }}">Show pdf</a>
                                            <a class="mx-3" href="{{ route('order-move-delete',['order_id'=>$data->id,'customer_id'=>$data->customer_id]) }}">Delete</a> --}}
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tfoot class="bg-success">
                                        <th class="fw-bold">SL NO.</th>
                                        <th class="fw-bold">Name</th>
                                        <th class="fw-bold">Phone</th>
                                        <th class="fw-bold">Address</th>
                                        {{--  <th class="fw-bold">FoodName</th>
                                        <th class="fw-bold">Price</th>
                                        <th class="fw-bold">Quantity</th>
                                        <th class="fw-bold">Total Price</th>
                                        <th class="fw-bold">Grand Total</th>  --}}
                                        <th class="fw-bold">Action</th>
                                    </tfoot>
                                </table>


                            {{-- </div> --}}
                        </div>
        </div>
    </div>
</div>
@endsection
