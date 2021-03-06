(function($){
	//var previousScroll = 0;
	var event_type = 'click';

		
	$(document).ready(function (){

	var service_select = $('select#service-select');
	var service_area_select = $('select.service-area-select');
	var child_service_area_select = $('select.child-service-area-select');
	var start_enquiry_btn = $('a#start-enquiry-btn');

	 $(".selectpicker").selectpicker({
      style: 'btn-lg hp-select',
      size: 5
	  });
	  
	  $(service_area_select).selectpicker('hide');
	  $(child_service_area_select).selectpicker('hide');
	  
	 $(service_select).on("change", function(){
		var selected_id = "#"+$(this).find('option:selected').html().replace(/\s+/g, '-').replace(/&nbsp;/g, '-').toLowerCase()+"-select";
		var val = $(this).val();
		
		$(service_area_select).selectpicker('hide');
		
		if ($('.submit-btn').hasClass('hidden')) {
			$('.submit-btn').removeClass('hidden').addClass('animated fadeIn');
		} 

		if ( $(this).attr("name") === "main-service-area" && val !== 0) {
			$(start_enquiry_btn).attr('href', val);
		}
		
		if ( $(this).attr("name") === "service" && val !== 0) {
			$(start_enquiry_btn).attr('href', val);
		}

		
		$(selected_id).selectpicker('show');
		
	 }); 
	 
	 $(service_area_select).on("change", function(){
		var selected_id = "#"+$(this).find('option:selected').html().replace(/\s+/g, '-').replace(/&nbsp;/g, '-').toLowerCase()+"-select";
		var val = $(this).val();
		
		 $(child_service_area_select).selectpicker('hide');
		
		if ($('.submit-btn').hasClass('hidden')) {
			$('.submit-btn').removeClass('hidden').addClass('animated fadeIn');
		} 
		
		if ( $(this).attr("name") === "main-service-area" && val !== 0) {
			$(start_enquiry_btn).attr('href', val);
		}
		
		$(selected_id).selectpicker('show');
		
	 }); 
	 
	  $(child_service_area_select).on("change", function(){
		var val = $(this).val();
		
		if ($('.submit-btn').hasClass('hidden')) {
			$('.submit-btn').removeClass('hidden').addClass('animated fadeIn');
		} 
		
		if ( $(this).attr("name") === "child-service-area" && val !== 0) {
			$(start_enquiry_btn).attr('href', val);
		}
		
	 }); 
	 
	 //How it Works link
	 
	 $('body').on(event_type,'div.how-it-works-link > a', function(){
		
		var how_it_works_id = $(this).attr('href');
	
		if ( $(how_it_works_id).hasClass('hidden') ) {
			
			$(how_it_works_id).removeClass('hidden').addClass('animated fadeIn');
			$('.tlw-wrapper').addClass('how-it-works-on');
			$('#jmpress').jmpress('init', {
				
				beforeChange: function(element) {
				$('.hiw-nav a').removeClass('active');
				$('.hiw-nav a').eq($(element).index()).addClass('active');
				}
				
			});
		} 
				
		return false;
		
	});
	
	$('body').on(event_type,'button#close-how-it-works', function(){
		
		var how_it_works_panel = $('#how-it-works');
	
		if ( $(how_it_works_panel).hasClass('fadeIn') ) {
			$(how_it_works_panel).removeClass('fadeIn').addClass('fadeOut');
			
			$(how_it_works_panel).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
		
			$(this).removeClass('animated fadeOut').addClass('hidden');	
			$('.tlw-wrapper').removeClass('how-it-works-on');
			$('#jmpress').jmpress('deinit');
			});
		} 
				
		return false;
		
	});
	
	//BUSINESS CAROUSEL FUNCTIONS
	$('.carousel').carousel({
	interval: 5000,
	pause: "hover"
	});
	
	$('#business-carousel').on('slide.bs.carousel', function () {	
	$(this).next().find('.banner-item').removeClass('active');
	});
	
	//GO TO PAGE TOP
	$('body').on(event_type,'button#back-2-top', function(){
	
		$('html, body').animate({ scrollTop: 0 }, 500);

		return false;
		
	});
	
	//Scroll to button
	
	$('body').on(event_type,'a.scroll-to', function(){
		
		var id = $(this).attr('href');
		//console.log( $("#radio-player"));
		$('html, body').animate({scrollTop: ($("a"+id).offset().top)}, 500);	
		
		return false;
		
	});
	
	// VIEW RADIO FILES BUTTON 
	
	$('body').on(event_type,'a#call-2-action-radio', function(){
		
		//console.log( $("#radio-player"));
	
		if ( $('.audio-files').hasClass('closed') ) {
			$('html, body').animate({scrollTop: ($("#radio-player").offset().top - 20)}, 500);	
			$('.audio-files').removeClass('closed').addClass('open');
			$(this).addClass('active');
		} else {
			$('.audio-files').removeClass('open').addClass('closed');
			$('div.mejs-pause').find('button').trigger('click');
			$('html, body').animate({ scrollTop: 0 }, 500);
			$(this).removeClass('active');
		}
		
		return false;
		
	});
	
	// CLOSE AUDIO FILES
	
	$('body').on(event_type,'button#close-audio-files', function(){
	
	$('html, body').animate({ scrollTop: 0 }, 500);
	
	if ( $('.audio-files').hasClass('open') ) {
		$('.audio-files').removeClass('open').addClass('closed');
		$('a#call-2-action-radio').removeClass('active');
			
		$('div.mejs-pause').find('button').trigger('click');
	}

	return false;
		
	});
	
	$('body').on(event_type,'button#user-btn', function(){
	
		if ( $(this).parent().hasClass('closed') ) {
			$(this).parent().removeClass('closed').addClass('open');
		} else {
			$(this).parent().removeClass('open').addClass('closed');
		}
		
		return false;
		
	});
	
	$('body').on(event_type,'li.page_item_has_children > a', function(){
		
		var pihc_parent = $(this).parent();
		
		$('li.page_item_has_children').not(pihc_parent).removeClass('view-children').addClass('hide-children');
	
		if ( $(pihc_parent).hasClass('hide-children') ) {
			$(pihc_parent).removeClass('hide-children').addClass('view-children');
		} else {
			$(pihc_parent).removeClass('view-children').addClass('hide-children');

		}
		
		return false;
		
	});
	
	// 	POP UP LINKS MENU BUTTONS
	
	$('body').on(event_type,'div.links-menu > button.close-btn', function(){
		
		var parent = $(this).parent();
		
		if ( $(parent).hasClass('open') ) {
			$(parent).removeClass('open').addClass('closing');
			
			$('.closing').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
				$(this).toggleClass('closing closed');	
				$('.tlw-wrapper').removeClass('links-open');
			});
			
		}
		
		return false;
		
	});
	
	
	$('body').on(event_type,'a.dropdown-link', function(){
		
		var dd_parent = $(this).parent();
		
		$('li.with-children').not(dd_parent).removeClass('open').addClass('closed');
	
		if ( $(dd_parent).hasClass('closed') ) {
			$(dd_parent).removeClass('closed').addClass('open');
		} else {
			$(dd_parent).removeClass('open').addClass('closed');
		}
		
		return false;
		
	});
	
	$('body').on(event_type,'button.service-menu-btn', function(){
		
		var links_menu = $('div.links-menu');
		
		if ( $(links_menu).hasClass('closed') ) {
		$(links_menu).removeClass('closed').addClass('open');
		$('.tlw-wrapper').addClass('links-open');
		} 
	
		
		return false;
		
	});


	
	// 	SIDENAV MENU BUTTONS
	$('body').on(event_type,'button#nav-btn', function(){
	
		if ( $('.tlw-wrapper').hasClass('nav-closed') ) {
			
			$('body').addClass('nav-open');	
			
			$('.tlw-wrapper').removeClass('nav-closed').addClass('nav-open');
			$('#side-nav').addClass('side-nav-open');
		} 
		
		return false;
		
	});
	
	$('body').on(event_type,'button#close-nav', function(){
	
		if ( $('.tlw-wrapper').hasClass('nav-open') ) {
			
			$('.tlw-wrapper').removeClass('nav-open').addClass('nav-closed');
			$('li.with-sub-nav').removeClass('sl-tl-open').addClass('sl-tl-closed');
			$('#side-nav').removeClass('side-nav-open');
			$('body').removeClass('nav-open');

		} 
		
		return false;
		
	});
	
	// 	FAQ's
	$('body').on(event_type,'div.faq-question', function(){
		
		var parent = $(this).parent();
		var siblings = $(parent).siblings();
		
		//console.log(siblings);
		
		if (siblings.hasClass('item-open')) {
		siblings.removeClass('item-open').addClass('item-closed');	
		}
		
		parent.toggleClass('item-closed item-open');
		
		return false;
		
	});
	
	$('body').on(event_type,'div.faq-header', function(){
		
		var next = $(this).next();
		
		if ($('div.faq-header').not(this).hasClass('faqs-open')) {
		$('div.faq-header').removeClass('faqs-open').addClass('faqs-closed');	
		$('div.faqs-sub-pgs').removeClass('faqs-sub-open').addClass('faqs-sub-closed');	
		}
		
		$(this).toggleClass('faqs-closed faqs-open');
		next.toggleClass('faqs-sub-closed faqs-sub-open');
		
		return false;
		
	});
	
	//DOWNLOAD BOOKLET GUIDE BUTTON
	
	$('body').on(event_type,'button#file-download-btn', function(){
		
		var next = $(this).next();
		
		$(next).toggleClass('form-open form-closed');	
		$('html, body').animate({scrollTop: ($("button#file-download-btn").offset().top) - 30}, 500);
		
		return false;
		
	});
	
	$(document).bind('gform_confirmation_loaded', function(event, formId){
            if(formId === 19 && $('a#download-file-btn').length === 1) {
               $('a#download-file-btn').removeClass('hidden');
               $('html, body').animate({scrollTop: ($("button#file-download-btn").offset().top - 20)}, 500);	
            }
            
            if(formId === 20 && $('#hidden-download').length === 1) {
               $('#hidden-download').removeClass('hidden');
               $('.gform_heading').addClass('hidden');
               $('html, body').animate({scrollTop: ($("#hidden-download").offset().top - 20)}, 500);	
            }
    });
	
	// 	HEADER SEARCH BUTTON
	
	$('body').on(event_type,'a#search-btn', function(){
	
		if ( $('#search-pop-up').hasClass('off') ) {
			
			$('#search-pop-up').removeClass('off').addClass('on');
		} 
		
		return false;
		
	});
	
	$('body').on(event_type,'button#close-search', function(){
	
		if ( $('#search-pop-up').hasClass('on') ) {
			$('#search-pop-up').removeClass('on').addClass('turn-off');
			
			$('.turn-off').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
		
				$(this).removeClass('turn-off').addClass('off');	
				
			});

		} 
		
		return false;
		
	});
	
	
	//-------------------------------
	
	
	$('body').on('click', "li.with-sub-nav > a", function(){
		var parent = $(this).parent();
		$(parent).siblings().removeClass('sl-tl-open').addClass('sl-tl-closed');
		
		if ($(parent).hasClass('top-level')) {
			$(parent).find('.sl-tl-open').removeClass('sl-tl-open').addClass('sl-tl-closed');
		}
		
		$(parent).toggleClass('sl-tl-open sl-tl-closed');
		
		
	return false;	
	});
	
	 /* FEED SCROLLER 
	Adds new styled scroll bars to media feeds   
   */
   	
	$('.feed-wrap').slimScroll({
        height: '300px'
    });
    
    /* ACCESSABILITY FUNCTIONS 
	   Button actions to control the text size
    */
    
    $('body').on(event_type,'button.access-btn', function(){
    
    	var txt_size = $(this).attr('data-role');
    	
    	$(this).siblings().removeClass('active');
    	$(this).addClass('active');
    	
    	 $('body').removeClass('txt-md txt-lg txt-sm').addClass(txt_size);
    	 $.cookie('font_size', txt_size, { path: '/' } );  
	     	     			
		return false;
		
	});
	
		$('#feedback-carousel').carousel({
			pause: false,
			interval: 7000
		});
		
			if ($('#enqiry-start-form')) {
			
			$('#enqiry-start-form').show();	
				
			}
			
		var fa_fix = $('#cookie-law-info-bar').next();
		
		if ($(fa_fix).is('i')) {
			
			if ($(fa_fix).next().is('i')) {
			$(fa_fix).next().remove();	
			}
			
			$('#cookie-law-info-bar').next().remove();
			
		}
		
		/* XMAS Pop up Function
	   This function controls the Xmas pop up box
    */
    
    	var xmasBox = function(){

			if ($('#xmas-popup-wrap').length === 1 && $('#xmas-popup-wrap').hasClass('pop-up-inactive')) {
				
				$('#xmas-popup-btn-wrap').removeClass('pop-up-inactive').addClass('pop-up-active');
		
				$('#xmas-popup-wrap').fadeIn('slow', function(){
				
					$('.xmas-popup-inner').removeClass('hidden').addClass('animated slideInUp');
				
				});
			
			}
    
		};

    	//Transition end actions
	    $('.xmas-popup-inner').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
			
			if ($(this).hasClass('bounceOutDown')) {
			 $('#xmas-popup-wrap').fadeOut('fast').removeClass('pop-up-active').addClass('pop-up-inactive');	
			 $('#xmas-popup-btn-wrap').removeClass('pop-up-active').addClass('pop-up-inactive');
			 $(this).removeClass('animated bounceOutDown').addClass('hidden');
			}
		});
		
		//Button actions
		
		$('body').on(event_type,'button#xmas-popup-btn-open', function(){
	    	
	    	xmasBox();    			
			return false;
			
		});
	
	    
	    $('body').on(event_type,'button#close-xmas-popup', function(){
		    
		   $('.xmas-popup-inner').removeClass('slideInUp').addClass('bounceOutDown');   
	    	      			
			return false;
			
		});
		
		/* Law Awards Pop up Function
	   This function controls the Xmas pop up box
    	*/
    	
    	 $('body').on(event_type,'button#close-awards-btn', function(){
		    
		   $(this).parent().removeClass('open').addClass('closed');   
	    	      			
			return false;
			
		});

	});


	
	$(window).on("resize", function(){


	});
	
	$(window).load(function(){
		
		if ($('a#call-2-action-radio').length === 1) {
			$('#call-2-action-radio').removeAttr('disabled');
			$('i.fa-spinner').hide();
		}
		
		if ($('body').hasClass('loading') && $('#site-loader').length === 1) {
			$('body').removeClass('loading').addClass('loaded');	
		
			$('#site-loader').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
				$(this).hide();	
			});

		}
		
		if ($('.scroll-sidebar').length === 1) {
		
			$('.sidebar').hcSticky({
			top: 20,
			bottom: 0,
			stickTo: '.content',
			followScroll: false
			});
		}

	});
	
	$(window).scroll(function(){
	var scroll = $(window).scrollTop();
	var header_h = $('.header').outerHeight();
	var h = $(window).height();
	
	//console.log(scroll > Math.ceil(h/2));
	
		if ( scroll > Math.ceil(h/2) ) {
		$('button#back-2-top').removeClass('hidden').addClass('visible fadeIn');	
		}
		
		if ( scroll <= header_h && $('button#back-2-top').hasClass('visible') ) {
		$('button#back-2-top').removeClass('fadeIn').addClass('fadeOut');	
		
			$('button#back-2-top').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
		
			$(this).removeClass('visible fadeOut').addClass('hidden');	
		
			});
			
		}
		
	});
	
	
})(window.jQuery);