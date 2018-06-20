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
//          $('.mm').matchHeight();
          fullHero();
          ctaPadding();
          if ($('.retina_2x').length) {
            $('.featured-slider .item img').each(function () {
              $(this).attr('data-lazy', $(this).attr('data-src'));
            });
          }
          $('.gallery').slick({
            lazyLoad: 'ondemand',
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


        var resizeTimer;

        $(window).on('resize', function(e) {

          clearTimeout(resizeTimer);
          resizeTimer = setTimeout(function() {

            fullHero();

          }, 250);

        });

        window.addEventListener("orientationchange", function () {
          setTimeout(function () {
//            ctaPadding();
            fullHero();
          }, 500);
          console.log('rotate')
        });
          function ctaPadding() {
          $('.page-cta').each(function () {
            var wrapper = $('.over h3'),
              movethis = $(wrapper).text(),
              movethis2 = movethis.split(" ").pop(),
              thisHeight = $(wrapper).outerHeight();
//            console.log(movethis2);
            if($(window).width() < 991) {
//            $(this).find('.content').css("padding-top", (thisHeight * 1.5))
            } else {
            $(wrapper).html($(wrapper).html().split(movethis2).join(""));
            $(this).find('.dupe h3').text(movethis2);
//            $(this).find('.content').css("padding-top", (thisHeight * 2.5))
            }
//            $(window).resize(function () {
//            if($(window).width() < 991) {
////            $(this).find('.content').css("padding-top", (thisHeight * 1.5))
//            } else {
//
//
//
////            $(this).find('.content').css("padding-top", (thisHeight * 2.5))
//            }
//            });
          });
          }
        function fullHero() {
          var fullHeight = $(window).outerHeight(),
            contentHeight = $('.home-hero .container').outerHeight(),
            remaining = ((fullHeight + header) - contentHeight),
            padding = (remaining / 2);
            if($('body').hasClass('scrolled') && $(window).width() > 991) {

                var header = $('header').outerHeight() * 1.25;

            } else {

                var header = $('header').outerHeight();

            }
                $('section').not('.home-hero, .newsletter, .page-cta, .page-main section:first-child, .post-body section:first-child').each(function(){
                  var ogClass = $(this).attr('class');
                  if($(this).attr('data-attr') == null) {
                  $(this).attr('data-attr', ogClass);
//                  var storedClass = $(this).attr('data-attr');
                  }
                  if($(window).width() < 991){
                    $(this).removeClass (function (index, css) {
                       return (css.match (/(^|\s)pt\S+/g) || []).join(' ');
                    }).removeClass (function (index, css) {
                       return (css.match (/(^|\s)pb\S+/g) || []).join(' ');
                    }).removeClass (function (index, css) {
                       return (css.match (/(^|\s)mt\S+/g) || []).join(' ');
                    }).removeClass (function (index, css) {
                       return (css.match (/(^|\s)mb\S+/g) || []).join(' ');
                    }).addClass('mobile-spacing')
                  } else {
                    $(this).attr('class', $(this).attr('data-attr'));
//                    console.log('resizing - should be adding OG back:' + $(this).attr('data-attr'))
                  }
                });
              if($(window).width() > 991){

                if($('section:first-child').length){
                $('section:first-child').css('padding-top', header * 1.25);
  //              $('section:first-child').removeClass('pt-sm-3');
                }
              } else {


                $('.home .home-hero').css('padding-top', header * 1.25);
                $('.contact-form.modal').css('padding-top', header * 1.25);


                if($('section:first-child').length){
                  $('section:first-child').css('padding-top', header * 1.25);
                  $("section:first-child").removeClass (function (index, css) {
                     return (css.match (/(^|\s)pt\S+/g) || []).join(' ');
                  });
                }
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
        $(document).on('click', '.shares .pop-link', function (e) {
          e.preventDefault();
          var poplink = $(this).attr('href');
          newwindow = window.open(poplink, 'name', 'height=800,width=600');
          if (window.focus) {
            newwindow.focus()
          }
          return false;
        });
        $('a').not('.home-play, .task-link, .logo, p a, .stickylist-fileupload a').each(function () {
          if ($('html').not('.mobile')) {
            var title = $(this).text();
            $(this).attr('title', title);
          }
        });
        $('p .btn').each(function () {
          if ($('html').not('.mobile')) {
            var title = $(this).text();
            $(this).attr('title', title);
          }
        });
        $('.question').click(function () {
        var el = document.querySelector('html');
        var style = window.getComputedStyle(el, null).getPropertyValue('font-size');
        var fontSize = parseFloat(style);
        var convertedREM = fontSize * 3;
        var target = $(this).parents('.faq-item');
        var item = $(this);
//          if($('body').hasClass('scrolled')) {
//
//              var headerHeight = $('header').outerHeight() * 1.75;
//
//          } else {
              var headerHeight = $('header').outerHeight();
//          }


          $('.faq-item').not($(item).parents('.faq-item')).removeClass('active');
          $('.faq-item .answer').children('p, ul').not($(item).next('.answer').children('p, ul')).slideUp(500);
          $(item).next('.answer').children('p, ul').slideToggle(500);
          $(item).parents('.faq-item').toggleClass('active');
          setTimeout(function(){

            $('html, body').delay().animate({
                      scrollTop: $(item).offset().top - headerHeight - convertedREM
              }, 1000);

          }, 500);


          return false;
        });
        $('.search-toggle').click(function () {
          $('html').addClass('search-open');
          return false;
        });
//        $('.login-toggle').click(function(){
//
//          return false;
//        });
        $('.search-clear, .search-cover').click(function () {
          $('html').removeClass('search-open');
          return false;
          //                    return false;
        });
//        if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
          var $document = $(document),
            $element = $('body'),
            className = 'scrolled';
          var headerHeight = ($('.home-hero').outerHeight() - $('header').outerHeight());
          $document.scroll(function () {
            $element.toggleClass(className, $document.scrollTop() > $('header').outerHeight());
          });
//        }
        $('.home-play').click(function () {
          //						$('body').removeClass('loaded');
          var videoSrc = $('#home-video').attr('data-src');
          var myPlayer = videojs("home-video", {
            controls: true,
            techOrder: ["html5"],
            autoplay: true,
            sources: [{
              "type": "video/mp4",
              "src": videoSrc
                            }],
          });
          myPlayer.ga({
            "eventsToTrack": ["play"]
          })
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
        if ($('#home-video').length) {
          //                    videojs('home-video', {}, function () {
          //                        this.ga(); // "load the plugin, by defaults tracks everything!!"
          //                    });
        }
        if ($('#video').length) {
          videojs('video', {}, function () {
            this.ga(); // "load the plugin, by defaults tracks everything!!"
          });
        }
        if (document.location.href.indexOf('staging') === -1 || document.location.href.indexOf('dev') === -1) {
          $('.shirt-btn').click(function () {
            ga('send', {
              hitType: 'event',
              eventCategory: 'Shirt Click',
              eventAction: 'click'
            });
          });
          $('a[title="Donate"].btn.clipped').click(function () {
            ga('send', {
              hitType: 'event',
              eventCategory: 'Survey Click To Click - Top Button',
              eventAction: 'click'
            });
            console.log('Donate - Top Button');
          });
          $('.donate-bar .hidden-xs, .donate-bar .visible-xs.kit-btn').click(function () {
            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
              ga('send', {
                hitType: 'event',
                eventCategory: 'Survey Click Mobile - Bottom Bar',
                eventAction: 'click'
              });
            } else {
              ga('send', {
                hitType: 'event',
                eventCategory: 'Survey Click Desktop - Bottom Bar',
                eventAction: 'click'
              });
            }
            console.log('Survey Click To -  Bottom Bar');
          });
          $('.survey-toggle').click(function () {
            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
              ga('send', {
                hitType: 'event',
                eventCategory: 'Survey Start - Mobile',
                eventAction: 'click'
              });
            } else {
              ga('send', {
                hitType: 'event',
                eventCategory: 'Survey Start - Desktop',
                eventAction: 'click'
              });
            }
            console.log('Survey Start');
          });
          $('a[href="https://fiwi-onepulsefoundation.s3.amazonaws.com/wp-content/uploads/2017/06/We_Will_Not_Let_Hate_Win_FLIER_PRESS.pdf"]').click(function () {
            ga('send', {
              hitType: 'event',
              eventCategory: 'Flyer Kit',
              eventAction: 'Download'
            });
          });
          $('a[href="https://fiwi-onepulsefoundation.s3.amazonaws.com/wp-content/uploads/2017/06/We_Will_Not_Let_Hate_Win_4X8_BANNER_PRESS.pdf"]').click(function () {
            ga('send', {
              hitType: 'event',
              eventCategory: 'Banner Click',
              eventAction: 'Download'
            });
          });
        }
        $('.video-modal .close').click(function () {
          $('body').removeClass('modal-open');
          var myPlayer = videojs("home-video");
          setTimeout(function () {
            myPlayer.pause();
          }, 250);
          return false;
        });
        $('.modal-toggle').click(function (e) {
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
        $("a").not('.tab-links a, a[download], a[href="#"], .nturl, .modal-toggle, .modal-toggle a, .pop-link, ul.tabs li a, .woocommerce-product-gallery__image a, a[target="_blank"], a[target="blank"], .survey-toggle, .stickylist-fileupload a, #menu-full-mobile li.menu-item-has-children a, div[id^="sticky-list-wrapper"] ul.pagination li a').click(function (e) {
          if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            var link = $(this).attr('href');
            e.preventDefault();
            $('.loader').addClass('once');
            $('.spinner').css('opacity', '1').css('top', e.clientY).css('left', e.clientX);
            setTimeout(function () {
              window.location.href = link;
            }, 1000);
//            setTimeout(function () {
//              $('.loader').removeClass('once');
//              $('.spinner').css('opacity', '0');
//            }, 1700);
          }
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
                  }, 2000);
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
            if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) && $(window).width() > 768) {
              stellarinit();
            }
          });
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
        function halftone() {
          // try to create a WebGL canvas (will fail if WebGL isn't supported)
//          if ($('#featured-image').length) {
            $('.canvas-container').each(function(){
            // convert the image to a texture
            var image = $(this).children('.grayscale')[0];
//            var image = $(this);
            image.crossOrigin = 'Anonymous';
//            window.onload = function () {
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
//            };
//            image.src = $('#featured-image').attr('src');
            var imgHeight = $(this).children('.over-image').outerHeight();
            var imgWidth = $(this).children('.over-image').outerWidth();
            var canvasWidth = $(this).outerWidth();
            var imgRatio = imgHeight / imgWidth;
            var canvasHeight = canvasWidth * imgRatio;
            $(this).css('height', canvasHeight);
            });
            $('.post-image').each(function(){
            // convert the image to a texture
            var image = $('#featured-image')[0];
            var overlayHeight = $('#featured-image').outerHeight();
//            var image = $(this);
            image.crossOrigin = 'Anonymous';
//            window.onload = function () {
              var canvas = fx.canvas();
              var texture = canvas.texture(image);
              // apply the ink filter
              canvas.draw(texture).colorHalftone(320, 239.5, 0.25, 4).update();
              // replace the image with the canvas
              image.parentNode.insertBefore(canvas, image);
              image.parentNode.removeChild(image);

              if($('.single-task-member').length){

              $('.post-image .col-lg-5.col-11').prepend('<div class="overlay" style="height: ' + overlayHeight + 'px;"></div>');


              }
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
//            };
//            image.src = $('#featured-image').attr('src');
//            var imgHeight = $(this).children('.over-image').outerHeight();
//            var imgWidth = $(this).children('.over-image').outerWidth();
//            var canvasWidth = $(this).outerWidth();
//            var imgRatio = imgHeight / imgWidth;
//            var canvasHeight = canvasWidth * imgRatio;
//
//            $(this).css('height', canvasHeight);
            });
//          }
        }
        $(window).load(function(){
        halftone();
        if ($('.ie').length) {
          $('.parallax-container img, .bg-element img').each(function () {
            var img = $(this).attr('src');
            $(this).parent('div').addClass('ie-polyfill');
            $(this).css('backgroundImage', 'url(' + img + ')').addClass('ie-polyfill');
            $(this).attr('src', '/wp-content/themes/onepulse/dist/img/clear.gif')
          })
        }

        })


          var resizeTimer;

          $(window).on('resize', function(e) {

            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {

            if($('.post-image .overlay').length){
              var newHeight = $('.post-image canvas').outerHeight();
              $('.overlay').css('height', newHeight);
            }
            }, 250);

          });


        $('#menu-full-mobile li.menu-item-has-children a').click(function(){
          if($(this).parents('li').hasClass('active')) {
          } else {
          $(this).parents('li').children('.sub-menu').delay(400).fadeIn(400);
          $(this).parents('li').addClass('active');
          $('.sub-menu').not($(this).parents('li').children('.sub-menu')).slideUp(400);
          $('#menu-full-mobile > li').not($(this).parents('li')).slideUp(400);
          if($('.translated-ltr').length){
            var backLabel = 'Volver';
          }  else {
            var backLabel = 'Back';
          }
          $(this).parents('li').prepend('<a href="#" class="sub-back no-hover"><i class="fa fa-caret-left"></i>' + backLabel + '</a>');
          return false;
          }
        });
        $(document).on('click', '.sub-back', function(){
          $('.sub-menu').slideUp(400);
          $('#menu-full-mobile > li').slideDown(400).removeClass('active');
          $('.sub-back').remove();
          return false;
        });
      $(window).load(function(){
        var headerHeight = $('header').outerHeight();
        if(window.location.hash) {
        $('html, body').animate({
            scrollTop: $(window.location.hash).offset().top - headerHeight
        }, 0);
        }
    });
        $('.btn, .nav-previous a.left, .nav-next a.left').not('.clipped').each(function () {
          $(this).prepend('<div></div>');
        });
        $('.newsletter input.wpcf7-form-control').click(function () {
          var value = $(this).val();
          if (value == 'Enter Your Email to Subscribe') {
            $(this).val('');
          }
        });
        $('.wpcf7-response-output').click(function () {
          $(this).fadeOut(300);
          return false;
        });
        $('.newsletter input.wpcf7-form-control').keyup(function () {
          var value = $(this).val();
          if (value !== 'Enter Your Email to Subscribe') {
            $('.newsletter label').css('opacity', '1');
          }
        })
        $('.newsletter input.wpcf7-form-control').blur(function () {
          var value = $(this).val();
          if (value == '') {
            $(this).val('Enter Your Email to Subscribe');
            $('.newsletter label').css('opacity', '0');
          }
        })
        //                if($('.invert-header').length){
        //
        //                    var bg = $('.page-main .home-hero').
        //
        //
        //                }
      }
    }, // Home page
    'home': {
      init: function () {
        // JavaScript to be fired on the home page
      },
      finalize: function () {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    'page_template_rfp': {
      init: function () {
        // JavaScript to be fired on the home page
      },
      finalize: function () {
        // JavaScript to be fired on the home page, after the init JS
        $('.tab-links a').click(function () {
          if($(this).is('a[href^="#"]')) {
          var link = $(this).attr('href');
          $('.tab').not(this).slideUp(500);
          $(link).slideToggle(500);
          $('.tab-links a').not(this).removeClass('active');
          $(this).addClass('active');
          return false;
          }
        });
        $(document).ready(function($) {
            cell = $('.stickylist-fileupload');
            cell.each(function(index) {
                image = $(this).children('a').attr('href');
                extension = image.split('.').pop();
                if(extension == 'pdf') {
                $(this).html('<a href="' + image + '" class="btn right" title="View Submission " target="blank"><div></div>View Submission <i class="fa fa-file-pdf"></i></a>');
                } else {
                $(this).html('<a href="' + image + '" class="no-hover"><img width="50" src="' + image + '"></a>');
                }
            });
        });
        $(document).on('click', '.stickylist-fileupload a', function(){
          if($(window).width() > 991){
          var file = $(this).attr('href');
          var submissionID = $(this).parents('.is_read').children('.sort-0').text();
          var desc = $(this).parents('.is_read').children('.sort-2').text();
          var name = $(this).parents('.is_read').children('.sort-1').text();
          $('html').addClass('view-pdf');
          console.log('viewing ' + file);
          console.log('ID ' + submissionID);
          console.log('by ' + name);
          console.log(desc);
          $('body').append('<div class="media-modal"><div class="inner"><a href="#" class="close"><i class="fa fa-close"></i></a><div class="row"><div class="col-sm-8"><div class="iframe-wrapper"><div class="spinner"><div class="double-bounce1"></div><div class="double-bounce2"></div></div><iframe src="' + file + '"></iframe></div></div><div class="col-sm-4"><div class="content"><h2 class="mb-3">Entry #' + submissionID + '</h2><p>' + desc + '</p><p class="author">Submitted by: ' + name + '</p></div></div></div></div></div>');
          setTimeout(function(){
            $('.media-modal').addClass('transition-in');
          }, 100);
          return false;
          }
        });
        $(document).on('click', '.media-modal .close', function(){
          $('html').removeClass('view-pdf');
          $(this).parents('.media-modal').removeClass('transition-in');
          setTimeout(function(){
            $('.media-modal').remove();
          }, 750);
        });
      }
    },
    'page_template_ig': {
      init: function () {
        // JavaScript to be fired on the home page


        $('.user-login-label a, .login-toggle').click(function(){

          $('.login-form').slideDown(500);
          $('.reg-form').slideUp(500);

          return false;

        });
        $('.back').click(function(){

          $('.login-form').slideUp(500);
          $('.reg-form').slideDown(500);

          return false;

        });
        $('#refresh').click(function(){


          location.reload();
          return false;

        });

        $('.tab-links li:first-child a').addClass('active');
      },
      finalize: function () {
        // JavaScript to be fired on the home page, after the init JS
        $('.tab-links a').click(function () {
          if($(this).is('a[href^="#"]')) {
          if($(this).hasClass('active')){



          } else {
          var link = $(this).attr('href');

          $('.tab').not(this).slideUp(500);
          $(link).slideToggle(500);
          $('.tab-links a').not(this).removeClass('active');
          $(this).addClass('active');
          }
          return false;
          }
        });
        function makeThumb(page) {
          // draw page to fit into 96x96 canvas
          var vp = page.getViewport(1);
          var canvas = document.createElement("canvas");
          canvas.width = canvas.height = 200;
          var scale = Math.min(canvas.width / vp.width, canvas.height / vp.height);
          return page.render({canvasContext: canvas.getContext("2d"), viewport: page.getViewport(scale)}).promise.then(function () {
            return canvas;
          });
        }
//        PDFJS.workerSrc = "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.489/pdf.worker.js";

        function createButtons() {


            $('.stickylist-fileupload').each(function() {
                var image = $(this).children('a').attr('href');
                var extension = image.split('.').pop();
                var parent =  $(this);


              if($(window).width() > 991) {

                PDFJS.getDocument(image).promise.then(function (doc) {
                  var pages = []; while (pages.length < 1) pages.push(1);
                  return Promise.all(pages.map(function (num) {
                    // create a div for each page and build a small canvas for it
                    var div = document.createElement("div");
//                    console.log(parent);
                    $(parent).prepend(div);
//                    document.parent.appendChild(div);
                    return doc.getPage(num).then(makeThumb)
                      .then(function (canvas) {
                        div.appendChild(canvas);
                    });
                  }));
                }).catch(console.error);

              }
                if(extension == 'pdf') {
                $(this).html('<a href="' + image + '" class="btn right" title="View Submission " target="blank"><div></div>View Submission <i class="fa fa-file-pdf"></i></a>');
                } else {
                $(this).html('<a href="' + image + '" class="no-hover"><img width="50" src="' + image + '"></a>');
                }
                setTimeout(function(){
                $('.sticky-list-wrapper').removeClass('loading');
                $('.sticky-list-wrapper .spinner').remove();
                }, 1000);



            });

        }

        $(document).ready(function() {
//            cell = $('.stickylist-fileupload');
            createButtons();

          $('.sitemap-wrapper iframe').attr('data-src', $('.sitemap-wrapper iframe').attr('src'));
          $('.sitemap-wrapper iframe').attr('src', '');
          $('.sitemap-wrapper').prepend('<div class="spinner"><div class="double-bounce1"></div><div class="double-bounce2"></div></div>');

        });

        $('.tab-links a[href="#site"]').click(function(){

          setTimeout(function(){

          $('.sitemap-wrapper iframe').attr('src', $('.sitemap-wrapper iframe').attr('data-src'));

          }, 600);

        });


        $('div[id^="sticky-list-wrapper"] ul.pagination li a').click(function(){


          $('.sticky-list-wrapper').addClass('loading');
          $('.sticky-list-wrapper').append('<div class="spinner"><div class="double-bounce1"></div><div class="double-bounce2"></div></div>');
          setTimeout(function(){

          createButtons();

          }, 500);

        });

        $(document).on('click', '.stickylist-fileupload a', function(){
          if($(window).width() > 991){
          var file = $(this).attr('href');
          var submissionID = $(this).parents('.is_read').children('.sort-1').text();
          var desc = $(this).parents('.is_read').children('.sort-2').text();
//          var name = $(this).parents('.is_read').children('.sort-2').text();
          $('html').addClass('view-pdf');
          console.log('viewing ' + file);
          console.log('ID ' + submissionID);
          console.log('by ' + name);
          console.log(desc);
          $('body').append('<div class="media-modal"><div class="inner"><a href="#" class="close"><i class="fa fa-close"></i></a><div class="row"><div class="col-sm-8"><div class="iframe-wrapper"><div class="spinner"><div class="double-bounce1"></div><div class="double-bounce2"></div></div><iframe src="' + file + '"></iframe></div></div><div class="col-sm-4"><div class="content"><h2 class="mb-3">Entry #' + submissionID + '</h2><p>' + desc + '</p></div></div></div></div></div>');
          setTimeout(function(){
            $('.media-modal').addClass('transition-in');
          }, 100);
          return false;
          }
        });
        $(document).on('click', '.media-modal .close', function(){
          $('html').removeClass('view-pdf');
          $(this).parents('.media-modal').removeClass('transition-in');
          setTimeout(function(){
            $('.media-modal').remove();
          }, 750);
          return false;
        });
      }
    },

    'page_template_submissions': {
      init: function () {
        // JavaScript to be fired on the home page


        $('.user-login-label a, .login-toggle').click(function(){

          $('.login-form').slideDown(500);
          $('.reg-form').slideUp(500);

          return false;

        });
        $('.back').click(function(){

          $('.login-form').slideUp(500);
          $('.reg-form').slideDown(500);

          return false;

        });
        $('#refresh').click(function(){


          location.reload();
          return false;

        });
      },
      finalize: function () {
        // JavaScript to be fired on the home page, after the init JS


        $(window).load(function(){


        if($('.hidden_values').length){


          var name = $('#hidden_name').val();
          var address = $('#hidden_address').val();
          var country = $('#hidden_country').val();


          $('#input_5_10').val(name);
          $('#input_5_13').val(address);
          $('#input_5_12').val(country);


        }
        })

      }
    },
    'page_template_information': {
      init: function () {
        // JavaScript to be fired on the home page
      },
      finalize: function () {
        // JavaScript to be fired on the home page, after the init JS
        $('.tab-links a').click(function () {
          if($(this).is('a[href^="#"]')) {
          var link = $(this).attr('href');

          if($(this).hasClass('active')){



          } else {

          $('.tab').not(this).slideUp(500);
          $(link).slideToggle(500);
          $('.tab-links a').not(this).removeClass('active');
          $(this).addClass('active');
          }

          return false;
          }
        });
        function initMap() {
          var pulse = {
            info: '<h4>Pulse Interim Memorial</h4><p>1912 S Orange Ave<br>Orlando, FL 32806</p><a class="btn" href="https://goo.gl/ubiUW5" title="Get Directions"><div></div>Get Directions</a>',
            lat: 28.5195909,
            long: -81.3766744,
            pin: {
              url: '/wp-content/themes/onepulse/dist/img/main-pin.png', // url
              scaledSize: new google.maps.Size(56, 85), // size
            }
          };
          var parking1 = {
            info: '<h4>Street Parking on South Orange Avenue</h4>',
            lat: 28.5194956,
            long: -81.3763761,
            pin: {
              url: '/wp-content/themes/onepulse/dist/img/parking-pin.png', // url
              scaledSize: new google.maps.Size(56, 85), // size
            }
          };
          var parking2 = {
            info: '<h4>Street Parking on Esther Street</h4>',
            lat: 28.519326,
            long: -81.377313,
            pin: {
              url: '/wp-content/themes/onepulse/dist/img/parking-pin.png', // url
              scaledSize: new google.maps.Size(56, 85), // size
            }
          };
          var parking3 = {
            info: '<h4>Public Parking Lot</h4>',
            lat: 28.520907,
            long: -81.376736,
            pin: {
              url: '/wp-content/themes/onepulse/dist/img/parking-pin.png', // url
              scaledSize: new google.maps.Size(56, 85), // size
            }
          };
          var locations = [
                          [pulse.info, pulse.lat, pulse.long, pulse.pin, 0],
                          [parking1.info, parking1.lat, parking1.long, parking1.pin, 1],
                          [parking2.info, parking2.lat, parking2.long, parking2.pin, 2],
                          [parking3.info, parking3.lat, parking3.long, parking3.pin, 3],
                        ];
          var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 18,
            center: new google.maps.LatLng(28.520408, -81.3770772),
            //                            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: [{
              "featureType": "all",
              "elementType": "all",
              "stylers": [{
                "hue": "#ff0000"
              }, {
                "saturation": -100
              }, {
                "lightness": -30
              }]
            }, {
              "featureType": "all",
              "elementType": "labels.text.fill",
              "stylers": [{
                "color": "#ffffff"
              }]
            }, {
              "featureType": "all",
              "elementType": "labels.text.stroke",
              "stylers": [{
                "color": "#353535"
              }]
            }, {
              "featureType": "landscape",
              "elementType": "geometry",
              "stylers": [{
                "color": "#656565"
              }]
            }, {
              "featureType": "poi",
              "elementType": "geometry.fill",
              "stylers": [{
                "color": "#505050"
              }]
            }, {
              "featureType": "poi",
              "elementType": "geometry.stroke",
              "stylers": [{
                "color": "#808080"
              }]
            }, {
              "featureType": "road",
              "elementType": "geometry",
              "stylers": [{
                "color": "#454545"
              }]
            }]
          });
          var infowindow = new google.maps.InfoWindow({});
          var marker, i;
          for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
              position: new google.maps.LatLng(locations[i][1], locations[i][2]),
              map: map,
              icon: locations[i][3]
            });
            google.maps.event.addListener(marker, 'click', (function (marker, i) {
              return function () {
                infowindow.setContent(locations[i][0]);
                infowindow.open(map, marker);
              }
            })(marker, i));
          }
        }
        if($('#map').length)
        initMap();
      }
    }, // About us page, note the change from about-us to about_us.
      'page_template_survey': {
      init: function () {
        $('.survey-toggle').click(function () {
            $('.survey-toggle').slideUp(500);
            $($(this).attr('href')).slideDown(500);
            return false;
          })
          //                    $('.Spanish').click(function(){
          //                        $('.survey-toggle').slideUp(500);
          //
          //                        $('#english').slideUp(500);
          //                        $('#spanish').slideDown(500);
          //
          //
          //                    })
          //                    $('.English').click(function(){
          //                        $('.survey-toggle').slideUp(500);
          //
          //                        $('#spanish').slideUp(500);
          //                        $('#english').slideDown(500);
          //
          //                        return false;
          //
          //                    })
        $(window).load(function () {
          $('.English').trigger('click');
        })
        $.fn.checkboxLimit = function (n) {
          var checkboxes = this;
          this.toggleDisable = function () {
            // if we have reached or exceeded the limit, disable all other checkboxes
            if (this.filter(':checked').length >= n) {
              var unchecked = this.not(':checked');
              unchecked.prop('disabled', true);
            }
            // if we are below the limit, make sure all checkboxes are available
            else {
              this.prop('disabled', false);
            }
          }
          // when form is rendered, toggle disable
          checkboxes.bind('gform_post_render', checkboxes.toggleDisable());
          // when checkbox is clicked, toggle disable
          checkboxes.click(function (event) {
            checkboxes.toggleDisable();
            // if we are equal to or below the limit, the field should be checked
            return checkboxes.filter(':checked').length <= n;
          });
        }
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
