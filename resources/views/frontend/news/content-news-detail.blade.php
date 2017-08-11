@include('frontend.partials.meta')
@section('content')
<div class="content-right banggia1">
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
@endsection
</div>