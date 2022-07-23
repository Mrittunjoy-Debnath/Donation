@extends('admin.master')

@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form class="form-horizontal" action="{{ route('update-brand',['id'=>$brand->id]) }}" method="post">
                        @csrf
                        <div class="card-body">
                            <h4 class="card-title ">Edit Brand</h4>
                            <h4 class="text-center text-success font-weight-bold">{{ Session::get('success') }}</h4>
                            <div class="form-group row">
                                <label  class="col-sm-3 text-right control-label col-form-label">Brand Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="brand_name"  value="{{ $brand->brand_name }}">
                                    <span class="text-danger">{{ $errors->has('brand_name') ? $errors->first('brand_name') : ''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 text-right control-label col-form-label">Brand Description</label>
                                <div class="col-sm-9">
                                    <textarea  class="form-control" name="brand_description" >{{ $brand->brand_description }}</textarea>
                                    <span class="text-danger">{{ $errors->has('brand_description') ? $errors->first('brand_description') : ''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 text-right control-label">Publiscation Status</label>
                                <div class="col-sm-9">
                                    <input type="radio"  name="publication_status" value="1" {{ $brand->publication_status==1?'checked':'' }}>Published
                                    <input type="radio"  name="publication_status" value="0" {{ $brand->publication_status==0?'checked':'' }}>Unpublished
                                    <br>
                                    <span class="text-danger">{{ $errors->has('publication_status') ? $errors->first('publication_status') : ''}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                {{-- <input type="submit"  class="btn btn-primary" value="Submit"> --}}
                                <button type="submit" name="btn" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
