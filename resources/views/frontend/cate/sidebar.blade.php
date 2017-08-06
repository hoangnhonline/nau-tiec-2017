<form action="{!! route('search') !!}" method="GET">
<div class="col-md-3 col-sm-3 col-xs-12 block_cate_left" style="padding-bottom:30px">
    <div class="block block_modul">
        <div class="block_price">
            <h3 class="block_title">Khoảng giá</h3>
            <div class="block_content clearfix">
                <div class="slider-range">
                    <div id="slider-range"></div>
                    <div class="action clearfix">
                        <span id="amount-left"></span>
                        <span id="amount-right"></span>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /block_modul -->
    @if($routeName != 'search')
    <div class="block block_modul">
        <div class="block_brands">
            <div class="box-accordion in">
                <div class="box-header accordion-header">
                    <h3 class="block_title">Hãng {{ $loaiDetail ? $loaiDetail->name : "" }}</h3>
                    <a href="javascript:void(0);" class="btn-opened" title="Down Up"></a>
                </div>
                <div class="box-collapse">
                    <div class="block_content">
                        <ul class="clearfix">
                            @foreach( $cateArrByLoai[$loaiDetail->id] as $cate)
                            <li>
                                <input type="checkbox" name="brand[]" value="{!! $cate->id !!}" id="brand-{!! $cate->id !!}"> 
                                <label for="brand-{!! $cate->id !!}" title="{!! $cate->name !!}">{!! $cate->name !!}
                                    <span class="number-prod">4</span>
                                </label>                            
                            </li>
                            @endforeach
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- /block_brands -->
    </div><!-- /block_modul -->
    @else
    @foreach($loaiSpList as $loaiSp)
    <div class="block block_modul">
        <div class="block_brands">
            <div class="box-accordion in">
                <div class="box-header accordion-header">
                    <h3 class="block_title">{!! $loaiSp->name !!}</h3>
                    <a href="javascript:void(0);" class="btn-opened" title="Down Up"></a>
                </div>
                <div class="box-collapse">
                    <div class="block_content">
                        <ul class="clearfix">
                            @foreach( $cateArrByLoai[$loaiSp->id] as $cate)
                            <li>
                                <input type="checkbox" name="brand[]" value="{!! $cate->id !!}" id="brand-{!! $cate->id !!}"> 
                                <label for="brand-{!! $cate->id !!}" title="{!! $cate->name !!}">{!! $cate->name !!}
                                    <span class="number-prod">4</span>
                                </label>                            
                            </li>
                            @endforeach                           
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- /block_brands -->
    </div><!-- /block_modul -->
    @endforeach
    @endif
    <div class="block block_modul" >
        <div class="block_colors">
            <div class="box-accordion in">
                <div class="box-header accordion-header">
                    <h3 class="block_title">MÀU SẮC</h3>
                    <a href="javascript:void(0);" class="btn-opened" title="Down Up"></a>
                </div>
                <div class="box-collapse">
                    <div class="block_content">
                        <ul class="search-color">
                            <li class="active"><a href="#" style="background:#363636;"></a></li>
                            <li><a href="#" style="background:#f26c4f;"></a></li>
                            <li><a href="#" style="background:#7da7d9;"></a></li>
                            <li><a href="#" style="background:#9e0b0f;"></a></li>
                            <li><a href="#" style="background:#fff200;"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- /block_colors -->
    </div><!-- /block_modul -->
</div><!-- /block_cate_left -->
</form>