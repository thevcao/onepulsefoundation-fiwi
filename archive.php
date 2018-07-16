<?php
/**
 * Template Name: News
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

        <div class="page-main">
            <section class="archive-body pb-11 pb-md-3 pt-sm-3">

                <div class="container">

                  <div class="row">
                    <div class="col-md-12 col-11 mx-auto mr-lg-0">
                    <h1>News and Updates</h1>

                    </div>

                  </div>
                    <div class="row">
                          <?php if(is_page(11915)):?>


                        <div class="col-md-8 order-lg-1 order-md-2 order-sm-2 order-2">





                          <?php // Display blog posts on any page @ http://m0n.co/l
                            $temp = $wp_query; $wp_query= null;
                            $wp_query = new WP_Query(); $wp_query->query('showposts=10' . '&paged='.$paged);
                            while ($wp_query->have_posts()) : $wp_query->the_post(); ?>



                                <div class="item mt32 mb64">
                                    <h2 class=""><a class="no-hover" href="<?php the_permalink();?>"><?php echo get_the_title();?></a></h2>
                                    <h5 class=""><?php the_date();?></h5>
                                    <h6>Posted in: <a href="<?php
                                      $category = get_the_category();
                                      $firstCategory = $category[0]->cat_link;
                                      echo $firstCategory;?>"><?php
                                      $category = get_the_category();
                                      $firstCategory = $category[0]->cat_name;
                                      echo $firstCategory;?></a></h6>
                                    <p>
                                        <?php the_excerpt();?>
                                    </p>
                                    <div class="pt8"></div>
                                    <a href="<?php the_permalink();?>" class="btn left">Read More</a>
                                </div>
                                  <?php endwhile; ?>





                        </div>

                          <?php else:?>

                        <div class="col-md-8 order-lg-1 order-md-2 order-sm-2 order-2">




                            <h1><?php single_cat_title(); ?></h1>

                                 <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>


                                <div class="item mt32 mb64">
                                    <h2 class=""><a class="no-hover" href="<?php the_permalink();?>"><?php echo get_the_title();?></a></h2>
                                    <h5 class=""><?php the_date();?></h5>
                                    <p>
                                        <?php the_excerpt();?>
                                    </p>
                                    <div class="pt8"></div>
                                    <a href="<?php the_permalink();?>" class="btn left">Read More</a>
                                </div>
                                <?php endwhile; endif; ?>





                        </div>
                          <?php endif;?>

                        <div class="col-md-4 order-lg-2 order-md-1 order-sm-1 order-1">
                            <?php $taxonomy     = 'category';
                                                $orderby      = 'name';
                                                $show_count   = false;
                                                $pad_counts   = false;
                                                $hierarchical = true;
                                                $title        = '';

                                                $args = array(
                                                  'taxonomy'     => $taxonomy,
                                                  'orderby'      => $orderby,
                                                  'show_count'   => $show_count,
                                                  'pad_counts'   => $pad_counts,
                                                  'hierarchical' => $hierarchical,
                                                  'title_li'     => $title
                                                );
                                                ?>

                                                <ul class="media-cat">
                                                    <?php wp_list_categories( $args ); ?>
                                                </ul>

                        </div>


                    </div>
                </div>

          <div class="pagination">
                  <div class="container">

                      <div class="row">
                          <div class="col-sm-6">
                              <div class="nav-next alignright"><?php previous_posts_link( 'Newer posts <i class="fa fa-angle-left"></i>' ); ?></div>

                          </div>
                          <div class="col-sm-6">

                          <div class="nav-previous alignleft"><?php next_posts_link( 'Older posts <i class="fa fa-angle-right"></i>' ); ?></div>

                          </div>

                      </div>

                  </div>


              </div>



            </section>




            <?php get_template_part('templates/footer'); ?>
