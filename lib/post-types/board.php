<?php
// Example custom post type

 $properties = new CPT(
     array(
         'post_type_name' => 'board',
         'singular'       => 'Board of Trustees',
         'plural'         => 'Board of Trustees',
         'slug'           => 'board',
     ),
     array(
         'public' => true,
         'show_ui' => true,

     )
 );

 $properties->menu_icon("dashicons-businessman");
