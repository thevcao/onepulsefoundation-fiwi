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

            <section class="archive-body pt120 pb120 pt-xs-64 pb-xs-0">

                <div class="container">
                    <div class="row">
                        <div class="col-md-8">

                            <h1><?php single_cat_title(); ?></h1>

                                 <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>


                                <div class="item mt32 mb64">
                                    <a href="<?php the_permalink();?>"><h2 class="mb8"><?php echo get_the_title();?></h2></a>
                                    <h3 class="mt0 mb32"><?php the_date();?></h3>
                                    <p>
                                        <?php the_excerpt();?>
                                    </p>
                                    <div class="pt8"></div>
                                    <a href="<?php the_permalink();?>" class="btn left">Read More</a>
                                </div>
                                <?php endwhile; endif; ?>





                        </div>
                        <div class="col-md-4">
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





            </section>

<section class="pagination">
        <div class="container">

            <div class="row">
                <div class="col-sm-6">
                    <div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>

                </div>
                <div class="col-sm-6">

                <div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>

                </div>

            </div>

        </div>


    </section>


            <?php get_template_part('templates/footer'); ?>
