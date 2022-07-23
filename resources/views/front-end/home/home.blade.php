@extends('front-end.master')

@section('title')
    Home || Donate Here
@endsection

@section('body')

<div class="container">
    <div class="row">
        <div class="col-md-12 " >
            {{--    carousel --}}
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="2000">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">

                    <div class="item  active" id="mycarousel">
                        <img src="{{asset('front/images/banner.jpg')}}" alt="..."  style=" height: 400px; width: 100%;">
                        <div class="carousel-caption">
                            <h2 >This is First Slide</h2>
                        </div>
                    </div>

                    @php($i=1)
                    @foreach($carousels as $carousel)
                    <div class="item " id="mycarousel">
                        <img src="{{asset($carousel->carousel_image)}}" alt="..." style="height: 400px; width: 100%;">
                        <div class="carousel-caption">
                            <h2>{{$carousel->name}}</h2>
                        </div>
                    </div>
                    @endforeach

{{--                    <div class="item " id="mycarousel">--}}
{{--                        <img src="{{asset('img/tinsheed.jpg')}}" alt="..." style="height: 400px; width: 100%;">--}}
{{--                        <div class="carousel-caption">--}}
{{--                            This is Third Slide--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    --}}
{{--                    <div class="item " id="mycarousel">--}}
{{--                        <img src="{{asset('img/tinsheedconcrete.jpg')}}" alt="..." style="height: 400px; width: 100%;">--}}
{{--                        <div class="carousel-caption">--}}
{{--                            This is Third Slide--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="item " id="mycarousel">--}}
{{--                        <img src="{{asset('img/beefraw.jpg')}}" alt="..."  style=" height: 400px; width: 100%;">--}}
{{--                        <div class="carousel-caption">--}}
{{--                            This is First Slide--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="item " id="mycarousel">--}}
{{--                        <img src="{{asset('img/fishraw.jpg')}}" alt="..." style=" height: 400px; width: 100%;">--}}
{{--                        <div class="carousel-caption">--}}
{{--                            This is Second Slide--}}
{{--                        </div>--}}
{{--                    </div>--}}

                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            {{--    carousel --}}
        </div>
    </div>
</div>

{{--<!--banner-->--}}
{{--<div class="banner">--}}
{{--	<div class="matter-banner">--}}
{{--	 	<div class="slider">--}}
{{--	    	<div class="callbacks_container">--}}
{{--	      		<ul class="rslides" id="slider">--}}
{{--	        		<li>--}}
{{--	          			<img src="{{ asset('front/images/banner.jpg') }}" alt="" style="height: 400px; width: 100%; "   />--}}
{{--						<div class="tes animated wow fadeInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">--}}
{{--							<h1 class="text-success">RAW MILK</h1>--}}
{{--							<h5 class="text-success">SPECIAL BUTTER</h5>--}}
{{--							<h5 class="text-success">PURE HONEY</h5>--}}
{{--							<h5 class="text-success">SPICES</h5>--}}
{{--						</div>--}}
{{--	       			 </li>--}}

{{--	      		</ul>--}}


{{--	 	 	</div>--}}
{{--		</div>--}}
{{--	</div>--}}
{{--	<div class="clearfix"> </div>--}}
{{--</div>--}}
{{--<!--//banner-->--}}
<!--content-->
<div class="content ">
	<div class="container ">
        {{-- content-top --}}
		<div class="" style="margin-top: 40px;">
			<div class="content-top1">
                @foreach ($firstProducts as $product)
				<div class="col-md-3 col-sm-12 col-lg-3 col-md2 animated wow fadeInLeft " data-wow-delay=".5s">
					<div class="col-md1 simpleCart_shelfItem">
						<a href="{{ route('product-details',['id'=>$product->id]) }}">
							<img  src="{{ asset($product->product_image) }}" alt="" class="img-responsive"/>
						</a>
						<h3><a href="{{ route('product-details',['id'=>$product->id]) }}"><span class="mr-auto">{{ $product->product_name }}</span></a></h3>
                        {{-- <h3><a href="{{ route('product-details',['id'=>$product->id]) }}">{{ $product->product_quantity }}kg.</span></a></h3> --}}

						<div class="price">
                            <div class="row">
                                <h5 class="item_price">{{ $product->product_quantity }} Package</h5>
								<h5 class="item_price">Tk. {{ $product->product_price }}</h5>
                            </div>
								<a href="{{ route('product-details',['id'=>$product->id]) }}" class="item_add">Donate Now</a>
								<div class="clearfix"> </div>
						</div>
					</div>
				</div>
                @endforeach

                <div class="row" >

                     <div class="col-md-12 animated wow fadeInDown animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
                        <div class="col-md3">
                            <div class="up-t">
                                <a href="{{route('previous-work')}}">
                                <h3> Previous Work</h3>
                                </a>
                            </div>
                        </div>
                    </div>



			<div class="clearfix"> </div>
			</div>

			<div class="content-top1">
                @foreach ($secondProducts as $product)
				<div class="col-md-3 col-sm-12 col-lg-3 col-md2 animated wow fadeInLeft" data-wow-delay=".5s">
					<div class="col-md1 simpleCart_shelfItem">
						<a href="{{ route('product-details',['id'=>$product->id]) }}">
							<img  src="{{ asset($product->product_image) }}" alt="" class="img-responsive"/>
						</a>
						<h3><a href="{{ route('product-details',['id'=>$product->id]) }}">{{ $product->product_name }}</a></h3>
						<div class="price">
                                <h5 class="item_price">{{ $product->product_quantity }} Package</h5>
								<h5 class="item_price">{{ $product->product_price }}</h5>
								<a href="{{ route('product-details',['id'=>$product->id]) }}" class="item_add">Donate Now</a>
								<div class="clearfix"> </div>
						</div>
					</div>
				</div>
                @endforeach
			<div class="clearfix"> </div>
			</div>
		</div>
	</div>
</div>
<!--//content-->
{{--	 <div class="con-tp">--}}
{{--		<div class="container">--}}
{{--			<div class="col-md-4 con-tp-lft animated wow fadeInLeft" data-wow-delay=".5s">--}}
{{--				<a href="products.html">--}}
{{--					<div class="content-grid-effect slow-zoom vertical">--}}
{{--						<div class="img-box"><img src="{{ asset('/') }}front/images/6.jpg" alt="image" class="img-responsive zoom-img"></div>--}}
{{--						<div class="info-box">--}}
{{--							<div class="info-content simpleCart_shelfItem">--}}
{{--										<h4>Previous Work</h4>--}}
{{--							</div>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				</a>--}}
{{--			</div>--}}
{{--			<div class="col-md-4 con-tp-lft animated wow fadeInDown animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">--}}
{{--				<a href="products.html">--}}
{{--					<div class="content-grid-effect slow-zoom vertical">--}}
{{--						<div class="img-box"><img src="{{ asset('/') }}front/images/10.jpg" alt="image" class="img-responsive zoom-img"></div>--}}
{{--							<div class="info-box">--}}
{{--								<div class="info-content simpleCart_shelfItem">--}}
{{--										<h4>Previous Work</h4>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--					</div>--}}
{{--				</a>--}}
{{--			</div>--}}
{{--			<div class="col-md-4 con-tp-lft animated wow fadeInRight" data-wow-delay=".5s">--}}
{{--				<a href="products.html">--}}
{{--					<div class="content-grid-effect slow-zoom vertical">--}}
{{--						<div class="img-box"><img src="{{ asset('/') }}front/images/9.jpg" alt="image" class="img-responsive zoom-img"></div>--}}
{{--							<div class="info-box">--}}
{{--								<div class="info-content simpleCart_shelfItem">--}}
{{--										<h4>Previous Work</h4>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--					</div>--}}
{{--				</a>--}}
{{--			</div>--}}
{{--			<div class="clearfix"></div>--}}
{{--		<div class="col-md-4 con-tp-lft animated wow fadeInLeft" data-wow-delay=".5s">--}}
{{--			<a href="products.html">--}}
{{--				<div class="content-grid-effect slow-zoom vertical">--}}
{{--					<div class="img-box"><img src="{{ asset('/') }}front/images/12.jpg" alt="image" class="img-responsive zoom-img"></div>--}}
{{--						<div class="info-box">--}}
{{--							<div class="info-content simpleCart_shelfItem">--}}
{{--									<h4>Previous Work</h4>--}}
{{--							</div>--}}
{{--						</div>--}}
{{--				</div>--}}
{{--			</a>--}}
{{--		</div>--}}
{{--		<div class="col-md-4 con-tp-lft animated wow fadeInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">--}}
{{--			<a href="products.html">--}}
{{--				<div class="content-grid-effect slow-zoom vertical">--}}
{{--					<div class="img-box"><img src="{{ asset('/') }}front/images/13.jpg" alt="image" class="img-responsive zoom-img"></div>--}}
{{--						<div class="info-box">--}}
{{--							<div class="info-content simpleCart_shelfItem">--}}
{{--									<h4>Previous Work</h4>--}}
{{--							</div>--}}
{{--						</div>--}}
{{--				</div>--}}
{{--			</a>--}}
{{--		</div>--}}
{{--		<div class="col-md-4 con-tp-lft animated wow fadeInRight" data-wow-delay=".5s">--}}
{{--			<a href="products.html">--}}
{{--				<div class="content-grid-effect slow-zoom vertical">--}}
{{--					<div class="img-box"><img src="{{ asset('/') }}front/images/14.jpg" alt="image" class="img-responsive zoom-img"></div>--}}
{{--						<div class="info-box">--}}
{{--							<div class="info-content simpleCart_shelfItem">--}}
{{--									<h4>Previous Work</h4>--}}
{{--							</div>--}}
{{--						</div>--}}
{{--				</div>--}}
{{--			</a>--}}
{{--		</div>--}}
{{--		<div class="clearfix"></div>--}}
{{--		</div>--}}
{{--	</div>--}}

	<div class="c-btm">
		<div class="content-top1">
			<div class="container">
                @foreach ($newProducts as $newProduct)
				<div class="col-md-3 col-sm-12 col-lg-3 col-md2 animated wow fadeInLeft" data-wow-delay=".5s">
					<div class="col-md1 simpleCart_shelfItem">
						<a href="{{ route('product-details',['id'=>$newProduct->id]) }}">
							<img  src="{{ asset($newProduct->product_image) }}" alt="" class="img-responsive"/>
						</a>
						<h3><a href="{{ route('product-details',['id'=>$newProduct->id]) }}">{{ $newProduct->product_name }}</a></h3>
						<div class="price">
                                <h5 class="item_price">{{ $product->product_quantity }} Package</h5>
								<h5 class="item_price">Tk. {{ $newProduct->product_price }}</h5>
								<a href="{{ route('product-details',['id'=>$product->id]) }}" class="item_add">Donate Now</a>
								<div class="clearfix"> </div>
						</div>

					</div>
				</div>
                @endforeach

			<div class="clearfix"> </div>

			</div>

		</div>

	</div>

<!--//content-->
{{--<div class="con-tp">--}}
{{--    <div class="container">--}}
{{--        <div class="col-md-4 con-tp-lft animated wow fadeInLeft" data-wow-delay=".5s">--}}
{{--            <a href="products.html">--}}
{{--                <div class="content-grid-effect slow-zoom vertical">--}}
{{--                    <div class="img-box"><img src="{{ asset('/') }}front/images/6.jpg" alt="image" class="img-responsive zoom-img"></div>--}}
{{--                    <div class="info-box">--}}
{{--                        <div class="info-content simpleCart_shelfItem">--}}
{{--                            <h4>Previous Work</h4>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </a>--}}
{{--        </div>--}}
{{--        <div class="col-md-4 con-tp-lft animated wow fadeInDown animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">--}}
{{--            <a href="products.html">--}}
{{--                <div class="content-grid-effect slow-zoom vertical">--}}
{{--                    <div class="img-box"><img src="{{ asset('/') }}front/images/10.jpg" alt="image" class="img-responsive zoom-img"></div>--}}
{{--                    <div class="info-box">--}}
{{--                        <div class="info-content simpleCart_shelfItem">--}}
{{--                            <h4>Previous Work</h4>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </a>--}}
{{--        </div>--}}
{{--        <div class="col-md-4 con-tp-lft animated wow fadeInRight" data-wow-delay=".5s">--}}
{{--            <a href="products.html">--}}
{{--                <div class="content-grid-effect slow-zoom vertical">--}}
{{--                    <div class="img-box"><img src="{{ asset('/') }}front/images/9.jpg" alt="image" class="img-responsive zoom-img"></div>--}}
{{--                    <div class="info-box">--}}
{{--                        <div class="info-content simpleCart_shelfItem">--}}
{{--                            <h4>Previous Work</h4>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </a>--}}
{{--        </div>--}}
{{--        <div class="clearfix"></div>--}}

{{--    </div>--}}
{{--</div>--}}

    <div class="c-btm" style="margin: 0px; padding: 0px">
		<div class="content-top1" >
			<div class="container">
                @foreach ($randomProducts as $newProduct)
				<div class="col-md-3 col-sm-12 col-lg-3 col-md2 animated wow fadeInLeft" data-wow-delay=".5s">
					<div class="col-md1 simpleCart_shelfItem">
						<a href="{{ route('product-details',['id'=>$newProduct->id]) }}">
							<img  src="{{ asset($newProduct->product_image) }}" alt="" class="img-responsive"/>
						</a>
						<h3><a href="{{ route('product-details',['id'=>$newProduct->id]) }}">{{ $newProduct->product_name }}</a></h3>
						<div class="price">
                                <h5 class="item_price">{{ $product->product_quantity }} Package</h5>
								<h5 class="item_price">Tk. {{ $newProduct->product_price }}</h5>
								<a href="{{ route('product-details',['id'=>$product->id]) }}" class="item_add">Donate Now</a>
								<div class="clearfix"> </div>
						</div>

					</div>
				</div>
                @endforeach


			<div class="clearfix"> </div>
			</div>
		</div>
	</div>
@endsection

