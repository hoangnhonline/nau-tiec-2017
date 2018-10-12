@extends('frontend.layout')
@include('frontend.partials.meta')
@section('content')
<div class="container-right banggia1">
  	<div class="tieude"><h3 class="title">Sửa menu : {!! $menuDetail->name !!}</h3></div>
  		
	<div>
		<table class="table table-bordered">
			<tr>
				<th width="1%" style="white-space: nowrap;">STT</th>
				<th>Tên món</th>
				<th width="1%" style="text-align: right">Giá</th>
				<th width="1%"></th>				
			</tr>
			<?php $i = $totalPrice = 0; ?>
			@foreach($menuDetail->foodMenu as $food)
			<?php $i++; 
			$detailFood = DB::table('food')->where('id', $food->food_id)->first();
            $totalPrice+= $detailFood->price;
			?>
			<tr data-value="{{ $food->food_id }}" class="food">
				<td style="text-align: center"><span class="order">{{ $i }}</span></td>
				<td style="vertical-align: center">{!! $detailFood->name !!}</td>
				<td style="white-space: nowrap;">{!! number_format($detailFood->price) !!}
					<input type="hidden" class="fprice" value="{{ $detailFood->price}}">
					<input type="hidden" class="fprice" name="food_id[]" value="{{ $food->food_id }}">
				</td>
				<td>
					<button data-value="{{ $food->food_id }}" class="remove btn btn-sm btn-danger">Xóa</button>
				</td>
			</tr>	
			@endforeach
			<tr>
				<td colspan="2" style="text-align: right;font-size: 17px"><strong>Tổng tiền</strong></td>
				<td colspan="2" style="text-align: right"><strong id="total-price">{!! number_format($totalPrice) !!}</strong></td>
			</tr>
		</table>
		<div style="text-align: center;margin-top: 20px;margin-bottom: 15px;">
			<h3>DANH SÁCH MÓN</h3>
		</div>
		<div class="table-responsive">
		  <table cellpadding="10" cellspacing="10" width="100%" class="table-food table table-bordered">
		    	@foreach($foodTypeList as $foodType)
		    	<tr>
		    		<td colspan="2"><p class="food-type">{!! $foodType->name !!}</p></td>
		    	</tr>
			    	@if($foodType->foodGroup->count() > 0)
				    	@foreach($foodType->foodGroup as $group)
				    	<tr>
				    		<td colspan="2"><p class="food-group">{!! $group->name !!}</p></td>			    	
				    	</tr>
					    	@foreach($group->food as $food)

					    	<tr @if(in_array($food->id, $foodIdArr)) class="seleted" @endif>
					    		<td class="name_food"><p>{!! $food->name !!}</p></td>			    	
					    		<td class="price_food">
					    			@if($food->price > 0)					    			
						    			@if(!in_array($food->id, $foodIdArr))
	                                    <button type="button" class="btn btn-default noselect" data-value="{{ $food->price }}">{!! number_format($food->price) !!}</button>          
	                                    @else
	                                    <button type="button" class="btn btn-danger selected" data-value="{{ $food->price }}"><i class="fa fa-check-circle"></i> {!! number_format($food->price) !!}</button>          
	                                    @endif
					    			@endif
					    		</td>
					    	</tr>
					    	@endforeach
				    	@endforeach
			    	@else
			    		@foreach($foodType->food as $food)
				    	<tr @if(in_array($food->id, $foodIdArr)) class="seleted" @endif>
				    		<td class="name_food"><p>{!! $food->name !!}</p></td>			    	
				    		<td class="price_food">
				    			@if($food->price > 0)
				    				@if(!in_array($food->id, $foodIdArr))
                                    <button type="button" class="btn btn-default noselect" data-value="{{ $food->price }}">{!! number_format($food->price) !!}</button>          
                                    @else
                                    <button type="button" class="btn btn-danger selected" data-value="{{ $food->price }}"><i class="fa fa-check-circle"></i> {!! number_format($food->price) !!}</button>          
                                    @endif
				    			@endif
				    		</td>
				    	</tr>
				    	@endforeach
			    	@endif
		    	@endforeach
		  </table>
		</div>
	</div>
</div>
<style type="text/css">
	.food-type{
		    color: #39b54a;
		    font-size: 18px;		
		    padding: 10px;
		    font-weight: bold;
	}
	.food-group{
		    color: blue;
		    font-size: 15px;		   
		    padding: 10px;
		    font-weight: bold;
	}
	.price_food{
		text-align: right;
		width: 1%
	}
	tr.seleted{
		background-color: #ead0d0;
	}
	.price_food button{
		width: 95px;
	}
	#total-price{
		font-size: 17px;	
	}
</style>
@stop
@section('js')
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click', 'button.remove', function(){
			var obj = $(this);
			if(confirm('Quý khách chắc chắn xóa món này?')){
				obj.parents('tr.food').remove();
				setOrder();
				calTotalPrice();
			}
		});
	});
	function setOrder(){
		var i = 0;
		$('tr.food').each(function(){
			i++;
			$(this).find('.order').html(i);
		});
	}
	function calTotalPrice(){		
		var total = 0;
		$('tr.food').each(function(){
			
			total += parseInt($(this).find('.fprice').val());

		});
		$('#total-price').html(addCommas(total));

	}
	function addCommas(nStr) {
	  nStr += '';
	  x = nStr.split('.');
	  x1 = x[0];
	  x2 = x.length > 1 ? '.' + x[1] : '';
	  var rgx = /(\d+)(\d{3})/;
	  while (rgx.test(x1)) {
	  x1 = x1.replace(rgx, '$1' + ',' + '$2');
	  }
	  return x1 + x2;
	  }
</script>
@stop