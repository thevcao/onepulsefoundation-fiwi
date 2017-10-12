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


            <?php if ( is_user_logged_in())  { ?>


        <h1><span>onePULSE Foundation</span>Memorial Survey</h1>

        <a href="#english" class="btn survey-toggle">Continue in English</a>
        <a href="#spanish" class="btn survey-toggle" >Continuar en Español</a>

        <div id="english">

        <?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]');?>
        </div>
        <div id="spanish">

        <?php echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true"]');?>
        </div>

        <?php the_content();?>

<?php } else {?>


        <div class="row">
            <div class="col-md-12">
                <div class="donate-hero">
                    <h2>Make Your Voice Heard</h2>
                </div>
            </div>
            <div class="col-md-7">

        <h1>Participate in the onePULSE Foundation Memorial Survey</h1>

        <p>The onePULSE Foundation Memorial Survey includes a variety of questions to garner opinions about desired elements and features that participants would like to see and experience at the future site. Information collected from the survey will be analyzed to identify consensus, trends, and an overall understanding of public desires for the Pulse memorial and museum.</p>
        <p>The tragedy that occurred at Pulse Nightclub impacted this community and it’s important that the community be involved in determining what the memorial ends up looking like,” said Barbara Poma, owner of Pulse Nightclub and Executive Director of the onePULSE Foundation.</p>
            </div>
            <div class="col-md-4 col-md-offset-1">

        <h3 class="mt64 mb32">Please Sign In or Create an Account to Participate in the Survey</h3>
        <div class="survey-login">
                <?php wp_login_form(); ?>
        </div>
        <p class="user-login-label"><img class="lang-flag" src="<?php echo get_template_directory_uri(); ?>/dist/img/us.svg"> Please create a user account to complete the survey. <a href="<?php echo wp_registration_url(); ?>">Create an Account</a></p>
        <p class="user-login-label"><img class="lang-flag" src="<?php echo get_template_directory_uri(); ?>/dist/img/span.svg"> Por favor crea una cuenta de usuario para completar la encuesta. <a href="<?php echo wp_registration_url(); ?>">Crea Una Cuenta</a></p>



            </div>
        </div>


<?php }?>

    </div>

</section>
</div>





        <?php get_template_part('templates/footer'); ?>

        <script>
    jQuery('li.hidden input').val('<?php $current_user = wp_get_current_user(); echo $current_user->user_email; ?>');

    </script>
