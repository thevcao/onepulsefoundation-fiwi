<?php
/**
 * Template Name: RFP Submission
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


      <section class="pt-11 pb-11 pt-lg-11 pb-lg-3 pt-md-10 pb-md-1 mt-lg-2 mb-lg-3 pt-sm-7">
          <div class="container">





              <?php if ( is_user_logged_in())  { ?>


              <?php echo do_shortcode('[gravityform id="4" title="false" description="false" ajax="true"]');?>


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

    </script>
