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
  $('.block-user .block-content').popover({
    placement: top,
    trigger: 'click',
    html : true,
    content: function() {
      return $('.popover').html();
    }
  });
})(jQuery); // End of use strict

window.fbAsyncInit = function() {
  FB.init({
    appId      : $('#fb-app-id').val(),
    cookie     : true,  // enable cookies to allow the server to access
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.7' // use graph api version 2.7
  });
};
 (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
$(document).ready(function() {
  $('.login-by-facebook-popup').click(function() {
    FB.login(function(response){
      if(response.status == "connected")
      {
         // call ajax to send data to server and do process login
        var token = response.authResponse.accessToken;
        $.ajax({
          url: $('#route-ajax-login-fb').val(),
          method: "POST",
          data : {
            token : token
          },
          success : function(data){
            if(!data.success) {
              location.reload();
            } else {
              location.href = $('#route-cap-nhat-thong-tin').val();
            }
          }
        });

      }
    }, {scope: 'public_profile,email'});
  });  
});