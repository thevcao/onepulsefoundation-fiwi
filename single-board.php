<?php
/**
 * The Template for displaying all single posts
 *
 * @package Smores
 * @since Smores 2.0
 */
?>
    <?php get_template_part('templates/header'); ?>

        <div class="main-wrapper">

        <div class="page-main">

          <div class="member-body mb64 mb-xs-0">
            <section class="post-image">
                <div class="row">
                    <div class="col-lg-5 col-md-4" >
                            <?php

                        $images = get_field('default_gallery', 'options');
                        $random_result = array_rand($images ,1);
                        $banner = $images[$random_result];
                        echo '<img id="featured-image" src="'. $banner['sizes']['large'] .'" alt="';
                        echo get_the_title() . ' - ' . get_bloginfo();
                        echo '">';
                        echo '<label class="img-attrib">' .$banner['caption'] . '</label>';?>


                    </div>
                    <div class="<?php if(get_field('headshot')): echo 'col-lg-4 mr-auto offset-md-1 col-md-5 col-sm-11 col-11 mx-auto'; else: echo 'col-lg-4 mr-auto offset-lg-1 col-md-11 col-sm-11 col-11 mx-auto'; endif;?> mt64 mb120">
                        <h1><?php echo get_the_title();?><span class="<?php the_field('overlay_color');?>small"><br><?php the_field('title');?></span></h1>

                        <?php the_field('bio');?>

                    </div>
                </div>

            </section>

            <?php get_template_part( 'partials/section', 'task-force' );?>




        </div>
      </div>

        <?php get_template_part('templates/footer'); ?>
