@extends('layouts.main')
@section('title', $product->name)
@section('plugin_css_for_this_page')

@endsection

@section('content')


	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>
					<div class="slick3">
						<div class="item-slick3" data-thumb="{{ asset('storage/'.$product->image) }}">
							<div class="wrap-pic-w">
								<!-- <img src="../images/{{$product->slug}}.jpg" alt="IMG-PRODUCT">  -->
                                                                <img src="{{ asset('storage/'.$product->image) }}" alt="IMG-PRODUCT">
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h3 class="product-detail-name m-text16 p-b-13">
					{{$product->name}}
				</h3>

				<span class="m-text17">
					{{$product->presentPrice()}}
				</span>

				<p class="s-text8 p-t-10">
				    {{$product->details}}
				</p>

				<!--  -->
				<div class="p-t-33 p-b-60">
					<form action="{{ route('cart.store', $product) }}" method="POST" class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
						{{ csrf_field() }}
						<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
								Add to Cart
						</button>
					</form>
				</div>

				<div class="p-b-45">
					<span class="s-text8 m-r-35">Categories:</span>
					@foreach($categories as $category)
					<a class="" href="{{route('shop.index',['category' => $category->slug ])}}">{{$category->name}}</a>
					@endforeach
				</div>

				<!--  -->
				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Description
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
                           {!!$product->description!!}
						</p>
					</div>
				</div>

				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Additional information
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
						</p>
					</div>
				</div>

			
			</div>
		</div>
	</div>


	<!-- Relate Product -->
	<section class="relateproduct bgwhite p-t-45 p-b-138">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Other Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
				@foreach ($productRelates as $product)
					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative">
								<img src="{{ asset('storage/'.$product->image) }}" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
						

									
                                                                        <form action="{{ route('cart.store', $product) }}" method="POST" class="block2-btn-addcart w-size1 trans-0-4">
                                                                                {{ csrf_field() }}
										<!-- Button -->
										<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Add to Cart
										</button>
									</form>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="{{route('shop.show', $product->slug)}}" class="block2-name dis-block s-text3 p-b-5">
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
	</section>



@endsection

@section('plugin_js_for_this_page')

<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
</script>




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

		$('.btn-addcart-product-detail').each(function(){
			var nameProduct = $('.product-detail-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
</script>


@endsection
