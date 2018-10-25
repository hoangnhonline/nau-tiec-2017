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
	
	  <ul class="slides">
	    @foreach($menuList as $menu)      
	    		<?php $i = $totalPrice = 0; ?>
                  @foreach($menu->foodMenu as $food)
                  <?php $i++;
                  $detailFood = DB::table('food')->where('id', $food->food_id)->first();
                  $totalPrice+= $detailFood->price;
                  ?>                  
                  @endforeach
	    <li class="col-md-4 col-sm-6" style="padding: 10px">  
	      <div class="item-wr3">
	        <div>
	          <div class="item-gia">{!! $menu->name !!}: <span> {!! number_format($totalPrice) !!} đồng/bàn</span></div>
	          <div>
	          	<img src="{{ Helper::showImage($menu->image_url) }}" class="img-responsive">
	          </div>
	          <div class="content">
	             <div class="hover3">
	                <div style="padding:5px">
	                <?php $cf = 0; ?>
	                   @foreach($menu->foodMenu as $food)
	                   <?php 
	                   $detailFood = DB::table('food')->where('id', $food->food_id)->first();
	                   ?>
	                   <?php $cf++; ?>
	                  	<div class="row">
	                   	<div class="col-xs-7 food-name"><span style="color:red; font-size: 15px;">{{ $cf }}. </span><span style="color:#000010;font-size:15px">{!! $detailFood->name !!}</span>
	                   	</div>
	                   	<div class="col-xs-3 food-price" style="text-align: right;">{!! number_format($detailFood->price) !!}</div>
	                   	<div class="col-xs-2" style="text-align: right">
	                   		<label class="item-select-label" for="item-{{ $menu->id }}-{{ $detailFood->id }}">
                                <input class="item-select-input noselect" id="item-{{ $menu->id }}-{{ $detailFood->id }}" type="checkbox" data-id="{{ $detailFood->id }}"  data-value="{{ $detailFood->price }}" data-name="{!! $detailFood->name !!}">
                            </label>
	                   	</div>
	                  	</div>
	                   @endforeach
	                </div>
	             </div>	             
	          </div>
	        </div>
	      </div>    
	  	</li>
	      @endforeach    
	    <!-- items mirrored twice, total of 12 -->
	  </ul>
	
</div>
<section class="awe-section-2">	
	<div class="section section-banner">
		<div class="container">
			<div class="tieude">
      <h3>Danh sách món</h3>
   </div>
			@foreach($foodTypeList as $foodType)
			<div class="panel-group">
			    <div class="panel panel-default">
			      <div class="panel-heading" style="background-color: #82bf00; color: #FFF; font-weight: bold">
			        <h4 class="panel-title">
			          <a data-toggle="collapse" href="#collapse{!! $foodType->slug !!}">{!! $foodType->name !!}</a>
			        </h4>
			        @if($foodType->foodGroup->count() > 0)
			        <ul class="list-group-mon">
					    	@foreach($foodType->foodGroup as $group)
					    	
					    		<li style="display: inline;"><a style="color: #FFF" href="#mon{{ $group->slug }}">{!! $group->name !!}</a> | </li>
					    
					    	@endforeach
					    		</ul>
					 @endif
			      </div>
			      <div id="collapse{!! $foodType->slug !!}" class="panel-collapse">
			        <div class="panel-body" style="max-height: 400px;overflow-y: scroll;">
			        	<table class="table table-bordered">
			        		@if($foodType->foodGroup->count() > 0)
					    	@foreach($foodType->foodGroup as $group)
					    	<tr id="mon{{$group->slug}}" style="color: #82bf00;font-weight: bold;text-transform: uppercase;">
					    		<td colspan="3"><p class="food-group" style="text-align: center;">{!! $group->name !!}</p></td>			    	
					    	</tr>
						    	@foreach($group->food as $food)

						    	<tr>
						    		<td class="name_food"><p>{!! $food->name !!}</p></td>			    	
						    		<td class="price_food food-price" style="width: 1%;white-space: nowrap;">
						    			@if($food->price > 0)
		                                    {!! number_format($food->price) !!} 
						    			@endif
						    		</td>
						    		<td style="width: 1%">
						    			@if($food->price > 0)
						    			<input class="item-select-input noselect" id="items-{{ $group->id }}-{{ $food->id }}" type="checkbox" data-id="{{ $food->id }}"  data-value="{{ $food->price }}" data-name="{!! $food->name !!}">
						    			@endif
						    		</td>
						    	</tr>
						    	@endforeach
					    	@endforeach
				    	@else
				    		@foreach($foodType->food as $food)
					    	<tr>
					    		<td class="name_food"><p>{!! $food->name !!}</p></td>			    	
					    		<td class="price_food food-price"  style="width: 1%;white-space: nowrap;">
					    			@if($food->price > 0)
					    				
	                                    {!! number_format($food->price) !!}         
	                                    
					    			@endif
					    		</td>
					    		<td style="width: 1%">
					    			@if($food->price > 0)
						    			<input class="item-select-input noselect" id="items-{{ $food->id }}-{{ $food->id }}" type="checkbox" data-id="{{ $food->id }}"  data-value="{{ $food->price }}" data-name="{!! $food->name !!}">
						    			@endif
					    		</td>
					    	</tr>
					    	@endforeach
				    	@endif
			        	</table>
			        </div>	        
			      </div>
			    </div>
			</div>
			@endforeach
		</div>
	</div>
</section>
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