<?php
/**
 * Template Name: Submissions
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

                        <p><a class="" href="<?php the_permalink(10549);?>"><i class="fa fa-angle-left"></i> Back to the Ideas Generator</a></p>



                    </div>

                    <div class="col-lg-9 col-md-12 col-11 mx-md-down ml-auto tabs">

                  <?php if ( !is_user_logged_in())  { ?>
                  <h2><span>Please Sign in or Create a User Account to </span>Participate in the Ideas Generator for the Permanent Pulse Memorial</h2>

                    <div class="survey-login">
                    <div class="reg-form">
                    <p class="user-login-label"><img class="lang-flag" src="<?php echo get_template_directory_uri(); ?>/dist/img/us.svg"> Already a user? <a href="#">Sign In <i class="fa fa-angle-right"></i></a></p>

                      <?php custom_registration_function(); ?>


                    <!--<p class="user-login-label"><img class="lang-flag" src="<?php echo get_template_directory_uri(); ?>/dist/img/span.svg"> Por favor crea una cuenta de usuario para completar la encuesta. <a href="#">Crea Una Cuenta</a></p>-->

                    </div>

                    <div class="login-form">
                    <p class="user-login-label"><a href="#" class="back"><i class="fa fa-angle-left"></i> Back</a></p>

                    <?php wp_login_form(); ?>


                    </div>


                    </div>

                    <?php } else {?>

                      <h2>Ideas Generator for the Permanent Pulse Memorial</h2>

                      <div class="hidden_values">

                      <?php $current_user = wp_get_current_user();?>
                      <input class="hidden" id="hidden_name" value="<?php echo $current_user->user_firstname . ' ' . $current_user->user_lastname?>">
                      <input class="hidden" id="hidden_address"
                             value="<?php echo get_field('address', $current_user) . ', ' . get_field('city', $current_user) . ', ' . get_field('state', $current_user) . ' ' . get_field('zip', $current_user)?>">
                      <input class="hidden" id="hidden_country"
                             value="<?php echo get_field('country', $current_user);?>">

                      </div>

                        <?php echo do_shortcode('[gravityform id="5" title="false" description="false" ajax="true"]');?>
                    <?php }?>

                </div>
            </div>

        </section>
        </div>





        <?php get_template_part('templates/footer'); ?>
