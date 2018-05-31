<?php
/**
 * Template Name: Ideas Generator
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

                <?php if ( is_user_logged_in())  { ?>


                <div class="row">

                    <div class="col-lg-3 col-md-12 col-11 mx-auto">
                        <ul class="tab-links">
                          <li class=""><a class="active" href="#submissions">Introduction</a></li>

                        <?php if( have_rows('info') ):?>


                        <?php $i = 0; while ( have_rows('info') ) : the_row(); $i++;?>
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
                          <li class=""><a href="#submit">Create New Submission</a></li>


                        </ul>
                    </div>

                    <div class="col-lg-8 col-md-12 col-11 mx-md-down ml-auto tabs">

                        <div class="tab" id="submissions">
                        <h2>Ideas Generator for Pulse Memorial & Museum</h2>
                        <div class="mt-1 mb-2">
                        <p>The onePULSE Foundation is proud to announce the first phase of the process for designing and building a memorial, museum and associated open space, which will honor the memory of those lost and affected by the tragic events of June 12, 2016 at the Pulse Nightclub in Orlando, as well as to inspire and bring hope to all of those who visit this place of remembrance and education.</p>

                        <p>We are reaching out to all of you seeking to connect with the onePULSE Foundation with your concepts and ideas for the memorial and museum. At this time, we are not looking for finished designs, but rather big, broad ideas that will enhance the work of the onePULSE Foundation, and those who will be working with us, so that we may approach the work ahead with the best set of options and ideas possible.
                        </p>

                          <p>We do not purport to have all the answers, nor are we able to connect directly with all of those interested parties who may wish to express their ideas, concepts and designs to us. We recognize that there are many approaches that could result in a brilliant and successful environment that will educate and inspire our community – and all of our visitors into the future. We ask for your help in tackling this very challenging task.</p>

                        </div>
                        <?php echo do_shortcode('[stickylist id="5"]');?>
                        </div>
                        <div class="tab" id="submit">


                    <p>In order to contribute, please prepare either visual materials or text that may be submitted electronically via <strong>PDF file containing no more than 4 pages</strong>.</p>
                    <ul>
                        <li><strong>Max file size: 10MB</strong></li>
                        <li><strong>Resolution: 300 dpi (dots per inch)</strong></li>
                        <li><strong>Recommended maximum document length: 4 pages</strong></li>
                        <li><strong>Accepted document formats: Please submit all print files in PDF X-1a format or higher with all fonts and images embedded.</strong></li>
                        <li><strong>Embedded images must be a minimum of 266 ppi (pixels per inch).</strong></li>
                    </ul>
                    <p>A powerful sketch or list of ideas may be more effective than a lengthier submission. Please include within the PDF file your name, city/state/country and contact email. Submissions will be accepted through <strong>January 1, 2099</strong>.</p>

                    <p>No fee will be required for submissions nor will any fee be paid.</p>

                        <?php echo do_shortcode('[gravityform id="5" title="false" description="false" ajax="true"]');?>
                        </div>
                        <?php if( have_rows('info') ):?>
                        <?php while ( have_rows('info') ) : the_row();?>

                        <div class="tab" id="<?php $var = sanitize_title_for_query( get_sub_field('title') ); echo esc_attr( $var);?>">

                            <?php the_sub_field('content');?>


                        </div>

                        <?php endwhile; ?>
                        <?php endif; ?>

                    </div>
                </div>

                <?php the_content();?>

                <?php } else {?>

                <div class="row align-items-end">

                  <div class="col-lg-8 col-md-12 col-11 mx-md-down">
                    <h1><span>Please Sign in or Create a User Account to </span>Participate in the Ideas Generator for the Permanent Pulse Memorial</h1>
                    <p>In order to contribute, please prepare either visual materials or text that may be submitted electronically via <strong>PDF file containing no more than 4 pages</strong>.</p>
                    <ul>
                        <li><strong>Max file size: 10MB</strong></li>
                        <li><strong>Resolution: 300 dpi (dots per inch)</strong></li>
                        <li><strong>Recommended maximum document length: 4 pages</strong></li>
                        <li><strong>Accepted document formats: Please submit all print files in PDF X-1a format or higher with all fonts and images embedded.</strong></li>
                        <li><strong>Embedded images must be a minimum of 266 ppi (pixels per inch).</strong></li>
                    </ul>
                    <p>A powerful sketch or list of ideas may be more effective than a lengthier submission. Please include within the PDF file your name, city/state/country and contact email. Submissions will be accepted through <strong>January 1, 2099</strong>.</p>

                    <p>It is also our intention to display a selection of these submissions, electronically, in print or via physical display, as part of our ongoing process to remain engaged in public dialogue as we develop the plans for the memorial and museum. By submitting materials to us, you are granting us permission to distribute this material as described above. Credit for your work will be attached to any display or publication of these materials.</p>

                    <p>No fee will be required for submissions nor will any fee be paid.</p>
                    <div class="survey-login">
                            <?php wp_login_form(); ?>
                    </div>

                    </div>
                  <div class="col-lg-4 col-md-12 col-11 mx-md-down">

                    <p class="user-login-label"><img class="lang-flag" src="<?php echo get_template_directory_uri(); ?>/dist/img/us.svg"> Please create a user account to complete the Ideas Generator for the Permanent Pulse Memorial. <a href="<?php echo wp_registration_url(); ?>">Create an Account</a></p>
                    <p class="user-login-label"><img class="lang-flag" src="<?php echo get_template_directory_uri(); ?>/dist/img/span.svg"> Por favor crea una cuenta de usuario para completar la encuesta. <a href="<?php echo wp_registration_url(); ?>">Crea Una Cuenta</a></p>

                  </div>
                </div>

                <?php }?>

            </div>

        </section>
        </div>





        <?php get_template_part('templates/footer'); ?>
