<?php ;?>



<section class="task-force pb120 pb-xs-32 pb-xs-32">
    <div class="container">


        <div class="row">
        <div class="col-md-6">
        <h2><span>onePULSE Foundation Memorial</span>Ambassadors' Council</h2>

            </div>


        </div>
        <div class="row">

            <div class="col-sm-12">

            <ul class="task-force-members">
            <?php $args = array(

                'posts_per_page'    => -1,
                //'meta_key'         => 'order',
                'orderby'    => 'date',
                'order'    => 'DESC',
                'post_type' => 'council',
            );



            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post(); ?>


                <li><a href="#"><?php echo get_the_title();?></a>
                    <ul>
                        <li><?php the_field('title');?></li>
                    </ul>
                </li>
            <?php endwhile; wp_reset_postdata();?>

            </ul>
            </div>


        </div>
    </div>

</section>
