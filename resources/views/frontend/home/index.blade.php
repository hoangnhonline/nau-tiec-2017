@extends('frontend.layout')

@include('frontend.partials.meta')  
@section('slider')
	@include('frontend.home.slider')  
@stop
@section('content')
<div class="spnoibat">
    <div class="tieude">
      <h3>Menu nhận đặt tiệc</h3>
    </div>
    <div class="row">
      <?php $c = 0; ?>
      @foreach($menuList as $menu)
      <?php $c++; ?>
      <div class="item-wr3 col-sm-4 col-xs-12">
        <div>
          <div class="item-gia">{!! $menu->name !!}: <span> {!! number_format($menu->price) !!} đồng/bàn</span></div>
          <div class="clear"></div>
          <div class="content">
             <div class="hover3">
                <div style="padding:5px">
                <?php $cf = 0; ?>
                   @foreach($menu->foodMenu as $food)
                   <?php $cf++; ?>
                   <p><span style="color:red; font-size: 15px;font-weight: bold;">{{ $cf }}. </span><span style="color:#0000FF;font-weight:bold;font-size:16px">{!! $food->name !!}</span></p>
                   @endforeach
                </div>
             </div>
          </div>
        </div>
      </div>
      @if($c%3 == 0)
      @endif
      @endforeach
    </div>
  </div>
  <div class="clear"></div>
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
            items:3,
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
            items:3,
        }
    }
  })
  });
</script>
@stop

