<?php
/**
 * The Template for displaying all single posts
 *
 * @package Smores
 * @since Smores 2.0
 */
?>
    <?php get_template_part('templates/header'); ?>

        <div class="main-wrapper">

        <div class="page-main">
          <div class="member-body mb64 mb-xs-0">
            <section class="post-image">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-11 mx-md-down <?php the_field('overlay_color');?>" >
                        <?php $banner = get_field('banner');
                        $bannerlarge = $banner['sizes']['large'];
//                        $bannerlarge = str_replace('https://fiwi-onepulsefoundation.s3.amazonaws.com', 'https://onepulsefoundation.org', $bannerlarge);

                        echo '<img id="featured-image" src="'. $bannerlarge .'" alt="';

                            if (!$banner['alt'] == null):
                            echo $banner['alt']; else:
                            echo get_the_title() . ' - ' . get_bloginfo();
                            endif;
                            echo '">';
                            ?>
                        <?php echo '<label aria-hidden="true" class="img-attrib">' . $banner['caption'] . '</label>';?>
                            <?php
                        if(get_field('headshot')): $headshot = get_field('headshot');
                        echo '<img class="over-image headshot" src="'. $headshot['sizes']['large'] .'" alt="';
                        if (!$headshot['alt'] == null):
                        echo $headshot['alt'];
                        else:
                        echo get_the_title() . ' - ' . get_bloginfo();
                        endif;
                        echo '">';
                        endif;?>
                    </div>
                    <div class="<?php if(get_field('headshot')): echo 'col-lg-4 offset-md-2 col-md-5 col-sm-11 col-11 mx-md-down mt64 mb120'; else: echo 'col-lg-4 mr-auto offset-lg-1 col-md-11 col-sm-11 col-11 mx-md-down'; endif;?> mt64 mb120">
                        <h1><span class="<?php the_field('overlay_color');?> clip small"><?php the_field('title');?></span><?php echo get_the_title();?></h1>

                        <?php the_field('bio');?>

                    </div>
                </div>

            </section>

            <?php get_template_part( 'partials/section', 'task-force' );?>




        </div>
      </div>

        <?php get_template_part('templates/footer'); ?>
