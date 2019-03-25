<?php ;?>

                <section id="donors">


            <?php if( have_rows('donors', 'options') ):?>
            <?php $i = 0; while ( have_rows('donors', 'options') ) : the_row();?>





                    <div class="row faq-item" tabindex="<?php echo $i++;?>">

                            <?php

                        $images = get_field('default_gallery', 'options');
                        $random_result = array_rand($images ,1);
                        $banner = $images[$random_result];
                        echo '<div class="bg-element"><img class="bg-img" src="'. $banner['sizes']['large'] .'" alt="';
                        echo get_the_title() . ' - ' . get_bloginfo();
                        echo '">';
                        echo '<label aria-hidden="true" class="img-attrib">' .$banner['caption'] . '</label></div>';?>

                        <div class="container">
                            <div class="col-md-12 col-11 mx-auto">



                                <div class="">
                                    <a href="#" class="question"><?php the_sub_field('level');?> Level Donors</a>

                                    <div class="answer" id="donor-<?php echo $i++;?>">
                                    <?php the_sub_field('donors');?>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php endif; ?>

                </section>


