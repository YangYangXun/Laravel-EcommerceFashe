@extends('layouts.main')
@section('title', 'checkout')
@section('plugin_css_for_this_page')

@endsection

@section('content')
<div class="container">
	<h1>Check out</h1>
	<div class="row">
		<div class="col-md-6 p-b-30">
					<form class="leave-comment">
						<h4 class="m-text26 p-b-36 p-t-15">
							Send us your message
						</h4>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Full Name">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="phone-number" placeholder="Phone Number">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="email" placeholder="Email Address">
						</div>

						<textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="message" placeholder="Message"></textarea>

						<div class="w-size25">
							<!-- Button -->
							<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
								Send
							</button>
						</div>
					</form>
		</div>

		<div class="col-md-6 p-b-30 p-3">
			<!-- Cart item -->
			<div class="p-5">
				<h5 class="m-text20 p-b-24">
					Your Order
				</h5>
				<table class="table mt-4">
					<tr class="">
						<th class=""></th>
						<th class="">Product</th>
						<th class="">Price</th>
						<th class="">Quantity</th>
					</tr>
                    @foreach (Cart::content() as $item)
					<tr class="">
						<td class="">
							<div class="cart-img-product b-rad-4 o-f-hidden">
								<img src="images/{{$item->model->slug}}.jpg" alt="IMG-PRODUCT">
							</div>
						</td>
						<td class="">{{$item->model->name}}</td>
						<td class="">{{$item->model->presetPrice()}}</td>
						<td class=""></td>
					</tr>
					@endforeach
				</table>

			</div>

			<div class="p-5">
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
						{{ presetPrice(Cart::subtotal()) }}
					</span>
				</div>

				<div class="size15 trans-0-4">
					<!-- Button -->
					<a href="{{route('checkout.index')}}" class="btn btn-outline-dark flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">Proceed to Checkout</a>
				</div>
			</div>
		</div>
	</div>

</div>

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
