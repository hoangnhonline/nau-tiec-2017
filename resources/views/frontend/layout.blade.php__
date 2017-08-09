<!DOCTYPE html>
<html lang="vi">
<head>
	<title>@yield('title')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="robots" content="index,follow"/>
    <meta http-equiv="content-language" content="en"/>
    <meta name="description" content="@yield('site_description')"/>
    <meta name="keywords" content="@yield('site_keywords')"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
    <link rel="shortcut icon" href="@yield('favicon')" type="image/x-icon"/>
    <link rel="canonical" href="{{ url()->current() }}"/>        
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('site_description')" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:site_name" content="annammobile.com" />
    <?php $socialImage = isset($socialImage) ? $socialImage : $settingArr['banner']; ?>
    <meta property="og:image" content="{{ Helper::showImage($socialImage) }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="@yield('site_description')" />
    <meta name="twitter:title" content="@yield('title')" />        
    <meta name="twitter:image" content="{{ Helper::showImage($socialImage) }}" />
	<meta name="robots" content="noindex,nofollow" />
	<!-- <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon">
	<link rel="icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon"> -->
	<!-- ===== Style CSS ===== -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/style.css') }}">
	<!-- ===== Responsive CSS ===== -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/responsive.css') }}">

	<link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic&amp;subset=latin,vietnamese" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,800italic,400,700,800,300&amp;subset=latin,vietnamese" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700&amp;amp;subset=latin,vietnamese" rel="stylesheet" type="text/css">


	<!-- ===== Responsive CSS ===== -->
  	<!-- <link href="{{ URL::asset('assets/responsive.css') }}" rel="stylesheet"> -->

  	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<link href='{{ URL::asset('assets/animations-ie-fix.css') }}' rel='stylesheet'>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body {!! $routeName == 'payment' ? "class=pre_checkout" : '' !!}>

	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	
	<div class="wrapper">

		<header class="header-bar">
			<div class="container">
				<div class="row"></div>
			</div>
		</header><!-- /header -->

		<main class="main">
			<div class="container">
				@include('frontend.partials.header')

				@yield('content')
			</div>
		</main><!-- /main -->

		<footer class="footer">
			<div class="footer_top">
				<div class="container">
					<ul class="row block_bottom_menu">
	                    <li><a href="/">Trang chủ</a></li>
	                    <li><a href="/sitemap.html">Sơ đồ web</a></li>
	                    <li><a href="/quy-dinh-su-dung.html">Quy định sử dụng</a></li>          
	                    <li><a href="/kiem-tra-thong-tin-bao-hanh.html">Chính sách bảo hành</a></li>
	                    <li><a href="/gioi-thieu.html">Giới thiệu</a></li>
	                    <li><a href="/lien-he.html">Liên hệ</a></li>
	                    <li><a href="/huong-dan-dat-hang.html">Hướng dẫn đặt hàng</a></li>
	                    <li><a href="/tuyen-dung.html">Tuyển dụng</a></li>
	                    <li><a href="/quy-dinh-su-dung.html">Chính sách bảo mật</a></li>
					</ul><!-- /block_bottom_menu -->
				</div>
			</div><!-- /footer_top -->
			<div class="footer_bottom">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-sm-12 col-xs-12 block_copy">
							<a href="#" class="logo"><img src="{{ URL::asset('assets/images/logo_white.png') }}" alt=""></a>
							<div class="copyright">
                                <p>Công ty TNHH Công nghệ Di động An Nam - Q.1, TP.HCM</p>
                                <p>Email: contact@annam.vn</p>
                                <p>Chịu trách nhiệm quản lý nội dung: Hoàng Ngọc XX</p>
                                <p>Giấy phép số xx/GP-ICP-STTTT</p>
                                <p>Copyrights © 2012 Annam.vn. All Rights Reserved</p>
                            </div>
						</div><!-- /block_copy -->
						<div class="col-md-2 col-sm-3 col-xs-4 block_pay">
							<div class="block_payment"> 
                                <p>CHẤP NHẬN THANH TOÁN</p>
                            	<i class="fa fa-cc-visa"></i>
                            	<i class="fa fa-cc-mastercard"></i>
                            </div>
						</div><!-- /block_pay -->
						<div class="col-md-2 col-sm-3 col-xs-4 block_indus">
							<a href="http://online.gov.vn/CustomWebsiteDisplay.aspx?DocId=5895" target="_blank" class="block_industry">
                            	<img src="{{ URL::asset('assets/images/logo-bocongthuong.png') }}" alt="TMĐT">
                            </a>
						</div>
					</div>
				</div>
			</div><!-- /footer_bottom -->
		</footer><!-- /footer -->

		<a id="return-to-top" class="td-scroll-up" href="javascript:void(0)">
      		<i class="fa fa-angle-up" aria-hidden="true"></i>
    	</a><!-- Return To Top -->

    	<!-- Modal -->
		<div class="modal fade" id="scart_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content" id="short-cart-content">
				
				</div>
			</div>
		</div>
	</div><!-- /wrapper -->
	
	<input type="hidden" id="route-register-customer-ajax" value="{{ route('register-customer-ajax') }}">
	 <input type="hidden" id="route-register-newsletter" value="{{ route('register.newsletter') }}">
	 <input type="hidden" id="route-add-to-cart" value="{{ route('add-product') }}" />
	 <input type="hidden" id="route-payment" value="{{ route('payment') }}" />
	 <input type="hidden" id="route-short-cart" value="{{ route('short-cart') }}" />
	 <input type="hidden" id="route-update-product" value="{{ route('update-product') }}" />

	<!-- ===== JS ===== -->
	<script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
	<!-- ===== JS Bootstrap ===== -->
	<script src="{{ URL::asset('assets/lib/bootstrap/bootstrap.min.js') }}"></script>	<!-- ===== Plugins ===== -->
	
	<!-- carousel -->
	<script src="{{ URL::asset('assets/lib/carousel/owl.carousel.min.js') }}"></script>
	<!-- sticky -->
    
    
   	@if($routeName == 'home')
    <script src="{{ URL::asset('assets/js/plugins.min.js') }}"></script>
    <script src="{{ URL::asset('assets/lib/slick/slick.min.js') }}"></script>
    @endif
    <!-- Select2 --> 
    @if($routeName == 'product-detail')
	<script src="{{ URL::asset('assets/lib/bxslider/bxslider.min.js') }}"></script>
	<script src="{{ URL::asset('assets/lib/lightbox/js/lightbox.js') }}"></script>
	
	@endif
	<script src="{{ URL::asset('assets/lib/sticky/jquery.sticky.js') }}"></script>
    <!-- Slick -->    
    <script src="{{ URL::asset('assets/js/common.js') }}"></script>
    @if($routeName == 'home')
	<script src="{{ URL::asset('assets/js/home.js') }}"></script>	
	@endif
	<script src="{{ URL::asset('assets/js/general.js') }}"></script>	
	@if($routeName != 'product-detail')
	<script src="{{ URL::asset('assets/lib/select2/js/select2.min.js') }}"></script>
	<script type="text/javascript">
		function formatState (state) {
			if (!state.id) { return state.text; }
			var $state = $(
				'<span><img src="images/cart/color/' + state.element.value.toLowerCase() + '.jpg" class="img-flag" /> ' + state.text + '</span>'
			);
			return $state;
		};
		$(".js-example-templating").select2({
			templateResult: formatState
		});		
	</script>
	@endif
	<script type="text/javascript">
		$(document).ready(function(){
			 $.ajaxSetup({
			      headers: {
			          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			      }
			  });
		});
	</script>
	@yield('js')
</body>
</html>