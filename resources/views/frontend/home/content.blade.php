@section('content')
<div class="block block_hero">
  <div class="row">
    @include('frontend.home.slider')
    @include('frontend.home.hot-news')
  </div>
</div><!-- /block_hero -->
@include('frontend.home.ads')  
@foreach( $loaiSpList as $loaiSp)
<div class="block block_product">
  <h3 class="block_title">
    <span>{!! $loaiSp->name !!}</span>
  </h3>
  <div class="block_content row">
    <ul class="list">
      @foreach( $productArr[$loaiSp->id] as $product )
      <li class="col-sm-5ths col-xs-6 product_item">
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
            @if( $loaiSp->is_hover == 1)            
                @foreach($hoverInfo[$loaiSp->id] as $info)
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
@endforeach
@stop