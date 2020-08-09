@extends('layouts.booking')

@section('content')
{{-- @dd(Auth::check()) --}}
	<navbar is-logged-in="{{ json_encode(Auth::check()) }}"></navbar>
	<booking></booking>
@stop

@section('scripts')
	
@endsection