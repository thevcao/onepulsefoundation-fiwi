<?php ;?>



<section class="task-force pb120 pb-xs-32 pb-xs-32 pt-sm-3" id="ambassadors">
    <div class="container">


        <div class="row">
        <div class="col-lg-6 col-md-12 col-11 mx-md-down">
        <h2><span>onePULSE Foundation Memorial</span>Chairman’s Ambassadors Council</h2>

            </div>


        </div>
        <div class="row">

            <div class="col-lg-12 col-md-12 col-11 mx-md-down">

            <ul class="task-force-members">
            <?php $args = array(

                'posts_per_page'    => -1,
                //'meta_key'         => 'order',
                'orderby'    => 'date',
                'order'    => 'DESC',
                'post_type' => 'council',
            );

            add_filter( 'posts_orderby' , 'posts_orderby_lastname' );

            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post(); ?>


                <li><?php echo get_the_title();?>
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
