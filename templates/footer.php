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
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-6 col-11 mx-md-down">
                <h2 class="mt0">Stay Informed</h2>
                <p>Sign up to receive exclusive updates about the onePULSE Foundation.</p>
            </div>
            <div class="col-lg-5 col-md-6 col-11 mx-md-down">
                    <?php echo do_shortcode('[contact-form-7 id="5374" title="Newsletter"]');?>
            </div>
        </div>

    </div>
</section>
<section class="page-cta mb80 hidden-sm hidden-xs">
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
        <div class="row align-items-center">
            <div class="col-sm-5 ml-auto">




                <div class="content">

                    <p class="text-right">Find out the latest from the onePULSE Foundation, including important milestones and announcements, as we work to create a sanctuary of hope.</p>

                    <a href="/news-and-updates" class="btn right">See All </a>


                </div>


            </div>
        </div>
    </div>


</section>
<section class="page-cta mobile-cta visible-sm visible-xs">
    <div class="container">
        <div class="img-overlay"></div>

        <div class="row align-items-center">
            <div class="col-lg-7 col-md-6 col-11 mx-md-down">
                <div class="content">
                    <h2 class="text-white"><span>Contact onePULSE Foundation</span>Fight the War Against Hate</h2>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 col-11 mx-md-down">
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
    <div class="mb16 hidden-xs row">
        <div class="col-xl-10 col-lg-11 col-md-12 col-sm-10 col-11 mx-auto">
          <div class="row">
            <div class="col-lg-2 hidden-sm">
                <a href="/">
                    <?php echo file_get_contents(get_stylesheet_directory() . '/dist/img/nav-logo.svg'); ?>
                </a>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-11 mx-md-down text-md-left text-right hidden-xs"><?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?></div>

          </div>
      </div>

    </div>
    <div class="copy row">
    <div class="col-xl-10 col-lg-11 col-md-10 col-sm-10 col-11 mx-auto">
            <div class="row">

                <div class="col-md-4 ml-auto">

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
        <div class="col-xl-10 col-lg-11 col-md-10 col-sm-10 col-11 mx-auto">
            <a href="/onepulse-foundation-memorial/memorial-information/" class="hidden-xs">Visit the Pulse Interim Memorial <i class="fa fa-chevron-right"></i></a>
        </div>
        <!--<div class="col-sm-12 col-xs-6 visible-xs">
            <a href="/donate" class="visible-xs">Donate <i class="fa fa-chevron-right"></i></a>
        </div>-->


        <div class="col-sm-12 col-xs-6 visible-xs">
            <a href="/onepulse-foundation-memorial/memorial-information/" class="visible-xs">Visit the Pulse Interim Memorial <i class="fa fa-chevron-right"></i></a>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/dist/js/vendor/videojs.ga.min.js"></script>

<?php

$url = site_url();
$array = array('local', 'staging', 'localhost', 'dev');

if ((findenv($url, $array) === false)):?>
<script src="https://cdn.logrocket.io/LogRocket.min.js" crossorigin="anonymous"></script>
<script>window.LogRocket && window.LogRocket.init('xje6sm/fiwi');</script>
<script>
window['_fs_debug'] = false;
window['_fs_host'] = 'fullstory.com';
window['_fs_org'] = 'DDHQ0';
window['_fs_namespace'] = 'FS';
(function(m,n,e,t,l,o,g,y){
    if (e in m) {if(m.console && m.console.log) { m.console.log('FullStory namespace conflict. Please set window["_fs_namespace"].');} return;}
    g=m[e]=function(a,b){g.q?g.q.push([a,b]):g._api(a,b);};g.q=[];
    o=n.createElement(t);o.async=1;o.src='https://'+_fs_host+'/s/fs.js';
    y=n.getElementsByTagName(t)[0];y.parentNode.insertBefore(o,y);
    g.identify=function(i,v){g(l,{uid:i});if(v)g(l,v)};g.setUserVars=function(v){g(l,v)};g.event=function(v){g('event',{n:i,p:v})};
    g.shutdown=function(){g("rec",!1)};g.restart=function(){g("rec",!0)};
    g.consent=function(a){g("consent",!arguments.length||a)};
    g.identifyAccount=function(i,v){o='account';v=v||{};v.acctId=i;g(o,v)};
    g.clearUserCookie=function(){};
})(window,document,window['_fs_namespace'],'script','user');
</script>
<?php endif;?>
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
