<?php ;?>

    <section class="home-hero pt-15 pb-11 pt-lg-11 pb-lg-5 pt-md-10 pb-md-5 mb-lg-3 pt-sm-9 pb-sm-4">
        <div class="img-overlay left"></div>

        <div class="container">
            <div class="row">
                    <div class="col-lg-10 col-md-12 col-11 mx-md-down">
                    <h2 class="clone-shadow"><?php the_sub_field('headline');?></h2>
                    <h2><?php the_sub_field('headline');?></h2>
                    <?php if(is_page(5286)): echo '<a href="/donate" class="btn left">Donate Today</a>'; endif;?>
                </div>
            </div>
        </div>
        <?php $image = get_sub_field('hero_image'); echo '<label class="img-attrib">' . $image['caption'] . '</label>';?>
    </section>
