<?php ;?>



<section class="task-force pb120 pb-xs-32 pb-xs-32" id="advisory-council">
    <div class="container">


        <div class="row">
        <div class="col-lg-6 col-md-12 col-11 mx-md-down">
        <h2><span>onePULSE Foundation Memorial</span>Task Force Advisory Council</h2>

            </div>


        </div>
        <div class="row">
            <div class="col-lg-2 hidden-md">


        <?php $images = get_field('task_force_images', 'options');  foreach( $images as $image ): ?>

                <div data-stellar-ratio="1.5">
        <img class="img-parallax mb-1" src="<?php echo $image['sizes']['medium']; ?>" alt="<?php if (!$image['alt'] == null): echo $image['alt']; else: echo get_the_title() . ' - ' . get_bloginfo(); endif; ?>">
        <?php echo '<label aria-hidden="true" class="img-attrib">' . $image['caption'] . '</label>';?></div>
  <?php endforeach; ?>


            </div>
            <div class="col-lg-6 col-md-12 col-11 mx-md-down">

                <div class="line"></div>


                <p>The Task Force is an appointed volunteer coalition of family members of victims, survivors, and local community leaders. This committee will give recommendations and guidance to the Board of Trustees to create, build, and financially maintain a permanent national memorial at the Pulse site.  The Task Force serves as the planning committee who will formulate the process of building what will become an iconic tribute to the 49 Angels taken from us on that horrible night, as well as to the survivors, brave first responders, surgeons, and medical providers who served so selflessly.</p>

                <p>Still in formation, the Task Force will break into different subcommittees who will each play a role in the gathering of data that will reflect the wishes of the victims’ families, the survivors, and the community at large.</p>

                <h4 class="text-right hidden-md mt64">Select a Advisory Council Member to Read Full Bio <i class="fa fa-chevron-right"></i></h4>




            </div>
            <div class="col-lg-4 text-right hidden-tab-pt hidden-md">
                <div data-stellar-ratio="2" data-stellar-offset-parent="true" data-stellar-vertical-offset="300">

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

            <div class="col-lg-8 col-md-12 ml-auto col-11 mx-auto visible-tab-pt visible-md">
            <a href="#task-modal" class="btn modal-toggle">Meet the Advisory Council</a>
            </div>
        </div>
    </div>

</section>
