$(document).ready(function(){

	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
	
	var 
	$body = $('body'),
	$window = $(window),
	$footer = $('footer');

	$window.on('resize', function() {
		footerPos();
		respFilter();
	});

	$("#addEmail").click(function(e) {
            var r = /^[\w\.\d-_]+@[\w\.\d-_]+\.\w{2,4}$/i;
            var m = document.getElementById("s_email").value;
            if (r.test(m)) {
                $.ajax({
                    url: '../subscribe',
                    data: { email: m },
                    type: 'post',
                    success: function(data) {
                        document.getElementById("s_email").value = '';

                        if(data) {
                            $('.modal_alert_book').dialog();

                            setTimeout(function() {
                                $('.modal_alert_book').hide(300);
                            }, 2000);        
                        } else {
                            $('.modal_alert_mail_isset').dialog();

                            setTimeout(function() {
                                $('.modal_alert_mail_isset').hide(300);
                            }, 2000);    
                        }
                        setTimeout(function() {
                            $(".dialog_close").trigger("click");
                        }, 2300);
                    },
                });
            } else {
                $('.modal_fail_email').dialog();

                setTimeout(function() {
                    $('.modal_fail_email').hide(300);
                }, 2000);        

                setTimeout(function() {
                    $(".dialog_close").trigger("click");
                }, 2300);
            }
    });

    $('#email').keydown(function(event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            $("#addEmail").click();
            return false;
        }
    });

    if(window.location.hash == '#unsubscribe') {
        window.location.hash = '';

        $('.modal_alert_unsubscribe').dialog();

        setTimeout(function() {
            $('.modal_alert_unsubscribe').hide(300);
        }, 4000);        

        setTimeout(function() {
            $(".dialog_close").trigger("click");
        }, 4400);
    }    

    if(window.location.hash == '#registred') {
        window.location.hash = '';

        $('.modal_success_reg').dialog();

        setTimeout(function() {
            $('.modal_success_reg').hide(300);
        }, 4000);        

        setTimeout(function() {
            $(".dialog_close").trigger("click");
        }, 4400);
    }


	function footerPos() {
		if ($window.height() > $body.outerHeight()) { $footer.addClass('fixed_footer'); }
		else { $footer.removeClass('fixed_footer'); }
	}
	footerPos();

	$.fn.dialog = function() {
		var $this = $(this),
		$dialogWrapper = $('.dialog_wrapper'),
		$dialog = $('.dialog'),
		$dialogBg = $('.dialog_bg'),
		$dialogClose = $('.dialog_close'),
		wPosSet = $window.scrollTop(),
		wPosGet = $body.attr('data-scroll');
		$dialogWrapper.show();
		$dialogBg.show();
		$this.show();
		$body.addClass('dialog_opened');
		$body.css('top', - wPosSet+'px');
		$body.attr('data-scroll', wPosSet);
		if ($this.height() > $dialogWrapper.height()) {	$body.addClass('dialog_scrollable'); } else { $body.addClass('dialog_scrollable'); }
		if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) { $body.addClass('dialog_scrollable_mobile'); }
		$dialogClose.on('click', function() {
			$dialog.hide();
			$dialogBg.hide();
			$dialogWrapper.hide();
			$body.removeClass('dialog_opened', 'dialog_scrollable_mobile');
			$window.scrollTop(wPosSet);
		});
	};

	// navigation
	$('.navigation_btn').on('click', function () {
		$(this).toggleClass('isOpen');
		$('.dark_overlay').toggleClass('nav-opened');
		$('.navigation').toggleClass('nav-opened');
	});


	$('.dark_overlay').click(function() {
		$(this).removeClass('nav-opened');
		$('.navigation').removeClass('nav-opened');
		$('.navigation_btn').removeClass('isOpen');
	});


	$('.map_overlay').on('click', function () {
		$(this).hide();
	});

	function dropdownNavigation () {
		if($window.width() < 768 ) {
			$('.dropDown > a').on('click', function (e) {
				e.preventDefault();
				$(this).next('ul').slideToggle();
			});
		}
	}
	dropdownNavigation()

	// drop Toggle
	$('.js_DropBtn').on('click', function () {
		$(this).closest('.js_DropWrap').toggleClass('isOpened').find('.js_DropBox').slideToggle(200);
		return false;
	});

	// сворачивание drop Toggle при клике вне списка
	$('html,body').click(function(event) {
		var eventInMenu = $(event.target).parents('.js_DropWrap');
		if(!eventInMenu.length) {
			$('.js_DropWrap').removeClass('isOpened');
			$('.js_DropBox').slideUp(200);
		}
	});

	// кнопка вверх
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			$('.btn_up').fadeIn();
		} else {
			$('.btn_up').fadeOut();
		}
	});
	$('.btn_up').click(function () {
		$('body,html').animate({scrollTop: 0}, 400);
		return false;
	});

	// filters
	$('.filterHead').on('click', function () {
		var fw = $(this).closest('.filterWrap');
		var hc = fw.hasClass('isOpened');

		if ( hc ) {
			fw.find('.filterBody').slideUp(200);
			fw.removeClass('isOpened');
		} else {
			fw.find('.filterBody').slideDown(200);
			fw.addClass('isOpened');
		}
		return false;
	});

	function respFilter () {
		if ( $(window).width() <= 850 ) {
			$('.filterWrap').removeClass('isOpened');
			$('.filterBody').slideUp(200);
		}
	}

	respFilter();

	$('.filter_sort_by').styler({
		singleSelectzIndex: 1
	});

	// placeholder in input
	$('.input_effect .input').on('focus', function () {
		$(this).closest('.input_effect').addClass('focus');
	});

	$('.input_effect .input').on('blur', function () {
		var inpVal = $(this).val();
		if ( inpVal == '' ) {
			$(this).closest('.input_effect').removeClass('focus');
		}
	});

	// testing input with effect
	$('.input_effect .input').each(function () {
		if( $(this).val() != '' ) {
			$(this).closest('.input_effect').addClass('focus');
		}
	})

	$(document).ready(function() {
		$('.type_number .minus').click(function () {
			var $input = $(this).parent().find('input');
			var count = parseInt($input.val()) - 1;
			count = count < 1 ? 1 : count;
			$input.val(count);
			$input.change();
			return false;
		});
		$('.type_number .plus').click(function () {
			var $input = $(this).parent().find('input');
			$input.val(parseInt($input.val()) + 1);
			$input.change();
			return false;
		});
	});

	// tabs
	var $wrapper = $('.tab_wrapper'),
	$allTabs = $wrapper.find('.tab_item'),
	$tabMenu = $wrapper.find('.tab_menu li');

	$tabMenu.each(function(i) {
		$(this).attr('data-tab', 'tab'+i);
	});

	$allTabs.each(function(i) {
		$(this).attr('data-tab', 'tab'+i);
	});

	$tabMenu.on('click', function() {

		var dataTab = $(this).data('tab'),
		$getWrapper = $(this).closest($wrapper);

		$getWrapper.find($tabMenu).removeClass('active');
		$(this).addClass('active');

		$getWrapper.find($allTabs).hide();
		$getWrapper.find($allTabs).filter('[data-tab='+dataTab+']').show();
		footerPos();
	});


	$('.btn_open_login').on('click', function () {
		$('.dialog_close').trigger('click');
		$('.modal_login').dialog();
		return false;
	});

	$('.btn_open_reg').on('click', function () {
		$('.dialog_close').trigger('click');
		$('.modal_registration').dialog();
		return false;
	});

	$('.product_slider').on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
		var i = (currentSlide ? currentSlide : 0) + 1;
		$('.product_controls .product_count').text(i + ' / ' + slick.slideCount);
	});

	$('.product_slider').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		infinite: false,
		prevArrow: '<button type="button" class="slick-prev"></button>',
		nextArrow: '<button type="button" class="slick-next"></button>',
		appendArrows: $('.product_controls')
	});




	$('.product_slider .slick-track, #mygallery').lightGallery({
		download:false,
		counter: true,
	});



	Share = {
				facebook: function(purl, ptitle, pimg, text) {
					url  = 'http://www.facebook.com/sharer.php?s=100';
					url += '&p[title]='     + encodeURIComponent(ptitle);
					url += '&p[summary]='   + encodeURIComponent(text);
					url += '&p[url]='       + window.location.href;
					url += '&p[images][0]=' + encodeURIComponent(pimg);
					Share.popup(url);
				},
				twitter: function(purl, ptitle) {
					url  = 'http://twitter.com/share?';
					url += 'text='      + encodeURIComponent(ptitle);
					url += '&url='      + window.location.href;
					url += '&counturl=' + encodeURIComponent(purl);
					Share.popup(url);
				},
				google: function(purl, ptitle, pimg, text) {
	                url = 'https://plus.google.com/share?';
	                url += 'url=' + window.location.href;
	                url += '&title=' + encodeURIComponent(ptitle);
	                url += '&description=' + encodeURIComponent(text);
	                url += '&image=' + encodeURIComponent(pimg);
	                Share.popup(url);
	            },

				popup: function(url) {
					window.open(url,'','toolbar=0,status=0,width=626,height=436');
				}
	};
	

});
