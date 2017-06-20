<?php ;?>



<section class="columns">
    <div class="container">


        <div class="row">
        <div class="col-md-12">

                <?php if (!$count): ?>
                    <h1><span><?php the_sub_field('subheadline');?></span><?php the_sub_field('headline');?></h1><?php else:?>
                    <h2><span><?php the_sub_field('subheadline');?></span><?php the_sub_field('headline');?></h2><?php endif;?>
            </div>


        </div>
        <div class="row">
<?php if( have_rows('columns') ):?>
<?php  $counter = 0; while ( have_rows('columns') ) : the_row(); $counter++; ?>

<?php endwhile; ?>
<?php while ( have_rows('columns') ) : the_row(); ?>
            <div class="col-sm-<?php echo 12 / $counter;?>">

            <?php the_sub_field('content');?>
            </div>
<?php endwhile; ?>
<?php endif; ?>

        </div>
    </div>

</section>
