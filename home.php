<?php
/**
 * Template Name: Home
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Smores
 * @since Smores 2.0
 */
?>

    <?php get_template_part('templates/header'); ?>





        <div class="main-wrapper">
            <div class="video-modal">
                        <?php
                            $source = get_field('main_video_source', 'options');
                            $ext_source = get_field('video_type', 'options');

                        ;?>
                    <?php if($source == 'File'): ?>
                        <video id="home-video" class="video-js vjs-sublime-skin" controls preload="none" width="100%" height="800" poster="<?php echo get_template_directory_uri(); ?>/dist/img/video-poster.jpg" data-setup='{"ga": {"eventsToTrack": ["play"]}}'>
                            <source src="<?php the_field('main_video','options');?>" type='video/mp4'>
                        </video>
                        <?php elseif($ext_source == 'youtube'): ?>
                            <video id='home-video' class='video-js vjs-sublime-skin' playsinline controls poster="<?php echo get_template_directory_uri(); ?>/dist/img/video-poster.jpg" preload='none' width='100%' height='800' data-setup='{ "ga": {"eventsToTrack": ["play"]}, "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "<?php the_field(' ext_main_video ','options ');?>" }]}'></video>

                            <?php elseif($ext_source == 'vimeo'): ?>
                                <video id='home-video' class='video-js vjs-sublime-skin' playsinline controls poster="<?php echo get_template_directory_uri(); ?>/dist/img/video-poster.jpg" preload='none' width='100%' height='800' data-setup='{ "ga": {"eventsToTrack": ["play"]}, "techOrder": ["vimeo"], "sources": [{ "type": "video/vimeo", "src": "<?php the_field(' ext_main_video ','options ');?>" }], "vimeo": { "ytControls": 2 }}'></video>

                                <?php endif;?>
                                    <a href="#" class="close"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/close.svg"></a>
            </div>

            <section class="home-hero pt240 pt-xs-64">
                <!--			<div class="over"></div>-->
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-center-ls-tab">
                            <h2>We will not let hate win.</h2>
                            <a href="#" class="home-play hidden-xs">
                                <div class="row mt32">
                                    <div class="col-sm-2 mm"><i class="flaticon-play-button"></i>
                                    </div>
                                    <div class="col-sm-8 mm p0"><span title="Together We Can">Together We Can<span title="Witness Our Story Where Love Wins">Witness Our Story Where Love Wins</span></span>
                                    </div>
                            </a>
                            <a href="#" class="home-play visible-xs"><i class="flaticon-play-button"></i></a>
                            </div>
                        </div>
                    </div>

            </section>


            <section class="featured-slider pt64 pb120 pt-sm-0 pt-xs-0 pb-xs-0">
                <div class="mobile-tooltip"></div>

                <div class="gallery">



                    <?php $images = get_field('default_gallery', 'options'); $counter = 0;
foreach( $images as $image ): ?>


                        <?php if(++$counter % 3 === 0) {?>
                            <div class="item">
                                <img class="img-parallax" src="<?php echo $image['sizes']['large']; ?>" data-stellar-ratio="1.5" alt="<?php if (!$image['alt'] == null): echo $image['alt']; else: echo get_the_title() . ' - ' . get_bloginfo(); endif; ?>">
                                <?php if (!$image['caption'] == null): echo '<label class="img-attrib" data-stellar-ratio="1.5">' . $image['caption'] . '</label>'; endif; ?>
                            </div>
                            <?php } elseif(++$counter % 2 === 0) {?>
                                <div class="item">
                                    <img class="img-parallax" src="<?php echo $image['sizes']['large']; ?>" data-stellar-ratio="1.25" data-stellar-offset-parent="true" data-stellar-vertical-offset="-200" alt="<?php if (!$image['alt'] == null): echo $image['alt']; else: echo get_the_title() . ' - ' . get_bloginfo(); endif; ?>">
                                    <?php if (!$image['caption'] == null): echo '<label class="img-attrib" data-stellar-ratio="1.25" data-stellar-offset-parent="true" data-stellar-vertical-offset="-200">' . $image['caption'] . '</label>'; endif; ?>
                                </div>
                                <?php }elseif(++$counter % 1 === 0) {?>
                                    <div class="item">

                                        <img class="img-parallax" src="<?php echo $image['sizes']['large']; ?>" data-stellar-ratio="1.75" alt="<?php if (!$image['alt'] == null): echo $image['alt']; else: echo get_the_title() . ' - ' . get_bloginfo(); endif; ?>">
                                        <?php if (!$image['caption'] == null): echo '<label class="img-attrib" data-stellar-ratio="1.75">' . $image['caption'] . '</label>'; endif; ?>
                                    </div>
                                    <?php }?>


                                        <?php endforeach; ?>



                </div>
            </section>


            <section class="home-about pt120 pb120 pt-sm-0 pt-xs-16 hidden-xs">
                <div class="container">


                    <div class="row">
                        <div class="col-md-5">
                            <h2>About onePULSE Foundation Memorial</h2>
                            <?php the_field('home_about', 'options');?>

                                <div class="mt32"></div>
                                <a href="<?php the_permalink(12);?>" class="btn left">Learn More</a>
                        </div>
                        <div class="col-md-6 col-md-offset-1 parallax-container">
                            <div class="line" data-stellar-ratio="1.9"></div>

                            <?php $images = get_field('home_about_images', 'options'); $counterAbout = 0;
                                            foreach( $images as $image ): ?>

                                <?php if($counterAbout == 0) {?>
                                    <div data-stellar-ratio="2">
                                        <img class="img-parallax" src="<?php echo $image['sizes']['large']; ?>">
                                        <?php if (!$image['caption'] == null): echo '<label class="img-attrib">' . $image['caption'] . '</label>'; endif; ?>
                                    </div>
                                    <?php } elseif($counterAbout == 1) {?>

                                        <div class="float-container">
                                            <div data-stellar-ratio="1.5" data-stellar-offset-parent="true" data-stellar-vertical-offset="600">
                                                <img class="img-parallax float-over" src="<?php echo $image['sizes']['medium']; ?>" alt="<?php if (!$image['alt'] == null): echo $image['alt']; else: echo get_the_title() . ' - ' . get_bloginfo(); endif; ?>">
                                                <?php if (!$image['caption'] == null): echo '<label class="img-attrib">' . $image['caption'] . '</label>'; endif; ?>
                                            </div>
                                            <?php } elseif($counterAbout == 2) {?>
                                                <div data-stellar-ratio="1.5" data-stellar-offset-parent="true" data-stellar-vertical-offset="600">
                                                    <img class="img-parallax float-over" src="<?php echo $image['sizes']['medium']; ?>" alt="<?php if (!$image['alt'] == null): echo $image['alt']; else: echo get_the_title() . ' - ' . get_bloginfo(); endif; ?>">
                                                    <?php if (!$image['caption'] == null): echo '<label class="img-attrib">' . $image['caption'] . '</label>'; endif; ?>
                                                </div>
                                        </div>
                                        <?php }?>

                                            <?php $counterAbout++;?>
                                                <?php endforeach; ?>






                        </div>
                    </div>
                </div>

            </section>


            <section class="mobile-links visible-xs">


                <div class="">
                    <?php wp_nav_menu( array( 'theme_location' => 'full-mobile' ) ); ?>

            </section>


            <?php get_template_part('templates/footer'); ?>
