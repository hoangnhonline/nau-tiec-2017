@extends('frontend.layout')
@include('frontend.partials.meta')
@section('content')
<div class="content-right">
   <div class="tieude wow zoomIn" style="visibility: visible; animation-name: zoomIn;">
      <h3>{!! $cateDetail->name !!}</h3>
   </div>
   <div class="banggia1">      
      @foreach($articlesList as $articles)
      <div class="item-wr">
         <div>
            <div style="border: 1px solid #eee;padding: 3px;">
               <div class="hover2">
                  <img src="{!! Helper::showImage($articles->image_url) !!}" alt="{!! $articles->title !!}">
                  <div class="chitiet_dn">
                     <div class="box_chitiet">
                        <a href="{{ route('dich-vu', [$articles->slug, $articles->id ]) }}"><img src="{{ URL::asset('assets/images/chitiet_1.png') }}"> <span> Xem thêm</span></a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="item-ten1"><a href="{{ route('dich-vu', [$articles->slug, $articles->id ]) }}" title="{!! $articles->title !!}">{!! $articles->title !!}</a></div>
            <div class="item-kt1"></div>
         </div>
      </div>
      @endforeach
      <div class="clear"></div>
      <div class="paging"></div>
      <div class="red"></div>
      <div class="clear"></div>
   </div>
</div>
     

@stop