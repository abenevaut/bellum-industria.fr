/*-----------------------------------------------------------------------------------*/
/*	RETINA.JS
/*-----------------------------------------------------------------------------------*/
(function () {
    function t(e) {
        this.path = e;
        var t = this.path.split("."),
            n = t.slice(0, t.length - 1).join("."),
            r = t[t.length - 1];
        this.at_2x_path = n + "@2x." + r
    }
    function n(e) {
        this.el = e, this.path = new t(this.el.getAttribute("src"));
        var n = this;
        this.path.check_2x_variant(function (e) {
            e && n.swap()
        })
    }
    var e = typeof exports == "undefined" ? window : exports;
    e.RetinaImagePath = t, t.confirmed_paths = [], t.prototype.is_external = function () {
        return !!this.path.match(/^https?\:/i) && !this.path.match("//" + document.domain)
    }, t.prototype.check_2x_variant = function (e) {
        var n, r = this;
        if (this.is_external()) return e(!1);
        if (this.at_2x_path in t.confirmed_paths) return e(!0);
        n = new XMLHttpRequest, n.open("HEAD", this.at_2x_path), n.onreadystatechange = function () {
            return n.readyState != 4 ? e(!1) : n.status >= 200 && n.status <= 399 ? (t.confirmed_paths.push(r.at_2x_path), e(!0)) : e(!1)
        }, n.send()
    }, e.RetinaImage = n, n.prototype.swap = function (e) {
        function n() {
            t.el.complete ? (t.el.setAttribute("width", t.el.offsetWidth), t.el.setAttribute("height", t.el.offsetHeight), t.el.setAttribute("src", e)) : setTimeout(n, 5)
        }
        typeof e == "undefined" && (e = this.path.at_2x_path);
        var t = this;
        n()
    }, e.devicePixelRatio > 1 && (window.onload = function () {
        var e = document.getElementsByTagName("img"),
            t = [],
            r, i;
        for (r = 0; r < e.length; r++) i = e[r], t.push(new n(i))
    })
})();
/*-----------------------------------------------------------------------------------*/
/*	ISOTOPE PORTFOLIO
/*-----------------------------------------------------------------------------------*/
$(document).ready(function () {
    var $container = $('#portfolio .items');
    $container.imagesLoaded(function () {
        $container.isotope({
            itemSelector: '.item',
            layoutMode: 'fitRows'
        });
    });

    $('.filter li a').click(function () {

        $('.filter li a').removeClass('active');
        $(this).addClass('active');

        var selector = $(this).attr('data-filter');
        $container.isotope({
            filter: selector
        });

        return false;
    });
});
/*-----------------------------------------------------------------------------------*/
/*	DIRECTION AWARE PORTFOLIO HOVER
/*-----------------------------------------------------------------------------------*/

$(function() {
   $(' .items > li, .frame > a ').hoverdir();
});
/*-----------------------------------------------------------------------------------*/
/*	ISOTOPE BLOG GRID
/*-----------------------------------------------------------------------------------*/
$(document).ready(function () {
    var $container = $('.grid');
    $container.imagesLoaded(function () {
        $container.isotope({
            itemSelector: '.post',
            layoutMode: 'fitRows'
        });
    });
});
/*-----------------------------------------------------------------------------------*/
/*	FORM
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function ($) {
    $('.forms').dcSlickForms();
});


$(document).ready(function () {
    $('.comment-form input[title], .comment-form textarea').each(function () {
        if ($(this).val() === '') {
            $(this).val($(this).attr('title'));
        }

        $(this).focus(function () {
            if ($(this).val() == $(this).attr('title')) {
                $(this).val('').addClass('focused');
            }
        });
        $(this).blur(function () {
            if ($(this).val() === '') {
                $(this).val($(this).attr('title')).removeClass('focused');
            }
        });
    });
});
/*-----------------------------------------------------------------------------------*/
/*	SLIDER
/*-----------------------------------------------------------------------------------*/



$(document).ready(function () {

    if ($.fn.cssOriginal != undefined) $.fn.css = $.fn.cssOriginal;

    $('.banner').revolution({
        delay: 9000,
        startheight: 500,
        startwidth: 1040,

        navigationType: "bullet", //bullet, thumb, none, both		(No Thumbs In FullWidth Version !)
        navigationArrows: "verticalcentered", //nexttobullets, verticalcentered, none
        navigationStyle: "round", //round,square,navbar

        touchenabled: "on", // Enable Swipe Function : on/off
        onHoverStop: "on", // Stop Banner Timet at Hover on Slide on/off

        hideThumbs: 200,

        navOffsetHorizontal: 0,
        navOffsetVertical: -35,

        stopAtSlide: -1, // Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
        stopAfterLoops: -1, // Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic

        shadow: 0, //0 = no Shadow, 1,2,3 = 3 Different Art of Shadows  (No Shadow in Fullwidth Version !)
        fullWidth: "off", // Turns On or Off the Fullwidth Image Centering in FullWidth Modus


    });

    jQuery('.small-banner').revolution({
        delay: 9000,
        startheight: 500,
        startwidth: 730,

        navigationType: "bullet", //bullet, thumb, none, both		(No Thumbs In FullWidth Version !)
        navigationArrows: "verticalcentered", //nexttobullets, verticalcentered, none
        navigationStyle: "round", //round,square,navbar

        touchenabled: "on", // Enable Swipe Function : on/off
        onHoverStop: "on", // Stop Banner Timet at Hover on Slide on/off

        hideThumbs: 200,

        navOffsetHorizontal: 0,
        navOffsetVertical: -35,

        stopAtSlide: -1, // Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
        stopAfterLoops: -1, // Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic

        shadow: 0, //0 = no Shadow, 1,2,3 = 3 Different Art of Shadows  (No Shadow in Fullwidth Version !)
        fullWidth: "off", // Turns On or Off the Fullwidth Image Centering in FullWidth Modus


    });


});

/*-----------------------------------------------------------------------------------*/
/*	CALL PORTFOLIO SCRIPTS
/*-----------------------------------------------------------------------------------*/

function callPortfolioScripts() {

    jQuery('.video').fitVids();

    jQuery(".share li a").css("opacity", "1.0");
    jQuery(".share li a").hover(function () {
        jQuery(this).stop().animate({
            opacity: 0.80
        }, "fast");
    },

    function () {
        jQuery(this).stop().animate({
            opacity: 1.0
        }, "fast");
    });

    jQuery('.banner').revolution({
        delay: 9000,
        startheight: 500,
        startwidth: 1040,

        navigationType: "bullet", //bullet, thumb, none, both		(No Thumbs In FullWidth Version !)
        navigationArrows: "verticalcentered", //nexttobullets, verticalcentered, none
        navigationStyle: "round", //round,square,navbar

        touchenabled: "on", // Enable Swipe Function : on/off
        onHoverStop: "on", // Stop Banner Timet at Hover on Slide on/off

        hideThumbs: 200,

        navOffsetHorizontal: 0,
        navOffsetVertical: -35,

        stopAtSlide: -1, // Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
        stopAfterLoops: -1, // Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic

        shadow: 0, //0 = no Shadow, 1,2,3 = 3 Different Art of Shadows  (No Shadow in Fullwidth Version !)
        fullWidth: "off", // Turns On or Off the Fullwidth Image Centering in FullWidth Modus


    });


    jQuery('.small-banner').revolution({
        delay: 9000,
        startheight: 500,
        startwidth: 730,

        navigationType: "bullet", //bullet, thumb, none, both		(No Thumbs In FullWidth Version !)
        navigationArrows: "verticalcentered", //nexttobullets, verticalcentered, none
        navigationStyle: "round", //round,square,navbar

        touchenabled: "on", // Enable Swipe Function : on/off
        onHoverStop: "on", // Stop Banner Timet at Hover on Slide on/off

        hideThumbs: 200,

        navOffsetHorizontal: 0,
        navOffsetVertical: -35,

        stopAtSlide: -1, // Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
        stopAfterLoops: -1, // Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic

        shadow: 0, //0 = no Shadow, 1,2,3 = 3 Different Art of Shadows  (No Shadow in Fullwidth Version !)
        fullWidth: "off", // Turns On or Off the Fullwidth Image Centering in FullWidth Modus


    });


};
/*-----------------------------------------------------------------------------------*/
/*	HOVER OPACITY
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function ($) {
    $(".share li a").css("opacity", "1.0");
    $(".share li a").hover(function () {
        $(this).stop().animate({
            opacity: 0.80
        }, "fast");
    },

    function () {
        $(this).stop().animate({
            opacity: 1.0
        }, "fast");
    });
});

jQuery(document).ready(function ($) {
    $("ul.client-list li").css("opacity", "0.70");
    $("ul.client-list li").hover(function () {
        $(this).stop().animate({
            opacity: 1.0
        }, "fast");
    },

    function () {
        $(this).stop().animate({
            opacity: 0.70
        }, "fast");
    });
});
/*-----------------------------------------------------------------------------------*/
/*	TABS
/*-----------------------------------------------------------------------------------*/
$(document).ready(function () {
    $('.tabs').easytabs({
        animationSpeed: 300,
        updateHash: false
    });
});

/*-----------------------------------------------------------------------------------*/
/*	TOGGLE
/*-----------------------------------------------------------------------------------*/
$(document).ready(function () {
    //Hide the tooglebox when page load
    $(".togglebox").hide();
    //slide up and down when click over heading 2
    $("h4").click(function () {
        // slide toggle effect set to slow you can set it to fast too.
        $(this).toggleClass("active").next(".togglebox").slideToggle("slow");
        return true;
    });
});
/*-----------------------------------------------------------------------------------*/
/*	VIDEO
/*-----------------------------------------------------------------------------------*/

jQuery(document).ready(function () {
    jQuery('.video').fitVids();
});



/*-----------------------------------------------------------------------------------*/
/*	CONTENT SLIDER
/*-----------------------------------------------------------------------------------*/
/**************************************************************************
 * jQuery Plugin for Content Slider
 * @version: 1.0
 * @requires jQuery v1.8 or later
 * @author ThunderBudies
 **************************************************************************/

$(document).ready(function () {

    var mainContOut = 0;
    var animclass = "fader"; //fader // slider


    var speed = 1000;

    jQuery.fn.extend({
        unwrapInner: function (selector) {
            return this.each(function () {
                var t = this,
                    c = $(t).children(selector);
                if (c.length === 1) {
                    c.contents().appendTo(t);
                    c.remove();
                }
            });
        }
    });




	///////////////////////////
	// GET THE URL PARAMETER //
	///////////////////////////
	function getUrlVars(hashdivider)
			{
				var vars = [], hash;
				var hashes = window.location.href.slice(window.location.href.indexOf(hashdivider) + 1).split('_');
				for(var i = 0; i < hashes.length; i++)
				{
					hashes[i] = hashes[i].replace('%3D',"=");
					hash = hashes[i].split('=');
					vars.push(hash[0]);
					vars[hash[0]] = hash[1];
				}
				return vars;
			}
	////////////////////////
	// GET THE BASIC URL  //
	///////////////////////
    function getAbsolutePath() {
		    var loc = window.location;
		    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
		    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
    }

    //////////////////////////
	// SET THE URL PARAMETER //
	///////////////////////////
    function updateURLParameter(paramVal){
	    	var baseurl = window.location.pathname.split("#")[0];
	    	var url = baseurl.split("#")[0];
	    	if (paramVal==undefined) paramVal="";

	  		par='#'+paramVal;

		    window.location.replace(url+par);
	}


    var items = jQuery('#portfolio .item a');
    var deeplink = getUrlVars("#");





    jQuery.ajaxSetup({
        // Disable caching of AJAX responses */
        cache: false
    });

    // FIRST ADD THE HANDLING ON THE DIFFERENT PORTFOLIO ITEMS
    items.slice(0, items.length).each(function (i) {
        var item = jQuery(this);
        item.data('index', i);

        if (jQuery.support.leadingWhitespace == false){

        	var conurl = jQuery(this).data('contenturl');
        	item.attr('href',conurl);

        }

        else
        // THE HANDLING IN CASE ITEM IS CLICKED
        item.click(function () {
	        item.addClass("clicked-no-slide-anim");
            var cur = item.data('index');
            var hashy = window.pageYOffset;



            if (jQuery('.dark-wrapper.fixed').length == 0) {
                // PREPARE THE CURRENT CONTENT OF BODY AND WRAP IT
                jQuery('.body-wrapper').wrapInner('<div class="fullcontent-slider-getaway-wrapper"><div class="fullcontent-slider-getaway-slide"></div></div>');
                var origheight = jQuery('.fullcontent-slider-getaway-slide').height();

                //BUILD THE PANEL

                jQuery('body').append('<div class="navcoverpage"></div>' +
                    '<div class="navfake">' +

                    '<div class="dark-wrapper page-title">' +
                    '<div class="inner">' +
                    '<h1 class="title alignleft novisibility">Title</h1>' +
                    '<div class="navigation alignright">' +
                    '<a href="#"  id="gwi-thumbs" title="All Items"><i class="icon-th"></i></a>' +
                    '<a href="#"  id="gwi-prev" title="Previous"><i class="icon-left-open-1"></i></a>' +
                    '<a href="#"  id="gwi-next" title="Next"><i class="icon-right-open-1"></i></a>' +
                    '</div>' +
                    '<div class="clear"></div>' +
                    '</div>' +
                    '</div>' +
                    '</div>');

                //ADD A NEW CONTENT WRAPPER
                var conurl = jQuery(this).data('contenturl');
                var concon = jQuery(this).data('contentcontainer');

                updateURLParameter(conurl);

                var extraclass = "";


                jQuery('body').append('<div class="preparedtostart right fullcontent-content-wrapper-new ' + extraclass + ' ' + animclass + '"></div>');

                // FIRST WE LOAD THE VERY FIRST ITEM, WHEN PANEL IS ALREAD IN
                setTimeout(function () {
                    if (conurl != undefined && conurl.length > 0) {

                        jQuery('.fullcontent-content-wrapper-new').load(conurl + " " + concon, function () {


                            jQuery('.preparedtostart.fullcontent-content-wrapper-new').find('.footer-wrapper').remove();
                            jQuery('.navfake h1').html(jQuery('.fullcontent-content-wrapper-new .title').html()).removeClass("novisibility");
                            animateContents(mainContOut, jQuery('.fullcontent-slider-getaway-slide'), jQuery('.preparedtostart.fullcontent-content-wrapper-new'), speed);
                            jQuery('.fullcontent-slider-getaway-slide').css({
                                height: "100%",
                                overflow: 'hidden'
                            })
                            jQuery('body,html').animate({
                                scrollTop: "0px"
                            }, {
                                duration: 10,
                                queue: false
                            });

                            var callback = new Function(item.data('callback'));
                            callback();
                        });

                    } else {
                        jQuery('.fullcontent-content-wrapper-new').append(jQuery(this).data('content'));
                    }
                }, speed + 200);


                // SHOW THE PANEL
                jQuery('.navfake').animate({
                    left: '0px'
                }, {
                    duration: speed - 200,
                    queue: false
                });
                jQuery('.navcoverpage').animate({
                    left: '0px'
                }, {
                    duration: speed - 200,
                    queue: false
                });




                // THE CLICK ON THE THUMB SHOULD ACT LIKE
                jQuery('#gwi-thumbs').live('click', function () {
                	 updateURLParameter();
	                jQuery('.clicked-no-slide-anim').removeClass('clicked-no-slide-anim');
                    jQuery('.preparedtoleave').animate({
                        opacity: 0
                    }, {
                        duration: speed - 100,
                        queue: false,
                        complete: function () {
                            jQuery(this).remove();
                        }
                    });
                    setTimeout(function () {
                        jQuery('body,html').animate({
                            scrollTop: hashy + "px"
                        }, {
                            duration: 10,
                            queue: false
                        });

                        jQuery('.fullcontent-slider-getaway-slide').css({
                            visibility: 'visible'
                        }).animate({
                            left: '0px'
                        }, {
                            duration: speed,
                            queue: false
                        });
                        jQuery('.navcoverpage').animate({
                            left: '100%'
                        }, {
                            duration: speed,
                            queue: false,
                            complete: function () {
                                jQuery(this).remove();
                            }
                        });
                        jQuery('.navfake').animate({
                            left: '100%'
                        }, {
                            duration: speed,
                            queue: false,
                            complete: function () {
                                jQuery(this).remove();
                            }
                        });
                        jQuery('.fullcontent-slider-getaway-slide').unwrap().find('div:nth(0)').unwrap();

                    }, speed - 100);


                    return false;
                }) // END OF CLICK ON ICON-TH

                // THE CLICK ON THE PREV OR NEXT BUTTON
                jQuery('#gwi-next').click(function () {

                    cur = cur + 1;
                    if (cur > items.length) cur = 0;
                    var nextitem;
                    items.slice(cur, cur + 1).each(function () {
                        nextitem = jQuery(this);
                    });
                    swapContents(nextitem, 1, animclass, speed);
                    return false;

                });

                // THE CLICK ON THE PREV OR NEXT BUTTON
                jQuery('#gwi-prev').click(function () {
                    cur = cur - 1;
                    if (cur < 0) cur = items.length - 1;
                    var nextitem;
                    items.slice(cur, cur + 1).each(function () {
                        nextitem = jQuery(this);
                    });
                    swapContents(nextitem, 0, animclass, speed);
                    return false;
                });

            }
            return false;
        }); // END OF CLICK HANDLING ON PORTFOLIO ITEM

   }); // END OF HANDLING ON EACH PORTFOLIO ITEM

   var firstfound=0;
   items.slice(0, items.length).each(function (i) {
     var item=jQuery(this);
   	 if (deeplink!=undefined && deeplink.length>0 && deeplink == jQuery(this).data('contenturl')) {
		   	 	if (firstfound==0) {

	  	 			setTimeout(function() {item.click();},2000);
	  	 			firstfound=1;
	  	 		}
    	    }
   });


    // ANIMATE THE CONTENT CHANGE
    function animateContents(mainContOut, oldbody, newbody, speed) {
        // ANIMATE THE CURRENT BODY OUT OF THE SCREEN
        if (mainContOut != 0) oldbody.delay(0).animate({
            left: '-100%'
        }, {
            duration: speed,
            queue: false,
            complete: function () {
                jQuery(this).css({
                    visibility: 'hidden'
                });
            }
        })

        //jQuery('.navcoverpage').animate({'opacity':0},{duration:1200,queue:false});
        newbody.delay(0).css({
            opacity: 0
        }).animate({
            left: '0px',
            opacity: 1
        }, {
            duration: speed,
            queue: false
        });
        newbody.removeClass('preparedtostart').addClass('preparedtoleave');

    }

    // SWAP CONTENTS
    function swapContents(nextitem, dir, animclass, speed) {


        var lpx = "0px";
        var lpr = "-100%";
        var pos = "right";
        var extraclass = "";

        if (dir == 0) {
            pos = "left"
            lpr = "100%";
        }

        if (animclass == "fader") {
            lpr = "0px";
        }
        jQuery('.preparedtoleave').addClass("killme");



        //ADD A NEW CONTENT WRAPPER
        try {


            var conurl = nextitem.data('contenturl');
            var concon = nextitem.data('contentcontainer');

             updateURLParameter(conurl);



            if (jQuery('.preparedtostart').length == 0) {
                jQuery('body').append('<div class="preparedtostart ' + pos + ' ' + extraclass + ' ' + animclass + ' fullcontent-content-wrapper-new"></div>');
            }


            jQuery('.preparedtostart.fullcontent-content-wrapper-new').load(conurl + " " + concon, function () {


                jQuery('body,html').animate({
                    scrollTop: "0px"
                }, {
                    duration: 10,
                    queue: false
                });
                jQuery('.preparedtostart.fullcontent-content-wrapper-new').css({
                    'opacity': 0
                }).animate({
                    left: lpx,
                    opacity: 1
                }, {
                    duration: speed,
                    queue: false
                });
                jQuery('.killme').animate({
                    left: lpr,
                    opacity: 0
                }, {
                    duration: speed + 100,
                    queue: false,
                    complete: function () {
                        jQuery(this).remove();
                    }
                });
                jQuery('body').find('.preparedtostart.fullcontent-content-wrapper-new').each(function (i) {
                    if (!jQuery(this).hasClass("killme")) {
                        jQuery('.navfake h1').html(jQuery(this).find('.title').html());
                    }
                });
                var callback = new Function(nextitem.data('callback'));
                callback();
                jQuery('.preparedtostart.fullcontent-content-wrapper-new').removeClass('preparedtostart').addClass('preparedtoleave');

            });
        } catch (e) {}



    }
});

/*-----------------------------------------------------------------------------------*/
/*	DRIBBBLE
/*-----------------------------------------------------------------------------------*/

$(document).ready(function () {

    $.jribbble.getShotsByPlayerId('Shin', function (playerShots) {
        var html = [];

        $.each(playerShots.shots, function (i, shot) {
            html.push('<li class="frame"><a href="' + shot.url + '" target="_blank">');
            html.push('<img src="' + shot.image_teaser_url + '" ');
            html.push('alt="' + shot.title + '"><div></div></a></li>');
        });

        $('.dribbble.feed').html(html.join(''));

        $(function () {
            $(' .dribbble.feed .frame > a ').each(function () {
                $(this).hoverdir();
            });
        });

    }, {
        page: 1,
        per_page: 12
    });


});

/*-----------------------------------------------------------------------------------*/
/*	SELECTNAV
/*-----------------------------------------------------------------------------------*/
$(document).ready(function () {
    selectnav('tiny', {
        label: '--- Navigation --- ',
        indent: '-'
    });
});
/*-----------------------------------------------------------------------------------*/
/*	MENU
/*-----------------------------------------------------------------------------------*/
ddsmoothmenu.init({
    mainmenuid: "menu",
    orientation: 'h',
    classname: 'menu',
    contentsource: "markup"
})