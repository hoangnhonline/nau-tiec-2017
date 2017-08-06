@extends('frontend.layout')
@include('frontend.partials.meta')  
@section('content')
<?php $total = 0; ?>
<div class="block_pre_checkout">
	<h2 class="checkout-title" id="myModalLabel">
		ĐƠN HÀNG CỦA TÔI
		<span>(Đang có <strong class="order_total_quantity">{!! Session::get('products') ? array_sum(Session::get('products')) : 0 !!}</strong> sản phẩm)</span>
		<span><a class="empty_cart" onclick="return confirm('Quý khách có chắc chắn bỏ hết hàng ra khỏi giỏ?'); " href="{{ route('empty-cart') }}"><i class="fa fa-remove"></i>Làm trống giỏ hàng</a></span>
	</h2><!-- /checkout-title -->
	<div class="block shopcart-ct" id="cart-content">		
		<div class="cart-box row">
			<div class="col-md-8">
				<form action="#" method="POST" id="frm_order_items">
					<div class="table cart-tbl">
							<div class="table-row thead">
								<div class="table-cell no-col">&nbsp;</div>
								<div class="table-cell product-col">Sản phẩm</div>
								<div class="table-cell price-col t-r">Đơn giá (đ)</div>
								<div class="table-cell numb-col t-c">Số lượng</div>
								<div class="table-cell total-col t-r">Thành tiền (đ)</div>
							</div><!-- /table-row -->
							@if( $arrProductInfo->count() > 0)
							<?php $i = 0; ?>
		                  @foreach($arrProductInfo as $product)
		                  <?php $i++; ?>
		                  <?php $price = $product->is_sale ? $product->price_sale : $product->price; ?>
							<div class="tr-wrap">
								<div class="table-row clearfix">
									<div class="table-cell no-col"><span>{!! $i !!}</span></div><!-- /table-cell no-col -->
									<div class="table-cell product-col">
										<figure class="img-prod">
											<img alt="{!! $product->name !!}" src="{{ Helper::showImage($product['image_url']) }}">
										</figure>
										<a href="#" target="_blank" title="{!! $product->name !!}">{!! $product->name !!}</a>
									</div><!-- /table-cell product-col -->
									<div class="table-cell price-col t-r">{!! number_format($price) !!}</div><!-- /table-cell price-col t-r -->
									<div class="table-cell numb-col t-c">
										<select data-id="{{$product->id}}" class="change_quantity_payment form-control">
											@for($i = 1; $i <= 50; $i++ )
				                            <option value="{{$i}}"
				                            @if ($i == $getlistProduct[$product->id])
				                              selected
				                            @endif
				                            > {{$i}}
				                              @if($i == 50) + @endif
				                            </option>
				                            @endfor
										</select> 
									</div><!-- /table-cell numb-col t-c -->
									<?php 
									$total += $total_per_product = ($getlistProduct[$product->id]*$price);
									?>
									<div class="table-cell total-col t-r">{{ number_format($total_per_product)  }}</div><!-- /table-cell total-col t-r -->
								</div>									
							</div><!-- /tr-wrap -->
							@endforeach
							@endif

						</div><!-- /table cart-tbl -->
					
				</form>
			</div>
			<div class="col-md-4">
				<div class="checkout-box-col">
					<table class="total-tbl f-r">
							<tbody>
								<tr>
					                <td>Tổng tiền hàng:</td>
					                <td class="t-r">{!! number_format($total) !!} đ&nbsp;</td>
					            </tr>
					            <tr>
					                <td>Phí vận chuyển:</td>
					                <td class="t-r">
					                    <span class="ship_fee">0</span> đ
					                    <br>
					                </td>
					            </tr>						           
					            <tr class="all-total">
					                <td>Tổng số tiền:</td>
					                <td class="totalmn t-r">{!! number_format($total) !!} đ</td>
					            </tr>
					            @if( $arrProductInfo->count() > 0)
					            <tr>
					                <td colspan="2" class="t-r">
					                    Đã bao gồm VAT						                    
					                </td>
					            </tr>                    
					            @endif
					        </tbody>
						</table>						
				</div>
			</div>
		</div>
	</div><!-- /shopcart-ct -->
	<div class="block_checkout-frm">
		<form action="#" method="post" id="frm_order">
			<div class="msg-mn">Vui lòng điền thông tin đơn hàng này !</div>
			<div class="block row">
				<div class="block_customer-frm col-md-8">
					<div class="block_buy-frm">
						<p class="legend">Thông tin Quý Khách</p>
						<div class="filter-group">
							<div class="row-group clearfix">
								<div class="group-radio">
									<div class="radio-1">
                                        <input type="radio" name="gender" id="gender-male" class="gender" checked="checked" value="M">
                                        <label for="gender-male">Anh</label>
                                    </div>
                                    <div class="radio-1">
                                        <input type="radio" name="gender" id="gender-female" class="gender" value="F">
                                        <label for="gender-female">Chị</label>
                                    </div>
								</div>
								<input type="text" name="fullname" id="fullname" value="" placeholder="Họ và tên" class="fullname ip_precheck">
							</div><!-- /row-group -->
							<div class="row-group">
								<input type="text" name="phone" id="phone" value="" placeholder="Điện thoại liên hệ" class="phone ip_precheck">
							</div><!-- /row-group -->
							<div class="row-group">
                                <input type="text" name="email" id="email" value="" placeholder="Email (cần nhập email để nhận được thông tin đơn hàng từ An Nam)" class="email ip_precheck">
                            </div><!-- /row-group -->
                            <div class="row-group clearfix">
                            	<label class="titaddress"><i class="fa fa-location-arrow"></i>Địa chỉ, thời gian GIAO HÀNG NHANH</label>
                            	<div class="add_info row">
                            		<p class="col-sm-6 col-xs-6 city">
                                		<select class="ip_precheck sl-2" data-width="100%">
										 	<option value="" selected>Tỉnh, thành</option>
											<option value="1">TP. Hồ Chí Minh</option>
											<option value="2">Hà Nội</option>
											<option value="3">Đà Nẵng</option>
											<option value="4">An Giang</option>
											<option value="5">Bà Rịa-Vũng Tàu</option>
											<option value="6">Bạc Liêu</option>
											<option value="7">Bắc Cạn</option>
											<option value="8">Bắc Giang</option>
											<option value="9">Bắc Ninh</option>
											<option value="10">Bến Tre</option>
										</select>
                                	</p>
                                	<p class="col-sm-6 col-xs-6 district">
                                		<select class="ip_precheck sl-2" data-width="100%">
										 	<option value="" selected>Tỉnh, thành</option>
											<option value="1">TP. Hồ Chí Minh</option>
											<option value="2">Hà Nội</option>
											<option value="3">Đà Nẵng</option>
											<option value="4">An Giang</option>
											<option value="5">Bà Rịa-Vũng Tàu</option>
											<option value="6">Bạc Liêu</option>
											<option value="7">Bắc Cạn</option>
											<option value="8">Bắc Giang</option>
											<option value="9">Bắc Ninh</option>
											<option value="10">Bến Tre</option>
										</select>
                                	</p>
                            	</div>
                            </div><!-- /row-group -->
                            <div class="row-group">
                            	<input type="text" name="address" id="address" value="" placeholder="Số nhà - Tên đường" class="ip_precheck address">
                            </div><!-- /row-group -->
                            <div class="row-group">
                            	<textarea name="comment" id="comment" placeholder="Ghi chú khi giao hàng (vd: ngày, giờ giao hàng)" class="ip_precheck comment"></textarea>
                            </div><!-- /row-group -->
						</div>
					</div><!-- /block_buy-frm -->
				</div><!-- /block_customer-frm -->
				<div class="block_popup-buyfrm col-md-4">
					<div class="info-payment">
						<label class="titaddress"><i class="fa fa-money"></i>Hình thức thanh toán</label>
						<div class="item-group">
							<input id="bank_transfer" type="checkbox" name="bank_transfer" value="1">
							<label for="bank_transfer" class="lbl-rado">Chuyển khoản ngân hàng</label>
						</div>						
                        <div class="item-group cod-row">
                            <input id="cod_payment" type="checkbox" name="cod" value="1">
                            <label for="cod_payment" class="lbl-rado">COD - Nhận hàng trả tiền</label>
                        </div>
                        <div class="item-group">
                            <input id="combill" type="checkbox" name="combill" value="1">
                            <label for="combill" class="lbl-rado">Xuất hóa đơn Công ty</label>
                            <div class="sub-hide-box">
                                <p>
                                    <input class="ip_precheck" type="text" name="companyname" id="companyname" value="" placeholder="Tên Công ty">
                                </p>
                                <p>
                                    <input class="ip_precheck" type="text" name="companyadd" id="companyadd" value="" placeholder="Địa chỉ Công ty">
                                </p>
                                <p>
                                    <input class="ip_precheck" type="text" name="companytaxcode" id="companytaxcode" value="" placeholder="Mã số thuế">
                                </p>
                            </div>
                        </div>
					</div>					
				</div><!-- /block_popup-buyform -->
			</div>
			<div class="row block customer-frm">
                <div class="col-md-6 col-sm-6 checkout-wrap">
                    <input type="submit" name="" value="XÁC NHẬN ĐẶT HÀNG" class="btn-red sbm-checkout">
                </div>
                <div class="col-md-6 col-sm-6 callme-wrap">
                    <a href="javascript:;" class="btn btn-wht callme-now">PHỨC TẠP QUÁ!<span>GỌI LẠI CHO TÔI</span></a>
                </div>
            </div>
		</form>
	</div><!-- /block_checkout-frm -->
</div>
<style type="text/css">
	.pre_checkout .cart-link{
		display: block !important;
	}
</style>
@stop