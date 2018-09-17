@extends('layouts.main')
@section('title','Shop')
@section('plugin_css_for_this_page')
<link rel="stylesheet" href="{{ URL::asset('css/vendor/nouislider.min.css') }}">
@endsection

@section('content')

<!-- Title Page -->
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="min-height:50vh;background-image: url(images/heading-pages-02.jpg);background-position:center center;background-size:cover;">
	<h2 class="l-text2 t-center">
		{{$categoryName}}
	</h2>
	<p class="m-text13 t-center">
		New Arrivals Women Collection 2018
	</p>
</section>


<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
				<div class="leftbar p-r-20 p-r-0-sm">
					<!--  -->
					<h4 class="m-text14 p-b-7">
						Categories
					</h4>

					<ul class="p-b-54">
						<li class="p-t-4">
							<a href="{{route('shop.index')}}" class="s-text13 active1">
									All
							</a>
						</li>
						@foreach ($categories as $category)
						<li class="p-t-4">
							<a href="{{route('shop.index',['category' => $category->slug ])}}" class="s-text13">
									{{$category->name}}
							</a>
						</li>
						@endforeach

					</ul>

					<div class="filter-price p-t-22 p-b-50 bo3">
						<div class="m-text15 p-b-17">
							Price
						</div>

						<ul class="p-b-54">
							<li class="p-t-4">
								<a href="{{ route('shop.index', ['category'=> request()->category, 'sort' => 'high_low']) }}" class="s-text13 active1">
										Hight to Low
								</a>
							</li>
							<li class="p-t-4">
								<a href="{{ route('shop.index', ['category'=> request()->category, 'sort' => 'low_high']) }}" class="s-text13 active1">
										Low to High
								</a>
							</li>
						</ul>

					</div>

					<div class="search-product pos-relative bo4 of-hidden">
						<input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search Products...">

						<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
								<i class="fs-12 fa fa-search" aria-hidden="true"></i>
							</button>
					</div>
				</div>
			</div>

			<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
				<!--  -->
				<div class="flex-sb-m flex-w p-b-35">
					<div class="flex-w">

					    <div>
						<h2>{{$categoryName}}</h2>
						</div>

						<!-- <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
							<select class="selection-2" name="sorting">
									<option>Price</option>
									<option>$0.00 - $50.00</option>
									<option>$50.00 - $100.00</option>
									<option>$100.00 - $150.00</option>
									<option>$150.00 - $200.00</option>
									<option>$200.00+</option>

								</select>
						</div> -->
					</div>

					<span class="s-text8 p-t-5 p-b-5">
							Showing {{count($products)}} results
						</span>
				</div>

				<!-- Product -->
				<div class="row">
				    @foreach ($products as $product)
					<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative ">
								<img src="images/{{$product->slug}}.jpg" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<!-- <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
											<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
											<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a> -->

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button -->
										<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
												Add to Cart
										</button>
									</div>
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

				<!-- Pagination -->
				<!-- <div class="pagination flex-m flex-w p-t-26">
					<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
					<a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
				</div> -->
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

<!--===============================================================================================-->
{{--
<script src="{{ URL::asset('js/vendor/nouislider.min.js') }}"></script> --}}
<script type="text/javascript">
	/*[ No ui ]
	    ===========================================================*/
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 50, 200 ],
	        connect: true,
	        range: {
	            'min': 50,
	            'max': 200
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]) ;
	    });

</script>
@endsection
