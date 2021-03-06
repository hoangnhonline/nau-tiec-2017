<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h2 class="modal-title" id="myModalLabel">
	<i class="fa fa-shopping-cart"></i> GIỎ HÀNG CỦA TÔI
	<span>(Đang có <strong class="order_total_quantity"><?php echo Session::get('products') ? array_sum(Session::get('products')) : 0; ?></strong> sản phẩm)</span>
	<?php if(!empty(Session::get('products'))): ?>
	<span><a href="<?php echo e(route('empty-cart')); ?>" class="empty_cart" onclick="return confirm('Quý khách có chắc chắn bỏ hết hàng ra khỏi giỏ?'); " ><i class="fa fa-remove"></i>Làm trống giỏ hàng</a></span>
	<?php endif; ?>
</h2>
</div>
<?php 
$total = 0;
?>
	<div class="modal-body">
		<div class="shopcart-ct">
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
							<?php if( $arrProductInfo->count() > 0): ?>
							<?php $i = 0; ?>
		                  <?php foreach($arrProductInfo as $product): ?>
		                  <?php $i++; ?>
		                  <?php $price = $product->is_sale ? $product->price_sale : $product->price; ?>
							<div class="tr-wrap">
								<div class="table-row clearfix">
									<div class="table-cell no-col"><span><?php echo $i; ?></span></div><!-- /table-cell no-col -->
									<div class="table-cell product-col">
										<figure class="img-prod">
											<img alt="<?php echo $product->name; ?>" src="<?php echo e(Helper::showImage($product['image_url'])); ?>">
										</figure>
										<a href="#" target="_blank" title="<?php echo $product->name; ?>"><?php echo $product->name; ?></a>
									</div><!-- /table-cell product-col -->
									<div class="table-cell price-col t-r"><?php echo number_format($price); ?></div><!-- /table-cell price-col t-r -->
									<div class="table-cell numb-col t-c">
										<select data-id="<?php echo e($product->id); ?>" class="change_quantity form-control">
											<?php for($i = 1; $i <= 50; $i++ ): ?>
				                            <option value="<?php echo e($i); ?>"
				                            <?php if($i == $getlistProduct[$product->id]): ?>
				                              selected
				                            <?php endif; ?>
				                            > <?php echo e($i); ?>

				                              <?php if($i == 50): ?> + <?php endif; ?>
				                            </option>
				                            <?php endfor; ?>
										</select> 
									</div><!-- /table-cell numb-col t-c -->
									<?php 
									$total += $total_per_product = ($getlistProduct[$product->id]*$price);
									?>
									<div class="table-cell total-col t-r"><?php echo e(number_format($total_per_product)); ?></div><!-- /table-cell total-col t-r -->
								</div>									
							</div><!-- /tr-wrap -->
							<?php endforeach; ?>
							<?php endif; ?>

						</div><!-- /table cart-tbl -->
						
					</form>
				</div>
				<div class="col-md-4">
					<div class="checkout-box-col">
						<table class="total-tbl f-r">
							<tbody>
								<tr>
					                <td>Tổng tiền hàng:</td>
					                <td class="t-r"><?php echo number_format($total); ?> đ&nbsp;</td>
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
					                <td class="totalmn t-r"><?php echo number_format($total); ?> đ</td>
					            </tr>
					            <?php if( $arrProductInfo->count() > 0): ?>
					            <tr>
					                <td colspan="2" class="t-r">
					                    Đã bao gồm VAT						                    
					                </td>
					            </tr>                    
					            <?php endif; ?>
					        </tbody>
						</table>
						<div class="f-r chck-out-btn">
							<?php if( $arrProductInfo->count() > 0): ?>
				            <a href="<?php echo route('payment'); ?>" class="checkout-btn">THANH TOÁN</a>
				            <a href="javascript:;" class="keep-buying">Hoặc tiếp tục mua hàng</a>
				            <?php endif; ?>
				        </div>
					</div>
				</div>
			</div>
		</div>
	</div>