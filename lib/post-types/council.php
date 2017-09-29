<?php
// Example custom post type

 $properties = new CPT(
     array(
         'post_type_name' => 'council',
         'singular'       => 'Ambassador Council',
         'plural'         => 'Ambassador Council',
         'slug'           => 'council',
     ),
     array(
         'public' => false,
         'show_ui' => true,

     )
 );

 $properties->menu_icon("dashicons-megaphone");
