<?php ;?>

    <section class="home-hero pt-sm-5 pb120 pt-xs-80 pb-xs-64">
        <div class="img-overlay left"></div>

        <div class="container">
            <div class="row">
                    <div class="col-lg-10 col-md-12">
                    <h2 class="clone-shadow"><?php the_sub_field('headline');?></h2>
                    <h2><?php the_sub_field('headline');?></h2>
                    <?php if(is_page(5286)): echo '<a href="/donate" class="btn left">Donate Today</a>'; endif;?>
                </div>
            </div>
        </div>
        <?php $image = get_sub_field('hero_image'); echo '<label class="img-attrib">' . $image['caption'] . '</label>';?>
    </section>
