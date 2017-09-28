<?php ;?>

    <section class="home-hero pt120 pb120 pt-xs-80 pb-xs-64">
        <div class="img-overlay left"></div>

        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h2 class="clone-shadow"><?php the_sub_field('headline');?></h2>
                    <h2><?php the_sub_field('headline');?></h2>
                </div>
            </div>
        </div>
        <?php $image = get_sub_field('hero_image'); echo '<label class="img-attrib">' . $image['caption'] . '</label>';?>
    </section>
