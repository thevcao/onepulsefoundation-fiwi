<?php
/**
 * Template Name: FAQ
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Fourteen
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Smores
 * @since Smores 2.0
 */
?>

    <?php get_template_part('templates/header'); ?>
        <div class="main-wrapper">

            <section class="archive-body pb-3 pb-lg-3 pb-md-3 pt-sm-3">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-11 mx-md-down">

                            <h1>FAQs</h1>
                        </div>
                    </div>
                </div>

                <div aria-label="faq-nav">

                        <?php $args = array(

                            'posts_per_page' => -1,
                            'orderby' => 'date' ,
                            'order'   => 'DESC',
                            'post_type' => 'faq');

                        $loop = new WP_Query( $args );
                        $i = 1; while ( $loop->have_posts() ) : $loop->the_post(); ?>


                    <div class="row faq-item" tabindex="<?php echo $i++;?>">

                            <?php

                        $images = get_field('default_gallery', 'options');
                        $random_result = array_rand($images ,1);
                        $banner = $images[$random_result];
                        echo '<div class="bg-element"><img class="bg-img" src="'. $banner['sizes']['large'] .'" alt="';
                        echo get_the_title() . ' - ' . get_bloginfo();
                        echo '">';
                        echo '<label class="img-attrib">' .$banner['caption'] . '</label></div>';?>

                        <div class="container">
                            <div class="col-lg-12 col-md-12 col-11 mx-auto">



                                <div class="">
                                    <a href="#" class="question"><?php echo get_the_title();?></a>

                                    <div class="answer" id="">
                                    <?php the_content();?>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>


                                <?php endwhile; wp_reset_postdata();?>

                </div>







            </section>
            <?php get_template_part('templates/footer'); ?>
