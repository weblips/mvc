;(function() {
    'use strict';
    var desk = 1024;
    $(document).ready(function() {
    	$('.j-cookie-closer').click(function(e) {
    		e.preventDefault();
    		$(this).parent().remove();
    		return false;
    	});

    	$('.j-mainnav__top').click(function(e) {
    		if(window.innerWidth < desk) {
    			e.preventDefault();
    			$(this).parent().toggleClass('tapped').siblings('.tapped').removeClass('tapped');
    			return false;
    		}
    	});

    	$('.j-mainnav__mid').click(function(e) {
    		e.preventDefault();
    		$(this).parent().toggleClass('tapped').siblings('.tapped').removeClass('tapped');
    		return false;
    	});

    	$('.j-mainnav__trigger').click(function(e) {
    		e.preventDefault();
    		$('.j-mainnav').toggleClass('visible');
    		$('body').toggleClass('menuOpen');
    	});

    	$('.j-search__trigger').click(function(e) {
    		e.preventDefault();
    		$('.j-mainnav').toggleClass('visible visible--search');
    		$('body').toggleClass('menuOpen');
    	});

    	$('.j-usernav__trigger').click(function(e) {
    		if(window.innerWidth < desk) {
    			e.preventDefault();
    			$('.j-mainnav').toggleClass('visible visible--usernav');
    			$('body').toggleClass('menuOpen');
    		}
    	});

    	$('.j-minicart__trigger').click(function(e) {
    		if(window.innerWidth < desk) {
    			e.preventDefault();
    			$('.j-mainnav').toggleClass('visible visible--minicart');
    			$('body').toggleClass('menuOpen');
    		}
    	});

    	$('.j-carousel').on('init', function(){
    		$('.j-carouselnav > a').eq(0).addClass('active');
    	}).on('beforeChange', function(event, slick, currentSlide, nextSlide){
    		$('.j-carouselnav > a').eq(nextSlide).addClass('active').siblings('.active').removeClass('active');
    	}).slick({
    		autoplay: true,
    		autoplaySpeed: 4000,
    		arrows: true,
    		prevArrow: '<span class="icon icon--arrow-left carousel__control carousel__control--prev"></span>',
    		nextArrow: '<span class="icon icon--arrow-right carousel__control carousel__control--next"></span>'
    	});

    	$('.j-carouselnav > a').each(function(index,item) {
    		$(item).click(function(e) {
    			e.preventDefault();
    			$('.j-carousel').slick('slickGoTo',index);
    			return false;
    		});
    	});

    	$('.j-carousel--products').slick({
    		slidesToShow: 4,
    		slidesToScroll: 1,
    		centerMode: false,
    		centerPadding: '0px',
    		dots: true,
    		autoplay: false,
    		arrows: true,
    		prevArrow: '<span class="icon icon--arrow-left-black carousel__control carousel__control--prev"></span>',
    		nextArrow: '<span class="icon icon--arrow-right-black carousel__control carousel__control--next"></span>',
    		responsive: [,{
    			breakpoint: 1200,
    			settings: {
    				slidesToShow: 3
    			}
    		},{
    			breakpoint: 1023,
    			settings: {
    				slidesToShow: 2,
    				arrows: false
    			}
    		},{
    			breakpoint: 639,
    			settings: {
    				slidesToShow: 1,
    				arrows: false
    			}
    		}]
    	});

    	$('.j-carousel__filters--products > a').click(function(e) {
    		e.preventDefault();
    		$(this).addClass('active').siblings('.active').removeClass('active');
    		return false;
    	});

    	$('.j-homepagenav__top').click(function(e) {
    		if(window.innerWidth < desk) {
    			e.preventDefault();
    			$(this).parent().toggleClass('tapped').siblings('.tapped').removeClass('tapped');
    			return false;
    		}
    	});

    	$('.j-homepagenav__mid').click(function(e) {
    		e.preventDefault();
    		$(this).parent().toggleClass('tapped').siblings('.tapped').removeClass('tapped');
    		return false;
    	});

    	$('.j-homepagenav__trigger').click(function(e) {
    		e.preventDefault();
    		$('.j-mainnav').toggleClass('visible');
    		$('body').toggleClass('menuOpen');
    	});

        $('.j-accordion__trigger').click(function(e) {
            e.preventDefault();
            $(this).toggleClass('closed').next().toggleClass('collapsed');
            return false;
        });

        $('.j-filters__trigger').click(function(e) {
            e.preventDefault();
            $('.j-filters-content').toggleClass('visible');
        });

        $('.j-filters-closer').click(function(e) {
            e.preventDefault();
            $('.j-filters-content').removeClass('visible');
            return false;
        });

        $('.j-customers__nav__tabs > a').click(function(e) {
            e.preventDefault();
            $(this).addClass('active').siblings('.active').removeClass('active');
            return false;
        });

        $('.j-featured-products__nav__tabs > a').click(function(e) {
            e.preventDefault();
            $(this).addClass('active').siblings('.active').removeClass('active');
            return false;
        });

        $('.j-detail__nav__tabs > a').click(function(e) {
            e.preventDefault();
            $(this).addClass('active').siblings('.active').removeClass('active');
            return false;
        });


        $('.j-carousel--preview-thumbs').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.j-carousel--preview',
            focusOnSelect: true,
            vertical: true
        });
        $('.j-carousel--preview').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.j-carousel--preview-thumbs',
            prevArrow: '<span class="icon icon--arrow-left-black carousel__control carousel__control--prev"></span>',
            nextArrow: '<span class="icon icon--arrow-right-black carousel__control carousel__control--next"></span>',
            responsive: [,{
                breakpoint: 1200,
                settings: {
                    arrows: false
                }
            },{
                breakpoint: 1023,
                settings: {
                    arrows: true
                }
            }]
        });

        $('#slider')
            .slider({
                max: 12,
                range: true,
                values: [5, 15],
                labels: false
            })
            .slider('pips', {
                rest: 'label'
            })
            .slider('float');

        $('.j-carousel--discount').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            arrows: true,
            prevArrow: '<span class="icon icon--angle-black icon--rotate-left carousel__control carousel__control--prev"></span>',
            nextArrow: '<span class="icon icon--angle-black icon--rotate-right carousel__control carousel__control--next"></span>',
            responsive: [,{
                breakpoint: 639,
                settings: {
                    slidesToShow: 3
                }
            }]

        });

        $('.j-carousel--offers').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: true,
            arrows: false,
            responsive: [,{
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3
                }
            },{
                breakpoint: 1023,
                settings: {
                    slidesToShow: 2
                }
            },{
                breakpoint: 639,
                settings: {
                    slidesToShow: 1
                }
            }]
        });

        $('.j-carousel--gift-box').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            prevArrow: '<span class="icon icon--angle-black icon--rotate-left carousel__control carousel__control--prev"></span>',
            nextArrow: '<span class="icon icon--angle-black icon--rotate-right carousel__control carousel__control--next"></span>',
            responsive: [,{
                breakpoint: 1023,
                settings: {
                    slidesToShow: 2
                }
            },{
                breakpoint: 639,
                settings: {
                    slidesToShow: 1
                }
            }]
        });

        $('.j-product__add').click(function(e) {
            e.preventDefault();
            $('.modal--product-add-cart').show();
            return false;
        });

        $('.j-modal__closer').click(function(e) {
            e.preventDefault();
            $('.modal').hide();
            return false;
        });

        $('.j-notification-panel__trigger').click(function(e) {
            e.preventDefault();
            $('.j-notification-panel__content').slideToggle('slow');
            $(this).toggleClass('open');
        });       

        $('.j-my-bv__menu a').click(function(e) {
            e.preventDefault();

            var target = $(this).attr('data-target');

            $('.j-my-bv__menu a').removeClass('active');
            $(this).addClass('active');

            $('.my-bv-content__right .section-page').hide();
            $('.my-bv-content__right ' + target).show();
        });

        $('#my-bv-dati-personali-ordini .j-my-bv-nav__tabs a').click(function(e) {
            e.preventDefault();

            var target = $(this).attr('data-tab');

            $('#my-bv-dati-personali-ordini .j-my-bv-nav__tabs a').removeClass('active');
            $(this).addClass('active');

            $('#my-bv-dati-personali-ordini .tabs__panel').hide();
            $('#my-bv-dati-personali-ordini ' + target).show();
        });

        $('#my-bv-gamification .j-my-bv-nav__tabs a').click(function(e) {
            e.preventDefault();

            var target = $(this).attr('data-tab');

            $('#my-bv-gamification .j-my-bv-nav__tabs a').removeClass('active');
            $(this).addClass('active');

            $('#my-bv-gamification .tabs__panel').hide();
            $('#my-bv-gamification ' + target).show();
        });

        $('.j-carousel--medals-won-thumbs').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.j-carousel--medals-won',
            arrows: true,
            autoplay: true,
            centerMode: true,
            centerPadding: '0px',
            prevArrow: '<span class="icon icon--angle-black icon--rotate-left carousel__control carousel__control--prev"></span>',
            nextArrow: '<span class="icon icon--angle-black icon--rotate-right carousel__control carousel__control--next"></span>'
        });
        $('.j-carousel--medals-won').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            asNavFor: '.j-carousel--medals-won-thumbs'
        });

        $('.j-carousel--medals-to-be-won-thumbs').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.j-carousel--medals-to-be-won',
            arrows: true,
            autoplay: true,
            prevArrow: '<span class="icon icon--angle-black icon--rotate-left carousel__control carousel__control--prev"></span>',
            nextArrow: '<span class="icon icon--angle-black icon--rotate-right carousel__control carousel__control--next"></span>'
        });
        $('.j-carousel--medals-to-be-won').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: false,
            asNavFor: '.j-carousel--medals-to-be-won-thumbs'
        });

        $('#datepicker').datepicker();

        $('.j-menu-mobile-panel__trigger').click(function(e) {
            e.preventDefault();
            $(this)
                .toggleClass('open')
                .parent()
                .next('.j-menu-mobile-panel__content')
                .slideToggle('slow');
        });

        $('.j-menu-mobile-panel__content a').click(function(e) {
            e.preventDefault();

            var target = $(this).attr('data-tab');
            var targetParent = $(this).attr('data-tab-parent');

            $('.j-menu-mobile-panel__content a').removeClass('active');
            $(this).addClass('active');

            $('.my-bv-content__right .section-page').hide();
            $('.my-bv-content__right .section-page .tabs__panel').hide();
            $('.my-bv-content__right ' + targetParent).show();
            $('.my-bv-content__right ' + target).show();
        });

        $('#upload-button').change(function() {
            $('#upload-file').val($(this).val());
        });

        /* store locator */
        $('.j-storelocatorMapTrigger').click(function(ev) {
            ev.preventDefault();
            $(ev.currentTarget).find('.icon').toggleClass('hidden').toggleClass('active');
            $('.j-storelocatorMap').toggleClass('visible');
            return false;
        });

        /* palazzo massaini */
        $('.j-carousel--innovazione, .j-carousel--booking').slick({
            autoplay: true,
            autoplaySpeed: 4000,
            arrows: true,
            prevArrow: '<span class="icon icon--arrow-left carousel__control carousel__control--prev"></span>',
            nextArrow: '<span class="icon icon--arrow-right carousel__control carousel__control--next"></span>',
            dots: true
        });

        $('.j-tab').click(function() {
            $('.j-tab.active, .tab-content.active').removeClass('active');
            $(this).addClass('active');
            $('.tab-content--'+$(this).attr('data-tab')).addClass('active');
        });

        /* registrazione */
        $('.j-questions-panel__trigger').click(function(e) {
            e.preventDefault();
            $('.j-questions-panel__content').slideToggle('slow');
            $(this).toggleClass('open');
        });

        $('.j-radioImageButton').click(function(e) {
            e.preventDefault();
            var target = $(this).attr('data-group');
            $('.question__group--'+target).find('.question__group__item').removeClass('selected');
            $(this).parent('.question__group__item').addClass('selected');
        });

    });
})();
;(function() {
	'use strict';
	$(document).ready(function() {
		function setImages() {
			$('[data-imagedesk]').each(function(index,item) {
				if($(item).attr('data-imagedesk')) {
					var _image = (window.innerWidth >= desk) ? $(item).attr('data-imagedesk') : $(item).attr('data-imagemobile');
					$(item).css('background-image','url('+_image+')');
				}
			});
		}
		var desk = 1024;
		setImages();
		$(window).resize(function() {
			setImages();
		});
	});
}());