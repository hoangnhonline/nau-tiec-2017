@include('frontend.partials.meta')
@section('content')
<div>
  <img src="{{ URL::asset('assets/images/quytrinh.jpg') }}" class="img-responsive" alt="banner">
</div>
<div class="content-right banggia1">
    <div class="col-md-9">
        <div class="tieude">
            <h3>Tin tức</h3>
        </div>
        <div id="tieude">
          <div><h2> {!! $detail->title !!}</h2></div>
        </div>
        <div class="date"><i class="fa fa-calendar" aria-hidden="true"></i> {!! date('d/m/Y H:i', strtotime($detail->created_at)) !!} - <i class="fa fa-eye" aria-hidden="true"> </i> 89</div>
        <div class="news-content">
            {!! $detail->content !!}
        </div>
        <div class="tieude"><h3>Các tin khác</h3></div>
        <div class="box-content">
          <ul>
          @foreach( $otherArr as $articles)
          <li class="col-sm-6" style="margin-bottom: 10px">                
              <div class="col-sm-5">
                <img src="{{ Helper::showImage($articles->image_url) }}" class="img-responsive img-thumbnail">
              </div>
              <div class="col-sm-7" style="padding-left: 0px;">
                  <a href="{{ route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id]) }}" title="{!! $articles->title !!}" style="text-decoration:none;"><span style="font-size:14px; color:#666;">{!! $articles->title !!}</span></a>
                  <p>
                    {!! $articles->description !!}
                  </p>
            </div>    
          </li>
                            
          @endforeach
        </ul>
        <div class="clearfix"></div>
        </div>
    </div>
    <div class="col-md-3 sidebar">
          <div class="block-sidebar block-news-sb">
            <div class="block-title">
              <p class="title">HOTLINE</p>
            </div>
            <div class="block-content hotline">
                <div class="wrap-news-list" style="padding-top: 15px;">
                    <p class="hotl"> 090 2425 068 ( A.Duy )</p>
                    <p class="hotl">0981 498 043 ( A.Dũng )</p>
                </div>
            </div>
          </div>

          <div class="block-sidebar block-news-sb">
            <div class="block-title">
              <p class="title">DANH MỤC</p>
            </div>
            <div class="block-content danhmuc">
                <div class="wrap-news-list">
                    <ul class="row product-list">
                      @foreach($tiecList as $articles)              
                      <li class="col-md-6 col-sm-6 col-xs-12">
                        <div class="icons">
                          <a href="{{ route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id]) }}" title="{!! $articles->title !!}">
                            <img style="width: 100%" src="{!! Helper::showImage($articles->image_url) !!}" alt="{!! $articles->title !!}">
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
            </div>
          </div>
          <div class="block-sidebar block-news-sb">
            <div class="block-title">
              <p class="title">TIN MỚI NHẤT</p>
            </div>
            <div class="block-content danhmuc">
                <div class="wrap-news-list">
                    <ul class="row product-list">
                      @foreach($lastestArr as $articles)              
                      <li class="col-xs-12">
                        <div class="icons">
                          <a href="{{ route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id]) }}" title="{!! $articles->title !!}">
                            <img style="width: 100%" src="{!! Helper::showImage($articles->image_url) !!}" alt="{!! $articles->title !!}">
                          </a>
                        </div>
                        <p class="lastest-title">
                          <a href="{{ route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id]) }}" title="{!! $articles->title !!}">
                          {!! $articles->title !!}
                          </a>
                        </p>       
                      </li>           
                      @endforeach         
                    </ul>
                </div>
            </div>
          </div>
    </div>
</div>
<style type="text/css">

</style>
@endsection