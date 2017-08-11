<div id="footer">
   <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/jquery.simplyscroll.css') }}">
   <script type="text/javascript" src="{{ URL::asset('assets/js/jquery.simplyscroll.js') }}"></script>
   <div class="footer">
      <div class="container">
         <div class="footer-address row">
            <div class="box_ft1 col-sm-5 col-xs-12">
               <div class="ft-1 wow fadeInLeft">
                  <h3 class="fadeInLeft" style="font-size:20px">EKIP TIỆC NGON</h3>
                  <p><i class="fa fa-map-marker"></i> 146 Kênh Tân Hóa - P Phú Trung- Q.Tân Phú </p>
                  <p><i class="fa fa-map-marker"></i> 2/13/22 đường Thạnh Lộc 13 KP 1. P.Thạnh Lộc. Q12. TP HCM </p>
                  <p><i class="fa fa-mobile"></i> 090 2425 068 ( A.Duy ) </p>
                  <p><i class="fa fa-mobile"></i> 0981 498 043 ( A.Dũng ) </p>
                  <p>Website: <a href="http://tiecngon.vn" style="color:#FFF">http://tiecngon.vn/</a></p>
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
            <div class="box_ft2 col-sm-7 col-xs-12">
               <div class="box_dangky"  style='background:
                  url({{ URL::asset('assets/upload/hinhanh/timthumb-6466.png') }}) fixed;    padding: 35px 100px;     margin: 20px 0;' >
                  <div class="tieude_lydo">
                     <h3>ĐĂNG KÝ NHẬN MAIL KHUYẾN MÃI</h3>
                  </div>
                  <form action="" method="POST" class="frmdk" accept-charset="utf-8">
                     <div class="frm_dk">
                        <div class="dk">
                           <input type="email" id="txtemail" name="txtemail" class=" txtdk" required="required" placeholder="Nhập mail của bạn..."/> 
                           <input type="submit" name="btnemail" class="btn btnemail btn-primary" value="Gửi"/>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="clear"></div>
               <div class="box_bot_ft row">
                  <div class="ft-2 col-sm-3 wow fadeInDown">
                     <h3>Về chúng tôi</h3>

                     <div><a href="{{ route('parent-cate', 'gioi-thieu') }}" >Giới thiệu</a></div>
                     <div><a href="{{ route('menu-custom')}}" >Menu tự chọn</a></div>
                     <div><a href="{{ route('contact')}}" >Liên hệ</a></div>
                     <div><a href="{{ route('news-list') }}" >Tin tức - Sự kiện</a></div>                     
                     <div class="clear"></div>
                  </div>
                  <div class="ft-5 col-sm-5 wow fadeInDown">
                     <h3>Tin tức</h3>
                     @foreach($articlesListFooter as $articles)
                     <div><a href="{{ route('news-detail', [$articles->slug, $articles->id]) }}">{!! $articles->title !!}</a></div>                    
                    @endforeach
                  </div>
                  <div class="ft-3 col-sm-4 wow fadeInRight">
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
         </div>
      </div>
      <div class="fixed-ft">
         <div class="box_footer">
            <div class="ft-ds">
               2016 Copyright © <span style="color:#ff0; font-weight: bold;"> </span> .All rights reserved.
            </div>
         </div>
      </div>
   </div>
   <script type="text/javascript"></script>    
</div>