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
<div class="main-wrapper page-main">

<section class="pb-11 search-page">

  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-11 mx-md-down">

                    <?php
                    $s=get_search_query();
                    $args = array(
                                    's' =>$s
                                );
                        // The Query
                    $the_query = new WP_Query( $args );?>

                <form action="/" method="get">
                  <div class="row">
                    <div class="col-md-9">
                    <input type="text" name="s" id="search" placeholder="" value="<?php the_search_query(); ?>" />
                    </div>
                    <div class="col-md-3">
                    <input type="submit" value="Search" class="btn">
                    </div>
                  </div>


                </form>

                    <?php if ( $the_query->have_posts() ) {
                            _e("<h2 class='roygbiv'>Search Results for: ".get_query_var('s')."</h2><ol>");
                            $i = 1; while ( $the_query->have_posts() ) {
                               $the_query->the_post();
                                     ?>
                                        <li>
                                            <a class="no-hover" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                                            <a class="link no-hover" href="<?php the_permalink(); ?>" title="<?php the_permalink(); ?>"><?php the_permalink(); ?></a>
                                            <?php the_excerpt();?>
                                        </li>
                                     <?php
                            }
                        echo '</ol>';
                        } else {
                    ?>
                    </ul>
                            <h2 class='roygbiv'>Nothing Found</h2>
                            <div class="alert alert-info">
                              <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
                            </div>
                    <?php } ?>





      </div>
    </div>
  </div>





</section>
<?php get_template_part('templates/footer'); ?>
