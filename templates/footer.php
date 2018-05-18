<?php
/**
 * The template for displaying the footer
 *
 * @package Smores
 * @since Smores 2.0
 */
?>

<?php
$newsimage = get_field('news_image', 'options');?>
<section class="newsletter">
    <div class="container">
        <div class="row m0 flex-row align-items-center">
            <div class="col-md-7">
                <h2 class="mt0">Stay Informed</h2>
                <p>Sign up to receive exclusive updates about the onePULSE Foundation.</p>
            </div>
            <div class="col-md-5">
                    <?php echo do_shortcode('[contact-form-7 id="5374" title="Newsletter"]');?>
            </div>
        </div>

    </div>
</section>
<section class="page-cta mb80 hidden-xs">
    <div class="footer-bg">
        <div class="row">
            <div class="dupe col-sm-5"><h3></h3></div>
            <div class="col-sm-7 p0 oh">
                <div class="img-overlay"></div>

                                            <?php

                        $images = get_field('default_gallery', 'options');
                        $random_result = array_rand($images ,1);
                        $newsimage = $images[$random_result];?>

                <img src="<?php echo $newsimage['sizes']['large']; ?>" alt="<?php if (!$newsimage['alt'] == null): echo $newsimage['alt']; else: echo get_the_title() . ' - ' . get_bloginfo(); endif; ?>">
                <?php if (!$newsimage['caption'] == null): echo '<label class="img-attrib">' . $newsimage['caption'] . '</label>'; endif; ?>
                <div class="over">
                    <h3>News and Updates</h3>
                </div>
            </div>
      </div>
  </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-5 ml-auto">




                <div class="content">

                    <p class="text-right">Find out the latest from the onePULSE Foundation, including important milestones and announcements, as we work to create a sanctuary of hope.</p>

                    <a href="/category/news" class="btn right">See All </a>


                </div>


            </div>
        </div>
    </div>


</section>
<section class="page-cta mobile-cta visible-xs">
    <div class="container">
        <div class="img-overlay"></div>

        <div class="row">
            <div class="col-xs-10">
                <div class="content">
                    <h2 class="text-white"><span>Contact onePULSE Foundation</span>Fight the War Against Hate</h2>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="content">

                    <div class="pt-sm-5"></div>
                    <a href="#contact-modal" class="btn clipped modal-toggle" title="Together We Can. Contact Us ">Together We Can. Contact Us <i class="fa fa-send"></i></a>
                </div>
            </div>

        </div>
    </div>
    </div>

</section>

<footer>
    <div class="mb16 hidden-xs">
        <div class="container-fluid col-10">
            <div class="col-sm-2">
                <a href="/">
                    <?php echo file_get_contents(get_stylesheet_directory() . '/dist/img/nav-logo.svg'); ?>
                </a>
            </div>
            <div class="col-sm-10 text-right hidden-xs"><?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?></div>
        </div>

    </div>
    <div class="copy">
        <div class="container-fluid col-10">
            <div class="row">

                <div class="col-md-4 col-md-offset-8">

                    <ul class="socials">
                        <li><a href="http://www.facebook.com/onepulseorg" class="pop-link"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="http://www.twitter.com/onepulseorg" class="pop-link"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://www.instagram.com/onepulseorg/" class="pop-link"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <p>&copy; <?php echo date("Y"); ?> onePULSE Foundation • PO Box 530036
                        Orlando, Fl 32853-0036</div>
                <div class="col-md-4">
                    <a href="https://findsomewinmore.com" target="_blank" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/FIWI-classic-website-by-white.svg" class="fiwi"></a>
                </div>
            </div>

        </div>

    </div>
</footer>


</div>
<div class="donate-bar">
    <div class="row">
        <!--<div class="col-sm-12 col-xs-6">
            <a href="/donate" class="hidden-xs">Donate to the onePULSE Foundation <i class="fa fa-chevron-right"></i></a>
        </div>-->
        <div class="container-fluid col-10 col-xs-6">
            <a href="/onepulse-foundation-memorial/memorial-information/" class="hidden-xs">Visit the Pulse Interim Memorial <i class="fa fa-chevron-right"></i></a>
        </div>
        <!--<div class="col-sm-12 col-xs-6 visible-xs">
            <a href="/donate" class="visible-xs">Donate <i class="fa fa-chevron-right"></i></a>
        </div>-->
        <div class="col-sm-12 col-xs-6 visible-xs">
            <a href="/onepulse-foundation-memorial/memorial-information/" class="visible-xs">Visit <i class="fa fa-chevron-right"></i></a>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/dist/js/vendor/videojs.ga.min.js"></script>
<style>
    .debug-info {

/*        position: fixed;*/
/*        background: black;*/
/*        color: white;*/
/*        padding: .5rem 1rem;*/
/*        left: 0;*/
/*        top: 0;*/
/*        width: 100%;*/
/*            z-index: 10000;*/


    }

</style>
<script>
//(function ($) {
//
//    'use strict';
//
//
//    var version = $('html').attr('class');
//
//    $('body').prepend('<p class="debug-info">' + version + '</p>');
//
//})(jQuery);

</script>
</body>
</html>
