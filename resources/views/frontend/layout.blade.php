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
      <link rel="stylesheet" href="{{ URL::asset('assets/plugin/font-awesome-4.3.0/css/font-awesome.min.css') }}">
      <link rel="stylesheet" href="{{ URL::asset('assets/css/reset.css') }}">
      <!-- <link href="{{ URL::asset('assets/js/bootstrap/css/bootstrap.css') }}" rel="stylesheet"> -->
      <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">
      <link href="{{ URL::asset('assets/css/media.css') }}" rel="stylesheet" type="text/css" />
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,greek-ext,cyrillic-ext,vietnamese,greek' rel='stylesheet' type='text/css'>
      <script language="javascript" type="text/javascript" src="{{ URL::asset('assets/js/jquery-1.9.1.min.js') }}"></script>
      <!-- <script language="javascript" type="text/javascript" src="{{ URL::asset('assets/js/bootstrap/js/bootstrap.min.js') }}"></script> -->
      <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/jqueryslidemenu.css') }}">
      <script src="{{ URL::asset('assets/js/jqueryslidemenu.js') }}" type="text/javascript"></script>
      <link rel="stylesheet" href="{{ URL::asset('assets/css/owl.carousel.min.css') }}" />
      <link rel="stylesheet" href="{{ URL::asset('assets/css/owl.theme.default.min.css') }}" />
      <script src="{{ URL::asset('assets/js/owl.carousel.js') }}"></script>
      <!-- slick -->
      <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/slick.css') }}"/>
      <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/slick-theme2.css') }}"/>
      <script type="text/javascript" src="{{ URL::asset('assets/js/slick.min.js') }}"></script>
      <!-- Add mousewheel plugin (this is optional) -->
      <script type="text/javascript" src="{{ URL::asset('assets/js/fancybox/lib/jquery.mousewheel-3.0.6.pack.js') }}"></script>
      <!-- Add fancyBox main JS and CSS files -->
      <script type="text/javascript" src="{{ URL::asset('assets/js/fancybox/source/jquery.fancybox.js') }}?v=2.1.5"></script>
      <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/js/fancybox/source/jquery.fancybox.css') }}?v=2.1.5" media="screen" />
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
      <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAL928AIsIDYz9oUb-ILO5LTe_7MQnVgDA"></script>
      <script>
         (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
         (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
         m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
         })(window,document,'script','https://www.google-analytics.com/analytics.js') }}','ga');
         
         ga('create', 'UA-89709083-1', 'auto');
         ga('send', 'pageview');
         
      </script> 
      <link  href="{{ URL::asset('assets/css/fotorama.css') }}" rel="stylesheet">
      <script src="{{ URL::asset('assets/js/fotorama.js') }}"></script>
      <link rel="stylesheet" href="{{ URL::asset('assets/css/animate.css') }}">
      <script src="{{ URL::asset('assets/js/wow.min.js') }}"></script>
      <script> new WOW().init(); </script>
      <script src="{{ URL::asset('assets/js/lucid.js') }}"></script>
   </head>
   <body>
      <div id="header">
         <style>
            .header{
            background:url({{ URL::asset('assets/upload/hinhanh/1-8460.jpg') }});background-size:cover;box-sizing: border-box;    padding:5px 0px;}
         </style>
         <div class="header"  >
            <div class="wrapper">
               <div class="logo">
                  <a href="index.php">
                  <img src="{{ URL::asset('assets/upload/hinhanh/nguyenhadasdamsau1095468130x113-9243_130x115.png') }}" alt="logo"  />
                  </a>
               </div>
               <div class="banner">
                  <img class="left" src="{{ URL::asset('assets/upload/hinhanh/nguyenhadasdamsau1062970420x160sssss-7997_420x160.png') }}" alt=" ">
                  <div class="clear"></div>
                  <div class="hotline_hd">Hotline : 0909 340 797 - 0969 156 575 (Anh Phong)</div>
               </div>
               <div class="address">
                  <!-- <img class="left" src="{{ URL::asset('assets/upload/hinhanh/5-5325_505x180.png') }}"> -->
               </div>
               <div class="clear"></div>
            </div>
            <div class="clear"></div>
         </div>
      </div>
      <div id="menu">
         <div class="wrapper">
            <div class="menu">
               <ul>
                  <li  class="active"><a href="index.php">Trang chủ </a></li>
                  <li class=""><a href="gioi-thieu.html"> Giới thiệu </a></li>
                  <li class="">
                     <a href="san-pham.html">Menu sản phẩm</a>
                     <ul>
                        <li style="border-bottom:1px dashed #c4c4c4;">
                           <a href="san-pham/nau-tiec-tai-nha">NẤU TIỆC TẠI NHÀ</a>
                           <ul>
                              <li style="border-bottom:1px dashed #c4c4c4;"><a href="san-pham/nau-tiec-dam-cuoi-136.html">Nấu tiệc đám cưới</a></li>
                              <li style="border-bottom:1px dashed #c4c4c4;"><a href="san-pham/nau-tiec-dam-hoi-135.html">Nấu tiệc đám hỏi</a></li>
                              <li style="border-bottom:1px dashed #c4c4c4;"><a href="san-pham/nau-tiec-tai-tan-gia-138.html">Nấu tiệc tại tân gia</a></li>
                              <li style="border-bottom:1px dashed #c4c4c4;"><a href="san-pham/nau-tiec-sinh-nhat-134.html">Nấu tiệc sinh nhật</a></li>
                              <li style="border-bottom:1px dashed #c4c4c4;"><a href="san-pham/nau-tiec-dam-gio-150.html">Nấu tiệc đám giỗ</a></li>
                              <li style="border-bottom:1px dashed #c4c4c4;"><a href="san-pham/nau-tiec-lien-hoan-151.html">Nấu tiệc liên hoan</a></li>
                              <li ><a href="san-pham/nau-tiec-tai-tp-hcm-152.html">Nầu tiệc tại Tp HCM</a></li>
                           </ul>
                        </li>
                        <li >
                           <a href="san-pham/to-chuc-tiec">TỔ CHỨC TIỆC</a>
                           <ul>
                              <li style="border-bottom:1px dashed #c4c4c4;"><a href="san-pham/to-chuc-tiec-cuoi-nam-155.html">Tổ chức tiệc Cuối năm</a></li>
                              <li style="border-bottom:1px dashed #c4c4c4;"><a href="san-pham/to-chuc-tiec-tai-cong-ty-154.html">Tổ chức tiệc tại Công ty</a></li>
                              <li style="border-bottom:1px dashed #c4c4c4;"><a href="san-pham/to-chuc-tiec-cuoi-153.html">Tổ chức tiệc cưới</a></li>
                              <li style="border-bottom:1px dashed #c4c4c4;"><a href="san-pham/to-chuc-tiec-dam-hoi-139.html">Tổ chức tiệc đám hỏi</a></li>
                              <li ><a href="san-pham/to-chuc-tiec-sinh-nhat-140.html">Tổ chức tiệc sinh nhật</a></li>
                           </ul>
                        </li>
                     </ul>
                  </li>
                  <li class=""><a href="menu-tu-chon.html">Menu tự chọn</a></li>
                  </li>
                  <li class=""><a href="tin-tuc.html">Tin tức - Sự kiện</a></li>
                  <li class=""><a href="lien-he.html">Liên hệ</a></li>
                  <div class="search">
                     <script type="text/javascript">
                        function doEnter(evt){
                            var key;
                            if(evt.keyCode == 13 || evt.which == 13){
                                onSearch(evt);
                            }
                        }
                        function onSearch(evt) {
                            var keyword = document.getElementById("keyword").value;
                            if(keyword=='' || keyword=='Nhập từ khoá...')
                                alert('Bạn chưa nhập từ khóa tìm kiếm!');
                            else{
                                location.href = "tim-kiem.html&keywords="+keyword;
                                loadPage(document.location);            
                            }
                        }
                     </script>
                     <div id="search">
                        <div class='txtsrch'><input type="text" class="txtsearch" name="keyword" id="keyword" value="" onkeypress="doEnter(event,'keyword');" placeholder="Tìm kiếm ..." /></div>
                        <div class='btnsrch'><input type="button" class="button-s" Onclick='onSearch(event)' value="" /></div>
                        <div class="clear"></div>
                     </div>
                  </div>
               </ul>
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
      <div id="slider">
         <script src="plugin4/amazingslider.js') }}"></script>
         <link rel="stylesheet" type="text/css" href="plugin4/amazingslider-1.css') }}">
         <script src="plugin4/initslider-1.js') }}"></script>
         <div style="width: 1050px;float: left;">
            <div id="amazingslider-wrapper-1" style="display:block;position:relative;max-width:100%;margin:0 auto;">
               <div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
                  <ul class="amazingslider-slides" style="display:none;">
                     <li><a href=""><img src="{{ URL::asset('assets/upload/hinhanh/851030260805617_1050x430.jpg') }}" alt="Bạn cần đặt tiệc gấp - Liên hệ ngay 0909 340 797 - 0969 156 575 (Anh Phong)"  title="Bạn cần đặt tiệc gấp - Liên hệ ngay 0909 340 797 - 0969 156 575 (Anh Phong)"></a></li>
                     <li><a href=""><img src="{{ URL::asset('assets/upload/hinhanh/514788675288178_1050x430.jpg') }}" alt="Bạn cần đặt tiệc gấp - Liên hệ ngay 0909 340 797 - 0969 156 575 (Anh Phong)"  title="Bạn cần đặt tiệc gấp - Liên hệ ngay 0909 340 797 - 0969 156 575 (Anh Phong)"></a></li>
                     <li><a href=""><img src="{{ URL::asset('assets/upload/hinhanh/178565249131446_1050x430.jpg') }}" alt="Bạn cần đặt tiệc gấp - Liên hệ ngay 0909 340 797 - 0969 156 575 (Anh Phong)"  title="Bạn cần đặt tiệc gấp - Liên hệ ngay 0909 340 797 - 0969 156 575 (Anh Phong)"></a></li>
                     <li><a href=""><img src="{{ URL::asset('assets/upload/hinhanh/469799659221213_1050x430.jpg') }}" alt="Bạn cần đặt tiệc gấp - Liên hệ ngay 0909 340 797 - 0969 156 575 (Anh Phong)"  title="Bạn cần đặt tiệc gấp - Liên hệ ngay 0909 340 797 - 0969 156 575 (Anh Phong)"></a></li>
                     <li><a href=""><img src="{{ URL::asset('assets/upload/hinhanh/096712954104955_1050x430.jpg') }}" alt="Bạn cần đặt tiệc gấp - Liên hệ ngay 0909 340 797 - 0969 156 575 (Anh Phong)"  title="Bạn cần đặt tiệc gấp - Liên hệ ngay 0909 340 797 - 0969 156 575 (Anh Phong)"></a></li>
                  </ul>
                  <ul class="amazingslider-thumbnails" style="display:none;">
                     <li><a href=""><img src="{{ URL::asset('assets/upload/hinhanh/851030260805617_1050x430.jpg') }}"></a></li>
                     <li><a href=""><img src="{{ URL::asset('assets/upload/hinhanh/514788675288178_1050x430.jpg') }}"></a></li>
                     <li><a href=""><img src="{{ URL::asset('assets/upload/hinhanh/178565249131446_1050x430.jpg') }}"></a></li>
                     <li><a href=""><img src="{{ URL::asset('assets/upload/hinhanh/469799659221213_1050x430.jpg') }}"></a></li>
                     <li><a href=""><img src="{{ URL::asset('assets/upload/hinhanh/096712954104955_1050x430.jpg') }}"></a></li>
                  </ul>
               </div>
            </div>
         </div>
         <div style="width:250px;float: right; ">
            <div class="autoplay">
               <div class="box_hma">
                  <img src="{{ URL::asset('assets/upload/hinhanh/051185044820462_245x140.jpg') }}" alt="sliderbn" class="doitac-img" />
                  <div class="ten_ma">Món 2</div>
               </div>
               <div class="box_hma">
                  <img src="{{ URL::asset('assets/upload/hinhanh/226400877209925_245x140.jpg') }}" alt="sliderbn" class="doitac-img" />
                  <div class="ten_ma">Món 3</div>
               </div>
               <div class="box_hma">
                  <img src="{{ URL::asset('assets/upload/hinhanh/204724704372010_245x140.jpg') }}" alt="sliderbn" class="doitac-img" />
                  <div class="ten_ma">Món 4</div>
               </div>
               <div class="box_hma">
                  <img src="{{ URL::asset('assets/upload/hinhanh/760471701623413_245x140.jpg') }}" alt="sliderbn" class="doitac-img" />
                  <div class="ten_ma">Món 5</div>
               </div>
               <div class="box_hma">
                  <img src="{{ URL::asset('assets/upload/hinhanh/590621763702625_245x140.jpg') }}" alt="sliderbn" class="doitac-img" />
                  <div class="ten_ma"> </div>
               </div>
               <div class="box_hma">
                  <img src="{{ URL::asset('assets/upload/hinhanh/889074175570069_245x140.jpg') }}" alt="sliderbn" class="doitac-img" />
                  <div class="ten_ma"> </div>
               </div>
               <div class="box_hma">
                  <img src="{{ URL::asset('assets/upload/hinhanh/948506278675926_245x140.jpg') }}" alt="sliderbn" class="doitac-img" />
                  <div class="ten_ma"> </div>
               </div>
               <div class="box_hma">
                  <img src="{{ URL::asset('assets/upload/hinhanh/611748870699656_245x140.jpg') }}" alt="sliderbn" class="doitac-img" />
                  <div class="ten_ma"> </div>
               </div>
            </div>
         </div>
         <div class="clear"></div>
         <script type="text/javascript">
            $('.autoplay').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            vertical:true,
            autoplaySpeed: 2000,
            });
         </script>
      </div>
      <div id="content">
         <div class="wrapper">
            <div id="content_left">
               <div class="container-left">
                  <div class="tt_gt">
                     <h3 class="title">Danh mục sản phẩm</h3>
                  </div>
                  <div class="moudle-left danhmuc">
                     <div class="navi-left">
                        @foreach($articlesCateList as $cate)
                        <div class="tieude_mn">
                           <h3>{!! $cate->name !!}</h3>
                        </div>
                        <div class="item-list">
                           <ul>
                              @foreach($cate->articles as $value)
                              <li><a href="san-pham/nau-tiec-dam-cuoi-136.html"><span>{!! $value->title !!}</span></a></li>                         
                              @endforeach    
                           </ul>
                           <div class="clear"></div>
                        </div>    
                        @endforeach                    
                     </div>
                  </div>
               </div>              
               <div class="container-left">
                  <div class="tt_gt">
                     <h3 class="title">Hỗ trợ trực tuyến</h3>
                  </div>
                  <div class=" danhmuc">
                     <div class="navi-left">
                        <div class="item-list">
                           <div class="box_img_ht">
                              <img style="width: 100%;" src="{{ URL::asset('assets/upload/hinhanh/brht.png') }}">
                              <div class="td">Hỗ trợ online</div>
                           </div>
                           <div class="box_hotro">
                              <div class="mxh_ht">
                                 <ul>
                                    <li><a href="test" title="test"><img  src="{{ URL::asset('assets/upload/hinhanh/sky.png') }}"></a></li>
                                    <li><a href="test" title="test"><img  src="{{ URL::asset('assets/upload/hinhanh/viber.png') }}"></a></li>
                                    <li><a href="test" title="test"><img  src="{{ URL::asset('assets/upload/hinhanh/zalo.png') }}"></a></li>
                                 </ul>
                              </div>
                              <div class="dt_ht">
                                 <div class="sodt"><span>Mr. Phong</span></div>
                                 <div class="emailtv"><span>0909 340 797 </span></div>
                              </div>
                              <div class="clear"></div>
                           </div>
                           <div class="box_hotro">
                              <div class="mxh_ht">
                                 <ul>
                                    <li><a href="test" title="test"><img  src="{{ URL::asset('assets/upload/hinhanh/sky.png') }}"></a></li>
                                    <li><a href="test" title="test"><img  src="{{ URL::asset('assets/upload/hinhanh/viber.png') }}"></a></li>
                                    <li><a href="test" title="test"><img  src="{{ URL::asset('assets/upload/hinhanh/zalo.png') }}"></a></li>
                                 </ul>
                              </div>
                              <div class="dt_ht">
                                 <div class="sodt"><span>Mr. Phong</span></div>
                                 <div class="emailtv"><span>0969 156 575 </span></div>
                              </div>
                              <div class="clear"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <script type="text/javascript">
                  (function($) {
                      $(function() {
                          $(".scroller").simplyScroll({orientation:'vertical',customClass:'vert'});
                      });
                  })(jQuery);
               </script>        
            </div>
            <div id="content_right">              
               <!-- end -->
               <script src="{{ URL::asset('assets/js/parallax.js') }}"></script>
               <div class="content-right">
                  <div class="spnoibat">
                     <div class="tieude">
                        <h3>Menu nhận đặt tiệc</h3>
                     </div>
                     <?php $c = 0; ?>
                     @foreach($menuList as $menu)
                     <?php $c++; ?>
                     <div>
                        <div class="item-wr3" @if($c%3 == 0) style="margin-right:0px" @endif>
                           <div >
                              <div class="item-gia">{!! $menu->name !!}: <span> {!! number_format($menu->price) !!} đồng/bàn</span></div>
                              <div class="clear"></div>
                              <div style="border: 1px solid #00B204;padding: 3px;">
                                 <div class="hover3">
                                    <div style="padding:5px">
                                    <?php $cf = 0; ?>
                                       @foreach($menu->foodMenu as $food)
                                       <?php $cf++; ?>
                                       <p><span style="color:red; font-size: 15px;
    font-weight: bold;">{{ $cf }}. </span><span style="color:#0000FF;font-weight:bold;font-size:16px">{!! $food->name !!}</span></p>
                                       @endforeach
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     @if($c%3 == 0)
                     <div class="clearfix"></div>
                     @endif
                     @endforeach
                     <div class='clear'></div>                  
                  </div>
                  <div class="clear"></div>
                  <div class="spnoibat">
                     <div class="tieude">
                        <h3>Tin tức</h3>
                     </div>
                     <div class='owl-carousel'>
                        <div>
                           <div class="cottt ">
                              <a href="tin-tuc/nhung-ai-khong-nen-an-rau-muong-128.html"><img src="{{ URL::asset('assets/upload/baiviet/14523128911711414149-1693_290x130.jpg') }}" alt="Những ai không nên ăn rau muống?"></a>
                              <div class="dmtt">
                                 <div class="tentt"><a href="nhung-ai-khong-nen-an-rau-muong">Những ai không nên ăn rau muống?</a></div>
                                 <div class="motatt"></div>
                                 <div class="xemthem"><a href="tin-tuc/nhung-ai-khong-nen-an-rau-muong-128.html" title="Những ai không nên ăn rau muống?">Xem thêm</a></div>
                              </div>
                              <div class="clear"></div>
                           </div>
                        </div>
                        <div>
                           <div class="cottt ">
                              <a href="tin-tuc/cach-lam-mut-dau-ngu-thom-ngon-ngay-tet-129.html"><img src="{{ URL::asset('assets/upload/baiviet/cachlammutdaungudontetmutdaungu101482391199width500height375-7427_290x130.jpg') }}" alt="Cách làm mứt đậu ngự thơm ngon ngày Tết"></a>
                              <div class="dmtt">
                                 <div class="tentt"><a href="cach-lam-mut-dau-ngu-thom-ngon-ngay-tet">Cách làm mứt đậu ngự thơm ngon ngày Tết</a></div>
                                 <div class="motatt"></div>
                                 <div class="xemthem"><a href="tin-tuc/cach-lam-mut-dau-ngu-thom-ngon-ngay-tet-129.html" title="Cách làm mứt đậu ngự thơm ngon ngày Tết">Xem thêm</a></div>
                              </div>
                              <div class="clear"></div>
                           </div>
                        </div>
                        <div>
                           <div class="cottt ">
                              <a href="tin-tuc/5-cach-thuong-thuc-chanh-leo-moi-la-moi-phu-nu-can-biet-167.html"><img src="{{ URL::asset('assets/upload/baiviet/5cachthuongthucchanhleomoilamoiphunucanbietpushchanhleo31481100861width473height315-7210_290x130.jpg') }}" alt="5 cách thưởng thức chanh leo mới lạ mọi phụ nữ cần biết."></a>
                              <div class="dmtt">
                                 <div class="tentt"><a href="5-cach-thuong-thuc-chanh-leo-moi-la-moi-phu-nu-can-biet">5 cách thưởng thức chanh leo mới lạ mọi phụ nữ cần biết.</a></div>
                                 <div class="motatt"></div>
                                 <div class="xemthem"><a href="tin-tuc/5-cach-thuong-thuc-chanh-leo-moi-la-moi-phu-nu-can-biet-167.html" title="5 cách thưởng thức chanh leo mới lạ mọi phụ nữ cần biết.">Xem thêm</a></div>
                              </div>
                              <div class="clear"></div>
                           </div>
                        </div>
                        <div>
                           <div class="cottt ">
                              <a href="tin-tuc/tuyet-chieu-luoc-phan-nao-cua-heo-cung-trang-thom-ngon-gion-173.html"><img src="{{ URL::asset('assets/upload/baiviet/nhungtuyetchieuluocphannaocuaheocungtrangdep11482978201width600height400-9892_290x130.jpg') }}" alt="Tuyệt chiêu luộc phần nào của heo cũng trắng thơm, ngon giòn"></a>
                              <div class="dmtt">
                                 <div class="tentt"><a href="tuyet-chieu-luoc-phan-nao-cua-heo-cung-trang-thom-ngon-gion">Tuyệt chiêu luộc phần nào của heo cũng trắng thơm, ngon giòn</a></div>
                                 <div class="motatt"></div>
                                 <div class="xemthem"><a href="tin-tuc/tuyet-chieu-luoc-phan-nao-cua-heo-cung-trang-thom-ngon-gion-173.html" title="Tuyệt chiêu luộc phần nào của heo cũng trắng thơm, ngon giòn">Xem thêm</a></div>
                              </div>
                              <div class="clear"></div>
                           </div>
                        </div>
                     </div>
                     <div class="clear"></div>
                  </div>
               </div>
               <script type="text/javascript">
                  $(document).ready(function() {
                    $('.owl-carousel').owlCarousel({
                    autoplay : true,
                    nav : true,
                    navText : true,
                    dots : true, 
                    autoplaySpeed : 500, 
                    loop:true  ,  
                    margin:2,
                    responsiveClass:true,
                    responsive:{
                        0:{
                            items:3,
                        },
                        600:{
                            items:3,
                        },
                        1000:{
                            items:3,
                        }
                    }
                  })
                  });
               </script>
            </div>
            <div class="clear"></div>
         </div>
      </div>
      <div class="clear"></div>
      <div class="bottom">
      </div>
      <div id="footer">
         <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/jquery.simplyscroll.css') }}">
         <script type="text/javascript" src="{{ URL::asset('assets/js/jquery.simplyscroll.js') }}"></script>
         <div class="footer ">
            <div class="fixed-ft">
               <div class="box_footer">
                  <div class="ft-ds">
                     2016 Copyright © <span style="color:#ff0; font-weight: bold;"> </span> .All rights reserved.
                  </div>
               </div>
            </div>
            <div class="footer-address">
               <div class="box_footer ">
                  <div class="box_ft1">
                     <div class="ft-1 wow fadeInLeft">
                        <h3 class="fadeInLeft"> </h3>
                        <p style="line-height: 20.8px;"><span style="font-size:20px;"><span style="color:#FFFF00;"><span style="font-family:arial,helvetica,sans-serif;"><strong>CÔNG TY TNHH DỊCH VỤ NẤU TIỆC GIA LONG</strong></span></span></span></p>
                        <p style="line-height: 20.8px;"><span style="color:#FFFF00;"><span style="font-size:20px;"><span style="font-family:times new roman,times,serif;"><strong>Địa chỉ:</strong> <span style="text-align: center;">77/4 Bờ Bao Tân Thắng, Phường Sơn Kỳ, Quận Tân Phú, Tp. Hồ Chí Minh</span></span></span></span></p>
                        <p style="line-height: 20.8px;"><span style="color:#FFFF00;"><span style="font-size:20px;"><span style="font-family:times new roman,times,serif;"><strong>Điện thoại:</strong></span></span></span><span style="color:#FF0000;"><span style="font-size:20px;"><span style="font-family:times new roman,times,serif;"> </span></span></span><span style="color:#FFFFFF;"><span style="font-size: 20px; text-align: center; line-height: 1.6;"><span new="" times=""><span style="font-family:times new roman,times,serif;"><span style="font-size: 22px;"><strong>0909 340 797</strong></span></span> </span></span><span style="text-align: center; font-size: 22px;"><span new="" times=""><span font-size:="" new="" text-align:="" times=""><strong> </strong></span></span></span><span style="font-size:20px;"><span style="font-family:times new roman,times,serif;"><span style="text-align: center;">(Anh Phong) </span></span></span></span></p>
                        <p style="line-height: 20.8px;"><span style="color:#000000;"><span style="font-size:22px;"><span style="font-family:times new roman,times,serif;"><span style="text-align: center;">                 </span></span></span></span><span style="color:#FFFFFF;"><span style="font-size:22px;"><span style="font-family:times new roman,times,serif;"><span style="text-align: center;"> <strong>0969 156 575</strong> </span></span><span style="font-family: &quot;times new roman&quot;, times, serif;"><span style="text-align: center;">(</span></span><span style="font-family: &quot;times new roman&quot;, times, serif; text-align: center;">Anh Phong) </span></span></span></p>
                        <p style="line-height: 20.8px;"><span style="color:#FFFF00;"><span style="font-size:20px;"><span style="font-family:times new roman,times,serif;"><strong>Email: </strong></span></span></span><span style="color:#FFFFFF;"><span style="font-size:20px;"><span style="font-family:times new roman,times,serif;"><span style="background-color: transparent;">thuynguyen162694@gmail.com </span></span></span></span></p>
                        <p style="margin: 0px; padding: 0px; list-style: none; color: rgb(27, 25, 25); font-family: Arial, Helvetica, sans-serif; font-size: 14px;"><span style="color:#FFFF00;"><span style="font-size:20px;"><span style="font-family:times new roman,times,serif;"><span style="margin: 0px; padding: 0px; list-style: none; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;"><span style="margin: 0px; padding: 0px; list-style: none; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; line-height: 1.6;"><span style="margin: 0px; padding: 0px; list-style: none; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;"><strong style="margin: 0px; padding: 0px; list-style: none; border: 0px; outline: 0px; vertical-align: baseline;">Website: </strong></span></span></span></span></span></span><span style="color:#FFFFFF;"><span style="font-size:20px;"><span style="font-family:times new roman,times,serif;"><span style="margin: 0px; padding: 0px; list-style: none; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;"><span style="margin: 0px; padding: 0px; list-style: none; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; line-height: 1.6;"><span style="margin: 0px; padding: 0px; list-style: none; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;"><span style="margin: 0px; padding: 0px; list-style: none; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;">http://nautiecgialong.com/</span></span></span></span></span></span></span></p>
                        <div class="ft-ds wow fadeInLeft">
                           <div class="addthis_native_toolbox"></div>
                        </div>
                     </div>
                     <div class="clear"></div>
                     <div class="td_lk">LIÊN KẾT MẠNG XÃ HỘI</div>
                     <div class="mxh_ft">
                        <ul>
                           <li><a href=""><img src="{{ URL::asset('assets/upload/hinhanh/nguyenhamsau10103-3622.png') }}" alt=""></a></li>
                           <li><a href=""><img src="{{ URL::asset('assets/upload/hinhanh/nguyenhamsau10108-8463.png') }}" alt=""></a></li>
                           <li><a href=""><img src="{{ URL::asset('assets/upload/hinhanh/nguyenhamsau10110-6415.png') }}" alt=""></a></li>
                           <li><a href=""><img src="{{ URL::asset('assets/upload/hinhanh/nguyenhamsau10106-9454.png') }}" alt=""></a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="box_ft2">
                     <div class="box_dangky"  style='background:
                        url({{ URL::asset('assets/upload/hinhanh/timthumb-6466.png') }}) fixed;    padding: 35px 100px;     margin: 20px 0;' >
                        <div class="tieude_lydo">
                           <h3>ĐĂNG KÝ NHẬN MAIL KHUYẾN MÃI</h3>
                        </div>
                        <form action="" method="POST" class="frmdk" accept-charset="utf-8">
                           <div class="frm_dk">
                              <div class="dk">
                                 <input type="email" id="txtemail" name="txtemail" class=" txtdk" required="required" placeholder="Nhập mail của bạn..."/> 
                                 <input type="submit" name="btnemail" class="btn btnemail" value="Gửi"/>
                              </div>
                           </div>
                        </form>
                     </div>
                     <div class="clear"></div>
                     <div class="box_bot_ft">
                        <div class="ft-2 wow fadeInDown">
                           <h3>Về chúng tôi</h3>
                           <div><a href="gioi-thieu.html" >Giới thiệu</a></div>
                           <div><a href="lien-he.html" >Liên hệ</a></div>
                           <div><a href="san-pham.html" >Menu sản phẩm</a></div>
                           <div><a href="menu-tu-chon.html" >Menu tự chọn</a></div>
                           <div class="clear"></div>
                        </div>
                        <div class="ft-5 wow fadeInDown">
                           <h3>Tin tức</h3>
                           <div><a href="tin-tuc/nhung-ai-khong-nen-an-rau-muong-128.html">Những ai không nên ăn rau muống?</a></div>
                           <div><a href="tin-tuc/cach-lam-mut-dau-ngu-thom-ngon-ngay-tet-129.html">Cách làm mứt đậu ngự thơm ngon ngày Tết</a></div>
                           <div><a href="tin-tuc/5-cach-thuong-thuc-chanh-leo-moi-la-moi-phu-nu-can-biet-167.html">5 cách thưởng thức chanh leo mới lạ mọi phụ nữ cần biết.</a></div>
                           <div><a href="tin-tuc/tuyet-chieu-luoc-phan-nao-cua-heo-cung-trang-thom-ngon-gion-173.html">Tuyệt chiêu luộc phần nào của heo cũng trắng thơm, ngon giòn</a></div>
                           <div class="clear"></div>
                        </div>
                        <div class="ft-3 wow fadeInRight">
                           <div class="tketruycap">
                              <h3>Thống kê truy cập</h3>
                              <div  class="khungtt">
                                 <div>Số người online:<span>2</span></div>
                                 <div>Hôm nay:<span>42</span></div>
                                 <div>Tuần này:<span>124</span></div>
                                 <div>Tổng truy cập:<span>23221</span></div>
                                 <div class="clear"></div>
                              </div>
                              <div class="clear"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="clear"></div>
               </div>
               <div class="clear"></div>
            </div>
            <div class="clear"></div>
         </div>
         <script type="text/javascript">
            (function($) {
                $(function() {
                    $(".scroller").simplyScroll({orientation:'vertical',customClass:'vert'});
                });
            })(jQuery);
         </script>    
      </div>
      <style type="text/css">
        #menu{
          background: url({{ URL::asset('assets/upload/hinhanh/brmn.png') }}) repeat-x;
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
      </style>
   </body>
</html>