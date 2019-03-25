<?php
/**
 * Template Name: Thanks
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
                <div class="donate-hero">
                    <h2>Thank You</h2>
                </div>
            </div>
        </div>
         <div class="row">

            <div class="col-md-8">
                 <div class="mt32">


                   <?php the_content();?>
                </div>

            </div>
        </div>



    </div>

</section>
</div>





        <?php get_template_part('templates/footer'); ?>

        <script>
//    jQuery('li.hidden input').val('<?php $current_user = wp_get_current_user(); echo $current_user->user_email; ?>');

    </script>
