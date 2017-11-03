<?php
// Example custom post type

 $properties = new CPT(
     array(
         'post_type_name' => 'programs',
         'singular'       => 'Program',
         'plural'         => 'Programs',
         'slug'           => 'programs',
     ),
     array(
         'public' => true,
         'show_ui' => true,
         'supports' => array(
             'title', 'editor', 'thumbnail'
         ),
     )
 );

 $properties->menu_icon("dashicons-universal-access-alt");
