<?php

$gallery = get_sub_field('gallery_type');





;?>


<section class="featured-slider pt64 pb120 pt-xs-32 pb-xs-0">

    <div class="gallery">

<?php if($gallery == 'default'):



        $images = get_field('default_gallery', 'options'); $counter = 0;
        foreach( $images as $image ): ?>


        <?php if(++$counter % 3 === 0) {?><div class="item">
        <img class="img-parallax" src="<?php echo $image['sizes']['large']; ?>" data-stellar-ratio="1.5" alt="<?php if (!$image['alt'] == null): echo $image['alt']; else: echo get_the_title() . ' - ' . get_bloginfo(); endif; ?>">
        <?php if (!$image['caption'] == null): echo '<label class="img-attrib" data-stellar-ratio="1.5">' . $image['caption'] . '</label>'; endif; ?>
        </div>
        <?php } elseif(++$counter % 2 === 0) {?><div class="item">
        <img class="img-parallax" src="<?php echo $image['sizes']['large']; ?>" data-stellar-ratio="1.25" data-stellar-offset-parent="true" data-stellar-vertical-offset="-200" alt="<?php if (!$image['alt'] == null): echo $image['alt']; else: echo get_the_title() . ' - ' . get_bloginfo(); endif; ?>">
        <?php if (!$image['caption'] == null): echo '<label class="img-attrib" data-stellar-ratio="1.25" data-stellar-offset-parent="true" data-stellar-vertical-offset="-200">' . $image['caption'] . '</label>'; endif; ?>
        </div>
        <?php }elseif(++$counter % 1 === 0) {?>
        <div class="item">

        <img class="img-parallax" src="<?php echo $image['sizes']['large']; ?>" data-stellar-ratio="1.75" alt="<?php if (!$image['alt'] == null): echo $image['alt']; else: echo get_the_title() . ' - ' . get_bloginfo(); endif; ?>">
        <?php if (!$image['caption'] == null): echo '<label class="img-attrib" data-stellar-ratio="1.75">' . $image['caption'] . '</label>'; endif; ?>
        </div>
        <?php }?>


  <?php endforeach; ?>

<?php else:


$images = get_sub_field('gallery'); $counter = 0;
foreach( $images as $image ): ?>


        <?php if(++$counter % 3 === 0) {?><div class="item">
        <img class="img-parallax" src="<?php echo $image['sizes']['large']; ?>" data-stellar-ratio="1.5" alt="<?php if (!$image['alt'] == null): echo $image['alt']; else: echo get_the_title() . ' - ' . get_bloginfo(); endif; ?>">
        <?php if (!$image['caption'] == null): echo '<label class="img-attrib" data-stellar-ratio="1.5">' . $image['caption'] . '</label>'; endif; ?>
        </div>
        <?php } elseif(++$counter % 2 === 0) {?><div class="item">
        <img class="img-parallax" src="<?php echo $image['sizes']['large']; ?>" data-stellar-ratio="1.25" data-stellar-offset-parent="true" data-stellar-vertical-offset="-200" alt="<?php if (!$image['alt'] == null): echo $image['alt']; else: echo get_the_title() . ' - ' . get_bloginfo(); endif; ?>">
        <?php if (!$image['caption'] == null): echo '<label class="img-attrib" data-stellar-ratio="1.25" data-stellar-offset-parent="true" data-stellar-vertical-offset="-200">' . $image['caption'] . '</label>'; endif; ?>
        </div>
        <?php }elseif(++$counter % 1 === 0) {?>
        <div class="item">

        <img class="img-parallax" src="<?php echo $image['sizes']['large']; ?>" data-stellar-ratio="1.75" alt="<?php if (!$image['alt'] == null): echo $image['alt']; else: echo get_the_title() . ' - ' . get_bloginfo(); endif; ?>">
        <?php if (!$image['caption'] == null): echo '<label class="img-attrib" data-stellar-ratio="1.75">' . $image['caption'] . '</label>'; endif; ?>
        </div>
        <?php }?>


  <?php endforeach; ?>






<?php endif;?>
    </div><div class="mobile-tooltip"></div>
</section>
