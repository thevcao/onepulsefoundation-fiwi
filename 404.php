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

        <h1>Lost?</h1>

        <p><a href="<?php echo get_site_url(); ?>/">Back to homepage</a></p>







      </div>
    </div>
  </div>





</section>
<?php get_template_part('templates/footer'); ?>
