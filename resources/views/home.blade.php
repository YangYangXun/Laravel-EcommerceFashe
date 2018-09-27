@extends('layouts.main')
@section('title','Home')
@section('content')

<!-- Slide1 -->
<section class="slide1">
	<div class="wrap-slick1">
		<div class="slick1">
			<div class="item-slick1 item1-slick1" style="background-image: url(images/master-slide-04.jpg);">
				<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
					<h2 class="caption1-slide1 xl-text2 t-center bo14 p-b-6 animated visible-false m-b-22" data-appear="fadeInUp">
						Ecommerce Fashe
					</h2>

					<span class="caption2-slide1 m-text1 t-center animated visible-false m-b-33" data-appear="fadeInDown">
							New Collection 2018
						</span>

					<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
						<!-- Button -->
						<a href="{{route('shop.index')}}" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Shop Now
						</a>
					</div>
				</div>
			</div>

			<div class="item-slick1 item2-slick1" style="background-image: url(images/master-slide-01.jpg);">
				<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
					<h2 class="caption1-slide1 xl-text2 t-center bo14 p-b-6 animated visible-false m-b-22" data-appear="rollIn">
						Ecommerce Fashe
					</h2>

					<span class="caption2-slide1 m-text1 t-center animated visible-false m-b-33" data-appear="lightSpeedIn">
							New Collection 2018
						</span>

					<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
						<!-- Button -->
						<a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Shop Now
							</a>
					</div>
				</div>
			</div>

			<div class="item-slick1 item3-slick1" style="background-image: url({{ asset('images/master-slide-03.jpg') }});">

				<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
					<h2 class="caption1-slide1 xl-text2 t-center bo14 p-b-6 animated visible-false m-b-22" data-appear="rotateInDownLeft">
						Ecommerce Fashe
					</h2>

					<span class="caption2-slide1 m-text1 t-center animated visible-false m-b-33" data-appear="rotateInUpRight">
							New Collection 2018
						</span>

					<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">
						<!-- Button -->
						<a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Shop Now
							</a>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>

<!-- Our product -->
<section class="bgwhite p-t-45 p-b-58">
	<div class="container">
		<div class="sec-title p-b-22">
			<h3 class="m-text5 t-center">
				Our Products
			</h3>
		</div>

		<!-- Tab01 -->
		<div class="tab01">

			<!-- Tab panes -->
			<div class="tab-content p-t-35">
				<!-- - -->
				<div class="tab-pane fade show active" id="featured" role="tabpanel">
					<div class="row">

						@foreach ($products as $product)
						<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative">
								    <img src="{{ asset('storage/'.$product->image) }}" alt="IMG-PRODUCT">




									<div class="block2-overlay trans-0-4">
										<form action="{{ route('cart.store', $product) }}" method="POST" class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button -->
											{{ csrf_field() }}
											<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
																					Add to Cart
											</button>
										</form>
									</div>
								</div>

								<div class="block2-txt p-t-20">
									<a href="{{route('shop.show',$product->slug)}}" class="block2-name dis-block s-text3 p-b-5">
										{{$product->name}}
									</a>

									<span class="block2-price m-text6 p-r-5">
												{{$product->presentPrice()}}
											</span>
								</div>
							</div>
						</div>
						@endforeach

					</div>
				</div>

			</div>
		</div>
	</div>
</section>


<!-- Banner video -->
<section class="parallax0 parallax100" style="background-image: url(images/bg-video-01.jpg);">
	<div class="overlay0 p-t-190 p-b-200">
		<div class="flex-col-c-m p-l-15 p-r-15">
			<span class="m-text9 p-t-45 fs-20-sm">
				The Beauty
			</span>

			<h3 class="l-text1 fs-35-sm">
				Lookbook
			</h3>

		</div>
	</div>
</section>

<div class="mt-5"></div>

<!-- Instagram -->
<section class="instagram p-t-20 mt-5">
	<div class="sec-title p-b-52 p-l-15 p-r-15">
		<h3 class="m-text5 t-center">
			@ follow us on Instagram
		</h3>
	</div>

	<div class="flex-w">
		<!-- Block4 -->
		<div class="block4 wrap-pic-w">
			<img src="images/gallery-01.jpg" alt="IMG-INSTAGRAM">

			<a href="#" class="block4-overlay sizefull ab-t-l trans-0-4">
					<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2">39</span>
					</span>

					<div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
						<p class="s-text10 m-b-15 h-size1 of-hidden">
							Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla in tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit amet enim orci. Nam eget metus elit.
						</p>

						<span class="s-text9">
							Photo by @nancyward
						</span>
					</div>
				</a>
		</div>

		<!-- Block4 -->
		<div class="block4 wrap-pic-w">
			<img src="images/gallery-02.jpg" alt="IMG-INSTAGRAM">

			<a href="#" class="block4-overlay sizefull ab-t-l trans-0-4">
					<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2">39</span>
					</span>

					<div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
						<p class="s-text10 m-b-15 h-size1 of-hidden">
							Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla in tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit amet enim orci. Nam eget metus elit.
						</p>

						<span class="s-text9">
							Photo by @nancyward
						</span>
					</div>
				</a>
		</div>

		<!-- Block4 -->
		<div class="block4 wrap-pic-w">
			<img src="images/gallery-03.jpg" alt="IMG-INSTAGRAM">

			<a href="#" class="block4-overlay sizefull ab-t-l trans-0-4">
					<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2">39</span>
					</span>

					<div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
						<p class="s-text10 m-b-15 h-size1 of-hidden">
							Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla in tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit amet enim orci. Nam eget metus elit.
						</p>

						<span class="s-text9">
							Photo by @nancyward
						</span>
					</div>
				</a>
		</div>

		<!-- Block4 -->
		<div class="block4 wrap-pic-w">
			<img src="images/gallery-04.jpg" alt="IMG-INSTAGRAM">

			<a href="#" class="block4-overlay sizefull ab-t-l trans-0-4">
					<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2">39</span>
					</span>

					<div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
						<p class="s-text10 m-b-15 h-size1 of-hidden">
							Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla in tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit amet enim orci. Nam eget metus elit.
						</p>

						<span class="s-text9">
							Photo by @nancyward
						</span>
					</div>
				</a>
		</div>

		<!-- Block4 -->
		<div class="block4 wrap-pic-w">
			<img src="images/gallery-05.jpg" alt="IMG-INSTAGRAM">

			<a href="#" class="block4-overlay sizefull ab-t-l trans-0-4">
					<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2">39</span>
					</span>

					<div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
						<p class="s-text10 m-b-15 h-size1 of-hidden">
							Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla in tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit amet enim orci. Nam eget metus elit.
						</p>

						<span class="s-text9">
							Photo by @nancyward
						</span>
					</div>
				</a>
		</div>
	</div>
</section>


<div class="mt-5"></div>

<!-- Shipping -->
<section class="shipping bgwhite p-t-62 p-b-46">
	<div class="flex-w p-l-15 p-r-15">
		<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
			<h4 class="m-text12 t-center">
				Free Delivery Worldwide
			</h4>

			<a href="#" class="s-text11 t-center">
					Click here for more info
				</a>
		</div>

		<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
			<h4 class="m-text12 t-center">
				30 Days Return
			</h4>

			<span class="s-text11 t-center">
					Simply return it within 30 days for an exchange.
				</span>
		</div>

		<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
			<h4 class="m-text12 t-center">
				Store Opening
			</h4>

			<span class="s-text11 t-center">
					Shop open from Monday to Sunday
				</span>
		</div>
	</div>
</section>
@endsection
