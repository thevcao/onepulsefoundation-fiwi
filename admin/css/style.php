<?php

$admin_bar_logo = get_field('admin_bar_logo','options');
$admin_bar_width = get_field('admin_bar_width','options');
$login_logo = get_field('wp_login_logo','options');
$headline_family = get_field('headline_font_family','options');
$headline_weight = get_field('headline_font_weight','options');
$body_family = get_field('body_font_family','options');
$headline_weight = get_field('body_font_weight','options');

?>
    <style type="text/css" media="screen">
        @import url('https://fonts.googleapis.com/css?family=Roboto:300');
        <?php if( have_rows('font', 'options')): while ( have_rows('font', 'options')): the_row();
        ?> @import url('<?php the_sub_field('stylesheet','options');?>');
        <?php endwhile;
        endif;
        ?> <?php if(get_field('body_font_family',
        'options')) {
            ?> body,
            p,
            li {
                font-family: <?php echo $body_family;
                ?>;
                font-weight: <?php echo $body_weight;
                ?>;
            }
            <?php
        }

        else {
            ?> body,
            p,
            li, #wpadminbar * {
                font-family: "Helvetica Neue",sans-serif;
                font-weight: normal;
                letter-spacing: -.025em;
            }
            <?php
        }

        ?> .admin-color-midnight a,
        .admin-color-midnight .wrap .add-new-h2,
        .admin-color-midnight .wrap .add-new-h2:active,
        .admin-color-midnight .wrap .page-title-action,
        .admin-color-midnight .wrap .page-title-action:active {
            color: #eb3a24;
        }

        .admin-color-midnight .wrap .add-new-h2:hover,
        .admin-color-midnight .wrap .page-title-action:hover {
            border-color: #eb3a24;
            background: #eb3a24;
            color: #fff;
        }

        <?php if(get_field('headline_font_family',
        'options')) {
            ?> h1,
            h2,
            h3,
            h4,
            h5 {
                font-family: <?php echo $headline_family;
                ?>;
                font-weight: <?php echo $headline_weight;
                ?>;
            }
            <?php
        }

        else {
            ?> .admin-color-midnight h1,
            .admin-color-midnight h2,
            .admin-color-midnight h3,
            .admin-color-midnight h4,
            .admin-color-midnight h5 {
                 font-family: avenir, 'avenir next', helvetica, arial, sans-serif;
/*                font-weight: normal !important;*/
                /*    letter-spacing: -.005em;*/
/*                color: #eb3a24;*/
/*                text-transform: uppercase;*/
/*                font-size: 200% !important;*/
                /*                line-height: 1 !important;*/
            }
            .admin-color-midnight h1>*,
            .admin-color-midnight h2>*,
            .admin-color-midnight h3>*,
            .admin-color-midnight h4>*,
            .admin-color-midnight h5>* {
/*                font-weight: normal !important;*/
            }

        .admin-color-midnight .form-table th, .form-wrap label {


 font-family: avenir, 'avenir next', helvetica, arial, sans-serif;
/*			font-weight: normal;*/

        }
            .admin-color-midnight .wp-core-ui .button,
            .admin-color-midnight .wp-core-ui .button-primary,
            .admin-color-midnight .wp-core-ui .button-secondary {
 font-family: avenir, 'avenir next', helvetica, arial, sans-serif;
/*				font-weight: normal !important;*/
/*                text-transform: uppercase;*/
/*                text-shadow: none !important;*/
            }
            #wpadminbar *,
            #adminmenu .wp-submenu-head,
            #adminmenu a.menu-top,
            #adminmenu .wp-submenu a,
            #collapse-button .collapse-button-icon,
            #collapse-button .collapse-button-label {

            }
            #adminmenu .wp-submenu-head,
            #adminmenu a.menu-top {
                line-height: 1.35;
            }
            .admin-color-midnight .wp-core-ui p .button,
            .admin-color-midnight .wp-core-ui .button-primary {
                vertical-align: baseline;
                font-size: 150%;
                height: auto;
                padding: 2px 10px;
            }
            <?php
        }

        ?> <?php if(get_field('wp_login_logo',
        'options')) {
            ?> .login h1 a {
                background: url(<?php echo $login_logo;?>) no-repeat bottom center !important;
                margin-bottom: 10px;
                background-size: auto 100% !Important;
                width: 100%;
            }
            .login h1:after {
                content: '';
                display: block;
                width: 100%;
                height: 30px;
                background-image: url(<?php echo get_template_directory_uri();
                ?>/admin/img/FIWI-classic-website.svg);
                background-size: 100% auto;
                background-position: 50% 100%;
                background-repeat: no-repeat;
            }
            <?php
        }

        else {
            ?> .login h1 a {
                background: url(<?php echo get_template_directory_uri();
                ?>/admin/img/fiwi-login.svg) no-repeat bottom center !important;
                margin-bottom: 10px;
                background-size: auto 100% !Important;
                width: 100%;
            }
            .login h1:after {
                content: '';
                display: block;
                width: 100%;
                height: 30px;
                background-image: url(<?php echo get_template_directory_uri();
                ?>/admin/img/FIWI-classic-website.svg);
                background-size: 100% auto;
                background-position: 50% 100%;
                background-repeat: no-repeat;
            }
            <?php
        }

        ?> <?php if(get_field('admin_bar_logo',
        'options')) {
            ?> .wp-admin #wpadminbar #wp-admin-bar-site-name>.ab-item:before {
                color: rgba(0, 0, 0, 0) !important;
                background: url(<?php echo $admin_bar_logo;?>) !important;
                background-size: auto 80% !important;
                background-repeat: no-repeat !important;
                background-position: 50%!important;
                filter: invert(1);
            }
            <?php
        }

        ?>

        #wpadminbar, #adminmenu, #adminmenu .wp-submenu, #adminmenuback, #adminmenuwrap {

                background: linear-gradient(135deg, #00a8de 0%, #333391 50%, #e91388 100%);
    animation: donateanimate 3s alternate linear infinite;
    background-size: 500%;
            background-attachment: fixed;

        }
        @keyframes donateanimate {
    0% {
        //		background-size: 100%;
        background-position: 0% 50%;
    }
    100% {
        //		background-size: 800%;
        background-position: 100% 50%;
    }
}
@keyframes linkanimate {
    0% {
        //		background-size: 100%;
        background-position: 0% 0%;
    }
    100% {
        //		background-size: 800%;
        background-position: 100% 100%;
    }
}
.wp-core-ui .button, .wp-core-ui .button-secondary {
    padding: 5px 2rem;
    border: 3px solid #000;
    color: black;
    border-radius: 100px;
    display: block;
    text-align: center;
    max-width: 300px;
    font-weight: bold;
    transition: .3s ease;
    letter-spacing: -.025em;
    transition: color .3s ease, border-color .3s ease;
    position: relative;
    background: none;
    z-index: 1;
    height: auto;
    text-shadow: none;
    box-shadow: none;
}
    </style>
