<?

// Activate Custom Menus
add_theme_support( 'menus' );

// Activate default posts and comments RSS feed links in head
add_theme_support( 'automatic-feed-links' );

// Add options page
if(function_exists('register_options_page')) {
   register_options_page('Background Images');
   register_options_page('Footer');
}

// Activate Featured Images
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 136, 136, true );
add_image_size( 'primary', 940, 560 );

// Tidy the <head>
remove_action('wp_head', 'feed_links_extra');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');
remove_action('wp_head', 'wp_generator');

// Create post formats
add_theme_support( 'post-formats', array( 'video', 'gallery' ) );

// Create post formats for training
//add_post_type_support( 'training', 'post-formats' );

// Create custom post types
add_action( 'init', 'create_my_post_types' );

function create_my_post_types() {

   register_post_type( 'training',
      array(
         'labels' => array(
            'name' => __( 'Training' ),
            'singular_name' => __( 'Training Event' ),
            'add_new' => __('Add Training Event')
         ),
         'public' => true,
         'has_archive' => true,
         'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' )
      )
   ); 
   
   register_post_type( 'member',
      array(
         'labels' => array(
            'name' => __( 'Team Members' ),
            'singular_name' => __( 'Team Member' ),
            'add_new' => __('Add Team Member')
         ),
         'public' => true,
         'has_archive' => true,
         'rewrite' => array('slug' => 'team-members'),
         'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' )
      )
   );
}

// Add date picker custom field
if(function_exists('register_field')) {
  register_field('acf_time_picker', dirname(__File__) . '/acf_time_picker/acf_time_picker.php');
}

// Add Google maps custom field
include_once( rtrim( dirname( __FILE__ ), '/' ) . '/acf-location-field/location-field.php' );

?>