<div id="sliders">
	<!-- Place somewhere in the <body> of your page -->
	<div id="slider" class="flexslider">
	  <ul class="slides">
	    <li>
	      <img src="{{ URL::asset('assets/upload/hinhanh/851030260805617_1050x430.jpg') }}" alt="Bạn cần đặt tiệc gấp - Liên hệ ngay 0909 340 797 - 0969 156 575 (Anh Phong)"  title="Bạn cần đặt tiệc gấp - Liên hệ ngay 0909 340 797 - 0969 156 575 (Anh Phong)">
	    </li>
	    <li>
	      <img src="{{ URL::asset('assets/upload/hinhanh/514788675288178_1050x430.jpg') }}" alt="Bạn cần đặt tiệc gấp - Liên hệ ngay 0909 340 797 - 0969 156 575 (Anh Phong)"  title="Bạn cần đặt tiệc gấp - Liên hệ ngay 0909 340 797 - 0969 156 575 (Anh Phong)">
	    </li>
	    <li>
	      <img src="{{ URL::asset('assets/upload/hinhanh/178565249131446_1050x430.jpg') }}" alt="Bạn cần đặt tiệc gấp - Liên hệ ngay 0909 340 797 - 0969 156 575 (Anh Phong)"  title="Bạn cần đặt tiệc gấp - Liên hệ ngay 0909 340 797 - 0969 156 575 (Anh Phong)">
	    </li>
	    <li>
	      <img src="{{ URL::asset('assets/upload/hinhanh/469799659221213_1050x430.jpg') }}" alt="Bạn cần đặt tiệc gấp - Liên hệ ngay 0909 340 797 - 0969 156 575 (Anh Phong)"  title="Bạn cần đặt tiệc gấp - Liên hệ ngay 0909 340 797 - 0969 156 575 (Anh Phong)">
	    </li>
	    <li>
	      <img src="{{ URL::asset('assets/upload/hinhanh/096712954104955_1050x430.jpg') }}" alt="Bạn cần đặt tiệc gấp - Liên hệ ngay 0909 340 797 - 0969 156 575 (Anh Phong)"  title="Bạn cần đặt tiệc gấp - Liên hệ ngay 0909 340 797 - 0969 156 575 (Anh Phong)">
	    </li>
	    <!-- items mirrored twice, total of 12 -->
	  </ul>
	</div>	
</div>

	<section class=" bg-color dq-fix-icon" style="background-color: #f5f5f5;margin-top: -5px;">
		<div class="container">			
			<ul class="row product-list">
				@foreach($tiecList as $articles)							
				<li class="col-md-2 col-sm-4 col-xs-6">
					<div class="icon">
						<a href="{{ route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id]) }}" title="{!! $articles->title !!}">
							<img src="{!! Helper::showImage($articles->image_url) !!}" alt="{!! $articles->title !!}">
						</a>
					</div>
					<h5>
						<a href="{{ route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id]) }}" title="{!! $articles->title !!}">
						{!! $articles->title !!}
						</a>
					</h5>				
				</li>						
				@endforeach					
			</ul>
		</div>
	</section>
<div class="container" style="margin-top: 15px">
	<div id="carousel" class="flexslider">
	  <ul class="slides">
	    @foreach($menuList as $menu)      
	    		<?php $i = $totalPrice = 0; ?>
                  @foreach($menu->foodMenu as $food)
                  <?php $i++;
                  $detailFood = DB::table('food')->where('id', $food->food_id)->first();
                  $totalPrice+= $detailFood->price;
                  ?>                  
                  @endforeach
	    <li>  
	      <div class="item-wr3">
	        <div>
	          <div class="item-gia">{!! $menu->name !!}: <span> {!! number_format($totalPrice) !!} đồng/bàn</span></div>
	          <div class="clear"></div>
	          <div class="content">
	             <div class="hover3">
	                <div style="padding:5px">
	                <?php $cf = 0; ?>
	                   @foreach($menu->foodMenu as $food)
	                   <?php 
	                   $detailFood = DB::table('food')->where('id', $food->food_id)->first();
	                   ?>
	                   <?php $cf++; ?>
	                   <p><span style="color:red; font-size: 15px;font-weight: bold;">{{ $cf }}. </span><span style="color:#000010;font-weight:bold;font-size:15px">{!! $detailFood->name !!}</span></p>
	                   @endforeach
	                </div>
	             </div>
	              @if(!Session::get('username'))
	             <button class="btn btn-sm btn-info login-by-facebook-popup edit-menu">Sửa menu</button>
	             @else
	             <a href="{{ route('sua-menu', $menu->id)}}" class="btn btn-info btn-sm edit-menu">Sửa menu</a>
	             @endif
	          </div>
	        </div>
	      </div>    
	  	</li>
	      @endforeach    
	    <!-- items mirrored twice, total of 12 -->
	  </ul>
	</div>
</div>
<div class="spnoibat" style="margin-bottom: 30px"> 
       <div  class="row">
       	<div class="container">
       	<img class="img-responsive" src="{{ URL::asset('assets/images/quytrinh.jpg') }}" alt="alt" style="width: 100%">
       </div>
        </div>
     
   <div class="clear"></div>
</div>
<section class="awe-section-2">	
	<div class="section section-banner">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12 hidden-xs">
				<div class="box mg_mb mg_l_mb">
					<div class="block-video">
						<iframe width="100%" height="442" src="https://www.youtube.com/embed/QwpE4TIOVYM" frameborder="0" allowfullscreen id="load_video"></iframe>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="row">
					<div class="col-md-6 col-xs-6">
						<div class="box margin-bottom-15">
							<a href="#" title="dualeo-food">
								<img src="//bizweb.dktcdn.net/100/310/257/themes/673736/assets/banner_box_2.jpg?1537585127278" alt="alt">
							</a>
						</div>
					</div>
					<div class="col-md-6 col-xs-6">
						<div class="box margin-bottom-15">
							<a href="#" title="dualeo-food">
								<img src="//bizweb.dktcdn.net/100/310/257/themes/673736/assets/banner_box_3.jpg?1537585127278" alt="alt">
							</a>
						</div>
					</div>
				</div>
				<div class="box padding-top-5">
					<a href="#" title="dualeo-food">
						<img class="img-responsive" src="//bizweb.dktcdn.net/100/310/257/themes/673736/assets/banner_box_4.jpg?1537585127278" alt="alt">
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
</section>

<style type="text/css">
.edit-menu{
	position: absolute;
    right: 5px;
    bottom: 5px;

}
img {
    border: 0 none;
    max-width: 100%;
    height: auto;
}
.flexslider{
	margin: 0 0 10px;
}
.section-banner img{
	width: 100%;
}
	.icon ~ h5, .icon2 ~ h5 {
	    line-height: 25px;
	}
	.dq-fix-icon .product-list li:nth-child(1) .icon {
    background: #82bf00;
}
.padding-top-5 {
    padding-top: 5px !important;
}
.dq-fix-icon .icon {
    align-items: center;
    justify-content: center;
    font-size: 42px;
    height: 125px;
    width: 130px;
    display: inline-flex;
    margin-top: 20px;
}
.icon, .icon2 {
    position: relative;
    display: inline-block;
    font-size: 65px;
    text-align: center;
    color: #fff;
    background: #82bf00;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    overflow: hidden;
}
.icon+*, .icon2+* {
    margin-top: 10px;
}
ul.product-list {
    list-style: none outside;
}
ul.product-list li{
	text-align: center;
	}
	h5{
    color: #737e95;
    letter-spacing: .01em;
    font-weight: 700;
}
h5:hover{
    color: #82bf00;
}
</style>
<script type="text/javascript">
	$(window).load(function() {
	  $('#slider').flexslider({
	    controlNav: false,
	    animationLoop: true,
	    slideshow: true,
		slideshowSpeed: 5000,    
	    animation: "slide",
	  });
	  $('#carousel').flexslider({
	    animation: "slide",
	    controlNav: false,
	    animationLoop: true,
	    slideshow: true,
	    slideshowSpeed: 4000,
	    itemWidth: 294,
	    itemMargin: 5,	  
	  });
	});
</script>