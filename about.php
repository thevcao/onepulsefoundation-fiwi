<?php
/**
 * Template Name: Foundation Memorial
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







<div class="about-main">

        <section class="home-hero pt120 pb120">
            <div class="img-overlay left"></div>
<!--			<div class="over"></div>-->
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <h2 class="clone-shadow">Our mission is to create a sanctuary of hope around this tragic day in American history which honors the 49 lives that were taken, the 68 injured victims, and the first responders and healthcare professionals who cared for the victims.</h2>
                        <h2>Our mission is to create a sanctuary of hope around this tragic day in American history which honors the 49 lives that were taken, the 68 injured victims, and the first responders and healthcare professionals who cared for the victims.</h2>


                    </div>
                </div>
            </div>

        </section>


<section class="home-about pt120 pb120">
    <div class="container">


        <div class="row">
            <div class="col-md-5">
                <h2><span>onePULSE Foundation Memorial</span>Our Mission </h2>

                <p>This fund will support the construction and maintenance of the memorial, community grants to care for the survivors and victims’ families, endowed scholarships for each of the 49 angels and ultimately a museum showcasing the historic artifacts and stories from the event.</p>

                <p>The onePULSE Foundation is the only official 501(c)(3) incorporated by the owners of Pulse Nightclub. onePULSE Foundation’s initial focused mission is to provide financial assistance to victims affected by the attack at Pulse Nightclub.</p>
                <div class="mt32"></div>
                <a href="#" class="btn left">Learn More</a>
            </div>
            <div class="col-md-6 col-md-offset-1 parallax-container">
                <label data-stellar-ratio="1.9"><span>onePULSE Foundation Founder</span>Barbara Poma Shares Her Message<div class="line"></div></label>

                <div data-stellar-ratio="2">
                    <video id="my-video" class="video-js vjs-sublime-skin" playsinline controls preload="none" width="100%" height="800" poster="<?php echo get_template_directory_uri(); ?>/dist/img/video-poster.jpg" data-setup="{}">
                        <source src="<?php echo get_template_directory_uri(); ?>/dist/video/pulse-video.mp4" type='video/mp4'>
                    </video>
                </div>

            </div>
        </div>
    </div>

</section>

<section class="task-force pt120 pb120 mb120">
    <div class="container">


        <div class="row">
        <div class="col-md-6">
        <h2><span>onePULSE Foundation Memorial</span>Task Force</h2>

            </div>


        </div>
        <div class="row">
            <div class="col-md-2">
                    <img class="img-parallax" src="<?php echo get_template_directory_uri(); ?>/dist/img/snap-1.jpg" data-stellar-ratio="1.5">
                    <img class="img-parallax" src="<?php echo get_template_directory_uri(); ?>/dist/img/snap-4.jpg" data-stellar-ratio="1.5">

                    <img class="img-parallax" src="<?php echo get_template_directory_uri(); ?>/dist/img/snap-2.jpg" data-stellar-ratio="1.5">

            </div>
            <div class="col-md-6">

                <div class="line"></div>


                <p>The Task Force is an appointed volunteer coalition of family members of victims, survivors, and local community leaders.  This committee will give recommendations and guidance to the Board of Trustees to create, build, and financially maintain a permanent national memorial at the Pulse site.  The Task Force serves as the advisory committee who will formulate the process of building what will become an iconic tribute to the 49 souls taken from us on that horrible night, as well as to the survivors, brave first responders, surgeons, and medical providers who served so selflessly.</p>

                <p>Still in formation, the Task Force will break into different subcommittees who will each play a role in the gathering of data that will reflect the wishes of the victims’ families, the survivors, and the community at large.</p>




            </div>
            <div class="col-md-4 text-right">
                <div data-stellar-ratio="2">

            <?php $args = array(

                'posts_per_page' => -1,
                'order'   => 'ASC',
                'post_type' => 'task-member',
            );



            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post(); $category = get_the_category(); ?>

                    <a href="<?php the_permalink();?>" class="task-link <?php the_field('overlay_color');?>"><span><?php the_field('title');?></span><?php echo get_the_title();?></a>

            <?php endwhile; wp_reset_postdata();?>

                </div>

            </div>
        </div>
    </div>

</section>



</div>

        <?php get_template_part('templates/footer'); ?>
