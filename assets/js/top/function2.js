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

var targetElement = 'section, .pickupCarousel, .feature__header, .pageHeader, .entry__item, .grid, .grid__item, .section__title, .section__inner, .leadImg, .leadText,  .section__summary, .section__mainText, .section__leadImg, .relatedPosts__header, .relatedPosts__item, .pickup__item, .-recruit_content__child, .feature .info__item, .feature .info__footer, .filterNav, .pager';
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

