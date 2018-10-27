@extends('frontend.layout')

@include('frontend.partials.meta')  
@section('slider')
	@include('frontend.home.slider')  
@stop
@section('content')  
  @include('frontend.home.news')
@stop