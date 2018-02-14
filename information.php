<?php
/**
 * Template Name: Memorial Information
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


<section>
    <div class="container pb64">




        <div class="row">
            <div class="col-md-12">
                    <h1><?php echo get_the_title();?></h1>
            </div>
        </div>

        <div class="row">

            <div class="col-md-3">

                <?php if( have_rows('info') ):?>
                <ul class="tab-links">
                <?php while ( have_rows('info') ) : the_row();?>
                    <li><a href="#<?php $var = sanitize_title_for_query( get_sub_field('title') ); echo esc_attr( $var);?>"><?php the_sub_field('title');?></a></li>

                <?php endwhile; ?>
                </ul>
                <?php endif; ?>

            </div>

            <div class="col-md-8 col-md-offset-1 tabs">

                <?php if( have_rows('info') ):?>
                <?php while ( have_rows('info') ) : the_row();?>

                <div class="tab" id="<?php $var = sanitize_title_for_query( get_sub_field('title') ); echo esc_attr( $var);?>">

                    <?php the_sub_field('content');?>


                </div>

                <?php endwhile; ?>
                <?php endif; ?>


            </div>
        </div>
        </div>




</section>
</div>





        <?php get_template_part('templates/footer'); ?>

        <script>
    jQuery('li.hidden input').val('<?php $current_user = wp_get_current_user(); echo $current_user->user_email; ?>');

    </script>
