<?php
// Example custom post type

 $properties = new CPT(
     array(
         'post_type_name' => 'faq',
         'singular'       => 'FAQ',
         'plural'         => 'FAQs',
         'slug'           => 'faq',
     ),
     array(
         'public' => false,
         'show_ui' => true,
         'supports' => array(
             'title', 'editor'
         ),
     )
 );

 $properties->menu_icon("dashicons-info");
