<?php
/**
 * Template Name: Ideas Generator
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

        <div class="page-main">


          <section class="pb-11 pb-md-3 pt-sm-3">
            <div class="container">

                <div class="row">

                    <div class="col-lg-3 col-md-12 col-11 mx-auto">
                        <ul class="tab-links">

                        <?php if( have_rows('info') ):?>


                        <?php $i = 0; while ( have_rows('info') ) : the_row(); $i++;?>
                          <li>
                            <?php $linkType = get_sub_field('link_type');
                                  if($linkType == 'link'):?>
                              <a href="<?php $link = get_sub_field('link'); the_permalink($link->ID);?>"><?php the_sub_field('title');?></a>
                            <?php else:?>
                              <a href="#<?php $var = sanitize_title_for_query( get_sub_field('title') ); echo esc_attr( $var);?>"><?php the_sub_field('title');?></a>
                            <?php endif;?>
                          </li>

                        <?php endwhile; ?>
                        <?php endif; ?>
                          <?php if(get_field('enable_ig_submissions')):?>
                          <li class=""><a href="#submissions">Submissions</a></li>
                          <?php endif;?>
                          <?php if ( is_user_logged_in())  { ?>
                          <!--<li class=""><a href="<?php the_permalink(10615);?>">Create New Submission</a></li>-->
                          <!--<li class=""><a href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a></li>-->

                          <?php } else {?>
                          <!--<li class=""><a href="<?php the_permalink(10615);?>" >Login/Create an Account</a></li>-->

                          <?php }?>



                        </ul>
                    </div>

                    <div class="col-lg-8 col-md-12 col-11 mx-md-down ml-auto tabs">

                        <h2>Ideas Generator for Pulse Memorial & Museum</h2>





                        <?php if( have_rows('info') ):?>
                        <?php while ( have_rows('info') ) : the_row();?>

                        <div class="tab" id="<?php $var = sanitize_title_for_query( get_sub_field('title') ); echo esc_attr( $var);?>">

                            <?php the_sub_field('content');?>


                        </div>

                        <?php endwhile; ?>
                        <?php endif; ?>
                          <?php if(get_field('enable_ig_submissions')):?>
                            <div class="tab" id="submissions">

                            <?php echo do_shortcode('[stickylist id="5"]');?>
                            </div>
                          <?php endif;?>


                    </div>

                    <div class="col-lg-3 col-md-12 col-11 mx-auto visible-sm visible-xs">
                        <ul class="tab-links">

                        <?php if( have_rows('info') ):?>


                        <?php $i = 0; while ( have_rows('info') ) : the_row(); $i++;?>
                          <li>
                            <?php $linkType = get_sub_field('link_type');
                                  if($linkType == 'link'):?>
                              <a href="<?php $link = get_sub_field('link'); the_permalink($link->ID);?>"><?php the_sub_field('title');?></a>
                            <?php else:?>
                              <a href="#<?php $var = sanitize_title_for_query( get_sub_field('title') ); echo esc_attr( $var);?>"><?php the_sub_field('title');?></a>
                            <?php endif;?>
                          </li>

                        <?php endwhile; ?>
                        <?php endif; ?>
                          <?php if(get_field('enable_ig_submissions')):?>
                          <li class=""><a href="#submissions">Submissions</a></li>
                          <?php endif;?>
                          <?php if ( is_user_logged_in())  { ?>
                          <!--<li class=""><a href="<?php the_permalink(10615);?>">Create New Submission</a></li>-->
                          <!--<li class=""><a href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a></li>-->

                          <?php } else {?>
                          <!--<li class=""><a href="<?php the_permalink(10615);?>" >Login/Create an Account</a></li>-->

                          <?php }?>



                        </ul>
                    </div>

                </div>
            </div>

        </section>
        </div>





        <?php get_template_part('templates/footer'); ?>
