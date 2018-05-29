<?php ;?>



<section class="columns pt-sm-3" id="<?php the_sub_field('nav_hash');?>">
    <div class="container">


        <div class="row">
        <div class="col-md-12 col-11 mx-auto">

                <?php if (!$count): ?>
                    <h1><span><?php the_sub_field('subheadline');?></span><?php the_sub_field('headline');?></h1><?php else:?>
                    <h2><span><?php the_sub_field('subheadline');?></span><?php the_sub_field('headline');?></h2><?php endif;?>
            </div>


        </div>
        <div class="row">
            <?php if( have_rows('columns') ):?>
            <?php while ( have_rows('columns') ) : the_row(); ?>
            <div class="col-md col-11 mx-auto">

            <?php the_sub_field('content');?>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </div>

</section>
