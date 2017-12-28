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

        <p>The onePULSE Foundation Memorial Survey was available online to the public from September 13 to October 31, 2017. This survey contained thoughtful questions pertaining to the look and feel to be conveyed at the future memorial site.  The survey also sought to gain insight from the community as to who to honor and what issues to address. The results of this survey will be presented in December. Following data analysis of the survey, the RFP will be created and ultimately the public design competition will be announced in June 2018.</p>

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
