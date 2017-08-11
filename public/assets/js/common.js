/*
 * ---------------------------------------------------
 * 1. Click icon search show search moblie
 * 2. Main Menu
 * 3. Scroll to Top
 * 4. Scroll to Top
 */

  (function($){
    "use strict";
  /* ==================================================== */

  /*
   * 1. Click icon search show search moblie
  */
  $('.search-mb i').on('click', function() {
    $(this).toggleClass('open');
    $('.search').toggleClass('open');
  })

  /*
   * 2. Main Menu
  */
  $(".nav-toogle").on( 'click', function() {
    $( this ).toggleClass('has-open');
    $(".nav-menu").toggleClass("has-open");
    $("body").toggleClass("menu-open");
  });

  /*
   * 3. Main Menu
  */
  $(document).ready(function(){
    $('.nav-menu li.parent').append('<span class="plus"></span>');
    $('.nav-menu li.parent .plus').click(function(){
      $(this).toggleClass('open').siblings('.submenu').slideToggle();
    });
  });

  /*
   * 4. Scroll to Top
  */
  $(window).scroll(function() {
    if ($(this).scrollTop() >= 200) {
      $('#return-to-top').addClass('td-scroll-up-visible');
    } else {
      $('#return-to-top').removeClass('td-scroll-up-visible');
    }
  });
  $('#return-to-top').click(function() {
    $('body,html').animate({
      scrollTop : 0
    }, 'slow');
  });

})(jQuery); // End of use strict