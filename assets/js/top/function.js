//!
//!
//! function.js
//!
//!

var mediaQuery_mobile = 767;
var timer = false;
var timer_scroll = false;


//  onload
//  ----------------------------------------------------------------
jQuery(window).on('load', function() {
  init();
});
//  ----------------------------------------------------------------


//  scroll
//  ----------------------------------------------------------------
jQuery(window).bind("scroll", function() {
  scrolledPage();
  if ( timer_scroll !== false ) {
    clearTimeout( timer_scroll );
  }
  timer_scroll = setTimeout(function() {
  }, 50);
});
//  ----------------------------------------------------------------


//  resize
//  ----------------------------------------------------------------
jQuery(window).resize(function() {
  setGnavPos();
  setElementHeight();
  if (timer !== false) {
    clearTimeout(timer);
  }
  timer = setTimeout(function() {
  }, 100);
});
jQuery(window).trigger("resize");
//  ----------------------------------------------------------------


//  init
//  ----------------------------------------------------------------
function init(){
  setFreeArea();
  scrolledPage();
  setElementHeight();
  setGnavPos();
}
//  ----------------------------------------------------------------


//  pc: set header height
//  ----------------------------------------------------------------
function setGnavPos(){
  var headerMinHeight = 700;
  var headerHeight = jQuery('.header').height();
  if( headerHeight < headerMinHeight ){
    jQuery('.header__gnav').addClass('-relative');
  } else {
    jQuery('.header__gnav').removeClass('-relative');
  }
}


//  set height
//  ----------------------------------------------------------------
function setElementHeight(){
  if( jQuery('.autoHeight__grid2').length ){
    jQuery('.autoHeight__grid2').autoHeight({
      column : 2,
      reset : 'reset',
      height : 'height'
    });
  }
}
//  ----------------------------------------------------------------


//  fixed header
//  ----------------------------------------------------------------
function scrolledPage(){
  var fixedPoint = 200;
  var firstEffectPoint = 70;
  if ( jQuery(this).scrollTop() >= fixedPoint ) {
    jQuery('html').addClass('scrolledPage');
    jQuery('.floatingColumn').addClass('-scrolled');
  }else{
    jQuery('html').removeClass('scrolledPage');
    jQuery('.floatingColumn').removeClass('-scrolled');
  }
  if ( jQuery(this).scrollTop() >= firstEffectPoint ) {
    jQuery('html').addClass('scrolledEffect');
  }
}
//  ----------------------------------------------------------------


//  freeArea
//  ----------------------------------------------------------------
function setFreeArea(){
  // add external icon
  jQuery('.freeArea').find('h2').addClass('postSet__heading');
  jQuery('.freeArea').find('a').not('.imglink').each(function(){
    if( jQuery(this).attr('target') ){
      jQuery(this).addClass('link -external');
    }else{
      jQuery(this).addClass('link');
    }
  });
}

function setKvHeight(){
  if( getBrowserWidth() <= mediaQuery_mobile ){
    if( !jQuery('.-initialized').length ){
      var headerHeight = 55;
      var windowheight = window.innerHeight;
      var mainImageHeight = windowheight - headerHeight;
      jQuery('.kvImg').css('height', mainImageHeight ).addClass('-initialized');
    }
  } else {
    jQuery('.kvImg').css('height', '80vh' ).removeClass('-initialized');
  }
}
//  ----------------------------------------------------------------


// index page
// =======================================================
if( jQuery('.page-home').length ){

  // pickup carousel
  // ----------------------------------------------------=
  var swiper = new Swiper('.pickupCarousel', {
    speed: 750,
    slidesPerView: 'auto',
    slidesPerGroup: 3,
    loopFillGroupWithBlank: true,
    roundLengths : true,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="'+ className +'" data-index="'+ (index + 1) +'"></span>';
      },
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints:{
      767:{
        spaceBetween: 15,
        centeredSlides: true,
        slidesPerView: 'auto',
        slidesPerGroup: 1,
        loop: true,
        loopFillGroupWithBlank: true,
      }
    },
    on: {
      init: function () {
      },
    },
  });
  jQuery('.swiper-button').click(function(){
    if( swiper.isEnd ){
      jQuery('.pickupCarousel__mask').addClass('-disabled');
    } else {
      jQuery('.pickupCarousel__mask').removeClass('-disabled');
    }
  });
  var bullets_unm = jQuery('.swiper-pagination-bullet').length;
  jQuery('.swiper-pagination-bullet').click(function(){
    var index = jQuery(this).attr('data-index');
    if( index == bullets_unm )  {
      jQuery('.pickupCarousel__mask').addClass('-disabled');
    } else {
      jQuery('.pickupCarousel__mask').removeClass('-disabled');
    }
  });



  // mainImage slider
  // ----------------------------------------------------=
  jQuery('html img').imagesLoaded(function(){

    jQuery('.kvImg_preload').remove();
    setTimeout(function(){
      jQuery('html').addClass('allLoaded');
      setTimeout(function(){
        $slick = jQuery('.kvImg__slider');
        $slick.on('init', function( event, slick ){
          var ps = new PerfectScrollbar('#scrollContainer');
          jQuery('.kvImg').addClass('start');
          jQuery('html').addClass('kvStart');
        }).slick({
          draggable: true,
          adaptiveHeight: false,
          dots: false,
          infinite: true,
          speed: 1000,
          autoplaySpeed: 5300,
          autoplay: true,
          // autoplay: false,
          // swipeToSlide: true,
          fade: true,
          cssEase: 'linear',
          pauseOnHover: false,
          lazyLoad: 'progressive',
          arrows: false
        });
        $slick.on("beforeChange", function (){
          jQuery('.kvImg__item').addClass('changed');
        });
        $slick.addClass('loaded');
      },400);
    },100);
  });
}

var targetElement = 'section, .pickupCarousel, .feature__header, .entry__item, .grid, .grid__item, .pickup__item, .-recruit_content__child, .feature .info__item, .feature .info__footer, .filterNav, .pager';
jQuery(targetElement).on('inview', function(event, isInView) {
  if (isInView) {
    var target = jQuery(this);
    if( jQuery(this).hasClass('feature__header') ){
      jQuery(this).addClass('-effected__header');
    }else{
      jQuery(this).addClass('-effected');
    }
    setTimeout(function(){
      target.addClass('-effected_after');
    },600);
    setTimeout(function(){
      target.addClass('-effected_after_after');
    },2000);
  }
});

// =======================================================


jQuery(function(){



  // accordion ( top Ourt Solution)
  //  ----------------------------------------------------------------
  if( jQuery('html').width() <= mediaQuery_mobile ){
    $accordion_btn = jQuery('.accordion').find('.accordion__btn');
    $accordion_btn.click(function(){
      $this_btn = jQuery(this);
      var this_tab = $this_btn.attr('data-tab');
      var easing = 'easeInOutQuad';
      var duration = 400;
      var delay = 0;
      if( getBrowserWidth() > mediaQuery_mobile ){
        $accordion_btn.each(function(){
          if( jQuery(this).attr('data-tab') != this_tab ){
            $other_container = jQuery(this).parent('.accordion');
            $other_content = $other_container.find('.accordion__content');
            if( $other_container.hasClass('-opened') ){
              jQuery(this).removeClass('-current');
              $other_container.removeClass('-opened');
              $other_content.stop().animate({
                opacity: 0,
                height: 'toggle'
              }, {
                duradion : duration,
                easing : easing
              });
              delay = 50;
            }
          }
        });
      }

      $container = $this_btn.parent('.accordion');
      $content = $container.find('.accordion__content');
      setTimeout(function(){
        if( !$container.hasClass('-opened') ){
          $this_btn.addClass('-current');
          $container.addClass('-opened');
          $content.stop().animate({
            opacity: 1,
            height: 'toggle'
          }, duration, easing);
        } else {
          $this_btn.removeClass('-current');
          $container.removeClass('-opened');
          $content.stop().animate({
            opacity: 0,
            height: 'toggle'
          }, duration, easing);
        }
      }, delay);

      return false;
    });

    $accordion_btn_close = jQuery('.accordion').find('.accordion__close');
    $accordion_btn_close.click(function(){
      $tab_btn = jQuery(this);
      var easing = 'easeInOutQuad';
      var duration = 400;
      setTimeout(function(){
        $container = $accordion_btn_close.parent('.accordion');
        $content = $container.find('.accordion__content');
        $tab_btn = $container.find('.accordion__btn');
        $tab_btn.removeClass('-current');
        $container.removeClass('-opened');
        $content.stop().animate({
          opacity: 0,
          height: 0
        }, duration, easing);
      }, 100);
      return false;
    });


  } else {
    $accordion_btn = jQuery('.accordion').find('.accordion__btn');
    $accordion_btn.hover(function(){
      jQuery(this).stop(true, true).animate({
        'opacity': 1,
      },{
        easing: 'linear',
        duration: 20,
        complete: function(){
          hideSolutionPanel();
          jQuery(this).addClass('-current');
          jQuery(this).parent('.accordion').addClass('-opened').css('z-index', '99');
        }
      });
    });
    $accordion_btn_close = jQuery('.accordion').find('.accordion__close');
    $accordion_btn_close.click(function(){
      $tab_btn = jQuery(this);
      var easing = 'easeInOutQuad';
      var duration = 400;
      hideSolutionPanel();
      return false;
    });
  }
  function hideSolutionPanel(){
    jQuery('.accordion').find('.accordion__btn').removeClass('-current');
    jQuery('.accordion').removeClass('-opened').css('z-index', '0');
  }
  //  ----------------------------------------------------------------

  // tabs
  //  ----------------------------------------------------------------
  $tab__btn = jQuery('.tab').find('.tab__btn');
  $tab__btn.click(function(){
    $this_btn = jQuery(this);
    var target_tab = $this_btn.attr('data-target');
    var easing = 'easeInOutQuad';
    var duration = 400;
    var delay = 0;

    jQuery('.tab').find('.tab__navItem').removeClass('-current');
    $this_btn.parents('.tab__navItem').addClass('-current');

    jQuery('.tab__contents').each(function(){
      $this_tab = jQuery(this);
      $this_tab.removeClass('-opened');
      if( $this_tab.attr('id') == target_tab ){
        $this_tab.addClass('-opened');
      }
    });
    return false;
  });

  //  ----------------------------------------------------------------

  // device
  //  ----------------------------------------------------------------
  var ua = navigator.userAgent;
  var device = '';
  if(ua.indexOf('iPhone') > 0 || ua.indexOf('iPod') > 0 || ua.indexOf('Android') > 0 && ua.indexOf('Mobile') > 0){
    if( ua.indexOf('iPhone') > 0 || ua.indexOf('iPod') > 0 ){
      device = 'mobile ios';
    } else if( ua.indexOf('Android') > 0 && ua.indexOf('Mobile') > 0 ){
      device = 'mobile android';
    } else {
      device = 'mobile';
    }
  }else if(ua.indexOf('iPad') > 0 || ua.indexOf('Android') > 0){
      device = 'tablet';
  }else{
      device = 'other';
  }
  jQuery('html').addClass(device);
  //  ----------------------------------------------------------------

});


// monitor width
//  ----------------------------------------------------------------
function getBrowserWidth(){
  if (window.innerWidth){
    return window.innerWidth;
  }else if(document.documentElement && document.documentElement.clientWidth != 0){
    return document.documentElement.clientWidth;
  }else if(document.body){
    return document.body.clientWidth;
  }return 0;
}

// monitor height
//  ----------------------------------------------------------------
function getBrowserHeight(){
  if (window.innerHeight){
    return window.innerHeight;
  }else if(document.documentElement && document.documentElement.clientHeight != 0){
    return document.documentElement.clientHeight;
  }else if(document.body){
    return document.body.clientHeight;
  }return 0;
}

