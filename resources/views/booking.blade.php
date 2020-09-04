@extends('layouts.booking')

@section('content')
{{-- @dd(Auth::check()) --}}
	<navbar is-logged-in="{{ Auth::check() }}"></navbar>
	<booking></booking>
@stop

@section('scripts')
<script src="https://js.stripe.com/v3/"></script>
@endsection