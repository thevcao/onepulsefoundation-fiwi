<?php
/**
 * Template Name: Events
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
                                'meta_key'         => 'event_date',
                                'orderby'    => 'meta_value',
                                'order'    => 'ASC',
                                'post_type' => 'events',
                            );



                            $loop = new WP_Query( $args );
                            while ( $loop->have_posts() ) : $loop->the_post(); $temp_date = get_post_meta( get_the_ID(), 'event_date', true );


                                if (strtotime($temp_date) > strtotime('now')):

                                    if ( $temp_date != $current_header  ):
                            ?>

                                                <?php

                                                if(get_field('event_location')):
                                                  $values = get_field('event_location');
                                                  $lat = $values['lat'];
                                                  $lng = $values['lng'];
                                                  $address = $values['address'];
                                                  $map_center_lat = $values['center_lat'];
                                                  $map_center_lng = $values['center_lng'];
                                                  $map_zoom = $values['zoom'];
                            endif;
                                                ?>

                                <div class="item mt32 mb64">
                                    <a class="no-hover" href="<?php the_permalink();?>"><h2 class="mb8"><?php echo get_the_title();?></h2></a>
                                    <h3 class="mt0 mb16"><i class="fa fa-calendar"></i> <?php the_field('event_date');?></h3>
                                    <?php if(get_field('event_location')):?>
                                    <h3 class="mt0 mb32"><a class="no-hover" href="https://maps.google.com?saddr=Current+Location&daddr=<?php echo $address;?>" target="_blank"><i class="fa fa-location-arrow"></i> <?php echo $address;?></a></h3>
                                    <?php endif;?>
                                    <p>
                                        <?php the_excerpt();?>
                                    </p>
                                    <div class="pt8"></div>
                                    <a href="<?php the_permalink();?>" class="btn left">Read More</a>
                                </div>
                                <?php endif; endif; endwhile; wp_reset_postdata();?>





                        </div>
                        <div class="col-md-3 col-md-offset-1">

                            <h3 class="mt64">Past Events</h3>

                        <?php $args = array(

                                'posts_per_page'    => -1,
                                'meta_key'         => 'event_date',
                                'orderby'    => 'meta_value',
                                'order'    => 'ASC',
                                'post_type' => 'events',
                            );



                            $loop = new WP_Query( $args );
                            while ( $loop->have_posts() ) : $loop->the_post();

                            $temp_date = get_post_meta( get_the_ID(), 'event_date', true );

                            if (strtotime($temp_date) < strtotime('now')):

                                if ( $temp_date > $current_header  ):
                            ?>

                                                <?php

                                                if(get_field('event_location')):
                                                  $values = get_field('event_location');
                                                  $lat = $values['lat'];
                                                  $lng = $values['lng'];
                                                  $address = $values['address'];
                                                  $map_center_lat = $values['center_lat'];
                                                  $map_center_lng = $values['center_lng'];
                                                  $map_zoom = $values['zoom'];
                            endif;
                                                ?>

                                <div class="item mt32 mb64">
                                    <a href="<?php the_permalink();?>"><h4 class="mb8"><?php echo get_the_title();?></h4></a>

                                    <div class="pt8"></div>
                                    <a href="<?php the_permalink();?>" class="btn left">Read More</a>
                                </div>
                                <?php endif; endif; endwhile; wp_reset_postdata();?>


                            <h3 class="mt64">Volunteer with the onePULSE Foundation</h3>

                            <p>We cannot achieve our mission without volunteers like you! To volunteer with the Foundation please fill out our volunteer form. Let’s show the world that #WeWillNotLetHateWin.</p>

                            <a href="/volunteer-information-form" class="btn">Volunteer Information Form</a>


                        </div>
                    </div>
                </div>





            </section>
            <?php get_template_part('templates/footer'); ?>
