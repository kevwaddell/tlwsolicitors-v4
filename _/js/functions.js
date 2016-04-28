(function($){
	//var previousScroll = 0;
	var event_type; 
	var tagInterval;
	var current_section = "#top";
	
	if (Modernizr.touch){
	
	 event_type = 'touchstart';
	  
	} else {
	 
	 event_type = 'click';	
	 
	}
	
	function printPage() {
    window.print();

    //workaround for Chrome bug - https://code.google.com/p/chromium/issues/detail?id=141633
    if (window.stop) {
        location.reload(); //triggering unload (e.g. reloading the page) makes the print dialog appear
        window.stop(); //immediately stop reloading
    }
    return false;
	}
	
	function isScrolledIntoView(elem) {
	    var $elem = $(elem);
	    var $window = $(window);

	    var docViewTop = $window.scrollTop();
	    var docViewBottom = docViewTop + ($window.height() / 2);
	
	    var elemTop = $elem.offset().top;
	    var elemBottom = elemTop + $elem.height();
	    
/*
	    console.log(elem);
	    console.log("Elem top = "+elemTop);
	    console.log("Doc top = "+docViewTop);
	    
	    console.log("Elem bottom = "+elemBottom);
	    console.log("Doc bottom = "+docViewBottom);
*/
	    
	    if (docViewTop == 0) {
		false;  
	    } else {
		return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));   
	    }
	};
		
	$(document).ready(function (){
		
	var url = document.location.toString();
	var window_width = $(window).width();
	
	//console.log($(window).scrollTop());
	

	var service_select = $('select#service-select');
	var service_area_select = $('select.service-area-select');
	var child_service_area_select = $('select.child-service-area-select');
	var start_enquiry_btn = $('a#start-enquiry-btn');
	
	var section_targets = $('a.section-target');
	
	if (section_targets.length > 0) {
		section_targets.each(function(index, elem){
		
			if ( isScrolledIntoView($(elem)) ) {
			current_section_id = $(elem).attr('id')
			current_section = "#"+current_section_id;
			console.log(current_section);
			}	
			
		});
	}

	 $(".selectpicker").selectpicker({
      style: 'btn-lg hp-select',
      size: 5
	  });
	  
	 $('.selectpicker').find('select').selectpicker({
		'style': 'btn btn-group btn-default', 
		'width': '100%'
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

		if ( $(this).attr("name") == "main-service-area" && val != 0) {
			$(start_enquiry_btn).attr('href', val);
		}
		
		if ( $(this).attr("name") == "service" && val != 0) {
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
		
		if ( $(this).attr("name") == "main-service-area" && val != 0) {
			$(start_enquiry_btn).attr('href', val);
		}
		
		$(selected_id).selectpicker('show');
		
	 }); 
	 
	  $(child_service_area_select).on("change", function(){
		var val = $(this).val();
		
		if ($('.submit-btn').hasClass('hidden')) {
			$('.submit-btn').removeClass('hidden').addClass('animated fadeIn');
		} 
		
		if ( $(this).attr("name") == "child-service-area" && val != 0) {
			$(start_enquiry_btn).attr('href', val);
		}
		
	 }); 
	 
	 //How it Works link
	 
	 $('body').on(event_type,'div.how-it-works-link > a', function(e){
		
		var how_it_works_id = $(this).attr('href');
	
		if ( $(how_it_works_id).hasClass('hidden') ) {
			
			$(how_it_works_id).removeClass('hidden').addClass('animated fadeIn');
			$('.tlw-wrapper').addClass('how-it-works-on');
			$('#jmpress').jmpress('init', {
				
				beforeChange: function(element, eventData) {
				$('.hiw-nav a').removeClass('active');
				$('.hiw-nav a').eq($(element).index()).addClass('active');
				}
				
			});
		} 
				
		return false;
		
	});
	
	$('body').on(event_type,'button#close-how-it-works', function(e){
		
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
	
	$('#business-carousel').on('slide.bs.carousel', function (e) {	
	$(this).next().find('.banner-item').removeClass('active');
	});
	
	//GO TO PAGE TOP
	$('body').on(event_type,'button#back-2-top', function(e){
	
		$('html, body').animate({ scrollTop: 0 }, 500);

		return false;
		
	});
	
	//Scroll to button
	
	$('body').on(event_type,'a.scroll-to', function(e){
		
		var id = $(this).attr('href');
		//console.log( $("#radio-player"));
		$('html, body').animate({scrollTop: ($("a"+id).offset().top)}, 500);	
		
		return false;
		
	});
	
	// VIEW RADIO FILES BUTTON 
	
	$('body').on(event_type,'a#call-2-action-radio', function(e){
		
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
	
	$('body').on(event_type,'button#close-audio-files', function(e){
	
	$('html, body').animate({ scrollTop: 0 }, 500);
	
	if ( $('.audio-files').hasClass('open') ) {
		$('.audio-files').removeClass('open').addClass('closed');
		$('a#call-2-action-radio').removeClass('active');
			
		$('div.mejs-pause').find('button').trigger('click');
	}

	return false;
		
	});
	
	$('body').on(event_type,'button#user-btn', function(e){
	
		if ( $(this).parent().hasClass('closed') ) {
			$(this).parent().removeClass('closed').addClass('open');
			$(this).find('i').removeClass('fa-user').addClass('fa-times');
		} else {
			$(this).parent().removeClass('open').addClass('closed');
			$(this).find('i').removeClass('fa-times').addClass('fa-user');
		}
		
		if ( $('#quick-links').hasClass('open') ) {
			$('#quick-links').removeClass('open').addClass('closed');
		}
		
		return false;
		
	});
	
	$('body').on(event_type,'li.page_item_has_children > a', function(e){
		
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
	
	$('body').on(event_type,'div.links-menu > button.close-btn', function(e){
		
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
	
	
	$('body').on(event_type,'a.dropdown-link', function(e){
		
		var dd_parent = $(this).parent();
		
		$('li.with-children').not(dd_parent).removeClass('open').addClass('closed');
	
		if ( $(dd_parent).hasClass('closed') ) {
			$(dd_parent).removeClass('closed').addClass('open');
		} else {
			$(dd_parent).removeClass('open').addClass('closed');
		}
		
		return false;
		
	});
	
	$('body').on(event_type,'button.service-menu-btn', function(e){
		
		var links_menu = $('div.links-menu');
		
		if ( $(links_menu).hasClass('closed') ) {
		$(links_menu).removeClass('closed').addClass('open');
		$('.tlw-wrapper').addClass('links-open');
		} 
	
		
		return false;
		
	});


	
	// 	SIDENAV MENU BUTTONS
	$('body').on(event_type,'button#nav-btn', function(e){
	
		if ( $('.tlw-wrapper').hasClass('nav-closed') ) {
			
			$('body').addClass('nav-open');	
			
			$('.tlw-wrapper').removeClass('nav-closed').addClass('nav-open');
			$('#side-nav').addClass('side-nav-open');
			
			$('#quick-links').hide();
		} 
		
		return false;
		
	});
	
	$('body').on(event_type,'button#close-nav', function(e){
	
		if ( $('.tlw-wrapper').hasClass('nav-open') ) {
			
			$('.tlw-wrapper').removeClass('nav-open').addClass('nav-closed');
			$('li.with-sub-nav').removeClass('sl-tl-open').addClass('sl-tl-closed');
			$('#side-nav').removeClass('side-nav-open');
			$('body').removeClass('nav-open');
			$('#quick-links').show();

		} 
		
		return false;
		
	});
	
	// 	FAQ's
	$('body').on(event_type,'div.faq-question', function(e){
		
		var parent = $(this).parent();
		var siblings = $(parent).siblings();
		
		//console.log(siblings);
		
		if (siblings.hasClass('item-open')) {
		siblings.removeClass('item-open').addClass('item-closed');	
		}
		
		parent.toggleClass('item-closed item-open');
		
		return false;
		
	});
	
	$('body').on(event_type,'div.faq-header', function(e){
		
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
	
	$('body').on(event_type,'button#file-download-btn', function(e){
		
		var next = $(this).next();
		
		$(next).toggleClass('form-open form-closed');	
		$('html, body').animate({scrollTop: ($("button#file-download-btn").offset().top) - 30}, 500);
		
		return false;
		
	});
	
	$(document).bind('gform_confirmation_loaded', function(event, formId){
            if(formId == 19 && $('a#download-file-btn').length == 1) {
               $('a#download-file-btn').removeClass('hidden');
               $('html, body').animate({scrollTop: ($("button#file-download-btn").offset().top - 20)}, 500);	
            }
            
            if(formId == 20 && $('#hidden-download').length == 1) {
               $('#hidden-download').removeClass('hidden');
               $('.gform_heading').addClass('hidden');
               $('html, body').animate({scrollTop: ($("#hidden-download").offset().top - 20)}, 500);	
            }
    });
	
	// 	HEADER SEARCH BUTTON
	
	$('body').on(event_type,'a#search-btn', function(e){
	
		if ( $('#search-pop-up').hasClass('off') ) {
			
			$('#search-pop-up').removeClass('off').addClass('on');
		} 
		
		return false;
		
	});
	
	$('body').on(event_type,'button#close-search', function(e){
	
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
    
    //POST CONTINUE READING BUTTONS
	$('body').on('click','button#continue-read-btn', function(e){
		
		var inner_h = $('#content-extra-inner').outerHeight();
			
		$('button#continue-read-btn').addClass('hidden');
		
		$('html, body').animate({scrollTop: ($('#content-extra-inner').offset().top - 20)}, 500);
		
		$('#content-extra').animate({height: inner_h+"px"}, 500, function(){
			$('#content-extra').removeClass('closed').addClass('open').removeAttr('style');
		});

		return false;
		
	});
	
	$('body').on('click','button#close-content-extra-btn', function(e){
		
		$('button#continue-read-btn').removeClass('hidden');
		
		$('html, body').animate({scrollTop: ($('h1').offset().top - 200)}, 500);
			
		$('#content-extra').animate({height: "0px"}, 500, function(){
			$('#content-extra').removeClass('open').addClass('closed').removeAttr('style');	
		});	
		
		return false;
		
	});
	
	 /* SERVICES SECTION
	View all links button  
   */
   
   $('body').on('click','button#show-more-links-btn', function(e){
	   	   
		var text = $(this).find('span').text();
		
		$(this).parent().toggleClass('view-all-links');
		
		$(this).find('span').toggleClass('sr-only').text((text == "View More") ? "Close" : "View More");
		
		return false;
	});
   
    
     /* TOOLKIT SCROLLER 
	Adds new styled scroll bars to media feeds   
   */
   
   $('.scrollable-txt').slimScroll({
        height: '470px',
        size: '15px',
        position: 'left',
        alwaysVisible: true,
        railVisible: true,
        railColor: '#D7D7D7',
        color: '#4b4b4b'
    });
    
    /* ACCESSABILITY FUNCTIONS 
	   Button actions to control the text size
    */
    
    $('body').on(event_type,'.type-post button.access-btn', function(e){
    
    	var txt_size = $(this).attr('data-role');
    	
    	$(this).siblings().removeClass('active');
    	$(this).addClass('active');
    	
    	 $('body').removeClass('txt-md txt-lg txt-sm').addClass(txt_size);
    	 $.cookie('font_size', txt_size, { path: '/' } );  
	     	     			
		return false;
		
	});
	
	$('body').on(event_type,'.type-page button.access-btn', function(e){
    
    	var txt_size = $(this).attr('data-role');
    	
    	$(this).siblings().removeClass('active');
    	$(this).addClass('active');
    	
    	 $('body').removeClass('txt-md txt-lg txt-sm').addClass(txt_size);
    	 $.cookie('font_size', txt_size, { path: '/' } );  
	     	     			
		return false;
		
	});
	
	$('body').on(event_type,'#txt-only-content button.access-btn', function(e){
    
    	var txt_size = $(this).attr('data-role');
    	
    	$(this).siblings().removeClass('active');
    	$(this).addClass('active');
    	
    	$('.main-txt').removeClass('txt-md txt-lg txt-sm').addClass(txt_size);
	     	     			
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

			if ($('#xmas-popup-wrap').length == 1 && $('#xmas-popup-wrap').hasClass('pop-up-inactive')) {
				
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
		
		$('body').on(event_type,'button#xmas-popup-btn-open', function(e){
	    	
	    	xmasBox();    			
			return false;
			
		});
	
	    
	    $('body').on(event_type,'button#close-xmas-popup', function(e){
		    
		   $('.xmas-popup-inner').removeClass('slideInUp').addClass('bounceOutDown');   
	    	      			
			return false;
			
		});
		
		$('body').on(event_type, '.tk-slider-nav a', function(){
			
			$(this).parent().siblings().removeClass('active');
			$(this).parent().addClass('active');

			
			var window_offset = $(window).scrollTop();
			var slides_offset = $('#toolkit-slides').offset().top - 110;
			var slide_id = $(this).attr('href');
			var current_slide = $('.tk-slide-active').attr('id');
			var id_split = slide_id.split('#');
			$('#'+current_slide).find('.scrollable-txt').slimScroll({scrollTo: '0px', start: 'top'});
			$('.slimScrollBar').animate({top: '0px'}, 500);
			
			$('.tk-slides-inner').removeClass(current_slide+"-active").addClass(id_split[1]+"-active");
			$('#'+current_slide).removeClass('tk-slide-active');
			$(slide_id).addClass('tk-slide-active');
			
			if (window_offset > slides_offset || window_offset < slides_offset) {
			$('html, body').animate({scrollTop: slides_offset }, 500);
			//console.log(window_offset);	
			}
			
			//console.log(current_slide);	

			return false;
			
		});
		
		/* PAGE TOOLS BTNS */
		
		$('body').on(event_type, 'button#print-pg-btn', function(e){
			printPage();
		});
		
		/* TEXT ONLY FUNCTION */
		
		$('body').on(event_type, 'button#txt-only-btn', function(e){
			
			var main_txt = $('.content-section').find('.main-txt');
			var title_txt = $('.banner-title .container').text();

			var txt_copy = $(main_txt).clone();
			var scroller_h = $('#txt-only-content').innerHeight() - 170;
			
			console.log(scroller_h);
			
			if (title_txt) {
			var title_copy = '<div class="title-header">'+ title_txt +'</div>';	
			$(title_copy).appendTo('#txt-only-wrapper');
			}
			
			$(txt_copy).appendTo('#txt-only-wrapper').slimScroll({height: scroller_h+'px'});
			
			$('#txt-only-wrapper').fadeIn('fast');
			$('body').addClass('txt-only-open');
			
			$('#txt-only-content').removeClass('closed').addClass('open');
			
			return false;
		});
		
		$('body').on(event_type, 'button#close-txt-only-btn', function(e){
			
			$('#txt-only-wrapper').fadeOut('fast').empty();
			
			$('#txt-only-content').removeClass('open').addClass('closed');
			
			$('body').removeClass('txt-only-open');
			
			return false;
		});
		
		/* PAGE BANNER TAG SCROLLER */
		function startTagInterval() {
		tagInterval = setInterval(changeTag, 7000);
		}
	
		function changeTag() {
			
		var currentTag = $('.tag-scroller').find('.active');
		var nextTag = $(currentTag).next();
		
		
			if ($(nextTag).length == 0) {
			var nextTag = $('.tag-scroller-txt').eq(0);	
			}
			
		$(currentTag).fadeToggle(500).removeClass('active');
		$(nextTag).fadeToggle(1000).addClass('active');

		//console.log(nextTag);
		};
		
		startTagInterval();
		
		/* QUICK LINKS IN BANNER SECTION */
		
		$('body').on(event_type, 'nav.banner-links a', function(e){
			
			var hash = $(this).attr('href');
    		var scrollTarget = $(hash).offset().top - 40;
    		current_section = hash;
    		 
    		$('html, body').animate({ scrollTop: scrollTarget }, 500);	   

			return false;
		});
		
		$('body').on(event_type, 'button#scroll-down-btn', function(e){
			var next = $(this).parent().next().find('a.section-target');
			var hash = $(next).attr('id');
    		var scrollTarget = $('#'+hash).offset().top - 40;
    		current_section = '#'+hash;
    		
    		$('html, body').animate({ scrollTop: scrollTarget }, 500);
    		
			//console.log(next);
			
			return false;
		});
		
		/* QUICK LINKS BUTTONS */
		$('body').on(event_type,'button#quick-links-btn-show', function(e){
    	
    		$('#quick-links').toggleClass('open closed');
    		     	     			
			return false;
		
		});
		
		$('body').on(event_type,'button#quick-links-close', function(e){
    	
    		$('#quick-links').toggleClass('open closed');
    		     	     			
			return false;
		
		});
		
		$('body').on(event_type,'.ql-section-links a', function(e){
    		 
    		var hash = $(this).attr('href');
    		var scrollTarget = $(hash).offset().top - 40;
    		current_section = hash;
    		if (current_section == "#toolkit-slides") {
	    	scrollTarget -= 60;	
    		}
    		$(this).siblings().removeClass('active');
    		$(this).addClass('active');
    		//console.log(hash);
    		 
    		$('html, body').animate({ scrollTop: scrollTarget }, 500);	   
    		  			
			return false;
		
		});
		
		$('body').on(event_type,'button#quick-links-2-top', function(e){
	
		$('html, body').animate({ scrollTop: 0 }, 500);

		return false;
		
		});
		
		$('body').on(event_type,'button#quick-links-btn-up', function(e){;
			
			if (current_section != "#top") {
				var prev_section = $(current_section).parent().prev();
				
				if ($(prev_section).find('a.section-target')) {
				var scrollTarget = $(prev_section).offset().top - 40;
				if ($(prev_section).hasClass('toolkit-slider')) {
				scrollTarget -= 60;	
    			}
				$('html, body').animate({ scrollTop: scrollTarget }, 500);		
				} else {
				$('html, body').animate({ scrollTop: 0 }, 500);	
				current_section = "#top";	
				}
			 
			}

		return false;
		
		});
		
		$('body').on(event_type,'button#quick-links-btn-dwn', function(e){
			
			if (current_section != "#top") {
				var next_section = $(current_section).parent().next();
				
				if ($(next_section).find('a.section-target')) {
				var scrollTarget = $(next_section).offset().top - 40;
				
				$('html, body').animate({ scrollTop: scrollTarget }, 500);		
				}
			 
			} else {
				
				//console.log(section_targets[0]);
				
				var next_section = $(section_targets[0]).parent();
				
				if ($(next_section).find('a.section-target')) {
				var scrollTarget = $(next_section).offset().top - 40;
				$('html, body').animate({ scrollTop: scrollTarget }, 500);		
				}
			}
			
			current_section = next_section;

		return false;
		
		});
		
		

	});

	/* END DOC READY FUNCTION */
	
	$(window).on("resize", function(e){


	});
	
	$(window).load(function(e){

		if ($('a#call-2-action-radio').length == 1) {
			$('#call-2-action-radio').removeAttr('disabled');
			$('i.fa-spinner').hide();
		}
		
		if ($('body').hasClass('loading') && $('#site-loader').length == 1) {
			$('body').removeClass('loading').addClass('loaded');	
		
			$('#site-loader').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
				$(this).hide();	
			});

		}
		
		new WOW().init();
		
		if ($('.scroll-sidebar').length == 1) {
		
			$('.sidebar').hcSticky({
			top: 20,
			bottom: 0,
			stickTo: '.content',
			followScroll: false
			});
		}

	});
	
	$(window).scroll(function(e){

		var scroll = $(window).scrollTop();
		var header_h = $('.header').outerHeight();
		var h = $(window).height();
		var section_targets = $('a.section-target');
		
		if (scroll <= (h / 2)) {
		current_section = "#top";
		}
		
		if (section_targets.length > 0) {
			section_targets.each(function(index, elem){
			
				if ( isScrolledIntoView($(elem)) ) {
				var current_section_id = $(elem).attr('id');
				current_section = "#"+current_section_id;
				$('a[href='+current_section+']').siblings().removeClass('active');
				$('a[href='+current_section+']').addClass('active');
				return false;
				} else {
				current_section = "#top";	
				$('.ql-section-links a').removeClass('active');
				}	
				
			});
		}
	//console.log(current_section);	
		
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