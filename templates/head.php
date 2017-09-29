<?php
/**
 * The template for displaying the header
 *
 * @package Smores
 * @since Smores 2.0
 */
?>
<!doctype html>

<!--[if lt IE 7 ]> <html class="ie ie6 ie-lt10 ie-lt9 ie-lt8 ie-lt7 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 ie-lt10 ie-lt9 ie-lt8 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 ie-lt10 ie-lt9 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 ie-lt10 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes(); ?> id="returnTop"><!--<![endif]-->
<!-- the "no-js" class is for Modernizr. -->

<head>

  <meta charset="<?php bloginfo( 'charset' ); ?>">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="description" content="<?php bloginfo('description') ?>" />

  <meta name="google-site-verification" content="" />
  <meta name="Copyright" content="<?php echo date('Y'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-touch-fullscreen" content="yes" />
<?php if(is_page('home')): echo '<link rel="prefetch" href="' . get_field('main_video','options') .'">'; endif;?>

    <?php // check if the flexible content field has rows of data
if( have_rows('section') ):

    while ( have_rows('section') ) : the_row();

        if( get_row_layout() == 'content_media' ):

            $source = get_sub_field('video_source');

        if($source == 'File'):
            echo '<link rel="prefetch" href="' . get_sub_field('video') .'">';

        endif;

        endif;

    endwhile;

endif;

?>

  <script src="https://use.fontawesome.com/c6224e36ed.js"></script>
   <?php get_template_part('partials/meta', 'favicons'); ?>


    <?php

        /*
         * Wordpress Head
         */

        wp_head();

    ?>


<script src="<?php echo get_template_directory_uri(); ?>/dist/js/vendor/videojs.js"></script>
<?php  $featbanner = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); $featurl = $featbanner['0']; ?>
<?php if( has_post_thumbnail()): echo '<style>.page-id-' . get_the_ID() . ' .loader, .page-id-' . get_the_ID() . ' .donate-hero h2 { background-image:url('. $featurl .');}</style>'; echo '<meta property="og:image" content="'. $featurl .'" />'; endif;?>
<?php if (get_field('banner')): $banner = get_field('banner');

    echo '<meta property="og:image" content="'. $banner['sizes']['large'] .'" />';

    endif;

    if(get_field('video_poster')): $banner = get_field('video_poster');

    echo '<meta property="og:image" content="'. $banner['sizes']['large'] .'" />';

    endif;  wp_reset_postdata();?>



    <?php // check if the flexible content field has rows of data
if( have_rows('section') ):

     // loop through the rows of data
    while ( have_rows('section') ) : the_row();

        if( get_row_layout() == 'large_hero' ):
            $image = get_sub_field('hero_image');
            echo '<style>.loader, .page-main .home-hero h2, .page-main .home-hero h2.clone-shadow, .page-main .home-hero {background-image:url('. $image['sizes']['banner'] .')</style>';
            echo '<meta property="og:image" content="'. $image['sizes']['large'] .'" />';

        endif;


    endwhile;

endif; wp_reset_postdata();?>




<?php if (get_field('home_hero', 'options')):

    $homeHero = get_field('home_hero', 'options');
    $mobileCTA = get_field('mobile_contact_image', 'options');
    $donateImage = get_field('donate_hero', 'options');

    echo '<style> html:not(.ipad) .mobile-cta, .mobile-cta.clipped:before {background-image:url('. $mobileCTA['sizes']['large'] .');} .donate-hero h2, .page-template-donate .loader {background-image:url('. $donateImage['sizes']['banner'] .');}
    </style>' ;
    if(is_page('home')):
    //echo '<meta property="og:image" content="'. $homeHero['sizes']['large'] .'" />';
    endif;
    if(is_page('donate')):
    echo '<meta property="og:image" content="'. $donateImage['sizes']['large'] .'" />';
    endif;

    endif; wp_reset_postdata();?>

<?php

    $images = get_field('home_heros', 'options');
    $random_result = array_rand($images ,1);
    $homeHero = $images[$random_result];

    echo '<style> .home .loader, .home .home-hero h2, .home .home-hero .home-play i:before, .home .home-hero .home-play span, .home .home-hero .home-play span span { background-image:url('. $homeHero['sizes']['banner'] .');}</style>';
    echo '<meta property="og:image" content="'. $homeHero['sizes']['large'] .'" />';

     wp_reset_postdata();?>



    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
    n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
    document,'script','https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '334045860378572'); // Insert your pixel ID here.
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=334045860378572&ev=PageView&noscript=1"
    /></noscript>
    <!-- DO NOT MODIFY -->
    <!-- End Facebook Pixel Code -->

</head>

<body <?php if(get_field('invert_header')): body_class('invert-header'); else: body_class(); endif; ?>>
    <div class="land-notice"></div>
    <div class="reveal"></div>
        <div class="loader">
            <div class="spinner"></div>
<?php if(is_page(7)): echo '<div class="quote"><div class="quote-container"><p>Darkness cannot drive out darkness: only light can do that.<br>Hate cannot drive out hate: only love can do that.</p><p class="sig">- Dr. Martin Luther King, Jr</p></div></div>'; endif;?>
            <?php if (!$homeHero['caption'] == null && is_page('home')): echo '<label class="img-attrib">' . $homeHero['caption'] . '</label>'; endif; ?>

                <?php // check if the flexible content field has rows of data
            if( have_rows('section') ):

                 // loop through the rows of data
                while ( have_rows('section') ) : the_row();

                    if( get_row_layout() == 'large_hero' ):
                        $image = get_sub_field('hero_image');
                        echo '<label class="img-attrib">' . $image['caption'] . '</label>';

                    endif;


                endwhile;

            endif;

            ?>


        </div>


<!--[if lt IE 8]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->


