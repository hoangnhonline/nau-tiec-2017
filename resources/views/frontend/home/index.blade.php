@extends('frontend.layout')

@include('frontend.partials.meta')  
@section('slider')
	@include('frontend.home.slider')  
@stop
@section('content')  
  @include('frontend.home.news')
@stop
@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('.owl-carousel').owlCarousel({
    autoplay : true,
    nav : true,
    navText : true,
    dots : true, 
    autoplaySpeed : 500, 
    loop:true  ,  
    margin:2,
    responsiveClass:true,
    responsive:{
        0:{
            items:4,
        },
        320:{
            items:1,
        },
        480:{
            items:1,
        },
        600:{
            items:2,
        },
        900:{
            items:2,
        },
        1000:{
            items:4,
        }
    }
  })
  });
</script>
@stop

