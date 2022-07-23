<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>@yield('title')</title>

<link href="{{ asset('front/css/bootstrap-3.1.1.min.css') }}" rel='stylesheet' type='text/css' />


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('front/js/jquery.min.js') }}"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="{{ asset('front/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Youth Fashion Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='//fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
<link href="{{ asset('front/css/responsive.css') }}" rel='stylesheet' type='text/css' />
<!-- start menu -->

<script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('front/js/simpleCart.min.js') }}"> </script>
<!-- slide -->
<script src="{{ asset('front/js/responsiveslides.min.js') }}"></script>
   <script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: false,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>
  <!-- animation-effect -->
<link href="{{ asset('front/css/animate.min.css') }}" rel="stylesheet">
<script src="{{ asset('front/js/wow.min.js') }}"></script>
<script>
 new WOW().init();
</script>
<!-- //animation-effect -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Redressed&display=swap" rel="stylesheet">



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    @stack('css')
</head>
<body>
    @include('front-end.includes.header')


    @yield('body')


    @include('front-end.includes.footer')




    <script src="{{ asset('front/js/jquery.min.js') }}"></script>
<script src="{{ asset('front/js/imagezoom.js') }}"></script>
<!-- start menu -->
<script type="text/javascript" src="{{ asset('front/js/memenu.js') }}"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>
<script src="{{ asset('front/js/simpleCart.min.js') }}"> </script>
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
						<!-- FlexSlider -->
  <script defer src="{{ asset('front/js/jquery.flexslider.js') }}"></script>
<link rel="stylesheet" href="{{ asset('front/css/flexslider.css') }}" type="text/css" media="screen" />

<script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
</script>
<!---pop-up-box---->
					<link href="{{ asset('front/css/popuo-box.css') }}" rel="stylesheet" type="text/css" media="all"/>
					<script src="{{ asset('front/js/jquery.magnific-popup.js') }}" type="text/javascript"></script>
					<!---//pop-up-box---->
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


    @stack('js')
</body>
</html>
