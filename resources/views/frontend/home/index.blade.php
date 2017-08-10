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
     <?php $c = 0; ?>
     @foreach($menuList as $menu)
     <?php $c++; ?>
     <div>
        <div class="item-wr3" @if($c%3 == 0) style="margin-right:0px" @endif>
           <div >
              <div class="item-gia">{!! $menu->name !!}: <span> {!! number_format($menu->price) !!} đồng/bàn</span></div>
              <div class="clear"></div>
              <div style="border: 1px solid #00B204;padding: 3px;">
                 <div class="hover3">
                    <div style="padding:5px">
                    <?php $cf = 0; ?>
                       @foreach($menu->foodMenu as $food)
                       <?php $cf++; ?>
                       <p><span style="color:red; font-size: 15px;
font-weight: bold;">{{ $cf }}. </span><span style="color:#0000FF;font-weight:bold;font-size:16px">{!! $food->name !!}</span></p>
                       @endforeach
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
     @if($c%3 == 0)
     <div class="clearfix"></div>
     @endif
     @endforeach
     <div class='clear'></div>                  
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
        600:{
            items:3,
        },
        1000:{
            items:3,
        }
    }
  })
  });
</script>
@stop

