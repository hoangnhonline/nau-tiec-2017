<!DOCTYPE html>
<html lang="vi">
   <head>
      <title>@yield('title')</title>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
      <meta name="robots" content="index,follow"/>
      <meta http-equiv="content-language" content="en"/>
      <meta name="description" content="@yield('site_description')"/>
      <meta name="keywords" content="@yield('site_keywords')"/>
      <link rel="shortcut icon" href="@yield('favicon')" type="image/x-icon"/>
      <link rel="canonical" href="{{ url()->current() }}"/>
      <meta property="og:locale" content="vi_VN" />
      <meta property="og:type" content="website" />
      <meta property="og:title" content="@yield('title')" />
      <meta property="og:description" content="@yield('site_description')" />
      <meta property="og:url" content="{{ url()->current() }}" />
      <meta property="og:site_name" content="tiecngon.vn" />
      <?php $socialImage = isset($socialImage) ? $socialImage : $settingArr['banner']; ?>
      <meta property="og:image" content="{{ Helper::showImage($socialImage) }}" />
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <meta name="twitter:card" content="summary" />
      <meta name="twitter:description" content="@yield('site_description')" />
      <meta name="twitter:title" content="@yield('title')" />
      <meta name="twitter:image" content="{{ Helper::showImage($socialImage) }}" />
      <meta name="robots" content="index,follow" />
      <link href="{{ URL::asset('assets/js/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
      <!-- <link rel="stylesheet" href="{{ URL::asset('assets/css/reset.css') }}"> -->
      <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">
      <link rel="stylesheet" href="{{ URL::asset('assets/plugin/font-awesome/font-awesome.min.css') }}">
      <!-- <link href="{{ URL::asset('assets/css/media.css') }}" rel="stylesheet" type="text/css" /> -->
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,greek-ext,cyrillic-ext,vietnamese,greek' rel='stylesheet' type='text/css'>
      <script language="javascript" type="text/javascript" src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
      <script language="javascript" type="text/javascript" src="{{ URL::asset('assets/js/bootstrap/bootstrap.min.js') }}"></script>
      <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/jqueryslidemenu.css') }}">
      <script src="{{ URL::asset('assets/js/jqueryslidemenu.js') }}" type="text/javascript"></script>
      <link rel="stylesheet" href="{{ URL::asset('assets/css/owl.carousel.min.css') }}" />
      <link rel="stylesheet" href="{{ URL::asset('assets/css/owl.theme.default.min.css') }}" />
      <script src="{{ URL::asset('assets/js/owl.carousel.js') }}"></script>
      <!-- slick -->
      <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/slick.css') }}"/>
      <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/slick-theme2.css') }}"/>
      <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/sweetalert2.min.css') }}"/>
      <script type="text/javascript" src="{{ URL::asset('assets/js/slick.min.js') }}"></script>
      <!-- Add mousewheel plugin (this is optional) -->
      <script type="text/javascript" src="{{ URL::asset('assets/js/jquery.mousewheel-3.0.6.pack.js') }}"></script>
      <!-- Add fancyBox main JS and CSS files -->
      <script type="text/javascript" src="{{ URL::asset('assets/js/jquery.fancybox.js') }}?v=2.1.5"></script>
      <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/jquery.fancybox.css') }}?v=2.1.5" media="screen" />
      <!-- Add Flexslider main JS and CSS files -->
      <script type="text/javascript" src="{{ URL::asset('assets/js/FlexSlider/jquery.flexslider-min.js') }}"></script>
      <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/js/FlexSlider/flexslider.css') }}" media="screen" />
      <script type="text/javascript">
        jQuery(document).ready(function() {
          jQuery(".fancybox").fancybox();
          jQuery(".various3").fancybox({
            'width'             : '70%',
            'height'            : '60%',
            'autoScale'         : false,
            'transitionIn'      : 'none',
            'transitionOut'     : 'none',
            'type'              : 'iframe'
          });  
          $('.content iframe').each(function(index, el) {
            $(this).wrap( "<div class='video-container'></div>" );
          });
            $('.content table').each(function(index, el) {
            $(this).wrap( "<div class='table-responsive'></div>" );
          });           
        });
      </script>
      <script type="text/javascript">
         $(document).ready(function() {
             $('body').append('<div id="top" ></div>');
             $(window).scroll(function() {
                 if($(window).scrollTop() > 100) {
                     $('#top').fadeIn();
                 } else {
                     $('#top').fadeOut();
                 }
             });
             $('#top').click(function() {
                 $('html, body').animate({scrollTop:0},500);
             });
         
         
         });
      </script>
      <link type="text/css" rel="stylesheet" href="{{ URL::asset('assets/css/jquery.mmenu.all.css') }}" />
      <script type="text/javascript" src="{{ URL::asset('assets/js/jquery.mmenu.min.all.js') }}"></script>   
      <script type="text/javascript">
         $(document).ready(function() {
             $('nav#menu').mmenu();
             });
      </script>
      <script type="text/javascript">
         $(document).ready(function(){
             $('a.add_to_basket').click(function(){
                 var pid=$(this).attr('rel');
                  $.ajax({
                   type: "POST",
                   url: "ajax/add_giohang.php",
                   data: "pid="+pid,
                   dataType: 'json',
                   success:function(data){
                         alert('Đưa vào giỏ hàng thành công');
                         $('.count_cart').html(data.count);
                     }
                 });
             });
         
         });
      </script>  
      <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyAL928AIsIDYz9oUb-ILO5LTe_7MQnVgDA"></script>
      <link rel="stylesheet" href="{{ URL::asset('assets/css/animate.css') }}">
      <script src="{{ URL::asset('assets/js/wow.min.js') }}"></script>
      <script> new WOW().init(); </script>
      <script src="{{ URL::asset('assets/js/lucid.js') }}"></script>
      <script src="{{ URL::asset('assets/js/sweetalert2.min.js') }}"></script>
      <input type="hidden" id="route-newsletter" value="{{ route('register.newsletter') }}">
      <input type="hidden" id="fb_redirect_url" value="{{ route('home') }}">
   </head>
   <body>
      @include('frontend.partials.header')
      <div id="menu">
         <div class="wrapper container">
            <div class="menu">
              <div class="nav-toogle">
                <i class="fa fa-bars"></i>
              </div>
              <ul class="nav-menu">
                <li  @if($routeName == 'home') class="active" @endif><a href="{{ route('home') }}">Trang chủ </a></li>
                
                <li class="{{ (!isset($pageDetail) && $routeName == 'parent-cate') || $routeName == 'dich-vu' ? 'active' : '' }} parent">
                   <a href="javascript:;">Menu</a>
                   <ul class="submenu">                            
                      @foreach($articlesCateList as $cate)
                      <li class="parent" style="border-bottom:1px dashed #c4c4c4;">
                         <a href="{{ route('parent-cate', $cate->slug) }}">{!! $cate->name !!}</a>
                         <ul class="submenu">
                            @foreach($cate->articles as $value)
                            <li style="border-bottom:1px dashed #c4c4c4;"><a  href="{{ route('dich-vu', [$value->slug, $value->id]) }}" title="{!! $value->title !!}">{!! $value->title !!}</a></li>
                            @endforeach
                         </ul>
                      </li>
                      @endforeach                         
                   </ul>
                </li>
                <li class="{{ $routeName == 'menu-custom' ? 'active' : '' }}"><a href="{{ route('menu-custom')}}">Món</a></li>
                </li>
                <li class="{{ $routeName == 'menu-custom' ? 'active' : '' }}"><a href="{{ route('menu-custom')}}">Dịch vụ</a></li>
                </li>
                <li data-url="{{ route('tao-menu') }}" class="{{ $routeName == 'tao-menu' ? 'active' : '' }} @if(!Session::get('userId')) login-by-facebook-popup @endif"><a @if(Session::get('userId')) href="{{ route('tao-menu')}}" @else href="javascript:void(0);"  @endif>Tạo menu</a></li>
                </li>
                <li class="{{ $routeName == 'news-list' || $routeName == 'news-detail' ? 'active' : '' }}"><a href="{{ route('news-list', 'khuyen-mai') }}">Khuyến mãi</a></li>
                <li class="{{ $routeName == 'contact' ? 'active' : '' }}"><a href="{{ route('contact') }}">Liên hệ</a></li>
                <li class="search-mb"><i class="fa fa-search"></i></li>
              </ul>
              <div class="search">                 
                 <div id="search">
                    <div class='txtsrch'>
                        <form action="{{ route('search') }}" method="GET" >
                          <input type="text" class="txtsearch" id="txtSearch" name="keyword" value="{!! isset($tu_khoa) ? $tu_khoa : "" !!}" placeholder="Tìm kiếm ..." />    
                        </form>                      
                      </div>
                    <div class='btnsrch'><i class="fa fa-search"></i></div>
                    <div class="clear"></div>
                 </div>
              </div>
            </div>
         </div>
         <script type="text/javascript" src="{{ URL::asset('assets/js/jquery.lockfixed.min.js') }}"></script>
         <script type="text/javascript">
            $(document).ready(function() {
              $.lockfixed("#menu_lock",{offset: {top: 0, bottom:0}});
            });
         </script>
         <div class="clear"></div>
      </div>
      @yield('slider')
      <div id="content">
         <div class="container">
            <div class="row">
              <div id="content_right" class="col-sm-12 col-xs-12">         
                 <!-- end -->
                 <script src="{{ URL::asset('assets/js/parallax.js') }}"></script>
                 <div class="content-right">
                    @yield('content')
                 </div>               
              </div>
            </div>
            <div class="clear"></div>
         </div>
      </div>
      <div class="clear"></div>
      <div class="bottom">
      </div>
      @include('frontend.partials.footer')
      <a id="return-to-top" class="td-scroll-up" href="javascript:void(0)">
        <i class="fa fa-angle-up" aria-hidden="true"></i>
      </a><!-- Return To Top -->
        <input type="hidden" id="route-ajax-login-fb" value="{{route('ajax-login-by-fb')}}">
    <input type="hidden" id="fb-app-id" value="{{ env('FACEBOOK_APP_ID') }}">
      <input type="hidden" id="url_fb_redirect" value="{{ route('home') }}">
      <div class="menu-select">
    <div class="wrapper-menu-select">
        <div class="wrapper-form">
            <div class="form-header"> <span> <span class="icon-item"><i class="fa fa-align-justify"></i></span> MENU TỰ CHỌN </span> &nbsp;                
                <button id="close-all-menu" class="btn btn-sm">Bỏ chọn</button> <span class="action-right"> <span class="total-item">0</span> </span>
                <a class="form-close" href="javascript:void(0);"> <i class="fa fa-times"></i> </a>
            </div>
            <div class="form-body">
                <ul class="wrapper-body">
                    <li>
                        <div class="alert alert-warning"> <strong> <i class="icofont icofont-mega-phone"></i> </strong> Vui lòng chọn món từ danh sách các thực đơn.</div>
                    </li>
                </ul>
            </div>
            <div class="form-footer"> <span> <button data-toggle="modal" data-target="#bookingModal" class="btn btn-danger btn-sm">Đặt món</button> </span> <span class="footer-label">Tổng:</span> <span class="total-price">0</span> <span class="footer-label">đ</span></div>
        </div>
    </div>
    <a class="toggle-menu-select" href="javascript:void(0);"> <span class="count-item-food">0</span> <i class="fa fa-align-justify"></i> Chọn </a>
</div>
      <style type="text/css">
        .header{
            background:url({{ URL::asset('assets/upload/hinhanh/1-8460.jpg') }});background-size:cover;box-sizing: border-box;    padding:5px 0px;
        }
        #menu{
          background-color: #82bf00;
        }
        .tt_gt h3 {
          padding: 10px;
          background: url({{ URL::asset('assets/upload/hinhanh/brleft.png') }}) no-repeat;
        }
        .tieude_mn {
            background: url({{ URL::asset('assets/upload/hinhanh/brlist.png') }}) repeat-x;
        }
        .moudle-left ul li a {
  
            background: url({{ URL::asset('assets/upload/hinhanh/brlist.png') }}) repeat-x;
          }
          .moudle-left ul li a:after {

          background: url({{ URL::asset('assets/upload/hinhanh/check1.png') }});
        }
        .tieude_mn h3:before {
         
          background: url({{ URL::asset('assets/upload/hinhanh/check.png') }}) no-repeat;
        }
        .tieude h3:after {

          background: url({{ URL::asset('assets/upload/hinhanh/bdtd.png') }}) no-repeat;
        }

        .tieude h3:before {
          
          background: url({{ URL::asset('assets/upload/hinhanh/bdtd1.png') }}) no-repeat;
        }
        .khungtt div:nth-child(4):before {
          
          background: url({{ URL::asset('assets/upload/hinhanh/ic4.png') }}) no-repeat;
        }

        .khungtt div:nth-child(3):before {
         
          background: url({{ URL::asset('assets/upload/hinhanh/ic3.png') }}) no-repeat;
        }
         .khungtt div:nth-child(2):before {
         
          background: url({{ URL::asset('assets/upload/hinhanh/ic2.png') }}) no-repeat;
        }
        .khungtt div:nth-child(1):before {
         
          background: url({{ URL::asset('assets/upload/hinhanh/ic1.png') }}) no-repeat;
        }
        .item-wr3 .hover3{
          min-height: 230px;
        }
        .item-wr .hover2{
          min-height: 140px
        }
      </style>
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
      <script src="{{ URL::asset('assets/js/common.js') }}"></script>
      <script src="{{ URL::asset('assets/js/general.js') }}"></script>
      <script type="text/javascript">
        $(document).ready(function(){
          $('.toggle-menu-select, a.form-close').click(function(){
            $('.menu-select .wrapper-menu-select').toggle();
          });
          
        });
      </script>
   </body>
</html>