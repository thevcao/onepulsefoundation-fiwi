<?php
// Example custom post type

 $properties = new CPT(
     array(
         'post_type_name' => 'events',
         'singular'       => 'Event',
         'plural'         => 'Events',
         'slug'           => 'events',
     ),
     array(
         'public' => true,
         'show_ui' => true,

     )
 );

 $properties->menu_icon("dashicons-tickets");
