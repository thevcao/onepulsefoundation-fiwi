<?php
/**
 * The Template for displaying all single posts
 *
 * @package Smores
 * @since Smores 2.0
 */
?>
    <?php get_template_part('templates/header'); ?>
                                                <?php

                                                    if(get_field('event_location')):
                                                  $values = get_field('event_location');
                                                  $lat = $values['lat'];
                                                  $lng = $values['lng'];
                                                  $address = $values['address'];
                                                  $map_center_lat = $values['center_lat'];
                                                  $map_center_lng = $values['center_lng'];
                                                  $map_zoom = $values['zoom'];
                                                    endif;
                                                ?>
<div class="main-wrapper">
        <div class="post-body">
            <section class="post-image">
                <div class="row">
                    <div class="col-lg-8">
                <?php

                $video = get_field('post_video');
                $poster = get_field('video_poster');
                $size = 'medium';
                $source = get_field('video_source');
                $ext_source = get_field('source');
                $url = get_field('url');

                if(!$source == null){?>

                        <?php  $featbanner = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'banner' ); $featurl = $featbanner['0'];


                        $featnurl = str_replace('fiwi-onepulsefoundation.s3.amazonaws.com', 'onepulsefoundation.org', $featurl);


                        ?>

                        <script>
                        console.log('<?php echo $featnurl;?>');
                        </script>
                            <?php if( has_post_thumbnail()): echo '<img id="featured-image" class="hidden-xs" src="'. $featbanner['0'] .'">'; endif;?>
                        <?php //if( has_post_thumbnail()): echo '<img class="over-image" src="'. $featurl .'">'; endif;?>

                        <?php if($source == 'File'): ?>

                        <div class="over-video">
                            <label>
                                <span>Video</span>
                                <?php the_field('video_title');?>
                            </label>
                            <video id="video" class="video-js vjs-sublime-skin" controls poster="<?php echo $poster['sizes']['large'];?>" preload="none" width="100%" height="800" data-setup='{"ga": {"eventsToTrack": ["play"]}}'>
                                <source src="<?php echo $video;?>" type="video/mp4">
                            </video>
                            <?php echo '<label class="img-attrib">' . $poster['caption'] . '</label>';?>
                        </div>
                        <?php elseif($ext_source == 'youtube'): ?>
                        <div class="over-video">
                        <label>
                            <span>Video</span>
                            <?php the_field('video_title');?>
                        </label>
                            <video id='video' class='video-js vjs-sublime-skin' playsinline controls poster="<?php echo $poster['sizes']['large'];?>" preload='none' width='100%' height='800' data-setup='{ "ga": {"eventsToTrack": ["play"]}, "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "<?php the_field('url');?>" }]}'></video>
                            <?php echo '<label class="img-attrib">' . $poster['caption'] . '</label>';?>
                        </div>
                        <?php elseif($ext_source == 'vimeo'): ?>
                            <div class="over-video">
                        <label>
                            <span>Video</span>
                            <?php the_field('video_title');?>
                        </label>
                            <video id='video' class='video-js vjs-sublime-skin' playsinline controls poster="<?php echo $poster['sizes']['large'];?>" preload='none' width='100%' height='800' data-setup='{ "ga": {"eventsToTrack": ["play"]}, "techOrder": ["vimeo"], "sources": [{ "type": "video/vimeo", "src": "<?php the_field('url');?>" }], "vimeo": { "ytControls": 2 }}'></video>
                            <?php echo '<label class="img-attrib">' . $poster['caption'] . '</label>';?>

                        </div>

                        <?php elseif($source == 'None'): ?>

                          <?php if(!empty($poster)): ?>
                              <img class="over-image" src="<?php echo $poster['sizes']['large'];?>"  alt="<?php if (!$poster['alt'] == null): echo $poster['alt']; else: echo get_the_title() . ' - ' . get_bloginfo(); endif; ?>">
                          <?php endif;?>


                        <?php endif;?>

            <?php } else{ ?>
                        <?php  $featbanner = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'banner' ); $featurl = $featbanner['0']; ?>
                            <?php if( has_post_thumbnail()): echo '<img id="featured-image" class="hidden-xs" src="'. $featurl .'">'; endif;?>
                        <?php if( has_post_thumbnail()): echo '<img class="over-image" src="'. $featurl .'">'; endif;?>

            <?php } ?>

                    </div>

                </div>

            </section>

            <section class="pt-sm-5 pb120 pt-xs-0 pb-xs-0">
                <div class="container">


                    <div class="row">

                        <?php $video = get_field('post_video');
        $poster = get_field('video_poster');
        $size = 'medium';

            if(!$source == null):?>

                            <div class="col-md-7">
                                <h1><?php echo get_the_title();?></h1>
                                    <h3 class="mt0 mb16"><i class="fa fa-calendar"></i> <?php the_field('event_date');?></h3>
                                  <?php if(get_field('event_location')):?>
                                    <h3 class="mt0 mb32"><a href="https://maps.google.com?saddr=Current+Location&daddr=<?php echo $address;?>" target="_blank"><i class="fa fa-location-arrow"></i> <?php echo $address;?></a></h3>
                              <?php endif;?>
                              <div>
                                <h4 class="text-left mb8">Share this</h4>
                                <ul class="socials shares">
                                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>" class="pop-link" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="https://twitter.com/home?status=<?php the_permalink();?>" class="pop-link" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink();?>" class="pop-link" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="https://plus.google.com/share?url=<?php the_permalink();?>" class="pop-link" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                              </div>

                                <?php the_content();?>



                            </div>



                            <div class="col-md-4 ml-auto mt120 mt-sm-0 mt-xs-0">


                                <div>

                                    <?php if(get_field('event_location')):?>
                                    <div class="map-wrapper">
                                        <div class="acf-map">
                                            <div class="marker" data-lat="<?php echo $lat; ?>" data-lng="<?php echo $lng; ?>"></div>
                                        </div>
                                    </div>

                                    <?php endif;?>



                                </div>

                            </div>

                            <?php else: ?>

                            <div class="col-md-7">
                                <h1><?php echo get_the_title();?></h1>
                                    <h3 class="mt0 mb16"><i class="fa fa-calendar"></i> <?php the_field('event_date');?></h3>
                                    <h3 class="mt0 mb32"><a href="https://maps.google.com?saddr=Current+Location&daddr=<?php echo $address;?>" target="_blank"><i class="fa fa-location-arrow"></i> <?php echo $address;?></a></h3>
                              <div>
                                <h4 class="text-left mb8">Share this</h4>
                                <ul class="socials shares">
                                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>" class="pop-link" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="https://twitter.com/home?status=<?php the_permalink();?>" class="pop-link" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink();?>" class="pop-link" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="https://plus.google.com/share?url=<?php the_permalink();?>" class="pop-link" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                              </div>
                                <?php the_content();?>



                            </div>



                            <div class="col-md-4 ml-auto mt120 mt-sm-0 mt-xs-0">


                                <div>

                                    <?php if(get_field('event_location')):?>
                                    <div class="map-wrapper">
                                        <div class="acf-map">
                                            <div class="marker" data-lat="<?php echo $lat; ?>" data-lng="<?php echo $lng; ?>"></div>
                                        </div>

                                    </div>

                                    <?php endif;?>



                                </div>

                            </div>

                      <div class="row">
                        <div class="col-md-12">


                              <?php $sponsors = get_field('sponsors');
                                    $sponsor_intro = get_field('sponsor_intro');

                              ?>

                              <?php if(get_field('main_sponsor')): echo '<h5 class="text-center">Proudly presented by:</h5>';?>
                              <div class="container-fluid">
                                <div class="row">

                                  <div class="col-md-6 mx-auto">
                                    <img class="main-sponsor" src="<?php echo get_field('main_sponsor')['sizes']['large'];?>">
                                  </div>
                                </div>
                              </div>
                              <?php endif;?>
                              <?php if(get_field('sponsors')):?>
                              <div class="container-fluid">
                                  <h5 class="text-center"><?php echo $sponsor_intro;?></h5>

                                <ul class="sponsor-grid">
                                  <?php foreach($sponsors as $sponsor):?>
                                  <li><img src="<?php echo $sponsor['sizes']['large'];?>"></li>
                                  <?php endforeach;?>
                                </ul>

                              </div>
                              <?php endif;?>

                              <?php if(get_field('vendors')): echo '<h5 class="text-center">Vendors</h5>';?>
                              <div class="container-fluid">
                                <div class="row">

                                  <div class="col-md-8 mx-auto">
                                <?php the_field('vendors');?>
                                  </div>
                                </div>
                              </div>
                              <?php endif;?>

                        </div>


                      </div>
                                <?php endif;?>
                    </div>
                </div>

            </section>




        </div>

        <?php get_template_part('templates/footer'); ?>
<style type="text/css">

.acf-map {
    width: 100%;
    height: 400px;
    border: #ccc solid 1px;
    margin: 0;
    pointer-events: all;
}

/* fixes potential theme css conflict */
.acf-map img {
   max-width: inherit !important;
}

</style>

<script type="text/javascript">
(function($) {

/*
*  new_map
*
*  This function will render a Google Map onto the selected jQuery element
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$el (jQuery element)
*  @return	n/a
*/

function new_map( $el ) {

    // var
    var $markers = $el.find('.marker');


    // vars
    var args = {
        zoom		: 16,
        center		: new google.maps.LatLng(0, 0),
        mapTypeId	: google.maps.MapTypeId.ROADMAP
    };


    // create map
    var map = new google.maps.Map( $el[0], args);


    // add a markers reference
    map.markers = [];


    // add markers
    $markers.each(function(){

        add_marker( $(this), map );

    });


    // center map
    center_map( map );


    // return
    return map;

}

/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$marker (jQuery element)
*  @param	map (Google Map object)
*  @return	n/a
*/

function add_marker( $marker, map ) {

    // var
    var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

    // create marker
    var marker = new google.maps.Marker({
        position	: latlng,
        map			: map
    });

    // add to array
    map.markers.push( marker );

    // if marker contains HTML, add it to an infoWindow
    if( $marker.html() )
    {
        // create info window
        var infowindow = new google.maps.InfoWindow({
            content		: $marker.html()
        });

        // show info window when marker is clicked
        google.maps.event.addListener(marker, 'click', function() {

            infowindow.open( map, marker );

        });
    }

}

/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	map (Google Map object)
*  @return	n/a
*/

function center_map( map ) {

    // vars
    var bounds = new google.maps.LatLngBounds();

    // loop through all markers and create bounds
    $.each( map.markers, function( i, marker ){

        var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

        bounds.extend( latlng );

    });

    // only 1 marker?
    if( map.markers.length == 1 )
    {
        // set center of map
        map.setCenter( bounds.getCenter() );
        map.setZoom( 16 );
    }
    else
    {
        // fit to bounds
        map.fitBounds( bounds );
    }

}

/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type	function
*  @date	8/11/2013
*  @since	5.0.0
*
*  @param	n/a
*  @return	n/a
*/
// global var
var map = null;

$(document).ready(function(){

    $('.acf-map').each(function(){

        // create map
        map = new_map( $(this) );

    });

});

})(jQuery);
</script>
