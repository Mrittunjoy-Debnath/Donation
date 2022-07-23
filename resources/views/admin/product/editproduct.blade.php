@extends('admin.master')

@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form class="form-horizontal" action="{{ route('update-product',['id'=>$products->id]) }}" method="post" enctype="multipart/form-data" name="editProductForm">
                        @csrf
                        <div class="card-body">
                            <h4 class="card-title ">Update Product</h4>
                            <h4 class="text-center text-success font-weight-bold">{{ Session::get('success') }}</h4>
                            <div class="form-group row">
                                <label  class="col-sm-3 text-right control-label col-form-label">Category Name</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="category_id">
                                        <option>---------Select Category Name---------</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->has('category_id') ? $errors->first('category_id') : ''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 text-right control-label col-form-label">Brand Name</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="brand_id">
                                        <option>---------Select Brand Name---------</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->has('brand_id') ? $errors->first('brand_id') : ''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 text-right control-label col-form-label">Product Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="product_name"  value="{{ $products->product_name }}">
                                    <span class="text-danger">{{ $errors->has('product_name') ? $errors->first('product_name') : ''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 text-right control-label col-form-label">Product Price</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="product_price" value="{{ $products->product_price }}"">
                                    <span class="text-danger"> {{ $errors->has('product_price') ? $errors->first('product_price') : ''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 text-right control-label col-form-label">Product Quantity</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="product_quantity" value="{{ $products->product_quantity }}">
                                    <span class="text-danger">{{ $errors->has('product_quantity') ? $errors->first('product_quantity') : ''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 text-right control-label col-form-label">Product Short Description</label>
                                <div class="col-sm-9">
                                    <textarea  class="form-control" name="short_description" rows="2" >{{ $products->short_description }}</textarea>
                                    <span class="text-danger">{{ $errors->has('short_description') ? $errors->first('short_description') : ''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 text-right control-label col-form-label">Product Long Description</label>
                                <div class="col-sm-9">
                                    <textarea  class="form-control" name="long_description" rows="5"> {{ $products->long_description}} </textarea>
                                    <span class="text-danger">{{ $errors->has('long_description') ? $errors->first('long_description') : ''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 text-right control-label col-form-label">Product Image</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" name="product_image" >
                                    <span class="text-danger">{{ $errors->has('product_image') ? $errors->first('product_image') : ''}}</span>
                                    <img src="{{ asset($products->product_image) }}" height="100px" width="100px">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 text-right control-label">Publiscation Status</label>
                                <div class="col-sm-9 radio">
                                    <input type="radio"  name="publication_status" value="1" {{ $products->publication_status==1?'checked':'' }}>Published
                                    <input type="radio"  name="publication_status" value="0" {{ $products->publication_status==0?'checked':'' }}>Unpublished
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
    <script>
        document.forms['editProductForm'].elements['category_id'].value = '{{ $products->category_id }}';
        document.forms['editProductForm'].elements['brand_id'].value = '{{ $products->brand_id }}';
    </script>
@endsection
