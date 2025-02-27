<?php
/**
 * Functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 * @package Smores
 * @since Smores 2.0
 */

define("THEME_ROOT", get_stylesheet_directory());

// Composer dependencies
require_once __DIR__ . '/lib/vendor/autoload.php';

use Smores\Smores;
use Smores\TopBarPageWalker;
use Smores\TopBarWalker;


$rand = rand();

$smores = new Smores(
    array( // Includes
        'lib/admin',         // Add admin scripts
        'lib/ajax',          // Add ajax scripts
        'lib/classes',       // Add classes
        'lib/custom-fields', // Add custom field scripts
        'lib/forms',         // Add form scripts
        'lib/images',        // Add images scripts
        'lib/post-types',    // Add post type scripts
        'lib/shortcodes',    // Add shortcode scripts
        'lib/widgets',       // Add widget scripts
    ),
    array( // Assets
        'css'             => '/dist/css/styles.min.css?rand=' . $rand,
//        'css'             => '/dist/css/styles.min.clean.css',
        'js'              => '/dist/js/scripts.min.js?rand=' . $rand,
        'modernizr'       => '/dist/js/vendor/modernizr.min.js',
        'jquery'          => '//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js',
//        'jquery_fallback' => '/dist/js/vendor/jquery.min.js',
)
);

/**
 * [smores_numeric_pagination description]
 *
 * @param  [type] $custom_query [description]
 * @param  string $classes      [description]
 * @return [type]               [description]
 */
function smores_numeric_pagination($custom_query = false, $classes = '')
{
    $query = null;

    if ($custom_query) {
        $query = $custom_query;
    } else {
        global $wp_query;

        $query = $wp_query;

        if (is_singular()) {
            return;
        }
    }

    /** Stop execution if there's only 1 page */
    if ($query->max_num_pages <= 1) {
        return;
    }

    $paged = (get_query_var('paged')) ? absint( get_query_var('paged')) : 1;
    $max   = $query->max_num_pages;

    /** Add current page to the array */
    if ($paged >= 1) {
        $links[] = $paged;
    }

    /** Add the pages around the current page to the array */
    if ($paged >= 3) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if (($paged + 2) <= $max) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo "<ul class=\"pagination {$classes}\" role=\"menubar\" aria-label=\"Pagination\">\n";

    /** Previous Post Link */
    if (get_previous_posts_link()) {
        printf("<li class=\"arrow show-for-medium-up previous-link\">%s</li>\n", get_previous_posts_link());
    } else {
        echo '<li class="arrow unavailable previous-link"><a href="#">&laquo; Previous Page</a></li>';
    }

    /** Link to first page, plus ellipses if necessary */
    if (!in_array(1, $links)) {
        $class = ($paged === 1) ? ' class="current"' : '';

        printf("<li%s><a href=\"%s\">%s</a></li>\n", $class, esc_url(get_pagenum_link(1)), '1');

        if (!in_array(2, $links)) {
            echo '<li>…</li>';
        }
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort($links);

    foreach ((array) $links as $link) {
        $class = ($paged === $link) ? ' class="current"' : '';

        printf("<li%s><a href=\"%s\">%s</a></li>\n", $class, esc_url(get_pagenum_link($link)), $link);
    }

    /** Link to last page, plus ellipses if necessary */
    if (!in_array($max, $links)) {
        if (!in_array($max - 1, $links)) {
            echo "<li>…</li>\n";
        }

        $class = ($paged === $max) ? ' class="current"' : '';

        printf("<li%s><a href=\"%s\">%s</a></li>\n", $class, esc_url(get_pagenum_link($max)), $max);
    }

    /** Next Post Link */
    if (get_next_posts_link()) {
        printf("<li class=\"arrow next-link\">%s</li>\n", get_next_posts_link());
    } else {
        echo '<li class="arrow unavailable show-for-medium-up next-link"><a href="#">Next Page &raquo;</a></li>';
    }

    echo "</ul>\n";
}


if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array('page_title' => 'Site Options', 'icon_url' =>'dashicons-admin-generic','position' => '2'));
}



/**
*	Smores Included Plugin Installs
*   Advanced Custom Fields PRO
*   Advanced Custom Fields: Font Awesome
*   Advanced Custom Fields: Contact Form 7
*   Contact Form 7
*   EWWW Image Optimizer
*   Grunt Sitemap Generator
*   Regenerate Thumbnails
*   WP Security Audit Log
**/

add_action('after_switch_theme' , 'smores_install_plugin_pack');

// First check it make sure this function has not been done
function smores_install_plugin_pack(){
//    if (get_option('smores_plugin_installer_ran') != "yes") {
//
//        smores_run_install_plugin_pack();
//
//    // Now that function has been run, set option so it wont run again
//        update_option( 'smores_plugin_installer_ran', 'yes' );
//
//    }
    smores_run_install_plugin_pack();
}

add_action('switch_theme', 'smores_reset_installer_switch');
function smores_reset_installer_switch(){
    if(get_option('smores_plugin_installer_ran') == "yes"){
       // update_option( 'smores_plugin_installer_ran', 'no');
    }
}

function smores_run_install_plugin_pack(){
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
    require_once ABSPATH . 'wp-admin/includes/file.php';
    $zippedThemePlugins = get_template_directory() . '/smores_pu/plugins/';
    $pluginsDirectory =  get_home_path() . 'wp-content/plugins/';

    smores_check_for_and_install_plugins( $zippedThemePlugins, $pluginsDirectory );
    //smores_plugin_directory_scanner( $pluginsDirectory, $activate = true );
    smores_clean_tmp_directory( $zippedThemePlugins . 'tmp' );

    return true;
}



/**
 * Checks for installed plugins. If not previously installed. Installs and activates plugin.
 * @param  string $zippedPath           Path to zipped plugins required for the theme.
 * @param  string $installedPluginsPath Path to currently installed plugins.
 * @return bool                       true if function complets.
 */
function smores_check_for_and_install_plugins( $zippedPath, $installedPluginsPath ){
    $alreadyInstalled = array();
    $tmpPlugins = array();
    $tmpUnzipPath = $zippedPath . 'tmp/';


    if( !file_exists($tmpUnzipPath) ){
        mkdir( $tmpUnzipPath , 0774 );
    }

    if( file_exists( $tmpUnzipPath ) == false ){
        echo "ERROR, tmp directory does not exist!"; //This needs to be dealt with properly later return an error
    } else {
        smores_unpack_plugins($zippedPath , $tmpUnzipPath);

        $tmpPlugins = smores_plugin_directory_scanner($tmpUnzipPath , $activate = false);
        $alreadyInstalled = smores_plugin_directory_scanner($installedPluginsPath , $activate = false);
    }

    foreach ($tmpPlugins as $tmpPlugin) {
        $i = 1;

        if(sizeof($alreadyInstalled) == 0 ){
            $alreadyInstalled[] = array('Name' => null , 'FilePath' => null , 'DirectoryPath' => null);
        }

        foreach ($alreadyInstalled as $installedPlugin) {
            if( $installedPlugin['Name'] == $tmpPlugin['Name'] ){

                //Do Nothing
                break;

            } else {

                if($i == sizeof($alreadyInstalled)){
                    $getDirectoryToCopy = explode('/', $tmpPlugin['DirectoryPath']);
                    $directoryToCopy = array_pop($getDirectoryToCopy);
                    $fileToCopyPath = explode('/', $tmpPlugin['FilePath']);
                    $fileToCopy = '/' . array_pop($fileToCopyPath);
                    $newCompleteDirectory = $installedPluginsPath . $directoryToCopy;

                    if(!file_exists( $newCompleteDirectory)){
                        mkdir( $newCompleteDirectory);
                    }

                    smores_recursive_copy($tmpPlugin['DirectoryPath'] ,  $newCompleteDirectory);

                    $activateMe[] = $installedPluginsPath . $directoryToCopy . $fileToCopy;
                }
            }

            $i++;

        }
    }

    $pluginsToActivate = sizeof($activateMe);
    for($i=0; $i<$pluginsToActivate; $i++){
        activate_plugin($activateMe[$i]);
    }

    unset($tmpUnzipPath);
    return true;
}

/**
 * Scans the given directory for .zip files.
 * Extracts zips to specified directory
 *
 * @param string $zippedPath	Path to directory with zip files.
 * @param string $unzippedPath	Path to unzip files to.
 * @return bool true
 */
function smores_unpack_plugins( $zippedPath , $unzippedPath ){

    foreach ( scandir($zippedPath) as $zippedPluginFile ) {
        $zip = new ZipArchive();

        if ( substr($zippedPluginFile, -4) == '.zip' ){
            $zip->open($zippedPath . $zippedPluginFile );
            $zip->extractTo( $unzippedPath);
            //$zip->close; add if exists for close() method
            unset($zip);
        }
    }

    return true;
}


/**
 * Scans a given directory for php files which contain WP plugin info.
 * @param  string  $dir      Wordpress Plugins directory usually /wp-content/plugins
 * @param  boolean $activate When set to true found plugins are activated.
 * @return array           returns a multi-dementional array containing plugin Name, php file path and directory path
 */
function smores_plugin_directory_scanner($dir , $activate = false){
    $pluginInfoArray = array();

    foreach (scandir($dir) as $directoryContent) {

        if(is_dir($dir . $directoryContent)){

            if($directoryContent == '.' || $directoryContent == '..'){
                //do nothing

            } else {

                foreach (scandir($dir . $directoryContent) as $file) {

                    if (substr($file, -4) == '.php'){

                        $pluginDirectoryPath =  $dir . $directoryContent;
                        $fullPluginPath = $dir . $directoryContent  .'/'.  $file;

                        $pluginInfo =  get_plugin_data($fullPluginPath);

                        if(strlen($pluginInfo['Name']) > 0 ){
                            $pluginInfoArray[] = array('Name' => $pluginInfo['Name'] , 'FilePath' => $fullPluginPath , 'DirectoryPath' => $pluginDirectoryPath);
                            //echo $pluginInfoArray['Name'] . '<- Name<br>';
                            if($activate == true){
                                activate_plugin($fullPluginPath);
                            }
                        }

                    }

                    unset($pluginInfo);
                    unset($newActivePlugin);
                }
            }
        }
    }

    return $pluginInfoArray;

}


/**
 * Recursivly copies directories and contents to a new location.
 * @param  string  $src   Path to the source directory.
 * @param  string  $dst   Path to the destination directory.
 * @param  integer $depth A safty to avoid infinte loops.
 * @return bool true;
 */
function smores_recursive_copy( $src , $dst, $depth = 1000 ){
    global $loopStop;
    $loopStop++;
    if($loopStop > $depth){
        return;
    } else {
        $files = glob($src . "/*");
        foreach($files as $file){
            if($file != '.' || $file != '..'){
                if(is_dir($file)){
                    $fileName = explode('/' , $file);
                    $newFile = array_pop($fileName);
                    $newPath = $dst . '/' . $newFile;
                    if(!file_exists($newPath)){
                        mkdir($dst . '/' . $newFile, 0775 );
                    }

                    $newSrc = $src . '/' . $newFile;
                    $newDst = $dst . '/' . $newFile;
                    smores_recursive_copy($newSrc, $newDst);
                } else {
                    $fileName = explode('/' , $file);
                    $newFile = array_pop($fileName);
                    copy($file , $dst . '/' . $newFile);
                }
            }
        }
    }

    return true;

}

function smores_clean_tmp_directory($zippedThemePlugins){

    foreach (scandir( $zippedThemePlugins ) as $file){
        if ($file == '.' || $file == '..'){
            //do nothing
        } else {
            if (is_dir( $zippedThemePlugins . '/' . $file )){
                $newDirectoryPath = $zippedThemePlugins . '/' .$file;
                smores_clean_tmp_directory( $newDirectoryPath );
            } else {
                unlink( $zippedThemePlugins . '/' . $file );
            }
        }
    }

    rmdir( $zippedThemePlugins );

}

/**
*	END Smores Included Plugin Installs
*   ACF Pro
*   ACF Font Awesome
*   ACF CF7
*   Contact Form 7
*   EWWW Image Optimizer
*   Regenerate Thumbnails
*   WP Security Audit Log
**/



/** Smores Admin Theme Function **/

function add_favicon() {
      $favicon_url = get_template_directory_uri() . '/admin/img/favicon.ico';
    echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
}

// Now, just make sure that function runs when you're on the login page and admin pages
add_action('login_head', 'add_favicon');
add_action('admin_head', 'add_favicon');


function fiwi_admin_styles() {
wp_enqueue_style( 'admin', get_template_directory_uri() . '/admin/css/style.css', false, 'all' );
wp_enqueue_script( 'admin', get_template_directory_uri() . '/admin/js/scripts.js', array( 'jquery' ), 'all' );
}

add_action( 'admin_enqueue_scripts', 'fiwi_admin_styles' );
add_action( 'login_enqueue_scripts', 'fiwi_admin_styles' );

function fiwi_add_editor_styles() {
    add_editor_style( get_template_directory_uri() . '/admin/css/style.css');
}
add_action( 'init', 'fiwi_add_editor_styles' );

//$counter = 0;
//function fiwi_admin_fonts() {
//
//if( have_rows('font','options') ):
//while ( have_rows('font','options') ) : the_row();
//
//wp_enqueue_style( 'font', 'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700', false, 'all' );
//
//endwhile; endif;
//
//}
//
//add_action( 'admin_enqueue_scripts', 'fiwi_admin_fonts' );
//add_action( 'login_enqueue_scripts', 'fiwi_admin_fonts' );

function remove_dashboard_meta() {
        remove_meta_box( 'dashboard_welcome', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
}
add_action( 'admin_init', 'remove_dashboard_meta' );

add_action('init', 'my_init_function');
function my_init_function() {
    if (function_exists('acf_add_options_page')) {
        $page = acf_add_options_page(array(
            'menu_title' => 'Admin Settings',
            'menu_slug' => 'admin-settings',
            'capability' => 'edit_posts',
            'redirect' => false
        ));
    }

}
add_action('init', 'acf_fields_admin');
function acf_fields_admin() {
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
    'key' => 'group_58921d3dedafd',
    'title' => 'FIWI Admin Settings',
    'fields' => array (
        array (
            'placement' => 'top',
            'endpoint' => 0,
            'key' => 'field_58921d6f0db2f',
            'label' => 'WP Admin Bar',
            'name' => '',
            'type' => 'tab',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
            ),
        ),
        array (
            'return_format' => 'url',
            'preview_size' => 'thumbnail',
            'library' => 'all',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => '',
            'key' => 'field_58921d490db2d',
            'label' => 'Admin Bar Logo',
            'name' => 'admin_bar_logo',
            'type' => 'image',
            'instructions' => 'Transparent White 1:1 Logo Works Best',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
            ),
        ),
        array (
            'placement' => 'top',
            'endpoint' => 0,
            'key' => 'field_58921d7c0db30',
            'label' => 'WP Login',
            'name' => '',
            'type' => 'tab',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
            ),
        ),
        array (
            'return_format' => 'url',
            'preview_size' => 'thumbnail',
            'library' => 'all',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => '',
            'key' => 'field_58921d870db31',
            'label' => 'WP Login Logo',
            'name' => 'wp_login_logo',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
            ),
        ),
        array (
            'placement' => 'top',
            'endpoint' => 0,
            'key' => 'field_58921d990db32',
            'label' => 'Custom Fonts',
            'name' => '',
            'type' => 'tab',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
            ),
        ),
        array (
            'sub_fields' => array (
                array (
                    'default_value' => '',
                    'maxlength' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'key' => 'field_58921db70db34',
                    'label' => 'Stylesheet',
                    'name' => 'stylesheet',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array (
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                ),
            ),
            'min' => 0,
            'max' => 0,
            'layout' => 'row',
            'button_label' => 'Add Font',
            'collapsed' => '',
            'key' => 'field_58921da60db33',
            'label' => 'Font',
            'name' => 'font',
            'type' => 'repeater',
            'instructions' => 'Add from <a href="https://fonts.google.com/" class="pop-link">Google Fonts</a> or other external sheet',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
            ),
        ),
        array (
            'default_value' => '',
            'maxlength' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'key' => 'field_5892201237ede',
            'label' => 'Headline Font Family',
            'name' => 'headline_font_family',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => '50',
                'class' => '',
                'id' => '',
            ),
        ),
        array (
            'default_value' => '',
            'maxlength' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'key' => 'field_5892201f37edf',
            'label' => 'Headline Font Weight',
            'name' => 'headline_font_weight',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => '50',
                'class' => '',
                'id' => '',
            ),
        ),
        array (
            'default_value' => '',
            'maxlength' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'key' => 'field_5892202837ee0',
            'label' => 'Body Font Family',
            'name' => 'body_font_family',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => '50',
                'class' => '',
                'id' => '',
            ),
        ),
        array (
            'default_value' => '',
            'maxlength' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'key' => 'field_5892202f37ee1',
            'label' => 'Body Font Weight',
            'name' => 'body_font_weight',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => '50',
                'class' => '',
                'id' => '',
            ),
        ),
    ),
    'location' => array (
        array (
            array (
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'admin-settings',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => 1,
    'description' => '',
));

endif;
}


add_action( 'admin_head', 'client_logos' );
add_action( 'login_head', 'client_logos' );
function client_logos() {
    include( 'admin/css/style.php' );
}


function remove_menus(){

//  remove_menu_page( 'index.php' );                  //Dashboard
//  remove_menu_page( 'jetpack' );                    //Jetpack*
//  remove_menu_page( 'edit.php' );                   //Posts
//  remove_menu_page( 'upload.php' );                 //Media
//  remove_menu_page( 'edit.php?post_type=page' );    //Pages
  remove_menu_page( 'edit-comments.php' );          //Comments
//  remove_menu_page( 'themes.php' );                 //Appearance
//  remove_menu_page( 'plugins.php' );                //Plugins
//  remove_menu_page( 'users.php' );                  //Users
//  remove_menu_page( 'tools.php' );                  //Tools
//  remove_menu_page( 'options-general.php' );        //Settings

}
add_action( 'admin_menu', 'remove_menus' );


add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

global $wp_version; if( $wp_version == '4.7' || ( (float) $wp_version < 4.7 ) ) { return $data; }

$filetype = wp_check_filetype( $filename, $mimes );

return [ 'ext' => $filetype['ext'], 'type' => $filetype['type'], 'proper_filename' => $data['proper_filename'] ];

}, 10, 4 );

function cc_mime_types( $mimes ){ $mimes['svg'] = 'image/svg+xml'; return $mimes; } add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg() { echo '<style> .attachment-266×266, .thumbnail img { } </style>'; } add_action( 'admin_head', 'fix_svg' );

//add_filter('get_user_option_admin_color', 'change_admin_color');
//function change_admin_color($result) {
//return 'midnight';
//}

require_once(ABSPATH . 'wp-admin/includes/plugin.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
if (file_exists(WP_PLUGIN_DIR . '/hello.php'))
  delete_plugins(array('hello.php'));


$post = get_page_by_path('hello-world',OBJECT,'post');
if ($post)
  wp_delete_post($post->ID,true);


$post = get_page_by_path('sample-page',OBJECT,'page');
if ($post)
  wp_delete_post($post->ID,true);

add_filter('gettext', 'change_howdy', 10, 3);

function change_howdy($translated, $text, $domain) {

    if (!is_admin() || 'default' != $domain)
        return str_replace('Howdy', 'Hay 👋', $translated);

    if (false !== strpos($translated, 'Howdy'))
        return str_replace('Howdy', 'Hay 👋', $translated);

    return $translated;
}


function register_my_menu() {
  register_nav_menu('main',__( 'Main Menu' ));
  register_nav_menu('action',__( 'Action Links' ));
  register_nav_menu('full-one',__( 'Full Menu' ));
  register_nav_menu('full-mobile',__( 'Mobile Home Menu' ));
  register_nav_menu('mobile',__( 'Mobile Main Menu' ));
  register_nav_menu('footer',__( 'Footer' ));

}
add_action( 'init', 'register_my_menu' );

add_image_size( 'banner',1800,9999999999999 );


//
//add_action( 'after_setup_theme', 'woocommerce_support' );
//function woocommerce_support() {
//    add_theme_support( 'woocommerce' );
//}
class GFLimitCheckboxes {

    private $form_id;
    private $field_limits;
    private $output_script;

    function __construct($form_id, $field_limits) {

        $this->form_id = $form_id;
        $this->field_limits = $this->set_field_limits($field_limits);

        add_filter("gform_pre_render_$form_id", array(&$this, 'pre_render'));
        add_filter("gform_validation_$form_id", array(&$this, 'validate'));

    }

    function pre_render($form) {

        $script = '';
        $output_script = false;

        foreach($form['fields'] as $field) {

            $field_id = $field['id'];
            $field_limits = $this->get_field_limits($field['id']);

            if( !$field_limits                                          // if field limits not provided for this field
                || RGFormsModel::get_input_type($field) != 'checkbox'   // or if this field is not a checkbox
                || !isset($field_limits['max'])        // or if 'max' is not set for this field
                )
                continue;

            $output_script = true;
            $max = $field_limits['max'];
            $selectors = array();

            foreach($field_limits['field'] as $checkbox_field) {
                $selectors[] = "#field_{$form['id']}_{$checkbox_field} .gfield_checkbox input:checkbox";
            }

            $script .= "jQuery(\"" . implode(', ', $selectors) . "\").checkboxLimit({$max});";

        }

        GFFormDisplay::add_init_script($form['id'], 'limit_checkboxes', GFFormDisplay::ON_PAGE_RENDER, $script);

        if($output_script):
            ?>


<?php
        endif;

        return $form;
    }

    function validate($validation_result) {

        $form = $validation_result['form'];
        $checkbox_counts = array();

        // loop through and get counts on all checkbox fields (just to keep things simple)
        foreach($form['fields'] as $field) {

            if( RGFormsModel::get_input_type($field) != 'checkbox' )
                continue;

            $field_id = $field['id'];
            $count = 0;

            foreach($_POST as $key => $value) {
                if(strpos($key, "input_{$field['id']}_") !== false)
                    $count++;
            }

            $checkbox_counts[$field_id] = $count;

        }

        // loop through again and actually validate
        foreach($form['fields'] as &$field) {

            if(!$this->should_field_be_validated($form, $field))
                continue;

            $field_id = $field['id'];
            $field_limits = $this->get_field_limits($field_id);

            $min = isset($field_limits['min']) ? $field_limits['min'] : false;
            $max = isset($field_limits['max']) ? $field_limits['max'] : false;

            $count = 0;
            foreach($field_limits['field'] as $checkbox_field) {
                $count += rgar($checkbox_counts, $checkbox_field);
            }

            if($count < $min) {
                $field['failed_validation'] = true;
                $field['validation_message'] = sprintf( _n('You must select at least %s item.', 'You must select at least %s items.', $min), $min );
                $validation_result['is_valid'] = false;
            }
            else if($count > $max) {
                $field['failed_validation'] = true;
                $field['validation_message'] = sprintf( _n('You may only select %s item.', 'You may only select %s items.', $max), $max );
                $validation_result['is_valid'] = false;
            }

        }

        $validation_result['form'] = $form;

        return $validation_result;
    }

    function should_field_be_validated($form, $field) {

        if( $field['pageNumber'] != GFFormDisplay::get_source_page( $form['id'] ) )
            return false;

        // if no limits provided for this field
        if( !$this->get_field_limits($field['id']) )
            return false;

        // or if this field is not a checkbox
        if( RGFormsModel::get_input_type($field) != 'checkbox' )
            return false;

        // or if this field is hidden
        if( RGFormsModel::is_field_hidden($form, $field, array()) )
            return false;

        return true;
    }

    function get_field_limits($field_id) {

        foreach($this->field_limits as $key => $options) {
            if(in_array($field_id, $options['field']))
                return $options;
        }

        return false;
    }

    function set_field_limits($field_limits) {

        foreach($field_limits as $key => &$options) {

            if(isset($options['field'])) {
                $ids = is_array($options['field']) ? $options['field'] : array($options['field']);
            } else {
                $ids = array($key);
            }

            $options['field'] = $ids;

        }

        return $field_limits;
    }

}

new GFLimitCheckboxes(1, array(
    35 => array(
        'max' => 5
        ),
    38 => array(
        'max' => 5
        )
    ));
new GFLimitCheckboxes(2, array(
    35 => array(
        'max' => 5
        ),
    38 => array(
        'max' => 5
        )
    ));


//function admin_default_page() {
//  return '/survey';
//}
//
//add_filter('login_redirect', 'admin_default_page');

// Disable Gravity forms jump on submission

//add_filter("gform_confirmation_anchor", create_function("", "return false;"));

//add_filter( 'gform_confirmation_anchor', '__return_true' );



add_filter( 'allow_dev_auto_core_updates', '__return_false' );
add_filter( 'auto_update_core', '__return_true' );
add_filter( 'auto_core_update_send_email', '__return_false' );
add_filter( 'auto_update_plugin', '__return_true' );



//$ref = $_SERVER['HTTP_REFERER'];
//$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
//
//
//if(strpos($url,'wp-login.php?action=register') == true){
//
//if ((strpos($ref,'survey') == true && strpos($url,'wp-login.php?action=register') == true) || (strpos($ref,'wp-login.php?action=register') == true && strpos($url,'wp-login.php?action=register') == true)) {
//// You're good to go...
//
//
//
//} else {
//
//
//        header('Location: /wp-login.php?registration=disabled');
//
//
//
//}



//if (strpos($url,'wp-login.php?action=register') == true) {


//}

//}
function onpu_redirect_users_by_role() {

    if ( ! defined( 'DOING_AJAX' ) ) {

        $current_user   = wp_get_current_user();
        $role_name      = $current_user->roles[0];

        if ( $role_name == 'subscriber') {
            wp_redirect( site_url() . '/onepulse-foundation-memorial/memorial-process/ideas-generator/' );
        } // if $role_name

    } // if DOING_AJAX

} // cm_redirect_users_by_role
add_action( 'admin_init', 'onpu_redirect_users_by_role' );


//Google Maps ACF API Key

function my_acf_init() {

    acf_update_setting('google_api_key', 'AIzaSyDPEOw-wsN277jVGGNYmNtqG6SuI768IUk');
}

add_action('acf/init', 'my_acf_init');

//Google Maps API Key

function googlemaps_load_scripts()
{
    wp_register_script('googlemaps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDPEOw-wsN277jVGGNYmNtqG6SuI768IUk', null, null, false);
    wp_enqueue_script('googlemaps');
}
add_action('wp_enqueue_scripts', 'googlemaps_load_scripts');

function posts_orderby_lastname ($orderby_statement)
{
  $orderby_statement = "RIGHT(post_title, LOCATE(' ', REVERSE(post_title)) - 1) ASC";
    return $orderby_statement;
}

function ga_event_registration() {

$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

if (strpos($url,'wp-login.php?checkemail=registered') == true) {?>

<script>
  (function($) {

    'use strict';

    if ((document.location.href.indexOf('staging') === -1 || document.location.href.indexOf('dev') === -1)) {

      (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
          (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
          m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
      })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

      ga('create', 'UA-97989536-1', 'auto');
      ga('send', 'pageview');

      if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {

        ga('send', {
          hitType: 'event',
          eventCategory: 'User Registration Success - Mobile',
          eventAction: 'registration'
        });

      } else {

        ga('send', {
          hitType: 'event',
          eventCategory: 'User Registration Success - Desktop',
          eventAction: 'registration'
        });

      }
      console.log('User registration');
    }

    //            }

  })(jQuery);

</script>

<?php } }
add_action( 'login_head', 'ga_event_registration' );

//add_filter('rest_enabled', '_return_false');
//add_filter('rest_jsonp_enabled', '_return_false');

add_action("gform_after_submission_5", "gf_ga_tracking", 1, 2);
function gf_ga_tracking($entry, $form) {
    ?>
<?php

      $url = site_url();
      $array = array('local', 'staging', 'localhost', 'dev');

      if ((findenv($url, $array) === false)):?>
<!-- Twitter single-event website tag code -->
<script src="//platform.twitter.com/oct.js" type="text/javascript"></script>
<script type="text/javascript">
  twttr.conversion.trackPid('nzvlc', {
    tw_sale_amount: 0,
    tw_order_quantity: 0
  });

</script>
<noscript>
  <img height="1" width="1" style="display:none;" alt="" src="https://analytics.twitter.com/i/adsct?txn_id=nzvlc&p_id=Twitter&tw_sale_amount=0&tw_order_quantity=0" />
  <img height="1" width="1" style="display:none;" alt="" src="//t.co/i/adsct?txn_id=nzvlc&p_id=Twitter&tw_sale_amount=0&tw_order_quantity=0" />
</noscript>

<script type="text/javascript">
  ! function(f, b, e, v, n, t, s) {
    if (f.fbq) return;
    n = f.fbq = function() {
      n.callMethod ?
        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
    };
    if (!f._fbq) f._fbq = n;
    n.push = n;
    n.loaded = !0;
    n.version = '2.0';
    n.queue = [];
    t = b.createElement(e);
    t.async = !0;
    t.src = v;
    s = b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t, s)
  }(window,
    document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '334045860378572'); // Insert your pixel ID here.
  fbq('track', 'IdeaSubmission');

  (function(i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r;
    i[r] = i[r] || function() {
      (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date();
    a = s.createElement(o),
      m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
  })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

  ga('create', 'UA-97989536-1', 'auto');
  ga('send', 'event', 'Idea Submission');
  console.log('Submission Complete');

</script>

<?php endif;?>


<?php }


//Map Shortcode

function onpu_map()
{

  $html = '<div id="map"></div>';
  return $html;
}
add_shortcode( 'map', 'onpu_map');

//Line Shortcode

function onpu_line()
{

  $html = '<div class="line"></div>';
  return $html;
}
add_shortcode( 'line', 'onpu_line');




function selection_jury(){

ob_start();

?>


<?php if( have_rows('jury') ):?>


<div class="row jury">
  <?php while ( have_rows('jury') ) : the_row();?>
  <div class="col-6 col-sm-4 col-md-3 col-25">
    <div class="inner-card">

      <?php if(get_sub_field('member_image')):

    $image = get_sub_field('member_image')['sizes']['large'];

    else:

    $image = 'https://ctvalleybrewing.com/wp-content/uploads/2017/04/avatar-placeholder.png';


    endif;
    ?>

      <img src="<?php echo $image;?>" class="headshot">
      <h5>
        <?php the_sub_field('member_name');?>
      </h5>
      <p><strong>
          <?php the_sub_field('member_title');?></strong></p>
    </div>
  </div>
<?php endwhile; ?>
</div>


<?php endif; ?>

<?php }
add_shortcode( 'selection-jury', 'selection_jury');


function rfq_faq(){

ob_start();

?>



    <div aria-label="faq-nav" class="rfq-faq">

        <?php if( have_rows('categories') ):?>

        <h4>Q + A</h4>

        <?php while ( have_rows('categories') ) : the_row();?>

        <h5 class="mt-3 mb-2"><?php echo get_sub_field('category');?></h5>

        <?php if( have_rows('item') ):?>

        <?php while ( have_rows('item') ) : the_row();?>


        <div class="row faq-item" tabindex="<?php echo $i++;?>">

                <div class="col-lg-12 col-md-12 col-11 mx-auto">



                    <div class="">
                        <a href="#" class="question"><?php echo get_sub_field('question');?></a>

                        <div class="answer mt-1" id="">
                        <?php echo get_sub_field('answer');?>
                        </div>
                    </div>
            </div>
        </div>

    <?php endwhile; endif;?>


    <?php endwhile; endif;?>

    </div>




<?php }

add_shortcode( 'rfq-faq', 'rfq_faq');

// Callback function to insert 'styleselect' into the $buttons array
function my_mce_buttons_2( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
// Register our callback to the appropriate filter
add_filter('mce_buttons_2', 'my_mce_buttons_2');


// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {
    // Define the style_formats array
    $style_formats = array(
        // Each array child is a format with it's own settings
        array(
            'title' => 'Blue Text',
            'selector' => 'h1,h2,h3,h4,h5',
            'classes' => 'blue clip'
        ),
        array(
            'title' => 'Button',
            'selector' => 'a',
            'classes' => 'btn'
        ),
        array(
            'title' => 'Button (left)',
            'selector' => 'a',
            'classes' => 'btn left'
        ),
        array(
            'title' => 'Button (right)',
            'selector' => 'a',
            'classes' => 'btn right'
        ),
        array(
            'title' => 'ROYGBIV Text',
            'selector' => 'p, h1,h2,h3,h4,h5',
            'classes' => 'roygbiv'
        ),
        array(
            'title' => 'Large paragraph text',
            'selector' => 'p',
            'classes' => 'large'
        )
    );
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );

    return $init_array;

}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );


/**
 * Disable the emoji's
 */
function disable_emojis() {
 remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
 remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
 remove_action( 'wp_print_styles', 'print_emoji_styles' );
 remove_action( 'admin_print_styles', 'print_emoji_styles' );
 remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
 remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
 remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
 add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
 add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 *
 * @param array $plugins
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
 if ( is_array( $plugins ) ) {
 return array_diff( $plugins, array( 'wpemoji' ) );
 } else {
 return array();
 }
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
 if ( 'dns-prefetch' == $relation_type ) {
 /** This filter is documented in wp-includes/formatting.php */
 $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

$urls = array_diff( $urls, array( $emoji_svg_url ) );
 }

return $urls;
}

add_image_size( 'slide-gallery', 560, 999999 );


add_filter('filter_entries','add_entry_id' );
function add_entry_id($entries) {
    foreach ($entries as &$entry) {
        $entry["14"] = $entry["id"];

        $date = $entry["date_created"];
        $date1 = explode(' ', $date);
        $date2 = $date1[0];
        $dateConverted = date("M d, Y", strtotime($date2));
        $entry["16"] = $dateConverted;
    }
    return $entries;
}
    add_filter("gform_confirmation_anchor", create_function("","return 0;"));

//Approve Entries with Star
add_filter('filter_entries','show_only_approved' );
function show_only_approved($entries) {
    foreach ($entries as $entryKey => &$entry) {
        if ($entry["is_starred"] == 0) {
            unset($entries[$entryKey]);
        }
    }
    return $entries;
}
//Approve Entries with Approved Field
//add_filter('filter_entries','show_only_approved' );
//function show_only_approved($entries) {
//    foreach ($entries as $entryKey => &$entryValue) {
//        if ($entryValue["5.1"] == null) {
//            unset($entries[$entryKey]);
//        }
//    }
//    return $entries;
//}


add_filter( 'gform_init_scripts_footer', '__return_true' );
add_filter( 'gform_cdata_open', 'wrap_gform_cdata_open', 1 );
function wrap_gform_cdata_open( $content = '' ) {
if ( ( defined('DOING_AJAX') && DOING_AJAX ) || isset( $_POST['gform_ajax'] ) ) {
return $content;
}
$content = 'document.addEventListener( "DOMContentLoaded", function() { ';
return $content;
}
add_filter( 'gform_cdata_close', 'wrap_gform_cdata_close', 99 );
function wrap_gform_cdata_close( $content = '' ) {
if ( ( defined('DOING_AJAX') && DOING_AJAX ) || isset( $_POST['gform_ajax'] ) ) {
return $content;
}
$content = ' }, false );';
return $content;
}



function registration_form( $username, $password, $email, $first_name, $last_name, $address, $city, $state, $zip, $country ) {
    echo '
    <form class="im-reg" action="' . $_SERVER['REQUEST_URI'] . '" method="post">
    <div class="row">
      <div class="col-md-12">
        <h3>Account Information</h3>
      </div>
      <div class="col-md-7">
        <input type="text" name="username" placeholder="Username *" value="' . ( isset( $_POST['username'] ) ? $username : null ) . '" required>
      </div>
      <div class="col-md-7">
        <input type="password" name="password" placeholder="Password *" value="' . ( isset( $_POST['password'] ) ? $password : null ) . '" required>
      </div>
    </div>

    <div class="line mt-3"></div>

    <div class="row mt-3">
      <div class="col-md-12">
        <h3>Personal Information</h3>

      </div>
      <div class="col-md-7">
      <input type="text" name="fname" placeholder="First Name *" value="' . ( isset( $_POST['fname']) ? $first_name : null ) . '" required>
      </div>
      <div class="col-md-7">
      <input type="text" name="lname" placeholder="Last Name *" value="' . ( isset( $_POST['lname']) ? $last_name : null ) . '" required>
      </div>
      <div class="col-md-7">
        <input type="text" name="email" placeholder="Email Address *" value="' . ( isset( $_POST['email']) ? $email : null ) . '" required>

      </div>
    </div>
    <div class="line mt-3"></div>

    <div class="row mt-3">
      <div class="col-md-12">

        <h3>Address Information</h3>

        <input type="text" class="field" placeholder="Address *" name="field_5b2a819aabefe" value="' . ( isset( $_POST['field_5b2a819aabefe']) ? $address : null ) . '" required>

      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <input type="text" class="field" placeholder="City *" name="field_5b2a81a4abeff" value="' . ( isset( $_POST['field_5b2a81a4abeff']) ? $city : null ) . '" required>
      </div>
      <div class="col-md-4">
        <input type="text" class="field" placeholder="State or Region *" name="field_5b2a81adabf01" value="' . ( isset( $_POST['field_5b2a81adabf01']) ? $state : null ) . '" required>
      </div>
      <div class="col-md-4">
        <input type="text" class="field" placeholder="Zip *" name="field_5b2a81adabf00" value="' . ( isset( $_POST['field_5b2a81adabf00']) ? $zip : null ) . '" required>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <input type="text" class="field" placeholder="Country *" name="field_5b2a81bdabf02" value="' . ( isset( $_POST['field_5b2a81bdabf02']) ? $country : null ) . '" required>
      </div>
    </div>
    <input class="btn left" type="submit" name="submit" value="Register"/>
    </form>
    ';
}


function registration_validation( $username, $password, $email, $first_name, $last_name, $address, $city, $state, $zip, $country )  {
      global $reg_errors;
      $reg_errors = new WP_Error;
      if ( empty( $username) || empty( $password ) || empty( $email ) || empty( $address ) || empty( $city ) || empty( $state ) || empty( $zip ) || empty( $country ) ) {
      $reg_errors->add('field', 'Required form field is missing');
      }
      if ( 4 > strlen( $username ) ) {
      $reg_errors->add( 'username_length', 'Username too short. At least 4 characters is required' );
      }
      if ( username_exists( $username ) )
      $reg_errors->add('user_name', 'Sorry, that username already exists!');
      if ( ! validate_username( $username ) ) {
      $reg_errors->add( 'username_invalid', 'Sorry, the username you entered is not valid' );
      }
      if ( 5 > strlen( $password ) ) {

      $reg_errors->add( 'password', 'Password length must be greater than 5' );

      }
      if ( !is_email( $email ) ) {
      $reg_errors->add( 'email_invalid', 'Email is not valid' );
      }
      if ( email_exists( $email ) ) {
      $reg_errors->add( 'email', 'Email Already in use' );
      }
      if ( is_wp_error( $reg_errors ) ) {
      foreach ( $reg_errors->get_error_messages() as $error ) {
      echo '<div>';
      echo '<strong>ERROR</strong>:';
      echo $error . '<br/>';
      echo '</div>';
      }
      }
}

function complete_registration() {
    global $reg_errors, $username, $password, $email, $first_name, $last_name, $address, $city, $state, $zip, $country;
    if ( 1 > count( $reg_errors->get_error_messages() ) ) {
        $userdata = array(
        'user_login'    =>   $username,
        'user_email'    =>   $email,
        'user_pass'     =>   $password,
        'first_name'    =>   $first_name,
        'last_name'     =>   $last_name,
//        'field_5b2a819aabefe'       =>   $address,
//        'field_5b2a81a4abeff'          =>   $city,
//        'field_5b2a81adabf01'         =>   $state,
//        'field_5b2a81adabf00'           =>   $zip,
//        'field_5b2a81bdabf02'       =>   $country,
        );
        $user = wp_insert_user( $userdata );

        if ( isset( $_POST['field_5b2a819aabefe'] ) )
            update_user_meta($user, 'address', $_POST['field_5b2a819aabefe']);
        if ( isset( $_POST['field_5b2a81a4abeff'] ) )
            update_user_meta($user, 'city', $_POST['field_5b2a81a4abeff']);
        if ( isset( $_POST['field_5b2a81adabf01'] ) )
            update_user_meta($user, 'state', $_POST['field_5b2a81adabf01']);
        if ( isset( $_POST['field_5b2a81adabf00'] ) )
            update_user_meta($user, 'zip', $_POST['field_5b2a81adabf00']);
        if ( isset( $_POST['field_5b2a81bdabf02'] ) )
            update_user_meta($user, 'country', $_POST['field_5b2a81bdabf02']);


        echo '<p class="user-login-label success">Registration complete. <a href="#">Click here to log in.</a></p>';?>

<script>
  (function($) {

    'use strict';

    $(window).load(function() {
      <?php



              $url = site_url();
              $array = array('local', 'staging', 'localhost', 'dev');

              if ((findenv($url, $array) === false)):?>
      ga('send', 'event', 'User Registration');
      fbq('track', 'CompleteRegistration');
      twq('track', 'CompleteRegistration');
      <?php endif;?>

      jQuery('.im-reg, .user-login-label').not('.success').remove();

    })
  })(jQuery);

</script>
<?php
    }
}

function custom_registration_function() {
    if ( isset($_POST['submit'] ) ) {
        registration_validation(
        $_POST['username'],
        $_POST['password'],
        $_POST['email'],
        $_POST['fname'],
        $_POST['lname'],
        $_POST['field_5b2a819aabefe'],
        $_POST['field_5b2a81a4abeff'],
        $_POST['field_5b2a81adabf01'],
        $_POST['field_5b2a81adabf00'],
        $_POST['field_5b2a81bdabf02']
        );

        // sanitize user form input
        global $username, $password, $email, $first_name, $last_name, $address, $city, $state, $zip, $country;
        $username   =   sanitize_user( $_POST['username'] );
        $password   =   esc_attr( $_POST['password'] );
        $email      =   sanitize_email( $_POST['email'] );
        $first_name =   sanitize_text_field( $_POST['fname'] );
        $last_name  =   sanitize_text_field( $_POST['lname'] );
        $address    =   sanitize_text_field( $_POST['field_5b2a819aabefe'] );
        $city       =   sanitize_text_field( $_POST['field_5b2a81a4abeff'] );
        $state      =   sanitize_text_field( $_POST['field_5b2a81adabf01'] );
        $zip        =   sanitize_text_field( $_POST['field_5b2a81adabf00'] );
        $country    =   sanitize_text_field( $_POST['field_5b2a81bdabf02'] );

        // call @function complete_registration to create the user
        // only when no WP_error is found
        complete_registration(
        $username,
        $password,
        $email,
        $first_name,
        $last_name,
        $address,
        $city,
        $state,
        $zip,
        $country
        );
    }

    registration_form(
        $username,
        $password,
        $email,
        $first_name,
        $last_name,
        $address,
        $city,
        $state,
        $zip,
        $country
        );
}


// Register a new shortcode: [cr_custom_registration]
add_shortcode( 'cr_custom_registration', 'custom_registration_shortcode' );

// The callback function that will replace [book]
function custom_registration_shortcode() {
    ob_start();
    custom_registration_function();
    return ob_get_clean();
}


function so174837_registration_email_alert( $user_id ) {
    $user    = get_userdata( $user_id );
    $email   = $user->user_email;
    $username   = $user->user_login;
    $name   = $user->first_name;
    $site   = site_url();
    $message = $name . ',<br><br>
    Thank You for registering for the Pulse Memorial Ideas Generator.<br><br>
    Please login to create an submission.<br><br>
    <a href="' . $site . '/onepulse-foundation-memorial/memorial-process/ideas-generator/create-submission#login">Login</a><br><br>
    Username: ' . $username . '';

    wp_mail( $email, 'New User Registration: Pulse Memorial Ideas Generator', $message );
}
add_action('user_register', 'so174837_registration_email_alert');

function findenv($haystack, $needle, $offset=0) {
  if(!is_array($needle)) $needle = array($needle);
  foreach($needle as $query) {
      if(strpos($haystack, $query, $offset) !== false) return true; // stop on first true result
  }
  return false;
}



function _remove_script_version( $src ){
$parts = explode( '?ver', $src );
return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );


add_filter( 'gform_confirmation_anchor', '__return_false' );
