<?php ;?>



<section class="columns pt-sm-3" id="board">
    <div class="container">


        <div class="row">
        <div class="col-md-12 col-11 mx-auto">


                    <h2><span>onePULSE Foundation Memorial</span>Board of Trustees</h2>
            </div>


        </div>
        <div class="row">

            <div class="col-sm-12 col-11 mx-auto">

            <h3>Executive Council</h3>
            <ul class="task-force-members mb64 mb-xs-32 mb-sm-2">
            <?php $args = array(

                'posts_per_page'    => -1,
                'meta_key'         => 'order',
                'orderby'    => 'meta_value',
                'order'    => 'ASC',
                'post_type' => 'board',
                'meta_query' => array(

                    'btitle' => array(
                        'key' => 'exec_council',
                        'compare' => 'EXISTS'
                    ),



                ),

            );



            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post(); ?>


                <li><a href="<?php the_permalink();?>"><?php echo get_the_title();?></a>
                    <ul>
                        <li><?php the_field('title');?></li>
                    </ul>
                </li>


            <?php endwhile; wp_reset_postdata();?>


                </ul>

            <ul class="task-force-members">



            <?php



                $args = array(

                'posts_per_page'    => -1,
                'post_type' => 'board',
                'meta_query' => array(

                    'btitle' => array(
                        'key' => 'exec_council',
                        'compare' => 'NOT EXISTS'
                    ),



                ),
            );


            add_filter( 'posts_orderby' , 'posts_orderby_lastname' );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post(); ?>


                <li><a href="<?php the_permalink();?>"><?php echo get_the_title();?></a>
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
