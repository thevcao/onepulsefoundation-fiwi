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
  <meta name="author" content="Findsome &amp; Winmore" />
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

<?php  $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'banner' ); $url = $thumb['0']; ?>
<?php if( has_post_thumbnail()): echo '<style> .loader, .donate-hero h2 { background-image:url('. $url .');}</style>'; endif;?>
<?php //if (get_field('banner')): $banner = get_field('banner'); 
	
	//echo '<style> .reveal { background-image:url('. $banner['sizes']['banner'] .');}</style>' ;
	
	//endif;
	
	//if(get_field('video_poster')): $poster = get_field('video_poster'); 
	
	//echo '<style> .reveal { background-image:url('. $poster['sizes']['banner'] .');}</style>' ; 
	
	//endif; ?>	
	
	
	<?php // check if the flexible content field has rows of data
if( have_rows('section') ):

     // loop through the rows of data
    while ( have_rows('section') ) : the_row();

        if( get_row_layout() == 'large_hero' ):
			$image = get_sub_field('hero_image'); 
        	echo '<style>.loader, .page-main .home-hero h2, .page-main .home-hero h2.clone-shadow, .page-main .home-hero {background-image:url('. $image['sizes']['banner'] .')</style>';

		endif;


    endwhile;

endif;

?>
<?php if (get_field('home_hero', 'options')): 
	
	$homeHero = get_field('home_hero', 'options');  
	$mobileCTA = get_field('mobile_contact_image', 'options');
	$donateImage = get_field('donate_hero', 'options');
	
	echo '<style> .home .loader, .home .home-hero h2, .home .home-hero .home-play i:before, .home .home-hero .home-play span, .home .home-hero .home-play span span { background-image:url('. $homeHero['sizes']['banner'] .');} .mobile-cta, .mobile-cta.clipped:before {background-image:url('. $mobileCTA['sizes']['large'] .');} .donate-hero h2, .page-template-donate .loader {background-image:url('. $donateImage['sizes']['banner'] .');}
	</style>' ;
	
	endif;?>
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


