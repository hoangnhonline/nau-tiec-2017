@extends('frontend.layout')
@include('frontend.partials.meta')
@section('content')
<div class="block block_breadcrumb">
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}" title="Trở về trang chủ">Trang chủ</a></li>       
        <li class="active">{{ $loaiDetail->name }}</li>
    </ol>
</div><!-- /block_breadcrumb -->
@include('frontend.home.ads')
<div class="block_categories row">
    @include('frontend.cate.sidebar')
    <div class="col-md-9 col-sm-9 col-xs-12 block_cate_right">                        
        <div class="block block_view">
            <span>Xem theo:</span>
            <ul class="block_content">
                <li class="active"><a href="">Mới nhất</a></li>
                <li><a href="#" title="Cũ nhất">Cũ nhất</a></li>
                <li><a href="#" title="Giá cao nhất">Giá cao nhất</a></li>
                <li><a href="#" title="Giá thấp nhất">Giá thấp nhất</a></li>
            </ul>
            <div class="block_status">
                <div class="pro-sts">
                    <a href="javascript:void(0);" class="dpl-status">
                        <span>Đang &amp; Sắp có hàng</span>
                    </a>
                    <ul>
                        <li><a href="#">Đang có hàng</a></li>
                        <li><a href="#">Sắp có hàng</a></li>
                        <li><a href="#">Đã hết hàng</a></li>
                        <li><a href="#">Tất cả</a></li>
                    </ul>
                </div>
            </div>
            <!-- <a href="#" onclick="return false;" class="filter-prod">Bộ lọc sản phẩm</a> -->
        </div><!-- /block_view_by -->
        <div class="block block_product">
            <h3 class="block_title block_title_link">
                {!! $loaiDetail->name !!}
                <span class="num">29</span>
            </h3>
            <div class="block_content row">
                <ul class="list">
                	@foreach( $productList as $product )
                    <li class="col-sm-3 col-xs-6 product_item">
                        <div class="item">
                            <a href="{{ route('product-detail', [$product->slug, $product->id]) }}" title="{!! $product->name !!}">
                                <div class="product_img">
                                    <img src="{{ $product->image_url ? Helper::showImageThumb($product->image_url) : URL::asset('admin/dist/img/no-image.jpg') }}" alt="{!! $product->name !!}" title="{!! $product->name !!}">
                                </div>
                                <div class="product_info">
                                  <h3 class="product_name">{!! $product->name !!}</h3>
                                  <div class="product_price">
                                  <span class="product_price_new">{{ $product->is_sale == 1 ? number_format($product->price_sale) : number_format($product->price) }}đ</span>
                                  @if($product->is_sale)
                                  <span class="product_price_old">{{ number_format($product->price) }}đ</span>
                                  @endif
                                </div>
                                @if($product->is_new)
                                <span class="new">NEW</span>
                                @endif
                                </div>
                                <div class="product_detail">
                                  <p class="name">{!! $product->name !!}</p>
                                        <div class="product_price">
                                  <span class="product_price_new">{{ $product->is_sale == 1 ? number_format($product->price_sale) : number_format($product->price) }}đ</span>
                                  @if($product->is_sale)
                                  <span class="product_price_old">{{ number_format($product->price) }}đ</span>
                                  @endif
                                </div>
                                @if( $loaiDetail->is_hover == 1)            
                                    @foreach($hoverInfo as $info)
                                    <?php 
                                    $tmpInfo = explode(",", $info->str_thuoctinh_id);              
                                    ?>

                                    <p>
                                    {{ $info->text_hien_thi}}: 
                                    <?php
                                    $tmp = DB::table('sp_thuoctinh')->where('product_id', $product->id)->select('thuoc_tinh')->first();            
                                    if( $tmp ){
                                        $spThuocTinhArr = json_decode( $tmp->thuoc_tinh, true);                 
                                    }
                                    $countT = 0; $totalT = count($tmpInfo);
                                    foreach( $tmpInfo as $tinfo){
                                        $countT++;
                                        if(isset($spThuocTinhArr[$tinfo])){
                                            echo $spThuocTinhArr[$tinfo];
                                            echo $countT < $totalT ? ", " : "";
                                        }
                                    }

                                     ?>                   
                                     </p>
                                    @endforeach
                                    
                                  @endif                    

                                </div>
                            </a>
                        </div>
                    </li><!-- /product_item -->        
                    @endforeach                              
                </ul>
            </div>
        </div><!-- /block_product -->
    </div><!-- /block_cate_right -->
</div><!-- /block_categories -->
@stop
@section('js')
<script>
    (function($) {
        "use strict";
        /*  [ Filter by price ]
        - - - - - - - - - - - - - - - - - - - - */
        $('#slider-range').slider({
            range: true,
            min: 0,
            max: 50000000,
            values: [0, 50000000],
            step : 2000000,
            slide: function (event, ui) {
                $('#amount-left').text(ui.values[0]);
                $('#pf').val(ui.values[0]);
                $('#amount-right').text(ui.values[1] );
                $('#pt').val(ui.values[1]);
            }
        });
        $('#amount-left').text($('#slider-range').slider('values', 0));        
        $('#amount-right').text($('#slider-range').slider('values', 1));
        
    })(jQuery);
    </script>
@stop