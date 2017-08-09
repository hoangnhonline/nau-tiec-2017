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
  <div class="spnoibat">
     <div class="tieude">
        <h3>Tin tức</h3>
     </div>
     <div class='owl-carousel'>
        <div>
           <div class="cottt ">
              <a href="tin-tuc/nhung-ai-khong-nen-an-rau-muong-128.html"><img src="{{ URL::asset('assets/upload/baiviet/14523128911711414149-1693_290x130.jpg') }}" alt="Những ai không nên ăn rau muống?"></a>
              <div class="dmtt">
                 <div class="tentt"><a href="nhung-ai-khong-nen-an-rau-muong">Những ai không nên ăn rau muống?</a></div>
                 <div class="motatt"></div>
                 <div class="xemthem"><a href="tin-tuc/nhung-ai-khong-nen-an-rau-muong-128.html" title="Những ai không nên ăn rau muống?">Xem thêm</a></div>
              </div>
              <div class="clear"></div>
           </div>
        </div>
        <div>
           <div class="cottt ">
              <a href="tin-tuc/cach-lam-mut-dau-ngu-thom-ngon-ngay-tet-129.html"><img src="{{ URL::asset('assets/upload/baiviet/cachlammutdaungudontetmutdaungu101482391199width500height375-7427_290x130.jpg') }}" alt="Cách làm mứt đậu ngự thơm ngon ngày Tết"></a>
              <div class="dmtt">
                 <div class="tentt"><a href="cach-lam-mut-dau-ngu-thom-ngon-ngay-tet">Cách làm mứt đậu ngự thơm ngon ngày Tết</a></div>
                 <div class="motatt"></div>
                 <div class="xemthem"><a href="tin-tuc/cach-lam-mut-dau-ngu-thom-ngon-ngay-tet-129.html" title="Cách làm mứt đậu ngự thơm ngon ngày Tết">Xem thêm</a></div>
              </div>
              <div class="clear"></div>
           </div>
        </div>
        <div>
           <div class="cottt ">
              <a href="tin-tuc/5-cach-thuong-thuc-chanh-leo-moi-la-moi-phu-nu-can-biet-167.html"><img src="{{ URL::asset('assets/upload/baiviet/5cachthuongthucchanhleomoilamoiphunucanbietpushchanhleo31481100861width473height315-7210_290x130.jpg') }}" alt="5 cách thưởng thức chanh leo mới lạ mọi phụ nữ cần biết."></a>
              <div class="dmtt">
                 <div class="tentt"><a href="5-cach-thuong-thuc-chanh-leo-moi-la-moi-phu-nu-can-biet">5 cách thưởng thức chanh leo mới lạ mọi phụ nữ cần biết.</a></div>
                 <div class="motatt"></div>
                 <div class="xemthem"><a href="tin-tuc/5-cach-thuong-thuc-chanh-leo-moi-la-moi-phu-nu-can-biet-167.html" title="5 cách thưởng thức chanh leo mới lạ mọi phụ nữ cần biết.">Xem thêm</a></div>
              </div>
              <div class="clear"></div>
           </div>
        </div>
        <div>
           <div class="cottt ">
              <a href="tin-tuc/tuyet-chieu-luoc-phan-nao-cua-heo-cung-trang-thom-ngon-gion-173.html"><img src="{{ URL::asset('assets/upload/baiviet/nhungtuyetchieuluocphannaocuaheocungtrangdep11482978201width600height400-9892_290x130.jpg') }}" alt="Tuyệt chiêu luộc phần nào của heo cũng trắng thơm, ngon giòn"></a>
              <div class="dmtt">
                 <div class="tentt"><a href="tuyet-chieu-luoc-phan-nao-cua-heo-cung-trang-thom-ngon-gion">Tuyệt chiêu luộc phần nào của heo cũng trắng thơm, ngon giòn</a></div>
                 <div class="motatt"></div>
                 <div class="xemthem"><a href="tin-tuc/tuyet-chieu-luoc-phan-nao-cua-heo-cung-trang-thom-ngon-gion-173.html" title="Tuyệt chiêu luộc phần nào của heo cũng trắng thơm, ngon giòn">Xem thêm</a></div>
              </div>
              <div class="clear"></div>
           </div>
        </div>
     </div>
     <div class="clear"></div>
  </div>
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

