<?php
get_template_part('templates/head');
?>
<div class="visible-tab-pt visible-xs modal task-modal" id="task-modal">

    <div class="container">
        <?php $args = array(

                'posts_per_page' => -1,
                'order'   => 'ASC',
                'post_type' => 'task-member',
            );



            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post(); $category = get_the_category(); ?>

            <a href="<?php the_permalink();?>" class="task-link <?php the_field('overlay_color');?>"><span><?php the_field('title');?></span><?php echo get_the_title();?></a>

            <?php endwhile; wp_reset_postdata();?>

    </div>
</div>

    <header class="main-header">
        <div class="container-fluid">
        <div class="col-sm-1 col-xs-2 height hidden-xs hidden-sm">
            <a href="/" class="logo">
                <?php echo file_get_contents(get_stylesheet_directory() . '/dist/img/nav-logo.svg'); ?>
            </a>
            </div>
        <div class="col-sm-1 col-xs-4 height visible-sm visible-xs p0">
            <a href="/" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/logo-horizontal.svg">
            </a>
            </div>
        <div class="col-sm-11 col-xs-8 height tm text-right p-xs-0">
            <div class="menu-container">
                <div class="row">
                    <div class="col-sm-7 hidden-sm hidden-ls-pt hidden-xs">
                        <?php wp_nav_menu( array( 'theme_location' => 'main' ) ); ?>
                    </div>
                    <div class="col-sm-2 col-xs-9 p0 tab-pt">
                        <div class="lang-toggle">
                            <ul>
                            <li><?php echo do_shortcode('[glt language="English" label="English"]');?>
                                </li>
                            <li><?php echo do_shortcode('[glt language="Spanish" label="Español"]');?>
                                </li>
                            </ul>


                        </div>
                    </div>
                    <div class="col-sm-1 col-xs-2 tab-pt">
                        <a class="menu-toggle" href="#"><span></span><span></span><span></span></a>
                    </div>
                    <div class="col-sm-2 mt-up hidden-xs">
                    <a href="<?php the_permalink(77);?>" class="btn clipped"><div class="overlay"></div>Donate</a>
                    <a href="<?php the_permalink(77);?>" class="btn clipped over">Donate</a>
                    </div>
                </div>

            </div>

            </div>
        </div>

    </header>
<div class="contact-form modal visible-xs" id="contact-modal">
    <div class="container container-fluid">


        <div class="row">
        <div class="col-md-12">


                    <h2><span>Contact onePULSE Foundation</span>Contact Us</h2>
            </div>


        </div>
        <div class="row">
            <div class="col-md-8">

                    <?php echo do_shortcode('[contact-form-7 id="4" title="Contact Form"]');?>

            </div>
            <div class="col-md-4">

                <div class="line mt-xs-32 mb-xs-32"></div>

                <div class="contact-info">
                <h3>onePULSE Foundation</h3>
                <p class="mt0 mb16">1912 South Orange Avenue<br>Orlando, FL 32806</p>
                <p class="mt0 mb0"><span>office</span> <a href="tel":><?php the_field('contact_office','options');?></a></p>
                <p class="mt0 mb8"><a class="" href="mailto:info@onePULSEFoundation.org"><b>email</b> info@onePULSEfoundation.org</a></p>
                <p class="mt0 mb16"><a href="tel:407-775-2437"><span>office</span> 407-775-2437</a></p>
                <p class="mt0 mb0"><span>Media Inquiries Only:</span></p>
                <h4 class="mb8">Sara Brady</h4>

                <p class="mt0 mb0"><span>office</span> <a href="tel:407-702-6632">407-702-6632</a></p>
                <p class="mt0 mb8"><span>mobile</span> <a href="tel">407-408-4000</a></p>
                </div>





            </div>
        </div>
    </div>

</div>

<div class="full-menu">
    <div class="container">
        <div class="col-md-6 hidden-xs">
            <?php wp_nav_menu( array( 'theme_location' => 'full-one' ) ); ?>
        </div>
        <div class="col-md-6 visible-xs">
            <?php wp_nav_menu( array( 'theme_location' => 'full-mobile' ) ); ?>
        </div>
        <div class="col-md-6 hidden-xs">
            <h3>Latest News</h3>
            <?php $args = array(

                'posts_per_page' => 3,
                'order'   => 'DESC',
                'post_type' => 'post',
            );



            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post(); $category = get_the_category(); ?>
        <div class="item mt16 mb16">
            <h4 class="mb8"><a href="<?php the_permalink();?>"><?php echo get_the_title();?></a></h4>
            <h5 class="mt0"><?php the_date();?></h5>
            </div>
            <?php endwhile; wp_reset_postdata();?>

        </div>
    </div>
</div>

