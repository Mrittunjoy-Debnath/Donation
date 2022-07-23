@extends('front-end.master')
@section('body')
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">
            <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">Single</li>
        </ol>
    </div>
</div>
<div class="single">

<div class="container">
<div class="col-md-9">
<div class="col-md-5 grid">
    <div class="flexslider">
          <ul class="slides">
            <li data-thumb="{{ asset($productDetails->product_image) }}">
                <div class="thumb-image"> <img src="{{ asset($productDetails->product_image) }}" data-imagezoom="true" class="img-responsive"> </div>
            </li>

          </ul>
    </div>
</div>
<div class="col-md-7 single-top-in">
                    <div class="single-para simpleCart_shelfItem">
                        <h2>{{ $productDetails->product_name }}</h2>
                        <p>{{ $productDetails->long_description }}</p>
                        <p>{{ $productDetails->product_quantity }}kg.</p>
                        <div class="star-on">
                            {{-- <ul>
                                <li><a href="#"><i class="glyphicon glyphicon-star"> </i></a></li>
                                <li><a href="#"><i class="glyphicon glyphicon-star"> </i></a></li>
                                <li><a href="#"><i class="glyphicon glyphicon-star"> </i></a></li>
                                <li><a href="#"><i class="glyphicon glyphicon-star"> </i></a></li>
                                <li><a href="#"><i class="glyphicon glyphicon-star"> </i></a></li>
                            </ul>
                            <div class="review">
                                <a href="#"> 3 reviews </a>/
                                <a href="#">  Write a review</a>
                            </div> --}}
                        <div class="clearfix"> </div>
                        </div>

                            <label  class="add-to item_price">Tk. {{ $productDetails->product_price }}</label>
                            <form action="{{ route('add-to-cart') }}" method="post">
                                @csrf
                                Quantity:<input type="number" name="qty" value="1" min="1"><br>
                                <input type="hidden" name="id" value="{{ $productDetails->id }}" ><br>
                                <input type="submit" class="btn btn-success " value="Add To Cart">
                            </form>
                    </div>
                </div>
        <div class="clearfix"> </div>
        <div class="content-top1">

            @foreach ($categoryNewProducts as $product)
            <div class="col-md-4 col-md4 " style="margin-bottom:20px ">
                <div class="col-md1 simpleCart_shelfItem ">
                    <a href="{{ route('product-details',['id'=>$product->id]) }}">
                        <img  src="{{ asset($product->product_image) }}" alt="" height="200px" width="220px"/>
                    </a>
                    <h3><a href="{{ route('product-details',['id'=>$product->id]) }}">{{ $product->product_name }}</a></h3>
                    <div class="price">
                        <h5>{{ $productDetails->product_quantity }}kg.</h5>
                            <h5 class="item_price">{{ $product->product_price }}</h5>
                            <a href="#" class="item_add">Add To Cart</a>
                            <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
            @endforeach
        <div class="clearfix"> </div>
        </div>
</div>
<!----->
<div class="col-md-3 product-bottom">
        <!--categories-->
            <div class=" rsidebar span_1_of_left">
                    <h3 class="cate">Categories</h3>
                         <ul class="menu-drop">
                             @foreach ($categories as $category)
                             {{-- <li class="item1"><a href="{{ route('category',['id'=>$category->id]) }}">{{ $category->category_name }} </a></li> --}}
                             <a href="{{ route('category',['id'=>$category->id]) }}" style="text-decoration: none;">{{ $category->category_name }} </a><br>
                             @endforeach

                            {{-- <ul class="cute">
                                <li class="subitem1"><a href="single.html">Cute Kittens </a></li>
                                <li class="subitem2"><a href="single.html">Strange Stuff </a></li>
                                <li class="subitem3"><a href="single.html">Automatic Fails </a></li>
                            </ul> --}}

                        {{-- <li class="item2"><a href="#">Women </a>
                            <ul class="cute">
                                <li class="subitem1"><a href="single.html">Cute Kittens </a></li>
                                <li class="subitem2"><a href="single.html">Strange Stuff </a></li>
                                <li class="subitem3"><a href="single.html">Automatic Fails </a></li>
                            </ul>
                        </li>
                        <li class="item3"><a href="#">Kids</a>
                            <ul class="cute">
                                <li class="subitem1"><a href="single.html">Cute Kittens </a></li>
                                <li class="subitem2"><a href="single.html">Strange Stuff </a></li>
                                <li class="subitem3"><a href="single.html">Automatic Fails</a></li>
                            </ul>
                        </li>
                        <li class="item4"><a href="#">Accesories</a>
                            <ul class="cute">
                                <li class="subitem1"><a href="single.html">Cute Kittens </a></li>
                                <li class="subitem2"><a href="single.html">Strange Stuff </a></li>
                                <li class="subitem3"><a href="single.html">Automatic Fails</a></li>
                            </ul>
                        </li>

                        <li class="item4"><a href="#">Shoes</a>
                            <ul class="cute">
                                <li class="subitem1"><a href="single.html">Cute Kittens </a></li>
                                <li class="subitem2"><a href="single.html">Strange Stuff </a></li>
                                <li class="subitem3"><a href="single.html">Automatic Fails </a></li>
                            </ul>
                        </li> --}}
                    </ul>
                </div>
            <!--initiate accordion-->
                    <script type="text/javascript">
                        $(function() {
                            var menu_ul = $('.menu-drop > li > ul'),
                                   menu_a  = $('.menu-drop > li > a');
                            menu_ul.hide();
                            menu_a.click(function(e) {
                                e.preventDefault();
                                if(!$(this).hasClass('active')) {
                                    menu_a.removeClass('active');
                                    menu_ul.filter(':visible').slideUp('normal');
                                    $(this).addClass('active').next().stop(true,true).slideDown('normal');
                                } else {
                                    $(this).removeClass('active');
                                    $(this).next().stop(true,true).slideUp('normal');
                                }
                            });

                        });
                    </script>
<!--//menu-->
<!--seller-->
            <div class="product-bottom">
                    <h3 class="cate">Donate </h3>
                    @foreach ($bestSellers as $product)
                <div class="product-go">
                    <div class=" fashion-grid">
                        <a href="{{ route('product-details',['id'=>$product->id]) }}"><img class="img-responsive " src="{{ asset($product->product_image) }}" alt=""></a>
                    </div>

                    <div class=" fashion-grid1">
                        <h6 class="best2"><a href="single.html" >{{ $product->product_name }} </a></h6>
                        <span class=" price-in1">Tk. {{ $product->product_price }}</span>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                @endforeach
                {{-- <div class="product-go">
                    <div class=" fashion-grid">
                        <a href="single.html"><img class="img-responsive " src="{{ asset('/') }}front/images/pr1.jpg" alt=""></a>
                    </div>
                    <div class=" fashion-grid1">
                        <h6 class="best2"><a href="single.html" >Lorem ipsum dolor sitamet consectetuer  </a></h6>
                        <span class=" price-in1"> $40.00</span>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="product-go">
                    <div class=" fashion-grid">
                        <a href="single.html"><img class="img-responsive " src="{{ asset('/') }}front/images/pr2.jpg" alt=""></a>
                    </div>
                    <div class=" fashion-grid1">
                        <h6 class="best2"><a href="single.html" >Lorem ipsum dolor sitamet consectetuer  </a></h6>
                        <span class=" price-in1"> $40.00</span>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="product-go">
                    <div class=" fashion-grid">
                        <a href="single.html"><img class="img-responsive " src="{{ asset('/') }}front/images/pr3.jpg" alt=""></a>
                    </div>
                    <div class=" fashion-grid1">
                        <h6 class="best2"><a href="single.html" >Lorem ipsum dolor sitamet consectetuer  </a></h6>
                        <span class=" price-in1"> $40.00</span>
                    </div>
                    <div class="clearfix"> </div>
                </div> --}}
            </div>

<!--//seller-->
<!--tag-->
{{--            <div class="tag">--}}
{{--                    <h3 class="cate">Tags</h3>--}}
{{--                <div class="tags">--}}
{{--                    <ul>--}}
{{--                        <li><a href="#">design</a></li>--}}
{{--                        <li><a href="#">fashion</a></li>--}}
{{--                        <li><a href="#">lorem</a></li>--}}
{{--                        <li><a href="#">dress</a></li>--}}
{{--                        <li><a href="#">fashion</a></li>--}}
{{--                        <li><a href="#">dress</a></li>--}}
{{--                        <li><a href="#">design</a></li>--}}
{{--                        <li><a href="#">dress</a></li>--}}
{{--                        <li><a href="#">design</a></li>--}}
{{--                        <li><a href="#">fashion</a></li>--}}
{{--                        <li><a href="#">lorem</a></li>--}}
{{--                        <li><a href="#">dress</a></li>--}}
{{--                    <div class="clearfix"> </div>--}}
{{--                    </ul>--}}
{{--            </div>--}}
        </div>
    </div>
    <div class="clearfix"> </div>
</div>
</div>
@endsection
