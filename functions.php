<?php
/**
 * Website functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package website
 */
function website_setup() {
  /*
   * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Histoires de Musique, use a find and replace
	 * to change 'hdm' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'website', get_template_directory() . '/languages' );

  // Add default posts and comments RSS feed links to head.
  add_theme_support( 'automatic-feed-links' );

  /*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
  add_theme_support( 'title-tag' );

  /*
   * Enable support for Post Thumbnails on posts and pages.
   *
   * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
   */
  add_theme_support( 'post-thumbnails' );
  add_image_size( 'thumb-list', 900, 450, true );
  add_image_size( 'thumb-list-small', 600, 300, true );
  add_image_size( 'thumb-vertical', 470, 560, true );

  // This theme uses wp_nav_menu() in one location.
  register_nav_menus( array(
    'primary-nav' => esc_html__( 'Primary navigation', 'website' ),
    'footer-nav' => esc_html__( 'Footer navigation', 'website' ),
    'footer-nav-2' => esc_html__( 'Footer navigation 2', 'website' ),
  ) );

  /*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
   */
  add_theme_support( 'html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ) );
}

add_action( 'after_setup_theme', 'website_setup' );

/**
 * Embed custom fonts
 */
 
function website_add_custom_fonts() {
 
  wp_enqueue_style( 'website-google-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,600;0,700;1,300&display=swap', false );
  
}
 
add_action( 'wp_enqueue_scripts', 'website_add_custom_fonts' );

/**
 * Admin favicon
 * @link https://cnpagency.com/blog/how-to-use-favicons-on-the-wordpress-admin-login-pages/
 */

// First, create a function that includes the path to your favicon
function add_favicon() {
  	$favicon_url = get_stylesheet_directory_uri() . '/assets/img/favicon/favicon.ico';
	echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
}
  
// Now, just make sure that function runs when you're on the login page and admin pages  
add_action('login_head', 'add_favicon');
add_action('admin_head', 'add_favicon');

/**
 * Add "category" taxonomy to pages
 */

function add_taxonomies_to_pages() {
  register_taxonomy_for_object_type( 'category', 'page' );
}
add_action( 'init', 'add_taxonomies_to_pages' );

/**
 * Add excerpt support to pages
 * @link http://www.wpbeginner.com/plugins/add-excerpts-to-your-pages-in-wordpress/
 */

add_post_type_support( 'page', 'excerpt' );

/**
 * Remove the additional CSS section, introduced in 4.7, from the Customizer.
 * @param $wp_customize WP_Customize_Manager
 * @link https://robincornett.com/additional-css-wordpress-customizer/
 */

add_action( 'customize_register', 'prefix_remove_css_section', 15 );

function prefix_remove_css_section( $wp_customize ) {
	$wp_customize->remove_section( 'custom_css' );
}

/**
 * Allow editors to see Appearance menu
 * @link https://wordpress.stackexchange.com/questions/4191/allow-editors-to-edit-menus
 */

$role_object = get_role( 'editor' );
$role_object->add_cap( 'edit_theme_options' );

/**
 * Remove the 'Themes' submenu page for everyone but the 'admin'.
 *
 * @link https://codex.wordpress.org/Function_Reference/wp_get_current_user
 * @link http://codex.wordpress.org/Function_Reference/remove_submenu_page
 * @link https://catapultthemes.com/get-current-user-role-in-wordpress/
 *
 * @return void
 */
function remove_theme_submenu_except_admin() {
  $current_user = wp_get_current_user();
  $current_role = ( array ) $current_user->roles;
  
  // Hide customize page
  global $submenu;
  unset($submenu['themes.php'][6]);
  unset($submenu['themes.php'][15]);
  unset($submenu['themes.php'][16]);

  if ( isset($current_role) && $current_role[0] !== 'administrator') {
    remove_submenu_page('themes.php', 'themes.php');
    remove_submenu_page('themes.php', 'theme-editor.php');
  }
}
add_action('admin_init', 'remove_theme_submenu_except_admin', 100);

/**
 * Enqueue block editor style
 */
function website_block_editor_styles() {
    wp_enqueue_style( 'website-editor-styles', get_theme_file_uri( '/assets/css/gutenberg-editor.css' ), false, '1.0', 'all' );
}
add_action( 'enqueue_block_editor_assets', 'website_block_editor_styles' );

// Remove empty <p> tags

function remove_empty_p($content){
  $content = force_balance_tags($content);
  return preg_replace('#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content);
}

add_filter('the_content', 'remove_empty_p', 10000000000000, 1);
add_filter('widget_text_content', 'remove_empty_p', 10000000000000, 1);

function wpex_clean_shortcodes($content){   
$array = array (
    '<p>[' => '[', 
    ']</p>' => ']', 
    ']<br />' => ']'
);
$content = strtr($content, $array);
return $content;
}
add_filter('the_content', 'wpex_clean_shortcodes');
add_filter('widget_text_content', 'wpex_clean_shortcodes');

/**
 * Enqueue scripts and styles.
 */
function website_scripts() {
  
	wp_enqueue_style( 'custom-style', get_stylesheet_uri() );
	
  wp_enqueue_style( 'stylisticss', get_template_directory_uri() . '/assets/css/stylisticss.min.css' );
        
  wp_enqueue_script( 'custom-scripts', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), null , true );
  wp_enqueue_style( 'custom-styles', get_template_directory_uri() . '/assets/css/theme.min.css' );
}

add_action( 'wp_enqueue_scripts', 'website_scripts' );
//add_image_size('medium-crop', 300, 300, true);

/**
 * Custom excerpt
 * @link https://gist.github.com/simonpioli/5833466
 */

function custom_excerpt($new_length = 20, $new_more = '…') {
  add_filter('excerpt_length', function () use ($new_length) {
    return $new_length;
  }, 999);
  add_filter('excerpt_more', function () use ($new_more) {
    return $new_more;
  });
  $output = get_the_excerpt();
  $output = apply_filters('wptexturize', $output);
  $output = apply_filters('convert_chars', $output);
  echo $output;
}

/**
 * Disable editor
 */

require get_template_directory() . '/inc/disable-editor.php';

/**
 * ACF Fields
 */

require get_template_directory() . '/inc/acf-fields.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
* Validation CORS
*/
function initCors( $value ) {
  $origin_url = '*';

  // Check if production environment or not
  if (ENVIRONMENT === 'production') {
    $origin_url = 'https://linguinecode.com';
  }

  header( 'Access-Control-Allow-Origin: ' . $origin_url );
  header( 'Access-Control-Allow-Methods: GET' );
  header( 'Access-Control-Allow-Credentials: true' );
  return $value;
}

add_filter('show_admin_bar', '__return_false');
add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('use_block_editor_for_post_type', '__return_false', 10);

// CPT Projets
function register_cpt_project() {
    $labels = array(
        'name'          => 'Projets',
        'all_items'     => 'Tous les projets',
        'singular_name' => 'Projet',
        'add_new_item'  => 'Ajouter un projet',
        'edit_item'     => "Modifier un projet",
        'menu_name'     => 'Projets',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_in_rest'       => true,
        'has_archive'        => false,
        'supports'           => array('title', 'editor'),
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-admin-post',
        'rewrite'            => array('slug' => 'projets'),
        'show_in_nav_menus'  => true,
    );

    register_post_type('cpt-project', $args);

    // Taxonomy Type de projet
    register_taxonomy(
        'type-projet',
        'cpt-project',
        array(
            'label'        => 'Type de projet',
            'hierarchical' => true, // true = catégories (avec hiérarchie), false = tags
            'show_in_rest' => true,
            'rewrite'      => array('slug' => 'type-projet'),
        )
    );

    // Taxonomy Status
    register_taxonomy(
        'status-projet',
        'cpt-project',
        array(
            'label'        => 'Status',
            'hierarchical' => true,
            'show_in_rest' => true,
            'rewrite'      => array('slug' => 'status-projet'),
        )
    );
}
add_action('init', 'register_cpt_project');