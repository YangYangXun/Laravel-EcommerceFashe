@extends('layouts.main')
@section('title', 'thank you')
@section('plugin_css_for_this_page')

<style>
.thank-you-section {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  justify-content: center;
  flex: 1;

  h1 {
    margin-bottom: 10px;
  }

}

</style>

@endsection

@section('content')

<div class="container">

<div class="thank-you-section">
    <div class="mt-5"></div>
    <div class="mt-5"></div>
    <div class="mt-5"></div>
	<h2 class="text-center mt-4">Thank you for your order</h2>
	<div class="mb-5"></div>
	<div class="mb-5"></div>
	<div class="mb-5"></div>
	<div class="mb-5"></div>
	<div class="mb-5"></div>
</div>
</div>



@endsection

@section('plugin_js_for_this_page')

@endsection
