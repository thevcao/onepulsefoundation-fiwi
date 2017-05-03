/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */
(function ($) {
	// Use this variable to set up the common and page specific functions. If you
	// rename this variable, you will also need to rename the namespace below.
	var Sage = {
		// All pages
		'common': {
			init: function () {
				// JavaScript to be fired on all pages
				$(window).load(function () {

					paddingHelp();
					$('.mm').matchHeight();

					pulseSet();
					fullHero();


					$('.page-cta').each(function () {

						var wrapper = $('.over h3'),
							movethis = $(wrapper).text(),
							movethis2 = movethis.split(" ").pop(),
							thisHeight = $(wrapper).outerHeight();

						console.log(movethis2);

						$(wrapper).html($(wrapper).html().split(movethis2).join(""));

						$(this).find('.dupe h3').text(movethis2);



						$(this).find('.content').css("padding-top", (thisHeight * 3))

					});


					$('.gallery').slick({
						dots: true,
						infinite: true,
						speed: 750,
						autoplay: true,
						autoplaySpeed: 5000,
						slidesToShow: 3,
						slidesToScroll: 1,
						responsive: [


							{
								breakpoint: 1025,
								settings: {
									slidesToShow: 1,
									slidesToScroll: 1
								}
							},

							{
								breakpoint: 414,
								settings: {
									slidesToShow: 1,
									slidesToScroll: 1
								}
							}

                          ]

					});




				});



				$(window).resize(function () {
					paddingHelp();
					pulseSet();
					fullHero();

				})

				window.addEventListener("orientationchange", function () {

					setTimeout(function () {
						paddingHelp();
						pulseSet();
						fullHero();
					}, 500);

					console.log('rotate')



				});


				function paddingHelp() {
					if ($(window).width() > 768) {

						$('.page-cta .content').each(function () {
							var containerWidth = $('.container').outerWidth(),
								windowWidth = $(window).outerWidth(),
								remainingPad = (windowWidth - containerWidth),
								half = (remainingPad / 2);
							$(this).css('padding-right', half);
						});
						$('.content-left .content').each(function () {
							var containerWidth = $('.container').outerWidth(),
								windowWidth = $(window).outerWidth(),
								remainingPad = (windowWidth - containerWidth),
								half = ((remainingPad / 2));

							if ($('html').hasClass('ie')) {


								$(this).css('padding-left', half + 30);

							} else {
								$(this).css('padding-left', half + 15);


							}
						});
					}
				}

				function fullHero() {
					var fullHeight = $(window).outerHeight(),
						header = $('header').outerHeight(),
						contentHeight = $('.home-hero .container').outerHeight(),
						remaining = ((fullHeight + header) - contentHeight),
						padding = (remaining / 2);

					if ($('body').hasClass('admin-bar')) {
						$('.full-menu').css('padding-top', header + 82);


					} else {


						if ($('html').hasClass('orientation_portrait') && $('html').hasClass('mobile')) {

							$('.full-menu').css('padding-top', header);
							$('section').first('section').not('.home-hero').css('padding-top', (header + 10));
							$('footer').css('padding-bottom', ($('.donate-bar').outerHeight()));


							//						$('.post-image').css('margin-top', header);


						} else if ($('html').hasClass('orientation_landscape') && $('html').hasClass('mobile')) {

							$('.full-menu').css('padding-top', ($('.menu-toggle').outerHeight() + 20));
							//							$('section').first('section').not('.home-hero').css('padding-top', (header + 10));
							//							$('footer').css('padding-bottom', ($('.donate-bar').outerHeight() - 20));


						} else {

							$('.home-hero').css('padding-top', padding).css('padding-bottom', padding);
							$('.full-menu').css('padding-top', header + 50);
							$('.page-main section').first('section').css('padding-top', (header + 50));
							$('.post-image').css('margin-top', header);
						}



					}


				}

				function pulseSet() {


					if ($(window).width() < 415 && $('html').hasClass('mobile')) {


						var fullheight = $(window).height();
						var auto = 'auto' + fullheight;

						$('.donate-hero h2').fitText(1);
						//					$('.page-main .home-hero h2').fitText(1);
						$('.home .home-hero h2').fitText(.9);
						$('.invert-header .home-hero h2.clone-shadow, .invert-header .home-hero h2').fitText(3.75);
						$('.home-play i').fitText(.33);
						$('.home .home-hero h2').css('background-size', auto);


						console.log('mobile portrait');

					} else {

						$('.donate-hero h2').fitText(2);
						$('.home-hero h2').fitText(1.75);

						if ($('body').hasClass('page-id-166')) {

							$('.page-main .home-hero h2').fitText(5);

						} else {

							$('.page-main .home-hero h2').fitText(4);

						}
						$('.hidden-xs .home-play i').fitText(.35);
						$('.visible-xs .home-play i').fitText(1);
						$('footer').css('padding-bottom', '0');
					}




				}




				$('.img-attrib').each(function () {


					var width = $(this).prev('img').outerWidth();

					$(this).css('width', width - 20);

				});



				$('footer .pop-link, .pop-link').click(function (e) {
					e.preventDefault();
					var poplink = $(this).attr('href');
					newwindow = window.open(poplink, 'name', 'height=800,width=1024');
					if (window.focus) {
						newwindow.focus()
					}
					return false;

				});
				$('.shares .pop-link').click(function (e) {
					e.preventDefault();
					var poplink = $(this).attr('href');
					newwindow = window.open(poplink, 'name', 'height=400,width=600');
					if (window.focus) {
						newwindow.focus()
					}
					return false;

				});

				$('a').not('.full-menu ul li a, .home-play, .task-link, .logo').each(function () {
					if ($('html').not('.mobile')) {
						var title = $(this).text();

						$(this).attr('title', title);
					}


				});



				if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
					var $document = $(document),
						$element = $('body'),
						className = 'scrolled';

					var headerHeight = ($('.home-hero').outerHeight() - $('header').outerHeight());
					if ($('.home-hero').length) {

						$document.scroll(function () {
							$element.toggleClass(className, $document.scrollTop() > headerHeight);


						});


					} else {

						$document.scroll(function () {
							$element.toggleClass(className, $document.scrollTop() > $('header').outerHeight());


						});



					}
				}


				$('.home-play').click(function () {
					//						$('body').removeClass('loaded');


					var myPlayer = videojs("home-video");

					myPlayer.play();
					
					if (!/iPhone/i.test(navigator.userAgent)) {
						$('video').prev('.play-button').velocity("fadeOut", {
							duration: 250
						});

						setTimeout(function () {



							$('body').addClass('modal-open');
						}, 250);

						$('body').addClass('modal-open');
					}
				});
				
				
				if($('#home-video').length){
					
					
					videojs('home-video', {}, function() {
					  this.ga(); // "load the plugin, by defaults tracks everything!!"
					});
					
					
				}
	
					if ($('#video').length) {


						videojs('video', {}, function () {
							this.ga(); // "load the plugin, by defaults tracks everything!!"
						});

					}
				
				
				$('.shirt-btn').click(function () {
					
					
					ga('send', {
						hitType: 'event',
						eventCategory: 'Shirt Click',
						eventAction: 'click'
					});
					
				});				
				$('a[title="Donate"]').click(function () {
					
					
					ga('send', {
						hitType: 'event',
						eventCategory: 'Donate Click',
						eventAction: 'click'
					});
					
				});		
				$('.donate-bar a').click(function () {
					
					
					ga('send', {
						hitType: 'event',
						eventCategory: 'Donate Click - Mobile',
						eventAction: 'click'
					});
					
				});

				
				
				
				//					if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {




				//						videoPlayer.webkitEnterFullscreen();
				//						videoPlayer.addEventListener('webkitExitFullscreen', function (e) {
				//							
				//
				//							setTimeout(function () {
				//
				//
				//
				//								videoPlayer.pause();
				//
				//							}, 250);
				//
				//						});


				////					}
				//				var vid = document.getElementById("home-video_Vimeo_api");
				//
				//				vid.addEventListener('webkitendfullscreen', function (e) { 
				//							  $('body').removeClass('modal-open');
				//								console.log('hay');
				//				
				//				
				//				});
				//
				//				vid.addEventListener('webkitenterfullscreen', function (e) { 
				//				  // handle enter full screen 
				//				});
				//
				//					return false;
				//
				//
				//				});
				//
				//			$('video').bind('webkitfullscreenchange mozfullscreenchange fullscreenchange', function(e) {
				//				var state = document.fullScreen || document.mozFullScreen || document.webkitIsFullScreen;
				//				var event = state ? 'FullscreenOn' : 'FullscreenOff';
				//
				//				// Now do something interesting
				//							  $('body').removeClass('modal-open');
				//			});

				//				function onVideoEnded(event) {
				//					var myPlayer = videojs("home-video");
				//					myPlayer.webkitExitFullscreen();
				//				}
				//
				//				function onVideoEnded(event) {
				//					var myPlayer = videojs("home-video");
				//					myPlayer.webkitExitFullscreen();
				//				}

				$('.woocommerce-product-gallery__image a').magnificPopup({
					type: 'image',
					mainClass: 'mfp-with-zoom mfp-fade',
					removalDelay: 500,
					preloader: false,
					fixedContentPos: false,


					gallery: {
						enabled: true
					}
				});


				$('.video-modal .close').click(function () {
					//						$('body').removeClass('loaded');
					$('body').removeClass('modal-open');
					var myPlayer = videojs("home-video");
					setTimeout(function () {



						myPlayer.pause();

					}, 250);


					return false;


				});



				$('.modal-toggle').click(function (e) {
					//						$('body').removeClass('loaded');

					if ($('body').hasClass('menu-open')) {

						$('body').removeClass('modal-open');


					} else {


						$('body').addClass('menu-open modal-open');

					}


					var target = $(this).attr('href');

					$('.modal').not(target).removeClass('view-modal');
					$(target).addClass('view-modal');

					if (target == '#contact-modal') {

						$('.video-modal').addClass('poof');

						setTimeout(function () {
							$('body').addClass('contact-modal-open');
							$('html, body').animate({
								scrollTop: $('#returnTop').offset().top
							}, 0);


						}, 500);







					}


					return false;


				});

				if ($('#featured-image').length) {





					// try to create a WebGL canvas (will fail if WebGL isn't supported)


					// convert the image to a texture

					var image = document.getElementById('featured-image');

					image.crossOrigin = 'Anonymous';
					window.onload = function () {

						var canvas = fx.canvas();

						var texture = canvas.texture(image);
						// apply the ink filter
						canvas.draw(texture).colorHalftone(320, 239.5, 0.25, 4).update();

						// replace the image with the canvas
						image.parentNode.insertBefore(canvas, image);
						image.parentNode.removeChild(image);

						// Note: instead of swapping the &lt;canvas&gt; tag with the &lt;img&gt; tag
						// as done above, we could have just transferred the contents of
						// the image directly:
						//
						//     image.src = canvas.toDataURL('image/png');
						//
						// This has two disadvantages. First, it is much slower, so it
						// would be a bad idea to do this repeatedly. If you are going
						// to be repeatedly updating a filter it's much better to use
						// the &lt;canvas&gt; tag directly. Second, this requires that the
						// image is hosted on the same domain as the script because
						// JavaScript has direct access to the image contents. When the
						// two tags were swapped using the previous method, JavaScript
						// actually doesn't have access to the image contents and this
						// does not violate the same origin policy.
					};
					image.src = $('#featured-image').attr('src');

				}


				$('.mobile-tooltip').on({
					'touchstart': function () {
						$(this).fadeOut(300);
						return false;
					}
				});




				$('.over-video').click(function () {



					$(this).find('label').velocity("fadeOut", {
						duration: 250
					});



					return false;


				});
				$('.menu-toggle').click(function () {
					$('.video-modal').removeClass('poof');
					$('body').removeClass('modal-open').removeClass('contact-modal-open');
					$('body').toggleClass('menu-open');
					$('.full-menu').addClass('transition');


					return false;


				});
				$(".full-menu li a").hover(
					function () {
						$('.full-menu').removeClass("transition");
					}
				);
				$("a").not('a[href="#"], .nturl, .modal-toggle, .modal-toggle a, .pop-link, ul.tabs li a, .woocommerce-product-gallery__image a, a[target="_blank"], a[target="blank"]').click(function (e) {


					var link = $(this).attr('href');

					e.preventDefault();




					$('.loader').addClass('once');
					$('.spinner').css('opacity', '1').css('top', e.clientY).css('left', e.clientX);


					setTimeout(function () {
						window.location.href = link;

					}, 1500);
					setTimeout(function () {
						$('.loader').removeClass('once');
						$('.spinner').css('opacity', '0');
					}, 2500);
				});




				if (/iPhone/i.test(navigator.userAgent)) {





					$(window).scroll(function () {





						var windowfull = $.windowHeight();
						var windowHeight = $(window).height(),
							remaining = windowfull - windowHeight;

						console.log(windowfull);
						console.log(windowHeight);
						console.log(remaining);




						if (windowfull !== windowHeight) {

							$('body').addClass('donate-up');

						} else if (remaining == 0) {
							$('body').removeClass('donate-up');

						}

					});




				}






				$(window).resize(function () {
					if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
						stellarinit();
					}
				});

				if (/iPhone/i.test(navigator.userAgent)) {

					$(document).ready(function () {



						if ($('body').hasClass('home')) {


							if ($.cookie('hide-after-load') == 'yes') {


								setTimeout(function () {
									$('.loader').addClass('animate visible');
								}, 200);

								setTimeout(function () {

									$('body').addClass('loaded');
								}, 1500);



							} else {



								setTimeout(function () {

									$('.loader').addClass('animate visible intro');
								}, 200);


								$('.spinner').click(function () {
									$.cookie('hide-after-load', 'yes', {
										expires: 1
									});

									$('.loader').addClass('intro-out');

									setTimeout(function () {

										$('body').addClass('loaded');
									}, 2000);


								})

							}






						} else {

							setTimeout(function () {
								$('.loader').addClass('animate visible');
							}, 200);

							setTimeout(function () {

								$('body').addClass('loaded');
							}, 1500);



						}


					});
				} else {

					$(window).load(function () {






						if ($('body').hasClass('home')) {


							if ($.cookie('hide-after-load') == 'yes') {


								setTimeout(function () {
									$('.loader').addClass('animate visible');
								}, 200);

								setTimeout(function () {

									$('body').addClass('loaded');
								}, 1500);



							} else {



								setTimeout(function () {

									$('.loader').addClass('animate visible intro');
								}, 200);


								$('.spinner').click(function () {
									$.cookie('hide-after-load', 'yes', {
										expires: 1
									});

									$('.loader').addClass('intro-out');

									setTimeout(function () {

										$('body').addClass('loaded');
									}, 1700);


								})



								setTimeout(function () {

									$.cookie('hide-after-load', 'yes', {
										expires: 1
									});

									$('.loader').addClass('intro-out');

									setTimeout(function () {

										$('body').addClass('loaded');
									}, 1700);





								}, 15000);

							}






						} else {

							setTimeout(function () {
								$('.loader').addClass('animate visible');
							}, 200);

							setTimeout(function () {

								$('body').addClass('loaded');
							}, 1500);



						}







						if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
							stellarinit();
						}




					});

				}

				if ($('html').hasClass('ie')) {

					$('.parallax-container img').each(function () {


						var img = $(this).attr('src');


						$(this).parent('div').css('backgroundImage', 'url(' + img + ')').addClass('ie-polyfill');



					})


				}

				function stellarinit() {

					if ($('html.mac.safari').length) {

						$(window).stellar({


							horizontalScrolling: false,
							verticalScrolling: true,

							// Set the global alignment offsets
							horizontalOffset: 0,
							verticalOffset: 240,

							// Refreshes parallax content on window load and resize
							responsive: true,

							// Select which property is used to calculate scroll.
							// Choose 'scroll', 'position', 'margin' or 'transform',
							// or write your own 'scrollProperty' plugin.
							scrollProperty: 'scroll',

							// Select which property is used to position elements.
							// Choose between 'position' or 'transform',
							// or write your own 'positionProperty' plugin.
							positionProperty: 'transform',

							// Enable or disable the two types of parallax
							parallaxBackgrounds: false,
							parallaxElements: true,

							// Hide parallax elements that move outside the viewport
							hideDistantElements: true
								//				responsive: true,	
						});

					} else {

						$(window).stellar({


							horizontalScrolling: false,
							verticalScrolling: true,

							// Set the global alignment offsets
							horizontalOffset: 0,
							verticalOffset: 240,

							// Refreshes parallax content on window load and resize
							responsive: true,

							// Select which property is used to calculate scroll.
							// Choose 'scroll', 'position', 'margin' or 'transform',
							// or write your own 'scrollProperty' plugin.
							scrollProperty: 'scroll',

							// Select which property is used to position elements.
							// Choose between 'position' or 'transform',
							// or write your own 'positionProperty' plugin.
							positionProperty: 'transform',

							// Enable or disable the two types of parallax
							parallaxBackgrounds: false,
							parallaxElements: true,

							// Hide parallax elements that move outside the viewport
							hideDistantElements: false
								//				responsive: true,	
						});

					}

				}





			},
			finalize: function () {
				// JavaScript to be fired on all pages, after page specific JS is fired



			}
		}, // Home page
		'home': {
			init: function () {
				// JavaScript to be fired on the home page


			},
			finalize: function () {
				// JavaScript to be fired on the home page, after the init JS


			}
		}, // About us page, note the change from about-us to about_us.
		'about_us': {
			init: function () {
				// JavaScript to be fired on the about us page
			}
		}
	};
	// The routing fires all common scripts, followed by the page specific scripts.
	// Add additional events for more control over timing e.g. a finalize event
	var UTIL = {
		fire: function (func, funcname, args) {
			var fire;
			var namespace = Sage;
			funcname = (funcname === undefined) ? 'init' : funcname;
			fire = func !== '';
			fire = fire && namespace[func];
			fire = fire && typeof namespace[func][funcname] === 'function';
			if (fire) {
				namespace[func][funcname](args);
			}
		},
		loadEvents: function () {
			// Fire common init JS
			UTIL.fire('common');
			// Fire page-specific init JS, and then finalize JS
			$.each(document.body.className.replace(/-/g, '_').split(/\s+/), function (i, classnm) {
				UTIL.fire(classnm);
				UTIL.fire(classnm, 'finalize');
			});
			// Fire common finalize JS
			UTIL.fire('common', 'finalize');
		}
	};
	// Load Events
	$(document).ready(UTIL.loadEvents);
})(jQuery); // Fully reference jQuery after this point.
