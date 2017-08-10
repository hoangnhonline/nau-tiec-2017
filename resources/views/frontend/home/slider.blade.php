<div id="sliders" class="container">
	<!-- Place somewhere in the <body> of your page -->
	<div id="slider" class="flexslider">
	  <ul class="slides">
	    <li>
	      <img src="{{ URL::asset('assets/upload/hinhanh/851030260805617_1050x430.jpg') }}" alt="Bạn cần đặt tiệc gấp - Liên hệ ngay 0909 340 797 - 0969 156 575 (Anh Phong)"  title="Bạn cần đặt tiệc gấp - Liên hệ ngay 0909 340 797 - 0969 156 575 (Anh Phong)">
	    </li>
	    <li>
	      <img src="{{ URL::asset('assets/upload/hinhanh/514788675288178_1050x430.jpg') }}" alt="Bạn cần đặt tiệc gấp - Liên hệ ngay 0909 340 797 - 0969 156 575 (Anh Phong)"  title="Bạn cần đặt tiệc gấp - Liên hệ ngay 0909 340 797 - 0969 156 575 (Anh Phong)">
	    </li>
	    <li>
	      <img src="{{ URL::asset('assets/upload/hinhanh/178565249131446_1050x430.jpg') }}" alt="Bạn cần đặt tiệc gấp - Liên hệ ngay 0909 340 797 - 0969 156 575 (Anh Phong)"  title="Bạn cần đặt tiệc gấp - Liên hệ ngay 0909 340 797 - 0969 156 575 (Anh Phong)">
	    </li>
	    <li>
	      <img src="{{ URL::asset('assets/upload/hinhanh/469799659221213_1050x430.jpg') }}" alt="Bạn cần đặt tiệc gấp - Liên hệ ngay 0909 340 797 - 0969 156 575 (Anh Phong)"  title="Bạn cần đặt tiệc gấp - Liên hệ ngay 0909 340 797 - 0969 156 575 (Anh Phong)">
	    </li>
	    <li>
	      <img src="{{ URL::asset('assets/upload/hinhanh/096712954104955_1050x430.jpg') }}" alt="Bạn cần đặt tiệc gấp - Liên hệ ngay 0909 340 797 - 0969 156 575 (Anh Phong)"  title="Bạn cần đặt tiệc gấp - Liên hệ ngay 0909 340 797 - 0969 156 575 (Anh Phong)">
	    </li>
	    <!-- items mirrored twice, total of 12 -->
	  </ul>
	</div>
	<div id="carousel" class="flexslider">
	  <ul class="slides">
	    <li>
	      <img src="{{ URL::asset('assets/upload/hinhanh/851030260805617_1050x430.jpg') }}">
	    </li>
	    <li>
	      <img src="{{ URL::asset('assets/upload/hinhanh/514788675288178_1050x430.jpg') }}">
	    </li>
	    <li>
	      <img src="{{ URL::asset('assets/upload/hinhanh/178565249131446_1050x430.jpg') }}">
	    </li>
	    <li>
	      <img src="{{ URL::asset('assets/upload/hinhanh/469799659221213_1050x430.jpg') }}">
	    </li>
	    <li>
	      <img src="{{ URL::asset('assets/upload/hinhanh/096712954104955_1050x430.jpg') }}">
	    </li>
	    <!-- items mirrored twice, total of 12 -->
	  </ul>
	</div>
</div>
<script type="text/javascript">
	$(window).load(function() {
	  // The slider being synced must be initialized first
	  $('#carousel').flexslider({
	    animation: "slide",
	    controlNav: false,
	    animationLoop: true,
	    slideshow: false,
	    itemWidth: 300,
	    itemMargin: 5,
	    asNavFor: '#slider'
	  });
	 
	  $('#slider').flexslider({
	    controlNav: false,
	    animationLoop: true,
	    slideshow: false,
	    sync: "#carousel",
	    animation: "fade",
	  });
	});
</script>