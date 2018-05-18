<?php
/**
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

<section class="archive-body pt-sm-5 pb120 pt-xs-64 pb-xs-0">

  <div class="container">
    <div class="row">
      <div class="col-md-8">

        <h1>Latest News</h1>

        <?php // Display blog posts on any page @ http://m0n.co/l
  $temp = $wp_query; $wp_query= null;
  $wp_query = new WP_Query(); $wp_query->query('showposts=10' . '&paged='.$paged);
  while ($wp_query->have_posts()) : $wp_query->the_post(); ?>


        <div class="item mt32 mb64">
      <a href="<?php the_permalink();?>"><h2 class="mb8"><?php echo get_the_title();?></h2></a>
      <h3 class="mt0 mb32"><?php the_date();?></h3>
      <p><?php the_excerpt();?></p>
      <div class="pt8"></div>
      <a href="<?php the_permalink();?>" class="btn left">Read More</a>
      </div>
            <?php endwhile; wp_reset_postdata();?>





      </div>
    </div>
  </div>





</section>
<?php get_template_part('templates/footer'); ?>
