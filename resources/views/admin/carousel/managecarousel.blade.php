@extends('admin.master')

@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Manage Carousel</h5>
                        <h4 class="text-center text-success font-weight-bold">{{ Session::get('success') }}</h4>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>SL No.</th>
                                    <th>Carousel Title</th>
                                    <th>Carousel Image</th>
                                    <th>Publication Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($carousel as $product)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td><img src="{{ asset($product->carousel_image) }}" alt="" height="50px" width="100px"></td>
                                        <td>{{ $product->publication_status==1?'published':'unpublished' }}</td>
                                        <td>
                                            @if($product->publication_status ==1)
                                                <a href="{{ route('unpublished-carousel',['id'=> $product->id]) }}" class="btn btn-primary">
                                                    <span><i class="fa fa-arrow-up"></i></span>
                                                </a>
                                            @else
                                                <a href="{{ route('published-carousel',['id'=> $product->id]) }}" class="btn btn-warning">
                                                    <span><i class="fa fa-arrow-down"></i></span>
                                                </a>
                                            @endif
                                            <a href="{{ route('edit-carousel',['id'=>$product->id]) }}" class="btn btn-success">
                                                <span><i class="fa fa-edit"></i></span>
                                            </a>
                                            <a href="{{ route('delete-carousel',['id'=>$product->id]) }}" onclick="return confirm('Are you Confirm to delete?')" class="btn btn-danger">
                                                <span><i class="fa fa-trash"></i></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>SL No.</th>
                                    <th>Carousel Name</th>
                                    <th>Carousel Image</th>
                                    <th>Publication Status</th>
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
