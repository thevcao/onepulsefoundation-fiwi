<?php
/**
 * Template Name: Survey
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
            <div class="col-md-7">

        <h1>The onePULSE Memorial survey is now closed</h1>

        <p>We have received some phenomenal feedback and would like to thank all who participated. Each entry received will help shape the future of the Memorial and how we honor and remember the victims and all those affected for generations to come. Survey results will be shared in December, after which, a request for proposal will be created and, in June of 2018, a public design competition will be announced.</p>

<p>Please reach out to info@onePULSEfoundation.org if you wish to provide feedback for the onePULSE Foundation Memorial and Museum. </p>


            </div>
        </div>



    </div>

</section>
</div>





        <?php get_template_part('templates/footer'); ?>

        <script>
    jQuery('li.hidden input').val('<?php $current_user = wp_get_current_user(); echo $current_user->user_email; ?>');

    </script>
