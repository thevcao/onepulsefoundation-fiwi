<?php
/**
 *
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
	
	
	<?php // check if the flexible content field has rows of data
if( have_rows('section') ):

     // loop through the rows of data
    $count = 0; while ( have_rows('section') ) : the_row();

        if( get_row_layout() == 'large_hero' ):
			include( locate_template( 'partials/section-hero.php', false, false ) ); 
		endif;

        if( get_row_layout() == 'content_media' ):
			include( locate_template( 'partials/section-content-media.php', false, false ) ); 
	

		endif;

         if( get_row_layout() == 'featured_gallery' ):
			include( locate_template( 'partials/section-gallery.php', false, false ) ); 

	

		endif;

         if( get_row_layout() == 'task_force' ):
	
	
			include( locate_template( 'partials/section-task-force.php', false, false ) ); 
	

		endif;

         if( get_row_layout() == 'spacer' ):
			include( locate_template( 'partials/section-spacer.php', false, false ) ); 


		endif;

        if( get_row_layout() == 'contact_form' ):
			include( locate_template( 'partials/section-contact.php', false, false ) ); 


        endif;

        if( get_row_layout() == 'columns' ):
			include( locate_template( 'partials/section-columns.php', false, false ) ); 


        endif;

    $count++; endwhile;

endif;

?>


</div>

	
		<?php get_template_part('templates/footer'); ?>
