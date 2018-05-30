<?php ;?>


    <?php $media_type = get_sub_field('media_type');
                    $image = get_sub_field('image');
                    $large = $image['sizes']['large'];
//                    $large = str_replace('https://fiwi-onepulsefoundation.s3.amazonaws.com', 'https://onepulsefoundation.org', $large);

                    $video = get_sub_field('video');
                    $poster = get_sub_field('poster');

                $source = get_sub_field('video_source');
                $ext_source = get_sub_field('source');
                $url = get_sub_field('url');


?>


        <section class="home-about <?php if (!$count): ?>pt-13 pb-11 pt-lg-11 pb-lg-3 pt-md-10 pb-md-1 mt-lg-2 mb-lg-3 pt-sm-7<?php else:?>pt-5 pb-8 pb-lg-3 pt-md-10 pb-md-1 mt-lg-2 mb-lg-3 pt-sm-2<?php endif;?> content-left" id="<?php the_sub_field('nav_hash');?>">


          <!--<div class="media-over">
            <div class="row">


            </div>

          </div>-->

            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-11 mx-auto">

                        <?php if (!$count): ?>
                            <h1><span><?php the_sub_field('subheadline');?></span><?php the_sub_field('headline');?></h1>
                            <?php else:?>
                                <h2><span><?php the_sub_field('subheadline');?></span><?php the_sub_field('headline');?></h2>
                                <?php endif;?>





                    </div>
                </div>

                <div class="row">
                        <div class="col-lg-5 col-md-12 col-11 mx-md-down order-lg-1 order-md-2 order-2">

                            <div class="content">

                                <?php the_sub_field('content');?>

                                    <?php if(get_sub_field('cta_link')): $link = get_sub_field('cta_link'); echo '<a class="btn left" href="'. get_the_permalink($link->ID) .'">' . get_sub_field('cta_text') .'</a>'; endif;?>

                            </div>

                        </div>
                <?php if($media_type == 'Image'):?>
                    <div class="col-lg-6 col-md-12 ml-auto col-11 mx-md-down mb-lg-0 mb-md-0 mb-sm-3 order-lg-2 order-md-1 order-1">


                        <div class="canvas-container" data-stellar-ratio="1">
                            <div class="line mb16"></div>
                            <img id="featured-image" crossorigin="anonymous" class="grayscale mm" src="<?php echo $large;?>" alt="<?php if (!$image['alt'] == null): echo $image['alt']; else: echo get_the_title() . ' - ' . get_bloginfo(); endif; ?>">
                            <img data-stellar-ratio="1.25" class="over-image" src="<?php echo $image['sizes']['large'];?>" data-stellar-offset-parent="true" data-stellar-vertical-offset="-200" alt="<?php if (!$image['alt'] == null): echo $image['alt']; else: echo get_the_title() . ' - ' . get_bloginfo(); endif; ?>">
                        </div>

                        <?php elseif($media_type == 'Video'):?>
                    <div class="col-lg-6 ml-auto col-md-12 col-11 mx-md-down mb-lg-0 mb-md-0 mb-sm-3 order-lg-2 order-md-1 order-1">

                                <div class="video-container" data-stellar-ratio="1.25">



                                    <?php if($source == 'File'): ?>


                                        <label class=""><span><?php the_sub_field('video_label_1');?></span>
                                            <?php the_sub_field('video_label_2');?>
                                                <div class="line"></div>
                                        </label>
                                        <video id="video" class="video-js vjs-sublime-skin" controls preload="none" width="100%" height="800" poster="<?php echo $poster['sizes']['large'];?>" data-setup='{"ga": {"eventsToTrack": ["play"]}}'>
                                            <source src="<?php echo $video;?>" type="video/mp4">
                                        </video>
                                        <?php echo '<label class="img-attrib">' . $poster['caption'] . '</label>';?>
                                            <?php endif;?>

                                                <?php if($ext_source == 'youtube'): ?>
                                                    <label class=""><span><?php the_sub_field('video_label_1');?></span>
                                                        <?php the_sub_field('video_label_2');?>
                                                            <div class="line"></div>
                                                    </label>
                                                    <video id='video' class='video-js vjs-sublime-skin' playsinline controls preload='none' width='100%' height='800' poster="<?php echo $poster['sizes']['large'];?>" data-setup='{ "ga": {"eventsToTrack": ["play"]}, "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "<?php echo $url;?>" }]}'></video>
                                                    <?php endif;?>
                                                        <?php if($ext_source == 'vimeo'): ?>
                                                            <label class=""><span><?php the_sub_field('video_label_1');?></span>
                                                                <?php the_sub_field('video_label_2');?>
                                                                    <div class="line"></div>
                                                            </label>
                                                            <video id='video' class='video-js vjs-sublime-skin' playsinline controls preload='none' width='100%' height='800' poster="<?php echo $poster['sizes']['large'];?>" data-setup='{ "ga": {"eventsToTrack": ["play"]}, "techOrder": ["vimeo"], "sources": [{ "type": "video/vimeo", "src": "<?php echo $url;?>" }], "vimeo": { "ytControls": 2 }}'></video>
                                                            <?php echo '<label class="img-attrib">' . $poster['caption'] . '</label>';?>
                                </div>

                                <?php endif;?>

                            </div>

                            <?php endif;?>




                    </div>

                </div>

            </div>


        </section>
