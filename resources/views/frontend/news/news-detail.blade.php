@extends('frontend.layout')
  @section('header')
    @include('frontend.partials.header')
    
  @endsection
  
  @include('frontend.news.content-news-detail')

  @include('frontend.partials.footer')

  @section('javascript_page')
  	
@endsection