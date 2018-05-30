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


  <section class="pt-11 pb-11 pt-lg-11 pb-lg-3 pt-md-10 pb-md-1 mt-lg-2 mb-lg-3 pt-sm-7">
    <div class="container pb64">




        <div class="row">
            <div class="col-md-12 col-11 mx-auto">
                    <h1><?php echo get_the_title();?></h1>
            </div>
        </div>

      <?php if(is_page(6744)):?>

        <div class="container-fluid">

        <div class="row">

            <div class="col-md-6">
            <div class="contact-info">
            <h5 class="mt8 mb8">Address and Information</h5>

                <p class="mt0 mb8"><a href="https://www.google.com/maps/dir/''/pulse+nightclub/@28.5195729,-81.4467147,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x88e77b0c438a83bf:0x72a789a251c26b61!2m2!1d-81.3766744!2d28.5195909" target="_blank"><b><i class="fa fa-location-arrow"></i></b> 1912 S Orange Ave, Orlando, FL 32806</a></p>

            <!--<p class="mt0 mb0"><span>office</span> <a href="tel":><?php the_field('contact_office','options');?></a></p>-->
                <p class="mt0 mb64 mb-sm-1"><a class="" href="mailto:info@onePULSEFoundation.org"><b><i class="fa fa-envelope"></i></b> info@onePULSEfoundation.org</a></p>

            </div>

            </div>
            <div class="col-md-6">
            <div class="contact-info">

            <h5 class="mt8 mb8">Hours of Operations</h5>
                <p class="mt0 mb8"><b><i class="fa fa-clock-o"></i></b> Daily from 7:30 AM to 9:00 PM</p>
                <p class="mt0 mb32 mb-sm-2"><b><i class="fa fa-calendar"></i></b> Extended Hours during the Remembrance Week and the holidays</p>

            </div>

            </div>
            </div>


        </div>

      <?php endif;?>

        <div class="row">

            <div class="col-lg-3 col-md-12 col-11 mx-auto">

                <?php if( have_rows('info') ):?>
                <ul class="tab-links">
                <?php $i = 0; while ( have_rows('info') ) : the_row(); $i++;?>
                    <li><a <?php if($i == 1): echo 'class="active"'; endif;?> href="#<?php $var = sanitize_title_for_query( get_sub_field('title') ); echo esc_attr( $var);?>"><?php the_sub_field('title');?></a></li>

                <?php endwhile; ?>
                </ul>
                <?php endif; ?>

            </div>

            <div class="col-lg-8 col-md-12 ml-auto col-11 mx-auto tabs">

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
//    jQuery('li.hidden input').val('<?php $current_user = wp_get_current_user(); echo $current_user->user_email; ?>');

    </script>
