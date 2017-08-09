@section('content')
<div class="block block_hero">
  <div class="row">
    @include('frontend.home.slider')
    @include('frontend.home.hot-news')
  </div>
</div><!-- /block_hero -->
@include('frontend.home.ads')  
@stop