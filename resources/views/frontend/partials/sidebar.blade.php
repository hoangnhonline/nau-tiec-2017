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