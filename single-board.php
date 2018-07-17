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
                    <div class="<?php if(get_field('headshot')): echo 'col-lg-4 ml-auto col-md-5'; else: echo 'col-md-4 ml-auto'; endif;?> mt64 mb120">
                        <h1><?php echo get_the_title();?><span class="<?php the_field('overlay_color');?>small"><br><?php the_field('title');?></span></h1>

                        <?php the_field('bio');?>

                    </div>
                </div>

            </section>

            <?php get_template_part( 'partials/section', 'task-force' );?>




        </div>

        <?php get_template_part('templates/footer'); ?>
