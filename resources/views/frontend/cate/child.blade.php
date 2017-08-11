@extends('frontend.layout')
@include('frontend.partials.meta')
@section('content')
<div class="content-right">
  <div class="tieude wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;"><h3>Sản phẩm</h3></div>        
  <div class="box-content row">
     <div class="product-pic col-sm-6 col-xs-12">
          <div class="zoom_slick">    
            <a class="fancybox-buttons images_main swipebox" data-fancybox-group="button" href="{{ Helper::showImage($detail->image_url) }}">
            <img class="cloudzoom" src="{{ Helper::showImage($detail->image_url) }}">
            </a>  
                          
          </div><!--.zoom_slick-->
      </div>
      <div class="product-info col-sm-6 col-xs-12">
        <ul class="khung_thongtin">
            <li><h2>{!! $detail->title !!}</h2></li>
            <!-- <li class="MASP"><b>MASP :</b> </li> -->
            <li class="khuyenmai_detail">{!! $detail->content !!}</li>
            <!-- <li>
              <div class="price"><div class='td_dh'>ĐẶT HÀNG:</div><div class='img_dh'><a class="add_to_basket" value="" rel=""><img src="images/img/lggh.png" alt="Giỏ hàng"></a></div></div>
            </li> -->               
            <div class="clear"></div>             
          </ul>
      </div>
    </div>
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
          <div style="border: 1px solid #4E7547;padding: 3px;">
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
    <div class='clear'></div>                  
  </div>
  <div class="clear"></div>
    <!-- </div> -->
    <div class="tieude"><h3>Các sản phẩm khác</h3></div>
    <div class="banggia1 row">
      @foreach($otherList as $articles)
      <div class="item-wr col-sm-3 col-xs-6">
        <div class="hover2">
           <img src="{!! Helper::showImage($articles->image_url) !!}" alt="{!! $articles->title !!}">
           <div class="chitiet_dn">
              <div class="box_chitiet">
                 <a href="{{ route('dich-vu', [$articles->slug, $articles->id ]) }}"><img src="{{ URL::asset('assets/images/chitiet_1.png') }}"> <span> Xem thêm</span></a>
              </div>
           </div>
        </div>
        <div class="item-ten1"><a href="{{ route('dich-vu', [$articles->slug, $articles->id ]) }}" title="{!! $articles->title !!}">{!! $articles->title !!}</a></div>
        <div class="item-kt1"></div>
      </div>
      @endforeach             
    </div>
    <div class="clear"></div>
    <div class="paging"></div>
    <div class="red"></div>
    <div class="clear"></div>
  </div>
@stop