
<!--header-->
<div class="header">
	<div class="header-top">
		<div class="container">
				<div class="col-sm-4 logo animated wow fadeInLeft" data-wow-delay=".5s">
					{{-- <h3 style="font-weight: bolder; font-family: 'Redressed', cursive;" ><a href="{{ route('home') }}" style="text-decoration: none;">Premium <span style="color: green;">Dairy</span></a></h3> --}}
                    <h3 ><a href="{{ route('home') }}" ><img src="{{ asset('front/images/logo.jpg') }}" alt="" height="60px" width="100px" /> </a></h3>
				</div>
			<div class="col-sm-4 world animated wow fadeInRight" data-wow-delay=".5s">
					<div class="cart box_1 ">
						<a href="checkout.html" >
						<h3 > <div class="total">
							<span >{{ Session::get('orderTotal') }}</span></div>
							<a href="{{ route('show-cart') }}"><img src="{{ asset('/') }}front/images/cart.png" alt=""/></a></h3>
						</a>
						<p><a href="{{ route('clear-cart') }}" class="simpleCart_empty">Empty Cart</a></p>

					</div>
			</div>
			<div class="col-sm-2 number animated wow fadeInRight nres" data-wow-delay=".5s">
					<span><i class="glyphicon glyphicon-phone"></i>+44 7729 224273</span>
					<p>Call me</p>
			</div>
            <div class="col-sm-2 number animated wow fadeInRight" data-wow-delay=".5s">
                @guest()
                <a href="{{ route('login') }}"><span style="color: green;"><i class="glyphicon glyphicon-user" ></i>Create Account</span></a><br>
                <a href="{{ route('login') }}" style="color: green;">Sign Up</a>
                @endguest
                @auth()
                <a href="#"><span><i class="glyphicon glyphicon-user"></i>{{ auth()->user()->name }}</span></a><br>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
                @endauth
            </div>
			<div class="col-sm-2 search animated wow fadeInRight" data-wow-delay=".5s">
				{{-- <a class="play-icon popup-with-zoom-anim" href="#small-dialog"><i class="glyphicon glyphicon-search"> </i> </a> --}}
			</div>
				<div class="clearfix"> </div>
		</div>
	</div>
		<div class="container">
			<div class="head-top">
			<div class="n-avigation">

				{{-- navbar --}}


                <nav class="navbar nav_bottom" role="navigation">

                    <!-- Brand and toggle get grouped for better mobile display -->
                     {{-- <div class="navbar-header nav_2">

                         <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                           <span class="sr-only">Toggle navigation</span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>

                         </button>
                         <br>
                         <ul>
                             <li style="list-style: none;"><a class="navbar-brand" href="#"> </a></li><br>

                           </ul>

                      </div> --}}
                      <!-- Collect the nav links, forms, and other content for toggling -->
                       <div class=" navbar-collapse" id="bs-megadropdown-tabs">
                           <ul class="nav navbar-nav nav_1">
                               <li  class="nres"><a href="{{ route('home') }}">Home</a></li>

                               @foreach($categories as $category)
                               <li  class="nres"><a href="{{ route('category',['id'=>$category->id]) }}">{{ $category->category_name }}</a></li>
                               @endforeach
                               <li  class="nres"><a href="{{ route('aboutus') }}">About</a></li>
                               <li  class="nres"><a href="{{ route('contact') }}">Contact</a></li>
                               <li  class="nres"><a href="{{ route('previous-work') }}">Prev Work</a></li>
                               <li  class="nres"><a href="{{ route('donate-person') }}">DonatePerson</a></li>
                               {{-- @auth()
                               <li><a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">Logout</a>
                                               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                   @csrf
                                               </form>
                                               </li>
                               @endauth
                               @guest()
                               <li><a href="{{ route('login') }}">Sign In</a></li>
                               @endguest --}}

                               {{-- <li class="last"><a href="contact.html">Contact</a></li> --}}
                           </ul>
                        </div>

                   </nav>


			</div>


		<div class="clearfix"> </div>
			<!---pop-up-box---->
					<link href="{{ asset('front/css/popuo-box.css') }}" rel="stylesheet" type="text/css" media="all"/>
					<script src="{{ asset('front/js/jquery.magnific-popup.js') }}" type="text/javascript"></script>
					<!---//pop-up-box---->
				<div id="small-dialog" class="mfp-hide">
				<div class="search-top">
						<div class="login">
							<form action="#" method="post">
								<input type="submit" value="">
								<input type="text" name="search" value="Type something..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">

							</form>
						</div>
						<p>	Shopping</p>
					</div>
				</div>


				 <script>
						$(document).ready(function() {
						$('.popup-with-zoom-anim').magnificPopup({
							type: 'inline',
							fixedContentPos: false,
							fixedBgPos: true,
							overflowY: 'auto',
							closeBtnInside: true,
							preloader: false,
							midClick: true,
							removalDelay: 300,
							mainClass: 'my-mfp-zoom-in'
						});

						});
				</script>
	<!---->

		</div>
	</div>
</div>

