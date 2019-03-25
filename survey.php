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
        </div>
         <div class="row">

            <div class="col-md-8">
                 <div class="mt32">

                    <h2>In September 2017,  the onePULSE Foundation Memorial Survey was released online so that our community and the world could have the opportunity to provide input about the future of the Pulse Nightclub site.</h2>

                    <p>Everything we do at onePULSE starts with the victim’s families', survivors and first responders. They had the chance to take the survey and view the results before the general public and their answers will also be weighted heavier than those of the general public.</p>

                    <p>This survey was developed by the Memorial Task Force under the guidance of David Stone, AIA, NCARB, of Phil Kean Designs and modeled after other historic tragedies.</p>

                    <p>The results of each question are given in 5 parts: total response, family members, survivors, first responders and general public. In addition, the written responses to these two questions on the survey: “What is your favorite memorial/museum and why?” along with “General Comments”, are provided for you to read. We invite you to take the time to read them. They are powerful and extraordinary.</p>

                    <p>For those of you who participated in the survey, thank you for being committed to your community, caring for all those affected and understanding the importance of the future Pulse Memorial and Museum.</p>

                    <p>We look forward to taking this journey with you.</p>
                </div>

            </div>
             <div class="col-md-4">
                 <div class="mt64 text-right">
                     <h3>Download Survey Results</h3>
                     <a href="<?php echo get_site_url(); ?>/wp-content/uploads/2018/03/Memorial-Survey-Results-Powerpoint-FINAL-.pdf" class="btn right" target="_blank" download>Download Survey Results</a>
                     <a href="<?php echo get_site_url(); ?>/wp-content/uploads/2018/03/Survey-Comments-FINAL.pdf" class="btn right" target="_blank" download>Download Survey Written Responses</a>
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
