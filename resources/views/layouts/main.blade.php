<!DOCTYPE html>
<html lang="en">
<head>
	<title>Fashe | @yield('title')</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{ URL::asset('theme-images/favicon.png') }}"/>
<!--===============================================================================================-->
    <link rel="stylesheet" href="{{ URL::asset('css/vendor/bootstrap.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" href="{{ URL::asset('css/fonts/font-awesome.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" href="{{ URL::asset('css/fonts/themify-icons.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" href="{{ URL::asset('css/fonts/icon-font.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" href="{{ URL::asset('css/fonts/style.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" href="{{ URL::asset('css/vendor/animate.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" href="{{ URL::asset('css/vendor/hamburgers.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" href="{{ URL::asset('css/vendor/animsition.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" href="{{ URL::asset('css/vendor/select2.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" href="{{ URL::asset('css/vendor/daterangepicker.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" href="{{ URL::asset('css/vendor/slick.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" href="{{ URL::asset('css/vendor/lightbox.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" href="{{ URL::asset('css/libs/util.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/libs/main.css') }}">
<!--===============================================================================================-->
<!-- plugin css for this page -->
  @yield('plugin_css_for_this_page')
</head>
<body class="animsition">

	<!-- header fixed -->

	<!-- top noti -->
	<div class="flex-c-m size22 bg0 s-text21 pos-relative">
		20% off everything!
		<a href="product.html" class="s-text22 hov6 p-l-5">
			Shop Now
		</a>

		<button class="flex-c-m pos2 size23 colorwhite eff3 trans-0-4 btn-romove-top-noti">
			<i class="fa fa-remove fs-13" aria-hidden="true"></i>
		</button>
	</div>

	<!-- Header -->
	<header class="header2">
		<!-- Header desktop -->
		<div class="container-menu-header-v2 p-t-26">
			<div class="topbar2">
				<!-- Logo2 -->
				<a href="{{route('home')}}" class="logo2">
					<img src="{{ URL::asset('theme-images/logo.png') }}" alt="IMG-LOGO">
				</a>

				<div class="topbar-child2">

                    @guest
					<span class="topbar-email">
						  <a class="m-3" href="{{ route('login') }}">{{ __('Login') }}</a>
					</span>

					<span class="topbar-email">
						  <a class="m-3" href="{{ route('register') }}">{{ __('Register') }}</a>
					</span>


					<!-- <div class="topbar-language rs1-select2">
						<select class="selection-1" name="time">
							<option>USD</option>
							<option>EUR</option>
						</select>
					</div> -->

					<!--  -->
					@else
					<a href="#" class="header-wrapicon1 dis-block m-l-30">
                        <img src="{{ URL::asset('images/icons/icon-header-01.png') }}" class="header-icon1" alt="ICON">
					</a>


					<span class="topbar-email ml-2 mr-2">
						 {{ Auth::user()->name }}
					</span>
					<span class="topbar-email ml-2 mr-2">
						  <a class="" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                        </form>
					</span>
					@endguest

					<span class="linedivide1"></span>

					<div class="header-wrapicon2 m-r-13">

						<img src="{{ URL::asset('images/icons/icon-header-02.png') }}"  class="header-icon1 js-show-header-dropdown" alt="ICON">

						@if(Cart::count() > 0)
						<span class="header-icons-noti">{{Cart::count()}}</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								@foreach (Cart::content() as $item)
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="{{ URL::asset('images/'.$item->model->slug.'.jpg') }}" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											{{$item->model->name}}
										</a>

										<span class="header-cart-item-info">
											{{ $item->qty }} x {{$item->model->presentPrice()}}
										</span>
									</div>
								</li>
                                @endforeach
							</ul>

							<div class="header-cart-total">
								Total: {{ presentPrice(Cart::subtotal()) }}
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="{{route('cart.index')}}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="{{route('checkout.index')}}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
						</div>
						@endif
					</div>
				</div>
			</div>

			<div class="wrap_header">

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li>
								<a href="{{route('home')}}">Home</a>
							</li>

							<li>
								<a href="{{route('shop.index')}}">Shop</a>
							</li>

							<li>
								<a href="{{route('cart.index')}}">Cart</a>
							</li>

							<li>
								<a href="{{route('about.index')}}">About</a>
							</li>

							<li>
								<a href="{{route('contact.index')}}">Contact</a>
							</li>
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">

				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="{{route('home')}}" class="logo-mobile">
				<img src="images/icons/logo.png" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					<a href="" class="header-wrapicon1 dis-block">
					    @guest
						<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
						@else
						<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON"> {{ Auth::user()->name }}
						@endguest
					</a>

					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
					<a href="{{route('cart.index')}}" class="header-wrapicon1 dis-block">
						<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						@if(Cart::count() > 0)
						<span class="header-icons-noti">{{Cart::count()}}</span></a>
						@else
						<span class="header-icons-noti">0</span></a>
                        @endif

					</div>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">

                    @guest
					<li class="item-menu-mobile">
						<a href="{{route('login')}}">Login</a>
					</li>

					<li class="item-menu-mobile">
						<a href="{{route('register')}}">Register</a>
					</li>

                    @else
					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<div class="topbar-child2-mobile">
							<span class="topbar-email">
								Welcome {{ Auth::user()->name }}
							</span>
						</div>
					</li>
					<li class="item-menu-mobile">
						<a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                        </form>
					</li>
					@endguest



					<li class="item-menu-mobile">
						<a href="{{route('home')}}">Home</a>
					</li>

					<li class="item-menu-mobile">
						<a href="{{route('shop.index')}}">Shop</a>
					</li>

					<li class="item-menu-mobile">
						<a href="{{route('cart.index')}}">Cart</a>
					</li>

					<li class="item-menu-mobile">
						<a href="{{route('about.index')}}">About</a>
					</li>

					<li class="item-menu-mobile">
						<a href="{{route('contact.index')}}">Contact</a>
					</li>


				</ul>
			</nav>
		</div>
	</header>


	@yield('content')


	<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3 ml-5">
				<h4 class="s-text12 p-b-30">
					GET IN TOUCH
				</h4>

				<div>
					<p class="s-text7 w-size27">
						Any questions? Let us know .<br>
						Email : ecommfashe@fashe.com
					</p>

				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4 ml-5">
				<h4 class="s-text12 p-b-30">
					Categories
				</h4>

				<ul>
				   <?php $categories = App\Category::all();?>

					@foreach ($categories as $category)
					<li class="p-b-9">
						<a href="{{route('shop.index',['category' => $category->slug ])}}" class="s-text7">
									{{$category->name}}
						</a>
					</li>
					@endforeach

				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4 ml-5">
				<h4 class="s-text12 p-b-30">
					Links
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Shop
						</a>
					</li>

					<li class="p-b-9">
						<a href="{{route('cart.index')}}" class="s-text7">
							Cart
						</a>
					</li>

					<li class="p-b-9">
						<a href="{{route('about.index')}}" class="s-text7">
							About Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="{{route('contact.index')}}" class="s-text7">
							Contact Us
						</a>
					</li>

				</ul>
			</div>
			<div class="ml-4"></div>
			<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					Social Media
				</h4>

				<div class="flex-m p-t-30">
					<div class="fs-18 color1 p-r-20 fa fa-facebook"></div>
					<div  class="fs-18 color1 p-r-20 fa fa-instagram"></div>
					<div  class="fs-18 color1 p-r-20 fa fa-pinterest-p"></div>
					<div  class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></div>
					<div  class="fs-18 color1 p-r-20 fa fa-youtube-play"></div>
				</div>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15">
			<a>
				<img class="h-size2" src="images/icons/paypal.png" alt="IMG-PAYPAL">
			</a>

			<a>
				<img class="h-size2" src="images/icons/visa.png" alt="IMG-VISA">
			</a>

			<a>
				<img class="h-size2" src="images/icons/mastercard.png" alt="IMG-MASTERCARD">
			</a>

			<a>
				<img class="h-size2" src="images/icons/express.png" alt="IMG-EXPRESS">
			</a>

			<a>
				<img class="h-size2" src="images/icons/discover.png" alt="IMG-DISCOVER">
			</a>

			<div class="t-center s-text8 p-t-20">
				Copyright 2018 All rights reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
			</div>
			<div class="t-center s-text8 p-t-20">
				Add shopping function and dynamic data by <i class="fa fa-github" aria-hidden="true"></i> <a href="https://github.com/YangYangXun" >YangXun</a>
			</div>
		</div>
	</footer>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>

	<!-- Modal Video 01-->
	<div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">

		<div class="modal-dialog" role="document" data-dismiss="modal">
			<div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

			<div class="wrap-video-mo-01">
				<div class="w-full wrap-pic-w op-0-0"><img src="images/icons/video-16-9.jpg" alt="IMG"></div>
				<div class="video-mo-01">
					<iframe src="https://www.youtube.com/embed/Nt8ZrWY2Cmk?rel=0&amp;showinfo=0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>

<!--===============================================================================================-->
    <script src="{{ URL::asset('js/vendor/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ URL::asset('js/vendor/animsition.min.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ URL::asset('js/vendor/popper.js') }}"></script>
    <script src="{{ URL::asset('js/vendor/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ URL::asset('js/vendor/select2.min.js') }}"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
    <script src="{{ URL::asset('js/vendor/slick.min.js') }}"></script>
    <script src="{{ URL::asset('js/libs/slick-custom.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ URL::asset('js/vendor/countdowntime.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ URL::asset('js/vendor/lightbox.min.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ URL::asset('js/vendor/sweetalert.min.js') }}"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
    <script src="{{ URL::asset('js/vendor/parallax100.js') }}"></script>
	<script type="text/javascript">
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
    <script src="{{ URL::asset('js/libs/main.js') }}"></script>
	  @yield('plugin_js_for_this_page')

</body>
</html>
