<?php ;?>



<section class="columns">
    <div class="container">


        <div class="row">
        <div class="col-md-12">


                    <h2><span>onePULSE Foundation Memorial</span>Board of Trustees</h2>
            </div>


        </div>
        <div class="row">

            <div class="col-sm-12">

            <ul class="task-force-members">
            <?php $args = array(

                'posts_per_page'    => -1,
                'meta_key'         => 'order',
                'orderby'    => 'meta_value',
                'order'    => 'ASC',
                'post_type' => 'board',
                'meta_query' => array(

                    'btitle' => array(
                        'key' => 'order',
                        'value' => '1',
                        'compare' => '='
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

            <?php



                $args = array(

                'posts_per_page'    => -1,
                'meta_key'=> 'order',
                'orderby' => array(
                    'meta_value' => 'ASC',
                    'title' => 'ASC'
                    ),
                'post_type' => 'board',
                'meta_query' => array(

                    'btitle' => array(
                        'key' => 'order',
                        'value' => '1',
                        'compare' => '!='
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
