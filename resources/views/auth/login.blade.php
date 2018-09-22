@extends('layouts.main')
@section('title','Login')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mt-3"></div>
            <form class="leave-comment p-5" id="payment-form" method="post" action="{{ route('login') }}">
                        {{ csrf_field() }}
						@if (strpos(url()->previous(),'cart'))
							<h5 class="m-text20 p-b-24 mt-3">
								Login to checkout
							</h5>
						@else
							<h5 class="m-text20 p-b-24 mt-3">
								Login
							</h5>
						@endif


						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Email Address" required>
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" id="password" name="password" value="{{ old('password') }}" placeholder="Password" required>
						</div>

                        @if ($errors->has('email'))
                            <p> <strong>{{ $errors->first('email') }}</strong></p>
                        @endif

                        @if ($errors->has('password'))
                            <p> <strong>{{ $errors->first('password') }}</strong></p>
                        @endif

                        @if (strpos(url()->previous(),'cart'))
							<p class="ml-2"><a href="{{route('guestcheckout.index')}}">Guest checkout click here</a></p>
						@endif

						<div class="w-size25 mt-4">
							<!-- Button -->
							<button type="submit" class="btn btn-outline-dark flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
								{{ __('Login') }}
							</button>
						</div>
			</form>
            <div class="mb-5"></div>

        </div>
    </div>
</div>
@endsection
