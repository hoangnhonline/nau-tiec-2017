<!--<div class="container">
    <div class="row">
        <div class="col-sm-3 slider-left"></div>
        <div class="col-sm-9 header-top-right">
            <div class="homeslider">
                <div class="content-slide">
                    <?php 
                    $bannerArr = DB::table('banner')->where(['object_id' => 1, 'object_type' => 3])->orderBy('display_order', 'asc')->get();
                    ?>
                    @if($bannerArr)
                    <ul id="contenhomeslider">
                      @foreach($bannerArr as $banner)
                      <li>
                      @if($banner->ads_url !='')
                      <a href="{{ $banner->ads_url }}">
                      @endif
                      <img alt="Funky roots" src="{{ Helper::showImage($banner->image_url) }}" title="Funky roots">
                      @if($banner->ads_url !='')
                      </a>
                      @endif
                      </li>
                      @endforeach                        
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
-->
<div class="block_news_hot col-md-3 col-sm-3 col-xs-12">
      <h3 class="block_title">
        <a href="news.html" title="Xem thêm">
          Tin công nghệ
          <span>xem thêm...</span>
          <i style="background-image: url('{{ URL::asset('assets/images/ico-chicken.png') }}')" class="ic-event"></i>
        </a>
      </h3>
      <div class="block_content">
        <ul class="list">
          <li>
          <a href="#">
            <figure>
              <img src="{{ URL::asset('assets/images/news_hot/1.jpg') }}" alt="Apple đang làm giàu cho Samsung">
              <span><i class="fa fa-plus"></i></span>
            </figure>
            <h4>Apple đang làm giàu cho Samsung</h4>
            <span>08/07/2017</span>
          </a>
        </li>
        <li>
          <a href="#">
            <figure>
              <img src="{{ URL::asset('assets/images/news_hot/2.jpg') }}" alt="Apple đang làm giàu cho Samsung">
              <span><i class="fa fa-plus"></i></span>
            </figure>
            <h4>Apple đang làm giàu cho Samsung</h4>
            <span>08/07/2017</span>
          </a>
        </li>
        <li>
          <a href="#">
            <figure>
              <img src="{{ URL::asset('assets/images/news_hot/3.jpg') }}" alt="Apple đang làm giàu cho Samsung">
              <span><i class="fa fa-plus"></i></span>
            </figure>
            <h4>Apple đang làm giàu cho Samsung</h4>
            <span>08/07/2017</span>
          </a>
        </li>
        <li>
          <a href="#">
            <figure>
              <img src="{{ URL::asset('assets/images/news_hot/4.jpg') }}" alt="Apple đang làm giàu cho Samsung">
              <span><i class="fa fa-plus"></i></span>
            </figure>
            <h4>Apple đang làm giàu cho Samsung</h4>
            <span>08/07/2017</span>
          </a>
        </li>
        <li class="visible-xs-block">
          <a href="#">
            <figure>
              <img src="{{ URL::asset('assets/images/news_hot/5.jpg') }}" alt="Apple đang làm giàu cho Samsung">
              <span><i class="fa fa-plus"></i></span>
            </figure>
            <h4>Apple đang làm giàu cho Samsung</h4>
            <span>08/07/2017</span>
          </a>
        </li>
        <li class="visible-xs-block">
          <a href="#">
            <figure>
              <img src="{{ URL::asset('assets/images/news_hot/6.jpg') }}" alt="Apple đang làm giàu cho Samsung">
              <span><i class="fa fa-plus"></i></span>
            </figure>
            <h4>Apple đang làm giàu cho Samsung</h4>
            <span>08/07/2017</span>
          </a>
        </li>
        <li class="visible-xs-block">
          <a href="#">
            <figure>
              <img src="{{ URL::asset('assets/images/news_hot/7.jpg') }}" alt="Apple đang làm giàu cho Samsung">
              <span><i class="fa fa-plus"></i></span>
            </figure>
            <h4>Apple đang làm giàu cho Samsung</h4>
            <span>08/07/2017</span>
          </a>
        </li>
        <li class="visible-xs-block">
          <a href="#">
            <figure>
              <img src="{{ URL::asset('assets/images/news_hot/8.jpg') }}" alt="Apple đang làm giàu cho Samsung">
              <span><i class="fa fa-plus"></i></span>
            </figure>
            <h4>Apple đang làm giàu cho Samsung</h4>
            <span>08/07/2017</span>
          </a>
        </li>
        </ul>
      </div>
    </div><!-- /block_news_hot -->