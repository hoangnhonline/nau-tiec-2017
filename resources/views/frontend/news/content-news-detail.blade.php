@include('frontend.partials.meta')
@section('content')
<div>
  <img src="{{ URL::asset('assets/images/quytrinh.jpg') }}">
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
          @foreach( $otherArr as $articles)
            <div style="padding-left:10px; height:auto;">
              <a href="{{ route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id]) }}" title="{!! $articles->title !!}" style="text-decoration:none;"><img src="{{ URL::asset('assets/images/sao.png') }}" border="0"  alt="{!! $articles->title !!}">&nbsp;&nbsp;<span style="font-size:14px; color:#666;">{!! $articles->title !!}</span></a>
            </div>                
          @endforeach
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
    </div>
</div>
<style type="text/css">
.sidebar{
  padding-top: 20px;
}
.block-sidebar {
    margin-bottom: 20px;
}
.block-sidebar .block-title .title {
    font-size: 15px;
    color: #82bf00;
    padding-bottom: 5px;
    border-bottom: 1px solid #82bf00;
    font-weight: bold;
    text-transform: uppercase;
}
.hotl {
  color: #ca0808;
  font-size: 17px;
  font-weight: bold;
}
div.hotline{
  text-align: center;
}
.icons{
      position: relative;
    display: inline-block;    
    text-align: center;    
    overflow: hidden;
}
.danhmuc h5{
  margin-top: 5px;
}
.danhmuc h5 a:hover{
  color: #82bf00
}
#tieude h2{
  margin-bottom: 15px;
  font-size:  22px;
}
.date{margin-bottom: 15px;}
</style>
@endsection