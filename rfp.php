<?php
/**
 * Template Name: RFP Portal
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


<section class="pt-11 pb-11 pt-lg-11 pb-lg-3 pt-md-10 pb-md-1 mt-3 mb-lg-3 pt-sm-7">
    <div class="container">





        <?php if ( is_user_logged_in())  { ?>


        <div class="row">

            <div class="col-md-3">
                <ul class="tab-links">
                  <li class=""><a class="active" href="#submissions">My Submissions</a></li>
                  <li class=""><a href="rfp-submissions">Create New Submission</a></li>

                <?php if( have_rows('rfp_info') ):?>


                <?php $i = 0; while ( have_rows('rfp_info') ) : the_row(); $i++;?>
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


                </ul>
            </div>

            <div class="col-md-8 ml-auto tabs">

                <div class="tab" id="submissions">
                <h2>My Submissions</h2>

                <?php echo do_shortcode('[stickylist id="4" showto="creator"]');?>

                </div>
                <?php if( have_rows('rfp_info') ):?>
                <?php while ( have_rows('rfp_info') ) : the_row();?>

                <div class="tab" id="<?php $var = sanitize_title_for_query( get_sub_field('title') ); echo esc_attr( $var);?>">

                    <?php the_sub_field('content');?>


                </div>

                <?php endwhile; ?>
                <?php endif; ?>

            </div>
        </div>

        <?php the_content();?>

        <?php } else {?>


        <h1>Please Sign in or Create a User Account to Participate in the Survey</h1>

        <div class="survey-login">
                <?php wp_login_form(); ?>
        </div>
        <p class="user-login-label"><img class="lang-flag" src="<?php echo get_template_directory_uri(); ?>/dist/img/us.svg"> Please create a user account to complete the survey. <a href="<?php echo wp_registration_url(); ?>">Create an Account</a></p>
        <p class="user-login-label"><img class="lang-flag" src="<?php echo get_template_directory_uri(); ?>/dist/img/span.svg"> Por favor crea una cuenta de usuario para completar la encuesta. <a href="<?php echo wp_registration_url(); ?>">Crea Una Cuenta</a></p>


        <?php }?>

    </div>

</section>
</div>





        <?php get_template_part('templates/footer'); ?>

        <script>
//    jQuery('li.hidden input').val('<?php $current_user = wp_get_current_user(); echo $current_user->user_email; ?>');
        jQuery(document).ready(function($) {
            cell = $('.stickylist-fileupload a');
            cell.each(function(index) {
                image = $(this).attr('href');
                extension = image.split('.').pop();
                if(extension == 'pdf') {

                $(this).html('<i class="fa fa-file-pdf"></i>');


                } else {

                $(this).html('<img width="50" src="' + image + '">');

                }
            });
        });
    </script>
