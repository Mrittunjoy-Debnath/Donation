@extends('admin.master')

@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form class="form-horizontal" action="{{ route('update-about',['id'=>$aboutus->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <h4 class="card-title ">Edit Aboutus</h4>
                            <h4 class="text-center text-success font-weight-bold">{{ Session::get('success') }}</h4>

                            <div class="form-group row">
                                <label  class="col-sm-3 text-right control-label col-form-label">About Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="about_name" value="{{ $aboutus->name }}">
                                    <span class="text-danger">{{ $errors->has('about_name') ? $errors->first('about_name') : ''}}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-3 text-right control-label col-form-label"> Description</label>
                                <div class="col-sm-9">
                                    <textarea id="editor" class="form-control" name="long_description" rows="5" >{!! $aboutus->long_description !!}</textarea>
                                    <span class="text-danger">{{ $errors->has('long_description') ? $errors->first('long_description') : ''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 text-right control-label col-form-label"> Image</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" name="about_image" >
                                    <span class="text-danger">{{ $errors->has('about_image') ? $errors->first('about_image') : ''}}</span>
                                    <img src="{{ asset($aboutus->aboutus_image) }}" height="100px" width="100px">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 text-right control-label">Publiscation Status</label>
                                <div class="col-sm-9 radio">
                                    <input type="radio"  name="publication_status" value="1" {{ $aboutus->publication_status==1?'checked':'' }}>Published
                                    <input type="radio"  name="publication_status" value="0" {{ $aboutus->publication_status==0?'checked':'' }}>Unpublished
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
