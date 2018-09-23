@extends('layouts.main')
@section('title', 'Cart')
@section('plugin_css_for_this_page')

@endsection

@section('content')



	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="min-height:40vh;background-image: url(images/heading-pages-01.jpg);background-position:center center;background-size:cover;">
		<h2 class="l-text2 t-center">
			Cart
		</h2>
	</section>


    <!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			@if (session()->has('success_message'))
				<div class="alert alert-success">
					{{ session()->get('success_message') }}
				</div>
			@endif

			@if(count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

			@if(Cart::count() > 0)
            <h1 class="text-center mt-3 mb-5">{{Cart::count()}} item(s) in shoping cart</h1>
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1"></th>
							<th class="column-2">Product</th>
							<th class="column-3">Price</th>
							<th class="column-4">Quantity</th>
							<th class="column-5">Total</th>
							<th class="column-6">Remove</th>
						</tr>
                        @foreach (Cart::content() as $item)
						<tr class="table-row">
							<td class="column-1">
								<div class="cart-img-product b-rad-4 o-f-hidden">
									<img src="images/{{$item->model->slug}}.jpg" alt="IMG-PRODUCT">
								</div>
							</td>

							<td class="column-2"><a href="{{route('shop.show',$item->model->slug)}}">{{$item->model->name}}</a></td>
							<td class="column-3">{{$item->model->presentPrice()}}</td>
							<td class="column-4">
								<div class="flex-w bo5 of-hidden w-size17">
									<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2 quantity"  data-id="{{ $item->rowId }}">
										<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
									</button>

									<input id="{{ $item->rowId }}" class="size8 m-text18 t-center num-product quantity" type="number" name="num-product1" value="{{ $item->qty }}">

									<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2 quantity"  data-id="{{ $item->rowId }}">
										<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
									</button>
								</div>
							</td>
							<td class="column-5">{{ presentPrice($item->subtotal) }}</td>
							<td class="column-6">
								<form method="POST" action="{{route('cart.destroy',$item->rowId)}}">
									  {{ csrf_field() }}
									  {{ method_field('DELETE') }}
									  <button class="btn btn-outline-dark">
										Remove
									  </button>
								</form>
							</td>
						</tr>
                        @endforeach

					</table>
				</div>
			</div>

		<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">

			<!-- Total -->
			<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<h5 class="m-text20 p-b-24">
					Cart Totals
				</h5>

				<!--  -->
				<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
					<span class="s-text18 w-size19 w-full-sm">
						Shipping:
					</span>

					<div class="w-size20 w-full-sm">
						<p class="s-text8 p-b-5">
							There are no shipping methods available. Please double check your address, or contact us if you need any help.
						</p>
					</div>
				</div>

				<!--  -->
				<div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Total:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						{{ presentPrice(Cart::subtotal()) }}
					</span>
				</div>

				<div class="size15 trans-0-4">
					<!-- Button -->
					<a href="{{route('checkout.index')}}" class="btn btn-outline-dark flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">Proceed to Checkout</a>
				</div>
			</div>
			@else
			<div class="text-center">
				<h1 class="mt-3 mb-5">No item(s) in shoping cart</h1>

				<a href="{{route('shop.index')}}" >Continue shopping</a>
			</div>
			@endif

		</div>
	</section>





@endsection

@section('plugin_js_for_this_page')
<script src="{{ URL::asset('js/app.js') }}"></script>
<script>
 (function(){
	const classname = document.querySelectorAll('.quantity')
	// const productQuantity = document.querySelector('.num-product')
	Array.from(classname).forEach(function(element) {
		const id = element.getAttribute('data-id')
		// const productQuantity = element.getAttribute('value')
		const productQuantity = document.getElementById(id);
        element.addEventListener('click', function() {
		  	axios.patch(`/EcommerceFashe/public/cart/${id}`, {
				quantity: productQuantity.value,
				id: id
			})
			.then(function (response) {
				console.log(response);
				// window.location.href = '{{ route('cart.index') }}'
			})
			.catch(function (error) {
				console.log(error);
				console.log('QQ');
			});
	   })
	})
 })();
</script>
@endsection
