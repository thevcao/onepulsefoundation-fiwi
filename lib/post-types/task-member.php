<?php
// Example custom post type

 $properties = new CPT(
     array(
         'post_type_name' => 'task-member',
         'singular'       => 'Task Member',
         'plural'         => 'Task Members',
         'slug'           => 'task-members',
     ),
     array(
         'public' => true,
         'show_ui' => true,

     )
 );

 $properties->menu_icon("dashicons-admin-users");
