!function(e){function t(){return window.print(),window.stop&&(location.reload(),window.stop()),!1}function n(t){var n=e(t),o=e(window),s=o.scrollTop(),a=s+o.height()/2,i=n.offset().top,l=i+n.height();return 0!=s?a>=l&&i>=s:void 0}var o,s,a="#top";o=Modernizr.touch?"touchstart":"click",e(document).ready(function(){function i(){s=setInterval(l,7e3)}function l(){var t=e(".tag-scroller").find(".active"),n=e(t).next();if(0==e(n).length)var n=e(".tag-scroller-txt").eq(0);e(t).fadeToggle(500).removeClass("active"),e(n).fadeToggle(1e3).addClass("active")}function r(){s=setInterval(d,7e3)}function d(){var t=e(".feedback-section-inner").find(".item.active"),n=e(t).next();if(0==e(n).length)var n=e(".feedback-section-inner").find(".item").eq(0);e(t).animate({left:"-100%"},500,function(){e(this).removeClass("active").css("left","100%")}),e(n).animate({left:"0%"},500,function(){e(this).addClass("active")})}var c=(document.location.toString(),e(window).width(),e("select#service-select")),p=e("select.service-area-select"),u=e("select.child-service-area-select"),h=e("a#start-enquiry-btn"),m=e("a.section-target");m.length>0&&m.each(function(t,o){n(e(o))&&(current_section_id=e(o).attr("id"),a="#"+current_section_id,console.log(a))}),e(".selectpicker").selectpicker({style:"btn-lg hp-select",size:5}),e(".selectpicker").find("select").selectpicker({style:"btn btn-group btn-default",width:"100%"}),e(p).selectpicker("hide"),e(u).selectpicker("hide"),e(c).on("change",function(){var t="#"+e(this).find("option:selected").html().replace(/\s+/g,"-").replace(/&nbsp;/g,"-").toLowerCase()+"-select",n=e(this).val();e(p).selectpicker("hide"),e(".submit-btn").hasClass("hidden")&&e(".submit-btn").removeClass("hidden").addClass("animated fadeIn"),"main-service-area"==e(this).attr("name")&&0!=n&&e(h).attr("href",n),"service"==e(this).attr("name")&&0!=n&&e(h).attr("href",n),e(t).selectpicker("show")}),e(p).on("change",function(){var t="#"+e(this).find("option:selected").html().replace(/\s+/g,"-").replace(/&nbsp;/g,"-").toLowerCase()+"-select",n=e(this).val();e(u).selectpicker("hide"),e(".submit-btn").hasClass("hidden")&&e(".submit-btn").removeClass("hidden").addClass("animated fadeIn"),"main-service-area"==e(this).attr("name")&&0!=n&&e(h).attr("href",n),e(t).selectpicker("show")}),e(u).on("change",function(){var t=e(this).val();e(".submit-btn").hasClass("hidden")&&e(".submit-btn").removeClass("hidden").addClass("animated fadeIn"),"child-service-area"==e(this).attr("name")&&0!=t&&e(h).attr("href",t)}),e("body").on(o,"div.how-it-works-link > a",function(){var t=e(this).attr("href");return e(t).hasClass("hidden")&&(e(t).removeClass("hidden").addClass("animated fadeIn"),e(".tlw-wrapper").addClass("how-it-works-on"),e("#jmpress").jmpress("init",{beforeChange:function(t){e(".hiw-nav a").removeClass("active"),e(".hiw-nav a").eq(e(t).index()).addClass("active")}})),!1}),e("body").on(o,"button#close-how-it-works",function(){var t=e("#how-it-works");return e(t).hasClass("fadeIn")&&(e(t).removeClass("fadeIn").addClass("fadeOut"),e(t).one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",function(){e(this).removeClass("animated fadeOut").addClass("hidden"),e(".tlw-wrapper").removeClass("how-it-works-on"),e("#jmpress").jmpress("deinit")})),!1}),e(".carousel").carousel({interval:5e3,pause:"hover"}),e("#business-carousel").on("slide.bs.carousel",function(){e(this).next().find(".banner-item").removeClass("active")}),e("body").on(o,"button#back-2-top",function(){return e("html, body").animate({scrollTop:0},500),!1}),e("body").on(o,"a.scroll-to",function(){var t=e(this).attr("href");return e("html, body").animate({scrollTop:e("a"+t).offset().top},500),!1}),e("body").on(o,"a#call-2-action-radio",function(){return e(".audio-files").hasClass("closed")?(e("html, body").animate({scrollTop:e("#radio-player").offset().top-20},500),e(".audio-files").removeClass("closed").addClass("open"),e(this).addClass("active")):(e(".audio-files").removeClass("open").addClass("closed"),e("div.mejs-pause").find("button").trigger("click"),e("html, body").animate({scrollTop:0},500),e(this).removeClass("active")),!1}),e("body").on(o,"button#close-audio-files",function(){return e("html, body").animate({scrollTop:0},500),e(".audio-files").hasClass("open")&&(e(".audio-files").removeClass("open").addClass("closed"),e("a#call-2-action-radio").removeClass("active"),e("div.mejs-pause").find("button").trigger("click")),!1}),e("body").on(o,"button#user-btn",function(){return e(this).parent().hasClass("closed")?(e(this).parent().removeClass("closed").addClass("open"),e(this).find("i").removeClass("fa-user").addClass("fa-times")):(e(this).parent().removeClass("open").addClass("closed"),e(this).find("i").removeClass("fa-times").addClass("fa-user")),e("#quick-links").hasClass("open")&&e("#quick-links").removeClass("open").addClass("closed"),!1}),e("body").on(o,"li.page_item_has_children > a",function(){var t=e(this).parent();return e("li.page_item_has_children").not(t).removeClass("view-children").addClass("hide-children"),e(t).hasClass("hide-children")?e(t).removeClass("hide-children").addClass("view-children"):e(t).removeClass("view-children").addClass("hide-children"),!1}),e("body").on(o,"div.links-menu > button.close-btn",function(){var t=e(this).parent();return e(t).hasClass("open")&&(e(t).removeClass("open").addClass("closing"),e(".closing").one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",function(){e(this).toggleClass("closing closed"),e(".tlw-wrapper").removeClass("links-open")})),!1}),e("body").on(o,"a.dropdown-link",function(){var t=e(this).parent();return e("li.with-children").not(t).removeClass("open").addClass("closed"),e(t).hasClass("closed")?e(t).removeClass("closed").addClass("open"):e(t).removeClass("open").addClass("closed"),!1}),e("body").on(o,"button.service-menu-btn",function(){var t=e("div.links-menu");return e(t).hasClass("closed")&&(e(t).removeClass("closed").addClass("open"),e(".tlw-wrapper").addClass("links-open")),!1}),e("body").on(o,"button#nav-btn",function(){return e(".tlw-wrapper").hasClass("nav-closed")&&(e("body").addClass("nav-open"),e(".tlw-wrapper").removeClass("nav-closed").addClass("nav-open"),e("#side-nav").addClass("side-nav-open"),e("#quick-links").hide()),!1}),e("body").on(o,"button#close-nav",function(){return e(".tlw-wrapper").hasClass("nav-open")&&(e(".tlw-wrapper").removeClass("nav-open").addClass("nav-closed"),e("li.with-sub-nav").removeClass("sl-tl-open").addClass("sl-tl-closed"),e("#side-nav").removeClass("side-nav-open"),e("body").removeClass("nav-open"),e("#quick-links").show()),!1}),e("body").on(o,"div.faq-question",function(){var t=e(this).parent(),n=e(t).siblings();return n.hasClass("item-open")&&n.removeClass("item-open").addClass("item-closed"),t.toggleClass("item-closed item-open"),!1}),e("body").on(o,"div.faq-header",function(){var t=e(this).next();return e("div.faq-header").not(this).hasClass("faqs-open")&&(e("div.faq-header").removeClass("faqs-open").addClass("faqs-closed"),e("div.faqs-sub-pgs").removeClass("faqs-sub-open").addClass("faqs-sub-closed")),e(this).toggleClass("faqs-closed faqs-open"),t.toggleClass("faqs-sub-closed faqs-sub-open"),!1}),e("body").on(o,"button#file-download-btn",function(){var t=e(this).next();return e(t).toggleClass("form-open form-closed"),e("html, body").animate({scrollTop:e("button#file-download-btn").offset().top-30},500),!1}),e(document).bind("gform_confirmation_loaded",function(t,n){19==n&&1==e("a#download-file-btn").length&&(e("a#download-file-btn").removeClass("hidden"),e("html, body").animate({scrollTop:e("button#file-download-btn").offset().top-20},500)),20==n&&1==e("#hidden-download").length&&(e("#hidden-download").removeClass("hidden"),e(".gform_heading").addClass("hidden"),e("html, body").animate({scrollTop:e("#hidden-download").offset().top-20},500))}),e("body").on(o,"button#search-btn",function(){return e("#search-pop-up").hasClass("off")&&e("#search-pop-up").removeClass("off").addClass("on"),!1}),e("body").on(o,"button#close-search",function(){return e("#search-pop-up").hasClass("on")&&(e("#search-pop-up").removeClass("on").addClass("turn-off"),e(".turn-off").one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",function(){e(this).removeClass("turn-off").addClass("off")})),!1}),e("body").on("click","li.with-sub-nav > a",function(){var t=e(this).parent();return e(t).siblings().removeClass("sl-tl-open").addClass("sl-tl-closed"),e(t).hasClass("top-level")&&e(t).find(".sl-tl-open").removeClass("sl-tl-open").addClass("sl-tl-closed"),e(t).toggleClass("sl-tl-open sl-tl-closed"),!1}),e(".feed-wrap").slimScroll({height:"300px"}),e("body").on("click","button#continue-read-btn",function(){var t=e("#content-extra-inner").outerHeight();return e("button#continue-read-btn").addClass("hidden"),e("html, body").animate({scrollTop:e("#content-extra-inner").offset().top-20},500),e("#content-extra").animate({height:t+"px"},500,function(){e("#content-extra").removeClass("closed").addClass("open").removeAttr("style")}),!1}),e("body").on("click","button#close-content-extra-btn",function(){return e("button#continue-read-btn").removeClass("hidden"),e("html, body").animate({scrollTop:e("h1").offset().top-200},500),e("#content-extra").animate({height:"0px"},500,function(){e("#content-extra").removeClass("open").addClass("closed").removeAttr("style")}),!1}),e("body").on("click","button#show-more-links-btn",function(){var t=e(this).find("span").text();return e(this).parent().toggleClass("view-all-links"),e(this).find("span").toggleClass("sr-only").text("View More"==t?"Close":"View More"),!1}),e(".scrollable-txt").slimScroll({height:"470px",size:"15px",position:"left",alwaysVisible:!0,railVisible:!0,railColor:"#D7D7D7",color:"#4b4b4b"}),e("body").on(o,".type-post button.access-btn",function(){var t=e(this).attr("data-role");return e(this).siblings().removeClass("active"),e(this).addClass("active"),e("body").removeClass("txt-md txt-lg txt-sm").addClass(t),e.cookie("font_size",t,{path:"/"}),!1}),e("body").on(o,".type-page button.access-btn",function(){var t=e(this).attr("data-role");return e(this).siblings().removeClass("active"),e(this).addClass("active"),e("body").removeClass("txt-md txt-lg txt-sm").addClass(t),e.cookie("font_size",t,{path:"/"}),!1}),e("body").on(o,"#txt-only-content button.access-btn",function(){var t=e(this).attr("data-role");return e(this).siblings().removeClass("active"),e(this).addClass("active"),e(".main-txt").removeClass("txt-md txt-lg txt-sm").addClass(t),!1}),e("#feedback-carousel").carousel({pause:!1,interval:7e3}),e("#enqiry-start-form")&&e("#enqiry-start-form").show();var f=e("#cookie-law-info-bar").next();e(f).is("i")&&(e(f).next().is("i")&&e(f).next().remove(),e("#cookie-law-info-bar").next().remove());var v=function(){1==e("#xmas-popup-wrap").length&&e("#xmas-popup-wrap").hasClass("pop-up-inactive")&&(e("#xmas-popup-btn-wrap").removeClass("pop-up-inactive").addClass("pop-up-active"),e("#xmas-popup-wrap").fadeIn("slow",function(){e(".xmas-popup-inner").removeClass("hidden").addClass("animated slideInUp")}))};e(".xmas-popup-inner").one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",function(){e(this).hasClass("bounceOutDown")&&(e("#xmas-popup-wrap").fadeOut("fast").removeClass("pop-up-active").addClass("pop-up-inactive"),e("#xmas-popup-btn-wrap").removeClass("pop-up-active").addClass("pop-up-inactive"),e(this).removeClass("animated bounceOutDown").addClass("hidden"))}),e("body").on(o,"button#xmas-popup-btn-open",function(){return v(),!1}),e("body").on(o,"button#close-xmas-popup",function(){return e(".xmas-popup-inner").removeClass("slideInUp").addClass("bounceOutDown"),!1}),e("body").on(o,".tk-slider-nav a",function(){e(this).parent().siblings().removeClass("active"),e(this).parent().addClass("active");var t=e(window).scrollTop(),n=e("#toolkit-slides").offset().top-110,o=e(this).attr("href"),s=e(".tk-slide-active").attr("id"),a=o.split("#");return e("#"+s).find(".scrollable-txt").slimScroll({scrollTo:"0px",start:"top"}),e(".slimScrollBar").animate({top:"0px"},500),e(".tk-slides-inner").removeClass(s+"-active").addClass(a[1]+"-active"),e("#"+s).removeClass("tk-slide-active"),e(o).addClass("tk-slide-active"),(t>n||n>t)&&e("html, body").animate({scrollTop:n},500),!1}),e("body").on(o,"button#print-pg-btn",function(){t()}),e("body").on(o,"button#txt-only-btn",function(){var t=e(".content-section").find(".main-txt"),n=e(".banner-title .container").text(),o=e(t).clone(),s=e("#txt-only-content").innerHeight()-170;if(console.log(s),n){var a='<div class="title-header">'+n+"</div>";e(a).appendTo("#txt-only-wrapper")}return e(o).appendTo("#txt-only-wrapper").slimScroll({height:s+"px"}),e("#txt-only-wrapper").fadeIn("fast"),e("body").addClass("txt-only-open"),e("#txt-only-content").removeClass("closed").addClass("open"),!1}),e("body").on(o,"button#close-txt-only-btn",function(){return e("#txt-only-wrapper").fadeOut("fast").empty(),e("#txt-only-content").removeClass("open").addClass("closed"),e("body").removeClass("txt-only-open"),!1}),i(),1==e(".feedback-section-wrapper").length&&r(),e("body").on(o,"nav.banner-links a",function(){var t=e(this).attr("href"),n=e(t).offset().top-40;return a=t,e("html, body").animate({scrollTop:n},500),!1}),e("body").on(o,"button#scroll-down-btn",function(){var t=e(this).parent().next().find("a.section-target"),n=e(t).attr("id"),o=e("#"+n).offset().top-40;return a="#"+n,e("html, body").animate({scrollTop:o},500),!1}),e("body").on(o,"button#intro-scroll-down-btn",function(){var t=e(this).parents("article.content-section").next().find("a.section-target"),n=e(t).attr("id"),o=e("#"+n).offset().top-40;return a="#"+n,e("html, body").animate({scrollTop:o},500),!1}),e("body").on(o,"button#quick-links-btn-show",function(){return e("#quick-links").toggleClass("open closed"),!1}),e("body").on(o,"button#quick-links-close",function(){return e("#quick-links").toggleClass("open closed"),!1}),e("body").on(o,".ql-section-links a",function(){var t=e(this).attr("href"),n=e(t).offset().top-40;return a=t,"#toolkit-slides"==a&&(n-=60),e(this).siblings().removeClass("active"),e(this).addClass("active"),e("html, body").animate({scrollTop:n},500),!1}),e("body").on(o,"button#quick-links-2-top",function(){return e("html, body").animate({scrollTop:0},500),!1}),e("body").on(o,"button#quick-links-btn-up",function(){if("#top"!=a){var t=e(a).parent().prev();if(e(t).find("a.section-target")){var n=e(t).offset().top-40;e(t).hasClass("toolkit-slider")&&(n-=60),e("html, body").animate({scrollTop:n},500)}else e("html, body").animate({scrollTop:0},500),a="#top"}return!1}),e("body").on(o,"button#quick-links-btn-dwn",function(){if("#top"!=a){var t=e(a).parent().next();if(e(t).find("a.section-target")){var n=e(t).offset().top-40;e("html, body").animate({scrollTop:n},500)}}else{var t=e(m[0]).parent();if(e(t).find("a.section-target")){var n=e(t).offset().top-40;e("html, body").animate({scrollTop:n},500)}}return a=t,!1})}),e(window).on("resize",function(){}),e(window).load(function(){1==e("a#call-2-action-radio").length&&(e("#call-2-action-radio").removeAttr("disabled"),e("i.fa-spinner").hide()),(new WOW).init(),1==e(".scroll-sidebar").length&&e(".sidebar").hcSticky({top:20,bottom:0,stickTo:".content",followScroll:!1})}),e(window).scroll(function(){var t=e(window).scrollTop(),o=e(".header").outerHeight(),s=e(window).height(),i=e("a.section-target");s/2>=t&&(a="#top"),i.length>0&&i.each(function(t,o){if(n(e(o))){var s=e(o).attr("id");return a="#"+s,e("a[href="+a+"]").siblings().removeClass("active"),e("a[href="+a+"]").addClass("active"),!1}a="#top",e(".ql-section-links a").removeClass("active")}),t>Math.ceil(s/2)&&e("button#back-2-top").removeClass("hidden").addClass("visible fadeIn"),o>=t&&e("button#back-2-top").hasClass("visible")&&(e("button#back-2-top").removeClass("fadeIn").addClass("fadeOut"),e("button#back-2-top").one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",function(){e(this).removeClass("visible fadeOut").addClass("hidden")}))})}(window.jQuery);