@extends('layouts.main')
@section('title','Register')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <form class="leave-comment p-5" id="payment-form" method="post" action="{{ route('register') }}">
                        {{ csrf_field() }}
						<h5 class="m-text20 p-b-24 mt-3">
							Register
						</h5>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22 " type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>

						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22 " type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Email Address" required>
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22 " type="password" id="password" name="password" value="{{ old('password') }}" placeholder="Password" required>
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22 form-control" type="password" id="password-confirm"" name="password_confirmation" value="{{ old('password') }}" placeholder="Confirm Password " required>
						</div>

                        @if ($errors->has('name'))
                            <p> <strong>{{ $errors->first('name') }}</strong></p>
                        @endif

                        @if ($errors->has('email'))
                            <p> <strong>{{ $errors->first('email') }}</strong></p>
                        @endif

                          @if ($errors->has('password'))
                            <p> <strong>{{ $errors->first('password') }}</strong></p>
                        @endif


						<div class="w-size25 mt-4">
							<!-- Button -->
							<button type="submit" class="btn btn-outline-dark flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
								{{ __('Register') }}
							</button>
						</div>
			 </form>


        </div>
    </div>
</div>
@endsection
