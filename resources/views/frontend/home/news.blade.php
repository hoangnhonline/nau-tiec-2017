<div class="spnoibat">
     <div class="tieude">
        <h3>Tin tức</h3>
     </div>
     <div class='owl-carousel'>
        @foreach($articlesListFooter as $articles)
        <div>
           <div class="cottt ">
              <a href="{{ route('news-detail', [$articles->slug, $articles->id]) }}"><img src="{{ Helper::showImage($articles->image_url) }}" alt="{!! $articles->title !!}"></a>
              <div class="dmtt">
                 <div class="tentt"><a href="{{ route('news-detail', [$articles->slug, $articles->id]) }}" title="{!! $articles->title !!}">{!! $articles->title !!}</a></div>
                 <div class="motatt"></div>
                 <div class="xemthem"><a href="{{ route('news-detail', [$articles->slug, $articles->id]) }}" title="{!! $articles->title !!}">Xem thêm</a></div>
              </div>
              <div class="clear"></div>
           </div>
        </div>
        @endforeach
     </div>
     <div class="clear"></div>
  </div>