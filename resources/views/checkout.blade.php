@extends('layouts.main')
@section('title', 'checkout')
@section('plugin_css_for_this_page')
<script src="https://js.stripe.com/v3/"></script>

<style>
/**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  background-color: white;
  height: 40px;
  padding: 10px 12px;
  border-radius: 4px;
  border: 1px solid transparent;
  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}


.btn-outline-dark{
   &:disabled {
        background: lighten($primary, 10%);
        cursor: not-allowed;
    }
}
</style>

@endsection

@section('content')
<div class="container">
     @if(count($errors) > 0)
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{!! $error !!}</li>
							@endforeach
						</ul>
					</div>
        			@endif
	<h2 class="ml-5">Check out</h2>
	@if (session()->has('success_message'))
		<div class="alert alert-success">
			{{ session()->get('success_message') }}
		</div>
	@endif
	<div class="row">
		<div class="col-md-6 p-b-30">
					<form class="leave-comment p-5" id="payment-form" method="post" action="{{route('checkout.store')}}">
                        {{ csrf_field() }}
						<h5 class="m-text20 p-b-24 mt-3">
							Bill Detail
						</h5>

						<div class="bo4 of-hidden size15 m-b-20">
							@if(auth()->user())
								<input class="sizefull s-text7 p-l-22 p-r-22" type="text" id="email" name="email" value="{{ auth()->user()->email }}" placeholder="Email Address" required>
							@else
							    <input class="sizefull s-text7 p-l-22 p-r-22" type="text" id="email" name="email" value="{{ old('email') }}" placeholder="Email Address" required>
							@endif
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Name" required>
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" id="address" name="address" value="{{ old('address') }}" placeholder="Address" required>
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" id="city" name="city" value="{{ old('city') }}" placeholder="City" required>
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Phone" required>
						</div>


                        <h5 class="m-text20 p-b-24 mt-5">
							Payment Details
						</h5>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" id="name_on_card" name="name_on_card" value="" placeholder="Name on card" required>
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<!-- <input class="sizefull s-text7 p-l-22 p-r-22" type="text"  placeholder="Credit card"> -->
							<div id="card-element">
                          		<!-- a Stripe Element will be inserted here. -->
                       		 </div>

                       		 <!-- Used to display form errors -->
                        	<div id="card-errors" role="alert"></div>
						</div>


						<div class="w-size25 mt-4">
							<!-- Button -->
							<button type="submit" id="complete-order" class="btn btn-outline-dark flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
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
						<th class="">Quantity</th>
						<th class="">Price</th>
					</tr>
                    @foreach (Cart::content() as $item)
					<tr class="">
						<td class="">
							<div class="cart-img-product b-rad-4 o-f-hidden">
								<img src="{{ asset('storage/'.$item->model->image) }}" alt="IMG-PRODUCT">
							</div>
						</td>
						<td class="">{{$item->model->name}}</td>
						<td class="">{{ $item->qty }}</td>
						<td class="">{{ presentPrice($item->subtotal) }}</td>
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
						{{ presentPrice(Cart::subtotal()) }}
					</span>
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


<!-- credit card -->
<script>
	(function () {
		// Create a Stripe client.
		var stripe = Stripe('pk_test_WZGFrPfg8DoaKCeho0HEdCJd');

		// Create an instance of Elements.
		var elements = stripe.elements();

		// Custom styling can be passed to options when creating an Element.
		// (Note that this demo uses a wider set of styles than the guide below.)
		var style = {
		base: {
			color: '#32325d',
			lineHeight: '18px',
			fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
			fontSmoothing: 'antialiased',
			fontSize: '16px',
			'::placeholder': {
			color: '#aab7c4'
			}
		},
		invalid: {
			color: '#fa755a',
			iconColor: '#fa755a'
		}
		};

		// Create an instance of the card Element.
		var card = elements.create('card', {
			style: style,
			hidePostalCode: true
		});

		// Add an instance of the card Element into the `card-element` <div>.
		card.mount('#card-element');

		// Handle real-time validation errors from the card Element.
		card.addEventListener('change', function(event) {
		var displayError = document.getElementById('card-errors');
		if (event.error) {
			displayError.textContent = event.error.message;
		} else {
			displayError.textContent = '';
		}
		});

 		// Handle form submission
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
              event.preventDefault();

              // Disable the submit button to prevent repeated clicks
              document.getElementById('complete-order').disabled = true;

              var options = {
                name: document.getElementById('name_on_card').value,
                address_line1: document.getElementById('address').value,
                address_city: document.getElementById('city').value,
                // address_state: document.getElementById('province').value,
                // address_zip: document.getElementById('postalcode').value
              }

              stripe.createToken(card, options).then(function(result) {
                if (result.error) {
                  // Inform the user if there was an error
                  var errorElement = document.getElementById('card-errors');
                  errorElement.textContent = result.error.message;

                  // Enable the submit button
                  document.getElementById('complete-order').disabled = false;
                } else {
                  // Send the token to your server
                  stripeTokenHandler(result.token);
                }
            });
        });

		function stripeTokenHandler(token) {
			// Insert the token ID into the form so it gets submitted to the server
			var form = document.getElementById('payment-form');
			var hiddenInput = document.createElement('input');
			hiddenInput.setAttribute('type', 'hidden');
			hiddenInput.setAttribute('name', 'stripeToken');
			hiddenInput.setAttribute('value', token.id);
			form.appendChild(hiddenInput);

			// Submit the form
			form.submit();
		}
	})();
</script>


@endsection
