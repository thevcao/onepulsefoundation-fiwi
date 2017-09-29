<?php
/**
 * Template Name: Programs
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

            <section class="archive-body pt120 pb120 pt-xs-64 pb-xs-0">

                <div class="container">
                    <div class="row">
                        <div class="col-md-8">

                            <h1><?php echo get_the_title();?></h1>

                        <?php $args = array(

                                'posts_per_page'    => -1,
//                                'meta_key'         => 'event_date',
                                'orderby'    => 'date',
                                'order'    => 'DESC',
                                'post_type' => 'programs',
                            );



                            $loop = new WP_Query( $args );
                            while ( $loop->have_posts() ) : $loop->the_post();

                            ?>

                                                <?php
                                                  $values = get_field('event_location');
                                                  $lat = $values['lat'];
                                                  $lng = $values['lng'];
                                                  $address = $values['address'];
                                                  $map_center_lat = $values['center_lat'];
                                                  $map_center_lng = $values['center_lng'];
                                                  $map_zoom = $values['zoom'];
                                                ?>

                                <div class="item mt32 mb64">
                                    <a href="<?php the_permalink();?>"><h2 class="mb8"><?php echo get_the_title();?></h2></a>

                                    <p>
                                        <?php the_excerpt();?>
                                    </p>
                                    <div class="pt8"></div>
                                    <a href="<?php the_permalink();?>" class="btn left">Read More</a>
                                </div>
                                <?php endif; endwhile; wp_reset_postdata();?>





                        </div>
                    </div>
                </div>





            </section>
            <?php get_template_part('templates/footer'); ?>
