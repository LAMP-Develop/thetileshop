//ギャラリー関連Swiperオブジェクト格納用
var galleryObjects = {
	inContent: {
		main: null,
		caption: null,
		thumbs: null
	},
	inModal: {
		main: null,
		caption: null,
		thumbs: null
	}
};

//SINGLE記事内の画像
(function ($) {
	$(function () {
        var url = location;
        if (!url.search.match('_page')) {
            $("section img,.post_gallery img,#gallery img").unveil(200, function () {
                //console.log('1');
                $(this).removeClass('lazy');
            });
        }
	});
})(jQuery);


$(function () {

	//モーダル画面の設定済みフラグ
	var existModal = false;

	//コンテンツ下サムネイル一覧
	var front = new Swiper('.gallery.swiper-container', {
		autoplay: 4000,
		lazyLoading: true,
		preloadImages: false,
		loop: true,
		noSwiping: true,
		effect: 'fade',
		fade: {
			crossFade: false,
		},
        pagination: '.swiper-pagination',
        paginationClickable: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev'
	});

	// init Masonry
	if (!$('body').is('.page-my-record , .page-writer')) {
		console.log('2');
		var $grid = $('#mainList').masonry({
			itemSelector: 'article',
			percentPosition: true,
			// columnWidth: 'article',
		});
		// layout Masonry after each image loads
		$grid.imagesLoaded().progress(function () {
			$grid.masonry('layout');
			$('.grid img').each(function (index, el) {
				if ($(this).data('bg-change') == 1) {
					var src = $(this).attr('src');
					$(this).parent('.img.main').css({
						'background-image': 'url(' + src + ')',
						'background-size': 'cover',
					});
					$(this).hide();
				}
			});
		});
	}
	// if ($('#single-mv-gallery').length > 0) {

		//ハッシュ削除
		location.hash = (location.hash === '#gallery') ? '' : location.hash;

		//GAにページビュー通知
		var sendGA = function (swiper) {
			var path = location.pathname + '?_slide=' + (swiper.activeIndex) + location.hash;
			console.log(swiper.activeIndex);
			window.history.replaceState(null, null, path);
			ga('send', 'pageview', {
				'page': path
			});
		};

		//ページナビレイアウト
		var setPagination = function (swiper, currentClassName, totalClassName) {
			return '<span class="' + currentClassName + '"></span>' +
					' ／ ' +
					'<span class="' + totalClassName + '"></span>';
		};

		//コンテンツ内キャプション
		galleryObjects.inContent.caption = new Swiper('.captionArea.swiper-container', {
			effect: 'fade',
			noSwiping: true,
			loop: true,
			pagination: '.captionArea .swiper-pagination',
			noSwipingClass: 'captionArea',
			paginationType: 'fraction',
			paginationFractionRender: setPagination,
		});

		//コンテンツ内サムネイルスライド
		galleryObjects.inContent.thumbs = new Swiper('.thumnailArea >.swiper-container', {
			spaceBetween: 8,
			autoplayDisableOnInteraction: false,
			slidesPerView: 6,
			prevButton: '.thumnailArea .thumb_slider-prev',
			nextButton: '.thumnailArea .thumb_slider-next',
			onClick: function (swiper, event) {
				var index = swiper.clickedIndex + 1;
                $('#modal > div.wrap > div.caption_slide.swiper-container-horizontal.swiper-container-fade > div.swiper-wrapper.itemWrap > div.swiper-slide.item').css('opacity','0')
                galleryObjects.inContent.main.slideTo(index);
			}
		});

		//コンテンツ内メインスライド
		galleryObjects.inContent.main = new Swiper('.mvArea.swiper-container', {
			slidesPerView: 1,
			autoplay: 6000,
			autoplayDisableOnInteraction: false,
			loop: true,
			lazyLoading: true,
			preloadImages: false,
			centeredSlides: true,
			nextButton: '.startarrow_r',
			prevButton: '.startarrow_l',
			onInit: function (swiper) {
				swiper.params.control = galleryObjects.inContent.caption;
				galleryObjects.inContent.caption.params.control = swiper;
				$(galleryObjects.inContent.thumbs.slides[0]).addClass('current-slide');
			},
			onTransitionEnd: function (swiper) {
				//ここでGAに通知
				sendGA(swiper);
			},
			onSlideChangeEnd: function (swiper) {
				//スライド連動
				galleryObjects.inContent.thumbs.slideTo(swiper.realIndex);
				$(galleryObjects.inContent.thumbs.wrapper).find('.item').removeClass('current-slide');
				$(galleryObjects.inContent.thumbs.slides[swiper.realIndex]).addClass('current-slide');
			},
		});

		//ギャラリーモード開始
		$('#gallery > .item,.view,.front .more.btn').on('click', function (event) {

			//オートプレイ停止
			// galleryObjects.inContent.main.stopAutoplay();

			location.hash = 'gallery';
			$('#modal').appendTo($('body'));

			//スワイプが出来るのを示すための矢印表示
			//$('.pc_swiper-container').append('<p class="startarrow_l"><i class="fa fa-angle-left" aria-hidden="true"></i></p>');
			//$('.pc_swiper-container').append('<p class="startarrow_r"><i class="fa fa-angle-right" aria-hidden="true"></i></p>');
			// $('#allWrap').height($('#modal').height()).css('overflow-y', 'hidden');
			//$(".main_slider-prev").clone().appendTo($('.pc_swiper-container'));
			//$(".main_slider-next").clone().appendTo($('.pc_swiper-container'));

			//ページ位置移動
			$('#allWrap,.ad,#all-wrapper').wrapAll('<div class="hide" style="display: none;">');
			$('#allWrap').css('position', 'inherit');

			$('body').css('min-width', 'auto');

			//モジュール表示
			$('#modal').addClass('on').height('100%').show();

			//キャプションスライド
			var cap = new Swiper('#modal .caption_slide', {
				effect: 'fade',
				loop: true,
			});
			galleryObjects.inModal.caption = cap;

			//サムネイルスライド
			var thum = new Swiper('#modal .pc_gallery-thumbs', {
				spaceBetween: 8,
//				centeredSlides: true,
				slidesPerView: 'auto',
				touchRatio: 0.2,
				slideToClickedSlide: true,
				nextButton: '#modal .thumb_slider-next',
				prevButton: '#modal .thumb_slider-prev',
				onClick: function (swiper, event) {
					var index = swiper.clickedIndex + 1;
					galleryObjects.inModal.main.slideTo(index);
				}
			});
			galleryObjects.inModal.thumbs = thum;

			//メインスライド
			var pc = new Swiper('#modal .pc_swiper-container', {
				slidesPerView: 1,
				effect: 'fade',
				loop: true,
				autoplay: 6000,
				autoplayDisableOnInteraction: false,
				pagination: '.caption_slide .gallery-pagination',
				paginationType: 'fraction',
				nextButton: '.main_slider-next,.startarrow_r',
				prevButton: '.main_slider-prev,.startarrow_l',
				paginationFractionRender: setPagination,
				onInit: function (swiper) {
					swiper.params.control = galleryObjects.inModal.caption;
					galleryObjects.inModal.caption.params.control = swiper;
					$(galleryObjects.inModal.thumbs.slides[0]).addClass('current-slide');
				},
				onSlideChangeEnd: function (swiper) {
					//スライド連動
                    $('#modal > div.wrap > div.caption_slide.swiper-container-horizontal.swiper-container-fade > div.swiper-wrapper.itemWrap > div.swiper-slide.item[data-swiper-slide-index!='+swiper.realIndex+']').css('opacity','0')
					galleryObjects.inModal.thumbs.slideTo(swiper.realIndex);
					$(galleryObjects.inModal.thumbs.wrapper).find('.item').removeClass('current-slide');
					$(galleryObjects.inModal.thumbs.slides[swiper.realIndex]).addClass('current-slide');
				},
				onTransitionEnd: function (swiper) {
					//ここでGAに通知
					sendGA(swiper);
					$(swiper.slides).show();
					//バナー切り替え
					var items = $('.bannerArea').find('.item');
					var max = items.length;
					var selectBanner = parseInt((Math.random() * max));
					$('.bannerArea>div').css({transform: 'translate(' + -(selectBanner * items.eq(0).width()) + 'px, 0)'});
				},
				onImagesReady: function (swiper) {
					//読み込まれて2秒後に表示を消す
					//  setTimeout(function(){
					//    $(".startarrow_l").fadeOut('200', function() {
					//        $(this).remove();
					//    });
					//    $(".startarrow_r").fadeOut('200', function() {
					//        $(this).remove();
					//    });
					// },2000);
					//$(".control .navi").clone().appendTo($('.pc_swiper-container'));
				}
			});
			galleryObjects.inModal.main = pc;

			//オートプレイ切替
			var toggleAutoplay = function (mode) {
				if (mode === 'start') {
					galleryObjects.inModal.main.startAutoplay();
					$('#btn_autoPlayToggle').removeClass('start').addClass('stop');
				} else {
					galleryObjects.inModal.main.stopAutoplay();
					$('#btn_autoPlayToggle').removeClass('stop').addClass('start');
				}
			};

			//起動直後はオートプレイ停止
			toggleAutoplay('stop');

			//コンテンツ下サムネイルクリック時に初期スライドをセット
			var currentIndex = $('#gallery .item').index(this);
			if ($('body').hasClass('single-backnumber')) {
				currentIndex = 0;
			}
			if (currentIndex !== -1) {
				currentIndex++;
				galleryObjects.inModal.main.slideTo(currentIndex);
			} else {
				galleryObjects.inModal.main.slideTo(galleryObjects.inContent.main.activeIndex);
			}

			var that = this;
			$("#modal img").unveil(200, function () {
				console.log('on');
				$(this).removeClass('lazy2');

                if ($(that).hasClass('item')) {
                    currentIndex = ($('#gallery > .item').index(that) + 1);
                    console.log(currentIndex);
                    galleryObjects.inModal.main.slideTo(currentIndex);
                }
			});

			if (!existModal) {
				$('#modal')
						.on('click', '.close', function (event) {
							//クローズが押された時
							$('#mathBody').css('opacity', 1);
							$('#allWrap,#all-wrapper').css({
								'overflow': 'visible',
								position: 'relative',
								height: 'inherit'
							});
							$('#modal').removeClass();
							$('#modal').addClass('slide');
							pc.destroy(false, true);
							thum.destroy(false, true);
							$('#modal').hide();
							$('#allWrap, #all-wrapper').unwrap('.hide');

							//モーダルのオートプレイは停止する
							toggleAutoplay('stop');

							//コンテンツ内のオートプレイ再開
							galleryObjects.inContent.main.startAutoplay();

							//Gallery表示中のハッシュ取る
							location.hash = '';

							//inContentのスライダーと連動させる
							galleryObjects.inContent.main.slideTo(galleryObjects.inModal.main.realIndex);

							// var r = $('#gallery').offset().top;
							// $(window).scrollTop(r);
							for (var obj in galleryObjects.inModal) {
								galleryObjects.inModal[obj].destroy(false, true);
							}
						})
						.on('click', '#btn_autoPlayToggle', function (event) {
							var mode = 'stop';
							if ($(this).hasClass('start')) {
								mode = 'start';
							}
							toggleAutoplay(mode);
						});

				//全ての設定が終わったらTRUE
				existModal = true;
			}
		});
	// }
});



//スクロールバー改造
$(function () {
	$('.scroll').perfectScrollbar();
});


//PC 記事の並べ替え・HOVER時の色変え
// $(function () {
// 	$('article.grid').on({
// 		'mouseenter': function () {
// 			var num = Math.floor(Math.random() * 2);
// 			if (num == 1) {
// 				$(this).css('background', '#feece8');
// 			} else {
// 				$(this).css('background', '#e8f6f9');
// 			}
// 		},
// 		'mouseleave': function () {
// 			$(this).css('background', 'inherit');
// 		}
// 	});
// });


//サイドバー追尾
// Added at new design 2017
$(document).ready(function () {
	$('.flexbox > div:last-child').addClass('right-column');
});
// Disabled at new design 2017
/*
(function () {
	$(function () {

		// if ($('.page-members,.page-contact,.page-ad,.page-shoplist,body.search')) return;
		var first_child = $('.flexbox>div:first-child'),
				tieup = $('.flexbox>div:last-child .tieup'),
				side = $('.flexbox > div:last-child'); //サイドバーのID;

		if (tieup.height() > first_child.height())
			return;
		side.wrapInner('<div class="fixed_tieup"></div>');
		side.css({
			position: 'relative'
		});

		var adjust = function () {
			if ($('body').hasClass('MenuOpen'))
				return;

			// fixTop = fix.css('position') === 'static' ? sideTop + fix.position().top : fixTop;
			var fixHeight = fix.outerHeight(true),
					mainHeight = main.outerHeight(),
					winTop = w.scrollTop();


			if (first_child.height() <= fix.height()) {
				fix.children().unwrap();
				return;
			} else if (winTop + fixHeight > mainTop + mainHeight) {
				fix.css({
					position: 'absolute',
					// top: mainHeight - fixHeight
					top: 'inherit',
					bottom: 0
				});
			} else if (winTop + fixTopDefault >= mainTop) {
				fix.css({
					position: 'fixed',
					top: fixTopDefault,
					bottom: 'inherit'
				});
			} else {
				fix.css('position', 'static');
			}
		}
		//動画広告が読み込みに時間かかるため対策として5秒待つ
		$(function () {
			setTimeout(function () {
				fix = $('.fixed_tieup'), //固定したいコンテンツ
						main = $('.flexbox'), //固定する要素を収める範囲
						all = $('#allWrap'), //広告が出る時用
						mathBody = $('#mathBody'),
						sideTop = side.offset().top,
						fixTop = fix.offset().top,
						mainTop = main.offset().top,
						mathBodyTop = mathBody.offset().top,
						allTop = all.offset().top,
						fixTopDefault = fixTop - allTop + (mathBodyTop - mainTop), //固定位置
						mainTop = main.offset().top,
						w = $(window);
				w.on('scroll load', adjust);
			}, 5000);
		});
	});
})(jQuery);
*/