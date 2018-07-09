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
        if (window.location.hash === '#login') {

          $('.login-form').slideDown(0);
          $('.reg-form').slideUp(0);

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
    },

      'page_id_77': {
      init: function () {


        var insertForm247808 = function () {
          var html247808 = '<div id="donation-form-container">' +
            '  <form id="donation-form" class="donation-form" method="post" onsubmit="event.preventDefault(); collectPayment();">' +
            '    <div class="errors hidden"></div>' +
            '    <div class="section donation">' +
            '      <div class="field tel donation-amount required" >' +
            '<label for="donation-amount"><span class="label">Amount</span><span class="required-star">*</span></label>' +
            '<input id="donation-amount" name="donation-amount" class="currency minimum1 required" type="tel" placeholder="$0.00"></input>' +
            '</div>' +
            '' +
            '</div>' +
            '    <div class="section recurring">' +
            '      <div class="field checkbox recurring" >' +
            '<label for="recurring"><input id="recurring" name="recurring" type="checkbox" maxlength="255"></input><span class="label">Show my support by making this a recurring donation</span></label>' +
            '</div>' +
            '<div class="field  frequency required" style="display: none">' +
            '<label for="frequency">Frequency<span class="required-star">*</span></label>' +
            '<select id="frequency" name="frequency" class="required"><option value=""></option>' +
            '<option value="Weekly">Weekly</option>' +
            '<option value="Monthly" selected>Monthly</option>' +
            '<option value="Quarterly">Quarterly</option>' +
            '<option value="Yearly">Yearly</option>' +
            '</select>' +
            '</div>' +
            '<div class="field date start-date required" style="display: none">' +
            '<label for="start-date"><span class="label">Start Date</span><span class="required-star">*</span></label>' +
            '<input id="start-date" name="start-date" class="validDate required" type="date" placeholder="mm/dd/yyyy"></input>' +
            '</div>' +
            '' +
            '</div>' +
            '    <div class="section fund">' +
            '      <div class="field text fund required" >' +
            '<label for="fund">My donation is for<span class="required-star">*</span></label>' +
            '<select id="fund" name="fund" class="required"><option value=""></option>' +
            '<option value="13315">Where it is needed most</option>' +
            '<option value="148482">Memorial and Museum</option>' +
            '<option value="148480">Education Programs</option>' +
            '<option value="147456">Scholarships</option>' +
            '<option value="148483">Community Grants</option>' +
            '</select>' +
            '</div>' +
            '' +
            '</div>' +
            '    <div class="section contact">' +
            '      <h3>Contact Information</h3>' +
            '      <div class="field text first-name required" >' +
            '<label for="first-name"><span class="label">First Name</span><span class="required-star">*</span></label>' +
            '<input id="first-name" name="first-name" class="required" type="text"></input>' +
            '</div>' +
            '<div class="field text last-name required" >' +
            '<label for="last-name"><span class="label">Last Name</span><span class="required-star">*</span></label>' +
            '<input id="last-name" name="last-name" class="required" type="text"></input>' +
            '</div>' +
            '<div class="field email email-address required" >' +
            '<label for="email-address"><span class="label">Email</span><span class="required-star">*</span></label>' +
            '<input id="email-address" name="email-address" class="email required" type="email" placeholder="someone@website.com"></input>' +
            '</div>' +
            '<div class="field tel phone-number" >' +
            '<label for="phone-number"><span class="label">Phone</span></label>' +
            '<input id="phone-number" name="phone-number" class="phoneUS" type="tel"></input>' +
            '</div>' +
            '' +
            '</div>' +
            '    <div class="section billing-address">' +
            '      <h3>Billing Address</h3>' +
            '      <div class="field  country required" >' +
            '<label for="country">Country<span class="required-star">*</span></label>' +
            '<select id="country" name="country" class="required"><option value=""></option>' +
            '<option value="AF">Afghanistan</option>' +
            '<option value="AX">Aland Islands</option>' +
            '<option value="AL">Albania</option>' +
            '<option value="DZ">Algeria</option>' +
            '<option value="AS">American Samoa</option>' +
            '<option value="AD">Andorra</option>' +
            '<option value="AO">Angola</option>' +
            '<option value="AI">Anguilla</option>' +
            '<option value="AQ">Antarctica</option>' +
            '<option value="AG">Antigua and Barbuda</option>' +
            '<option value="AR">Argentina</option>' +
            '<option value="AM">Armenia</option>' +
            '<option value="AW">Aruba</option>' +
            '<option value="AU">Australia</option>' +
            '<option value="AT">Austria</option>' +
            '<option value="AZ">Azerbaijan</option>' +
            '<option value="BS">Bahamas</option>' +
            '<option value="BH">Bahrain</option>' +
            '<option value="BD">Bangladesh</option>' +
            '<option value="BB">Barbados</option>' +
            '<option value="BY">Belarus</option>' +
            '<option value="BE">Belgium</option>' +
            '<option value="BZ">Belize</option>' +
            '<option value="BJ">Benin</option>' +
            '<option value="BM">Bermuda</option>' +
            '<option value="BT">Bhutan</option>' +
            '<option value="BO">Bolivia</option>' +
            '<option value="BA">Bosnia and Herzegovina</option>' +
            '<option value="BW">Botswana</option>' +
            '<option value="BV">Bouvet Island</option>' +
            '<option value="BR">Brazil</option>' +
            '<option value="IO">British Indian Ocean Territory</option>' +
            '<option value="BN">Brunei Darussalam</option>' +
            '<option value="BG">Bulgaria</option>' +
            '<option value="BF">Burkina Faso</option>' +
            '<option value="BI">Burundi</option>' +
            '<option value="KH">Cambodia</option>' +
            '<option value="CM">Cameroon</option>' +
            '<option value="CA">Canada</option>' +
            '<option value="CV">Cape Verde</option>' +
            '<option value="KY">Cayman Islands</option>' +
            '<option value="CF">Central African Republic</option>' +
            '<option value="TD">Chad</option>' +
            '<option value="CL">Chile</option>' +
            '<option value="CN">China</option>' +
            '<option value="CX">Christmas Island</option>' +
            '<option value="CC">Cocos (Keeling) Islands</option>' +
            '<option value="CO">Colombia</option>' +
            '<option value="KM">Comoros</option>' +
            '<option value="CG">Congo</option>' +
            '<option value="CD">Democratic Republic of the Congo</option>' +
            '<option value="CK">Cook Islands</option>' +
            '<option value="CR">Costa Rica</option>' +
            '<option value="CI">Cote d\'Ivoire</option>' +
            '<option value="HR">Croatia</option>' +
            '<option value="CU">Cuba</option>' +
            '<option value="CW">Curacao</option>' +
            '<option value="CY">Cyprus</option>' +
            '<option value="CZ">Czech Republic</option>' +
            '<option value="DK">Denmark</option>' +
            '<option value="DJ">Djibouti</option>' +
            '<option value="DM">Dominica</option>' +
            '<option value="DO">Dominican Republic</option>' +
            '<option value="EC">Ecuador</option>' +
            '<option value="EG">Egypt</option>' +
            '<option value="SV">El Salvador</option>' +
            '<option value="GQ">Equatorial Guinea</option>' +
            '<option value="ER">Eritrea</option>' +
            '<option value="EE">Estonia</option>' +
            '<option value="ET">Ethiopia</option>' +
            '<option value="FK">Falkland Islands (Malvinas)</option>' +
            '<option value="FO">Faroe Islands</option>' +
            '<option value="FJ">Fiji</option>' +
            '<option value="FI">Finland</option>' +
            '<option value="FR">France</option>' +
            '<option value="GF">French Guiana</option>' +
            '<option value="PF">French Polynesia</option>' +
            '<option value="TF">French Southern Territories</option>' +
            '<option value="GA">Gabon</option>' +
            '<option value="GM">Gambia</option>' +
            '<option value="GE">Georgia</option>' +
            '<option value="DE">Germany</option>' +
            '<option value="GH">Ghana</option>' +
            '<option value="GI">Gibraltar</option>' +
            '<option value="GR">Greece</option>' +
            '<option value="GL">Greenland</option>' +
            '<option value="GD">Grenada</option>' +
            '<option value="GP">Guadeloupe</option>' +
            '<option value="GU">Guam</option>' +
            '<option value="GT">Guatemala</option>' +
            '<option value="GG">Guernsey</option>' +
            '<option value="GN">Guinea</option>' +
            '<option value="GW">Guinea-Bissau</option>' +
            '<option value="GY">Guyana</option>' +
            '<option value="HT">Haiti</option>' +
            '<option value="HM">Heard Island</option>' +
            '<option value="HN">Honduras</option>' +
            '<option value="HK">Hong Kong</option>' +
            '<option value="HU">Hungary</option>' +
            '<option value="IS">Iceland</option>' +
            '<option value="IN">India</option>' +
            '<option value="ID">Indonesia</option>' +
            '<option value="IR">Islamic Republic of Iran</option>' +
            '<option value="IQ">Iraq</option>' +
            '<option value="IE">Ireland</option>' +
            '<option value="IM">Isle of Man</option>' +
            '<option value="IL">Israel</option>' +
            '<option value="IT">Italy</option>' +
            '<option value="JM">Jamaica</option>' +
            '<option value="JP">Japan</option>' +
            '<option value="JE">Jersey</option>' +
            '<option value="JO">Jordan</option>' +
            '<option value="KZ">Kazakhstan</option>' +
            '<option value="KE">Kenya</option>' +
            '<option value="KI">Kiribati</option>' +
            '<option value="KP">Democratic People\'s Republic of Korea</option>' +
            '<option value="KR">Republic of Korea</option>' +
            '<option value="KW">Kuwait</option>' +
            '<option value="KG">Kyrgyzstan</option>' +
            '<option value="LA">Lao People\'s Democratic Republic</option>' +
            '<option value="LV">Latvia</option>' +
            '<option value="LB">Lebanon</option>' +
            '<option value="LS">Lesotho</option>' +
            '<option value="LR">Liberia</option>' +
            '<option value="LY">Libya</option>' +
            '<option value="LI">Liechtenstein</option>' +
            '<option value="LT">Lithuania</option>' +
            '<option value="LU">Luxembourg</option>' +
            '<option value="MO">Macao</option>' +
            '<option value="MK">Macedonia</option>' +
            '<option value="MG">Madagascar</option>' +
            '<option value="MW">Malawi</option>' +
            '<option value="MY">Malaysia</option>' +
            '<option value="MV">Maldives</option>' +
            '<option value="ML">Mali</option>' +
            '<option value="MT">Malta</option>' +
            '<option value="MH">Marshall Islands</option>' +
            '<option value="MQ">Martinique</option>' +
            '<option value="MR">Mauritania</option>' +
            '<option value="MU">Mauritius</option>' +
            '<option value="YT">Mayotte</option>' +
            '<option value="MX">Mexico</option>' +
            '<option value="FM">Federated States of Micronesia</option>' +
            '<option value="MD">Republic of Moldova</option>' +
            '<option value="MC">Monaco</option>' +
            '<option value="MN">Mongolia</option>' +
            '<option value="ME">Montenegro</option>' +
            '<option value="MS">Montserrat</option>' +
            '<option value="MA">Morocco</option>' +
            '<option value="MZ">Mozambique</option>' +
            '<option value="MM">Myanmar</option>' +
            '<option value="NA">Namibia</option>' +
            '<option value="NR">Nauru</option>' +
            '<option value="NP">Nepal</option>' +
            '<option value="NL">Netherlands</option>' +
            '<option value="NC">New Caledonia</option>' +
            '<option value="NZ">New Zealand</option>' +
            '<option value="NI">Nicaragua</option>' +
            '<option value="NE">Niger</option>' +
            '<option value="NG">Nigeria</option>' +
            '<option value="NU">Niue</option>' +
            '<option value="NF">Norfolk Island</option>' +
            '<option value="MP">Northern Mariana Islands</option>' +
            '<option value="NO">Norway</option>' +
            '<option value="OM">Oman</option>' +
            '<option value="PK">Pakistan</option>' +
            '<option value="PW">Palau</option>' +
            '<option value="PS">State of Palestine</option>' +
            '<option value="PA">Panama</option>' +
            '<option value="PG">Papua New Guinea</option>' +
            '<option value="PY">Paraguay</option>' +
            '<option value="PE">Peru</option>' +
            '<option value="PH">Philippines</option>' +
            '<option value="PN">Pitcairn</option>' +
            '<option value="PL">Poland</option>' +
            '<option value="PT">Portugal</option>' +
            '<option value="PR">Puerto Rico</option>' +
            '<option value="QA">Qatar</option>' +
            '<option value="RE">Reunion</option>' +
            '<option value="RO">Romania</option>' +
            '<option value="RU">Russian Federation</option>' +
            '<option value="RW">Rwanda</option>' +
            '<option value="BL">Saint Barthelemy</option>' +
            '<option value="SH">Ascension and Tristan da Cunha Saint Helena</option>' +
            '<option value="KN">Saint Kitts and Nevis</option>' +
            '<option value="LC">Saint Lucia</option>' +
            '<option value="MF">Saint Martin (French part)</option>' +
            '<option value="PM">Saint Pierre and Miquelon</option>' +
            '<option value="VC">Saint Vincent and the Grenadines</option>' +
            '<option value="WS">Samoa</option>' +
            '<option value="SM">San Marino</option>' +
            '<option value="ST">Sao Tome and Principe</option>' +
            '<option value="SA">Saudi Arabia</option>' +
            '<option value="SN">Senegal</option>' +
            '<option value="RS">Serbia</option>' +
            '<option value="SC">Seychelles</option>' +
            '<option value="SL">Sierra Leone</option>' +
            '<option value="SG">Singapore</option>' +
            '<option value="SX">Sint Maarten (Dutch part)</option>' +
            '<option value="SK">Slovakia</option>' +
            '<option value="SI">Slovenia</option>' +
            '<option value="SB">Solomon Islands</option>' +
            '<option value="SO">Somalia</option>' +
            '<option value="ZA">South Africa</option>' +
            '<option value="GS">South Georgia</option>' +
            '<option value="SS">South Sudan</option>' +
            '<option value="ES">Spain</option>' +
            '<option value="LK">Sri Lanka</option>' +
            '<option value="SD">Sudan</option>' +
            '<option value="SR">Suriname</option>' +
            '<option value="SJ">Svalbard and Jan Mayen</option>' +
            '<option value="SZ">Swaziland</option>' +
            '<option value="SE">Sweden</option>' +
            '<option value="CH">Switzerland</option>' +
            '<option value="SY">Syrian Arab Republic</option>' +
            '<option value="TW">Taiwan</option>' +
            '<option value="TJ">Tajikistan</option>' +
            '<option value="TZ">United Republic of Tanzania</option>' +
            '<option value="TH">Thailand</option>' +
            '<option value="TL">Timor-Leste</option>' +
            '<option value="TG">Togo</option>' +
            '<option value="TK">Tokelau</option>' +
            '<option value="TO">Tonga</option>' +
            '<option value="TT">Trinidad and Tobago</option>' +
            '<option value="TN">Tunisia</option>' +
            '<option value="TR">Turkey</option>' +
            '<option value="TM">Turkmenistan</option>' +
            '<option value="TC">Turks and Caicos Islands</option>' +
            '<option value="TV">Tuvalu</option>' +
            '<option value="UG">Uganda</option>' +
            '<option value="UA">Ukraine</option>' +
            '<option value="AE">United Arab Emirates</option>' +
            '<option value="GB">United Kingdom</option>' +
            '<option value="US" selected>United States</option>' +
            '<option value="UM">United States Minor Outlying Islands</option>' +
            '<option value="UY">Uruguay</option>' +
            '<option value="UZ">Uzbekistan</option>' +
            '<option value="VU">Vanuatu</option>' +
            '<option value="VA">Vatican City</option>' +
            '<option value="VE">Venezuela</option>' +
            '<option value="VN">Viet Nam</option>' +
            '<option value="VG">British Virgin Islands</option>' +
            '<option value="VI">U.S. Virgin Islands</option>' +
            '<option value="WF">Wallis and Futuna</option>' +
            '<option value="EH">Western Sahara</option>' +
            '<option value="YE">Yemen</option>' +
            '<option value="ZM">Zambia</option>' +
            '<option value="ZW">Zimbabwe</option>' +
            '</select>' +
            '</div>' +
            '<div class="field  street-address required" >' +
            '<label for="street-address"><span class="label">Address</span><span class="required-star">*</span></label>' +
            '<textarea id="street-address" name="street-address" class="required"></textarea>' +
            '</div>' +
            '<div class="field text city required" >' +
            '<label for="city"><span class="label">City</span><span class="required-star">*</span></label>' +
            '<input id="city" name="city" class="required" type="text" data-us-label="City" data-bm-label="Parish"></input>' +
            '</div>' +
            '<div class="field  state required" >' +
            '<label for="state">State<span class="required-star">*</span></label>' +
            '<select id="state" name="state" class="required"><option value=""></option>' +
            '<option value="AL">Alabama</option>' +
            '<option value="AK">Alaska</option>' +
            '<option value="AS">American Samoa</option>' +
            '<option value="AZ">Arizona</option>' +
            '<option value="AR">Arkansas</option>' +
            '<option value="AE">Armed Forces Africa, Canada, Europe, Middle East</option>' +
            '<option value="AA">Armed Forces Americas (except Canada)</option>' +
            '<option value="AP">Armed Forces Pacific</option>' +
            '<option value="CA">California</option>' +
            '<option value="CO">Colorado</option>' +
            '<option value="CT">Connecticut</option>' +
            '<option value="DE">Delaware</option>' +
            '<option value="DC">District of Columbia</option>' +
            '<option value="FL">Florida</option>' +
            '<option value="GA">Georgia</option>' +
            '<option value="GU">Guam</option>' +
            '<option value="HI">Hawaii</option>' +
            '<option value="ID">Idaho</option>' +
            '<option value="IL">Illinois</option>' +
            '<option value="IN">Indiana</option>' +
            '<option value="IA">Iowa</option>' +
            '<option value="KS">Kansas</option>' +
            '<option value="KY">Kentucky</option>' +
            '<option value="LA">Louisiana</option>' +
            '<option value="ME">Maine</option>' +
            '<option value="MD">Maryland</option>' +
            '<option value="MA">Massachusetts</option>' +
            '<option value="MI">Michigan</option>' +
            '<option value="MN">Minnesota</option>' +
            '<option value="MS">Mississippi</option>' +
            '<option value="MO">Missouri</option>' +
            '<option value="MT">Montana</option>' +
            '<option value="NE">Nebraska</option>' +
            '<option value="NV">Nevada</option>' +
            '<option value="NH">New Hampshire</option>' +
            '<option value="NJ">New Jersey</option>' +
            '<option value="NM">New Mexico</option>' +
            '<option value="NY">New York</option>' +
            '<option value="NC">North Carolina</option>' +
            '<option value="ND">North Dakota</option>' +
            '<option value="OH">Ohio</option>' +
            '<option value="OK">Oklahoma</option>' +
            '<option value="OR">Oregon</option>' +
            '<option value="PA">Pennsylvania</option>' +
            '<option value="PR">Puerto Rico</option>' +
            '<option value="RI">Rhode Island</option>' +
            '<option value="SC">South Carolina</option>' +
            '<option value="SD">South Dakota</option>' +
            '<option value="TN">Tennessee</option>' +
            '<option value="TX">Texas</option>' +
            '<option value="VI">US Virgin Islands</option>' +
            '<option value="UT">Utah</option>' +
            '<option value="VT">Vermont</option>' +
            '<option value="VA">Virginia</option>' +
            '<option value="WA">Washington</option>' +
            '<option value="WV">West Virginia</option>' +
            '<option value="WI">Wisconsin</option>' +
            '<option value="WY">Wyoming</option>' +
            '</select>' +
            '</div>' +
            '<div class="field  province required" style="display: none">' +
            '<label for="province">Province<span class="required-star">*</span></label>' +
            '<select id="province" name="province" class="required"><option value=""></option>' +
            '<option value="AB">Alberta</option>' +
            '<option value="BC">British Columbia</option>' +
            '<option value="MB">Manitoba</option>' +
            '<option value="NB">New Brunswick</option>' +
            '<option value="NL">Newfoundland and Labrador</option>' +
            '<option value="NT">Northwest Territories</option>' +
            '<option value="NS">Nova Scotia</option>' +
            '<option value="NU">Nunavut</option>' +
            '<option value="ON">Ontario</option>' +
            '<option value="PE">Prince Edward Island</option>' +
            '<option value="QC">Quebec</option>' +
            '<option value="SK">Saskatchewan</option>' +
            '<option value="YT">Yukon Territory</option>' +
            '</select>' +
            '</div>' +
            '<div class="field number zip-code required" >' +
            '<label for="zip-code"><span class="label">ZIP Code</span><span class="required-star">*</span></label>' +
            '<input id="zip-code" name="zip-code" class="zipcodeUS required" type="number" step="any" minlength="5" maxlength="10"></input>' +
            '</div>' +
            '<div class="field text postal-code required" style="display: none">' +
            '<label for="postal-code"><span class="label">Postal Code</span><span class="required-star">*</span></label>' +
            '<input id="postal-code" name="postal-code" class="required" type="text"></input>' +
            '</div>' +
            '' +
            '</div>' +
            '    ' +
            '    ' +
            '    <div class="section comment">' +
            '      <div class="field text comment" >' +
            '<label for="comment"><span class="label">Comments</span></label>' +
            '<textarea id="comment" name="comment" type="text" value="Comments"></textarea>' +
            '</div>' +
            '' +
            '</div>' +
            '    <div class="section consent hidden">' +
            '      <div class="field checkbox consent-all" >' +
            '<label for="consent-all"><input id="consent-all" name="consent-all" type="checkbox" maxlength="255"></input><span class="label">I would like to receive or continue receiving updates from onePULSE Foundation</span></label>' +
            '</div>' +
            '<div class="field checkbox consent-email" style="display: none">' +
            '<label for="consent-email"><input id="consent-email" name="consent-email" type="checkbox" checked="checked" maxlength="255"></input><span class="label">by email</span></label>' +
            '</div>' +
            '<div class="field checkbox consent-mail" style="display: none">' +
            '<label for="consent-mail"><input id="consent-mail" name="consent-mail" type="checkbox" checked="checked" maxlength="255"></input><span class="label">by postal mail</span></label>' +
            '</div>' +
            '<div class="field checkbox consent-phone" style="display: none">' +
            '<label for="consent-phone"><input id="consent-phone" name="consent-phone" type="checkbox" checked="checked" maxlength="255"></input><span class="label">by phone</span></label>' +
            '</div>' +
            '' +
            '</div>' +
            '    <div class="section true-impact">' +
            '      <h3>Increase My Impact</h3>' +
            '      <div class="field checkbox true-impact" >' +
            '<label for="true-impact"><input id="true-impact" name="true-impact" type="checkbox" maxlength="255"></input><span class="label">Yes! Add [amount] to help offset bank fees</span></label>' +
            '</div>' +
            '' +
            '</div>' +
            '    <div class="section captcha">' +
            '      <label id=\'noCaptchaResponseError\' class=\'error noCaptchaResponseError\' style=\'display: none\'>You must fill out the CAPTCHA</label><div id="captcha247808"></div>' +
            '' +
            '</div>' +
            '    <div class="btn-group">' +
            '      <input class="btn btn-submit btn-submit-donation" type="submit" value="Enter Payment" id="express-submit" disabled="true" />' +
            '    </div>' +
            '  </form>' +
            '</div>' +
            '<div id="donation-processing-container" style="display: none">' +
            '  <h2>Processing...</h2><p>Your transaction is being processed. Please do not close your browser or leave this page.</p>' +
            '</div>' +
            '' +
            '' + '';

          var successHtml247808 = '<div class=\'donation-success\'>' +
            '  <h2>Thank You for Your Donation!</h2>' +
            '  <p>Your generous gift has been processed. We thank you for your your support for onePULSE Foundation as we work to create a sanctuary of hope and healing around the tragedy that occurred on June 12, 2016, which honors the 49 lives that were taken, their families, the 68 injured victims, the affected survivors and the first responders and healthcare professionals who cared for the victims.</p>' +
            '\u003cdiv class=\"social-media-buttons\" style=\"margin-top:10px;\"\u003e\u003cdiv id=\"twitter-buttons\"\u003e\u003c/div\u003e\u003cdiv class=\"fb-like\" data-href=\"https://facebook.com/onepulseorg\" data-layout=\"button_count\" data-show-faces=\"true\" style=\"padding-right: 10px;\" data-action=\"like\" \u003e\u003c/div\u003e\u003cdiv id=\"facebookShareOnly\" class=\"fb-share-button\" data-href=\"https://facebook.com/onepulseorg\" data-layout=\"button_count\"\u003e\u003c/div\u003e\u003cscript type=\u0027text/javascript\u0027\u003edocument.getElementById(\u0027facebookShareOnly\u0027).setAttribute(\u0027data-href\u0027, window.location.href);\u003c/script\u003e\u003c/div\u003e \u003cscript\u003e\r\n                    if (navigator.userAgent.indexOf(\u0027Edge/\u0027) === -1) {\r\n                        !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\"http\":\"https\";if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+\"://platform.twitter.com/widgets.js\";fjs.parentNode.insertBefore(js,fjs);}}(document, \"script\", \"twitter-wjs\");\r\n                        var twitterButtons = document.getElementById(\u0027twitter-buttons\u0027);\r\n                        twitterButtons.innerHTML = \u0027\u003cdiv id=\"tweetButton\" style=\"float:left; margin-right:10px\"\u003e \u003ca href=\"https://twitter.com/share\" data-text=\"I just made a donation to @onepulseorg. You should too! Together, we will not let hate win.\" class=\"twitter-share-button\"\u003eTweet\u003c/a\u003e \u003c/div\u003e\u003cdiv id=\"followButton\"\u003e \u003ca href=\"https://twitter.com/onepulseorg\" class=\"twitter-follow-button\"\u003eFollow\u003c/a\u003e \u003c/div\u003e\u0027;\r\n                        twitterButtons.style.height = \u002735px\u0027;\r\n                    }\r\n                \u003c/script\u003e \u003cdiv id=\"fb-root\"\u003e\u003c/div\u003e \u003cscript\u003e(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = \"//connect.facebook.net/en_US/sdk.js#xfbml=1\u0026version=v2.8\"; fjs.parentNode.insertBefore(js, fjs); }(document, \u0027script\u0027, \u0027facebook-jssdk\u0027));\u003c/script\u003e ' +
            '</div>';
          (function ($) {
            if (!Bloomerang.useDonationId('247808')) {
              html247808 = '<p style="color: red">Only one donation or event registration form can be used on each page.</p>';
            }
            if (jQuery('#bloomerangForm247808').length) {

              if (window.ActiveXObject) { // they are using IE < 11, which doesn't support TLS 1.1
                html247808 = '<p style="color: red">​Your browser does not support the minimum security requirements for keeping your Credit Card information safe when processing payments. Please upgrade ​your browser or download the latest version of' +
                  ' <a target=\'_blank\' href=\'https://www.google.com/chrome/browser/desktop/\'>Chrome</a> or <a target=\'_blank\' href=\'https://www.mozilla.org/en-US/firefox/new/\'>Firefox</a>.</p>';
              }
              jQuery('#bloomerangForm247808').after(html247808);
              if (!Bloomerang.SpreedlyScriptLoaded) {
                Bloomerang.Util.load('https://core.spreedly.com/iframe/express-2.min.js',
                  function () {
                    return SpreedlyExpress != undefined;
                  },
                  function () {
                    SpreedlyExpress.onInit(function () {
                      jQuery('#express-submit').attr('disabled', false);
                    });
                    Bloomerang.initSpreedly = function () {
                      SpreedlyExpress.init('OqOMv1ksjPtXEYHtCYsVXzEpCbR', {
                        'company_name': 'onePULSE Foundation'
                      });
                    };
                    Bloomerang.initSpreedly();
                  });
              }
              Bloomerang.SpreedlyScriptLoaded = true;
            };
            if (Bloomerang.paymentFormLoaded) {
              return false;
            }
            Bloomerang.paymentFormLoaded = true;
            jQuery('.donation-form .section.captcha').attr('style', 'display: none');
            Bloomerang.transactionFee = 0.3;
            Bloomerang.transactionFeeRate = 0.022;
            Bloomerang.transactionFeeEft =
              Bloomerang.useKey('pub_b288fdb1-46f4-11e8-94a1-0a7fa948a058');

            Bloomerang.Util.getDonationAmount = function () {
              return Number(accounting.unformat(jQuery(".donation-form .section.donation input[name='donation-level']:checked").val() || jQuery(".donation-form #donation-amount").val()));
            };

            // Register proper callbacks for various stages/outcomes of submission
            Bloomerang.Widget.Donation.OnSubmit = function (args) {
              jQuery(".btn-submit-donation").val("Donating...").prop("disabled", true).addClass("disabled");
              var val = function (selector) {
                return jQuery(selector).val();
              };
              Bloomerang.Account
                .individual()
                .firstName(val(".donation-form #first-name"))
                .middleName(val(".donation-form #middle-name"))
                .lastName(val(".donation-form #last-name"))
                .homeAddress(val(".donation-form #street-address"),
                  val(".donation-form #city"),
                  val(".donation-form #state") || val(".donation-form #province"),
                  val(".donation-form #zip-code") || val(".donation-form #postal-code"),
                  val(".donation-form #country"))
                .homeEmail(val(".donation-form #email-address"))
                .homePhone(val(".donation-form #phone-number"))
                .applyDonationCustomFields();

              if (jQuery(".donation-form #consent-all").prop("checked")) {
                Bloomerang.Account.optedInStatus(jQuery(".donation-form #consent-email").prop("checked"),
                  jQuery(".donation-form #consent-mail").prop("checked"),
                  jQuery(".donation-form #consent-phone").prop("checked"));
              }

              var amount = Bloomerang.Util.getDonationAmount() + Bloomerang.Util.getDonationTrueImpactAmount();
              if (jQuery(".donation-form #recurring").prop("checked")) {
                Bloomerang.RecurringDonation
                  .amount(amount)
                  .fundId(val(".donation-form #fund"))
                  .note(val(".donation-form #comment"))
                  .frequency(val(".donation-form #frequency") || "Monthly")
                  .startDate(val(".donation-form #start-date"))
                  .applyDonationCustomFields();

                // Need to do a null-check here because they might have a cached version of Bloomerang-v2.js
                if (Bloomerang.RecurringDonation.trueImpactEnabled && Bloomerang.RecurringDonation.trueImpactUsed) {
                  Bloomerang.RecurringDonation
                    .trueImpactEnabled(jQuery(".donation-form .true-impact .fee-amount").length > 0)
                    .trueImpactUsed(jQuery(".donation-form .true-impact input:checked").length > 0);
                }
              } else {
                Bloomerang.Donation
                  .amount(amount)
                  .fundId(val(".donation-form #fund"))
                  .note(val(".donation-form #comment"))
                  .applyDonationCustomFields();

                // Need to do a null-check here because they might have a cached version of Bloomerang-v2.js
                if (Bloomerang.Donation.trueImpactEnabled && Bloomerang.Donation.trueImpactUsed) {
                  Bloomerang.Donation
                    .trueImpactEnabled(jQuery(".donation-form .true-impact .fee-amount").length > 0)
                    .trueImpactUsed(jQuery(".donation-form .true-impact input:checked").length > 0);
                }
              }

              if (jQuery("#donation-form #Checking").is(":checked") ||
                jQuery("#donation-form #Savings").is(":checked")) {
                Bloomerang.Eft
                  .accountNumber(val(".donation-form #accountNumber"))
                  .routingNumber(val(".donation-form #routingNumber"))
                  .type(jQuery("#donation-form .section.payment input[type='radio']:checked").attr("id"));
              }
            };
            Bloomerang.ValidateDonationFormCaptcha = function () {
              if (typeof (grecaptcha) !== "undefined" && jQuery("#captcha" + Bloomerang.Data.WidgetIds.Donation).children().length) {
                var captchaResponse = grecaptcha.getResponse(jQuery(".donation-form").data("captcha-id"));
                if (captchaResponse) {
                  jQuery(".donation-form .noCaptchaResponseError").hide();
                  Bloomerang.captchaResponse(captchaResponse);
                  return true;
                } else {
                  jQuery(".donation-form .noCaptchaResponseError").show();
                  return false;
                }
              } else return true;
            };
            Bloomerang.scrollToElement = function (element) {
              var distance = 100;
              var offset = element.offset().top;
              var offsetTop = offset > distance ? offset - distance : offset;
              jQuery('html, body').animate({
                scrollTop: offsetTop
              }, 500);
            };
            Bloomerang.Api.OnSuccess = Bloomerang.Widget.Donation.OnSuccess = function (response) {
              jQuery("#donation-processing-container").hide();
              var formContainer = jQuery("#donation-form-container");
              formContainer.show();
              formContainer.html(successHtml247808);
              Bloomerang.scrollToElement(formContainer);
            };
            Bloomerang.Api.OnError = Bloomerang.Widget.Donation.OnError = function (response) {
              jQuery(".btn-submit-donation").prop("disabled", false).removeClass("disabled");
              if (jQuery("#donation-form #Checking").is(":checked") ||
                jQuery("#donation-form #Savings").is(":checked"))
                jQuery(".btn-submit-donation").val("Donate");
              else
                jQuery(".btn-submit-donation").val("Enter Payment");
              jQuery("#donation-form-container .errors").removeClass("hidden").html(response.Message);
              jQuery("#donation-processing-container").hide();
              jQuery("#donation-form-container").show();
              Bloomerang.scrollToElement(jQuery("#donation-form-container .errors"));
              Bloomerang.cancelFinancialSubmission(jQuery("#donation-form"));
              SpreedlyExpress.unload();
              Bloomerang.initSpreedly();
              if (typeof (grecaptcha) !== "undefined" && jQuery("#captcha" + Bloomerang.Data.WidgetIds.Donation).children().length) {
                grecaptcha.reset(jQuery(".donation-form").data("captcha-id"));
              }
            };

            Bloomerang.Util.applyDonationCustomFields = function (obj, type) {

              // Clear any fields from a previous failed submission
              obj.clearCustomFields();

              // Apply all <input> (not multiselect), <select> and <textarea> fields
              jQuery(".donation-form .section.custom-fields :input:not(a > input, select)[id*=" + type + "]").each(function () {
                if (jQuery(this).val().hasValue()) {
                  obj.customFreeformField(jQuery(this).attr("id").toUntypedValue(), jQuery(this).val());
                }
              });

              // Apply all <select> fields
              jQuery(".donation-form .section.custom-fields select[id*=" + type + "]").each(function () {
                if (jQuery(this).val().hasValue()) {
                  obj.customPickField(jQuery(this).attr("id").toUntypedValue(), jQuery(this).val());
                }
              });

              // Apply all multiselect fields
              jQuery(".donation-form .section.custom-fields .checkboxes[id*=" + type + "]").each(function () {
                obj.customPickField(jQuery(this).attr("id").toUntypedValue(),
                  jQuery.map(jQuery(this).children(".checkbox.selected"), function (v) {
                    return jQuery(v).attr("data-id");
                  }));
              });
            };

            String.prototype.hasValue = function () {
              return (this && jQuery.trim(this)); //IE8 doesn't have a native trim function
            };

            Bloomerang.Account.applyDonationCustomFields = function () {
              Bloomerang.Util.applyDonationCustomFields(this, "Account");
              return this;
            };

            Bloomerang.Donation.applyDonationCustomFields = function () {
              Bloomerang.Util.applyDonationCustomFields(this, "Transaction");
              return this;
            };

            Bloomerang.RecurringDonation.applyDonationCustomFields = function () {
              Bloomerang.Util.applyDonationCustomFields(this, "Transaction");
              return this;
            };

            String.prototype.toUntypedValue = function () {
              return this.substring(this.indexOf('_') + 1);
            };

            Date.prototype.toDateInputValue = function () {
              var local = new Date(this);
              local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
              return (local.getMonth() + 1) + // Add one to the month because it starts at 0
                "/" + local.getDate() + "/" + local.getFullYear();
            };

            jQuery(document).ready(function () {
              jQuery(".donation-form .field.start-date input").val(new Date().toDateInputValue());
            });

            // Hide recurring donation options if recurring donation box is unchecked
            jQuery(".donation-form .field.recurring").change(function () {
              jQuery(".donation-form .field.recurring").siblings().each(function (i, e) {
                jQuery(e).toggle();
              });
            })

            // The other-amount field is only equired when the "Other" donation-level is selected
            jQuery(".donation-form .section.donation input[name='donation-level']").change(function () {
              if (jQuery(this).attr('id') == "other-option") {
                jQuery(".donation-form #other-amount").addClass("required");
              } else {
                jQuery(".donation-form #other-amount").removeClass("required");
              }
              Bloomerang.Util.calculateDonationTrueImpact();
            });

            if (jQuery(".donation-form .true-impact label").length) {
              jQuery(".donation-form .true-impact label")[0].innerHTML = jQuery(".donation-form .true-impact label")[0].innerHTML.replace("[amount]", "<span class='fee-amount'>$0</span>");
            }
            Bloomerang.Util.calculateDonationTrueImpact = function () {
              if (!jQuery(".donation-form .true-impact .fee-amount").length) {
                return;
              }
              // Note that we don't really care about JS floating point math. It's OK if the numbers are a couple cents off.
              var amount = Bloomerang.Util.getDonationAmount();
              var isEft = (jQuery("#donation-form #Checking").is(":checked") || jQuery("#donation-form #Savings").is(":checked"));
              var feeRate = isEft ? 0 : Bloomerang.transactionFeeRate;
              var newTotal = (amount + (isEft ? Bloomerang.transactionFeeEft : Bloomerang.transactionFee)) / (1 - feeRate);
              var impactAmount = Number((newTotal - amount).toFixed(2));
              jQuery(".donation-form .true-impact .fee-amount").text(accounting.formatMoney(impactAmount));
              return impactAmount;
            };
            Bloomerang.Util.getDonationTrueImpactAmount = function () {
              if (jQuery(".donation-form .true-impact input:checked").length) {
                return Bloomerang.Util.calculateDonationTrueImpact();
              }
              return 0;
            };

            // Changing the value of other-amount should change the value of other-option
            jQuery(".donation-form #other-amount").change(function () {
              jQuery(".donation-form #other-option").val(jQuery(this).val());
              Bloomerang.Util.calculateDonationTrueImpact();
            });

            jQuery(".donation-form #donation-amount").change(function () {
              Bloomerang.Util.calculateDonationTrueImpact();
            });

            // Clicking into the other-amount field should select the other-option
            jQuery(".donation-form #other-amount").click(function () {
              jQuery(".donation-form #other-option").prop('checked', true);
              Bloomerang.Util.calculateDonationTrueImpact();
            });

            jQuery.validator.addMethod("phoneUS", function (phone_number, element) {
              var digits = phone_number.replace(/\D/g, "");
              return this.optional(element) || digits.length == 7 || digits.length == 10 || digits.length == 11;
            }, "Please specify a valid phone number or use '+' for international.");

            jQuery.validator.addMethod("phoneInternational", function (phone_number, element) {
              return this.optional(element) || /^\+[0-9\-\(\)\s.]+$/i.test(phone_number);
            }, "Please specify a valid phone number.");
            jQuery.validator.classRuleSettings.phoneInternational = {
              phoneInternational: true
            };

            jQuery.validator.addMethod("zipcodeUS", function (value, element) {
              return this.optional(element) || /\d{5}-\d{4}$|^\d{5}$/.test(value)
            }, "The specified US ZIP Code is invalid");

            jQuery.validator.addMethod("currency", function (value, element, options) {
              return !value ||
                value
                .replace("$", "")
                .replace(".", "")
                .split(",").join("")
                .match(/^\d+$/g);
            }, "Not a valid currency");

            jQuery.validator.classRuleSettings.currency = {
              currency: true
            };

            jQuery.validator.addMethod("number", function (value, element, options) {
              return !value ||
                value
                .replace(".", "")
                .split(",").join("")
                .match(/^\d+$/g);
            }, "Not a valid number");

            jQuery.validator.classRuleSettings.number = {
              number: true
            };

            jQuery.validator.addMethod("validYear", function (value, element, options) {
              try {
                return (!value || value.match(/^[1-9]\d\d\d$/)) ? true : false;
              } catch (e) {
                return false;
              }
            }, function () {
              return "Must be a 4 digit year";
            });

            jQuery.validator.classRuleSettings.validYear = {
              validYear: true
            };

            // Validate that the donation amount is at least $1
            jQuery.validator.methods.min = function (value, element, param) {
              if (typeof (accounting) === "undefined") { // rip out $ and ,
                value = ((value + "") || "").replace(/[\$,]/g, "");
              } else { // Use accounting.parse, to handle $ and ,
                value = accounting.parse(value);
              }
              return this.optional(element) || value >= param;
            };
            jQuery.validator.classRuleSettings.minimum1 = {
              min: 1
            };
            jQuery.validator.messages.min = 'Please enter a value of at least {0}.'

            jQuery(".donation-form #country").change(function (event) {
              var element = jQuery(event.target || event.srcElement); // cross-browser event target selection
              var isInternational = (element.val() != "US" && element.val() != "CA" && element.val() != "BM");
              jQuery(".donation-form #state, .donation-form #province").val(""); // clear the state when the country changes
              jQuery(".donation-form .field.city, .donation-form .field.state, .donation-form .field.province, .donation-form .field.zip-code, .donation-form .field.postal-code").toggle(!isInternational);
              jQuery(".donation-form #street-address").toggleClass("international", isInternational);
              if (element.val() == "BM") {
                jQuery(".donation-form .field.city .label").text(jQuery(".donation-form .field.city input").data("bm-label"));
              } else if (element.val() == "US" || element.val() == "CA") {
                jQuery(".donation-form .field.city .label").text(jQuery(".donation-form .field.city input").data("us-label"));
              }
              if (element.val() == "US") {
                jQuery(".donation-form .field.state, .donation-form .field.zip-code").show();
                jQuery(".donation-form .field.province, .donation-form .field.postal-code").hide();
              } else if (element.val() == "CA") {
                jQuery(".donation-form .field.state, .donation-form .field.zip-code").hide();
                jQuery(".donation-form .field.province, .donation-form .field.postal-code").show();
              } else if (element.val() == "BM") {
                jQuery(".donation-form .field.state, .donation-form .field.province, .donation-form .field.zip-code").hide();
                jQuery(".donation-form .field.postal-code").show();
              } else {
                jQuery(".donation-form #city, .donation-form #postal-code, .donation-form #zip-code").val("");
              }
              jQuery(".donation-form .section.consent").toggleClass("hidden", !Bloomerang.Util.isCountryInEurope(element.val()));
            });

            jQuery(".donation-form #phone-number").change(function () {
              var phoneField = jQuery(".donation-form #phone-number");
              var internationalNumber = phoneField.val().substring(0, 1) === '+';
              phoneField.toggleClass("phoneUS", !internationalNumber);
              phoneField.toggleClass("phoneInternational", internationalNumber);
            })

            collectPayment = function () {
              var form = jQuery("#donation-form");

              if (!Bloomerang.ValidateDonationFormCaptcha()) {
                return false;
              }

              if (!form.valid()) {
                return false;
              }

              if (jQuery("#donation-form #CreditCard").length > 0 && !jQuery("#donation-form #CreditCard").prop("checked")) {
                submitDonation();
              } else {
                var val = function (selector) {
                  return jQuery(selector).val();
                };
                var amount = Bloomerang.Util.getDonationAmount() + Bloomerang.Util.getDonationTrueImpactAmount();
                var selectedDonationLevel = jQuery(".donation-form .section.donation input[name='donation-level']:checked").parent().text();
                selectedDonationLevel = (selectedDonationLevel.indexOf("-") == -1 ? "" : selectedDonationLevel.substr(selectedDonationLevel.indexOf("-") + 2));

                SpreedlyExpress.setDisplayOptions({
                  "amount": accounting.formatMoney(amount),
                  "full_name": val(".donation-form #first-name") + " " + val(".donation-form #last-name"),
                  "sidebar_bottom_description": selectedDonationLevel,
                  "submit_label": "Donate"
                });
                SpreedlyExpress.setPaymentMethodParams({
                  "email": val(".donation-form #email-address"),
                  "phone_number": val(".donation-form #phone-number"),
                  "address1": val(".donation-form #street-address"),
                  "city": val(".donation-form #city"),
                  "state": val(".donation-form #state") || val(".donation-form #province"),
                  "zip": val(".donation-form #zip-code") || val(".donation-form #postal-code")
                });

                SpreedlyExpress.onPaymentMethod(function (token, paymentMethod) {
                  Bloomerang.CreditCard.spreedlyToken(token);
                  submitDonation();
                });

                var oldMeta = '';
                if (jQuery('meta[name="viewport"]').length) {
                  oldMeta = jQuery('meta[name="viewport"]').attr('content');
                } else {
                  jQuery('head').append('<meta name="viewport" content="" />');
                }
                jQuery('meta[name="viewport"]').attr('content', 'width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1');
                jQuery('meta[name="viewport"]').attr('content', oldMeta);

                SpreedlyExpress.openView();
              }
            };

            submitDonation = function () {
              if (!Bloomerang.continueFinancialSubmission(jQuery("#donation-form"))) {
                return false;
              }

              Bloomerang.Api.OnSubmit = Bloomerang.Widget.Donation.OnSubmit;
              Bloomerang.Api.OnSuccess = Bloomerang.Widget.Donation.OnSuccess;
              Bloomerang.Api.OnError = Bloomerang.Widget.Donation.OnError;

              var processingMessage = jQuery("#donation-processing-container");
              processingMessage.show();
              jQuery("#donation-form-container").hide();
              Bloomerang.scrollToElement(processingMessage);

              var tmp = jQuery(".donation-form #recurring").prop("checked") ? Bloomerang.Api.recurringDonate() : Bloomerang.Api.donate();
            };

            jQuery("#donation-form #CreditCard").prop("checked", true);
            jQuery("#donation-form .section.payment input[type='radio']").click(function () {
              Bloomerang.Util.calculateDonationTrueImpact();
              if (jQuery(this).attr("id") == "CreditCard") {
                jQuery("#donation-form .accountNumber, \
                    #donation-form .routingNumber, \
                    #donation-form .sample-check").hide();
                jQuery(".btn-submit-donation").val("Enter Payment");
              } else {
                jQuery("#donation-form .accountNumber, \
                    #donation-form .routingNumber, \
                    #donation-form .sample-check").show();
                if (jQuery("#donation-form .sample-check").length == 0) {
                  var checkImage = new Image();
                  checkImage.src = 'https://s3-us-west-2.amazonaws.com/bloomerang-public-cdn/public-gallery/SampleCheck.png';
                  jQuery(checkImage).addClass("sample-check");
                  jQuery("#donation-form .accountNumber").after(checkImage);
                }
                jQuery(".btn-submit-donation").val("Donate");
              }
            });

            // Show opt-in options based on the setting of the global opt-in
            jQuery(".donation-form .field.consent-all").change(function () {
              jQuery(".donation-form .field.consent-all").siblings().each(function (i, e) {
                jQuery(e).toggle();
              });
            });

          })(jQuery);
        };

        var startBloomerangLoad = function () {
          if (window.bloomerangLoadStarted == undefined) {
            window.bloomerangLoadStarted = true;
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = 'https://crm.bloomerang.co/Content/Scripts/Api/Bloomerang-v2.js?nocache=2018-05-21';
            document.getElementsByTagName('head')[0].appendChild(script);
            waitForBloomerangLoad(function () {
              Bloomerang.Util.requireJQueryValidation(function () {
                insertForm247808();
              })
            });
          } else {
            waitForBloomerangLoad(function () {
              Bloomerang.Util.requireJQueryValidation(function () {
                insertForm247808();
              })
            });
          }
        };

        var waitForBloomerangLoad = function (callback) {
          if (typeof (Bloomerang) === 'undefined' || !Bloomerang._isReady) {
            setTimeout(function () {
              waitForBloomerangLoad(callback)
            }, 500);
          } else {
            if (true) {
              callback();
            } else {
              window.bloomerangLoadStarted = undefined;
              Bloomerang = undefined; // The version of Blomerang.js is not what we want. So blow it away and reload.
              startBloomerangLoad();
            }
          }
        };

        startBloomerangLoad();



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
