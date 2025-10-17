<?php

/**
 * Page d'options
 */

if( function_exists( 'acf_add_options_page' ) ) {

  acf_add_options_page( array(
    'page_title' 	=> 'Informations de contact',
    'menu_title'	=> 'Infos de contact',
    'menu_slug' 	=> 'contact-info',
    'capability'	=> 'edit_posts',
    'icon_url' 		=> 'dashicons-email',
    'position'    	=> 2
  ) );
  
  /*
  acf_add_options_page( array(
    'page_title' 	=> 'Options du site',
    'menu_title'	=> 'Options',
    'menu_slug' 	=> 'site-options',
    'capability'	=> 'edit_posts',
    'icon_url' 		=> 'dashicons-edit',
    'position'    	=> 2
  ) );
  */
}

/**
 * Customize ACF wysiwyg toolbar
 * 
 * @link https://www.advancedcustomfields.com/resources/customize-the-wysiwyg-toolbars/
 */

add_filter( 'acf/fields/wysiwyg/toolbars' , 'custom_toolbars'  );
function custom_toolbars( $toolbars ) {

  // Add a new toolbar called "Custom"
  // - this toolbar has only 1 row of buttons
  $toolbars['Custom' ] = array();
  $toolbars['Custom' ][1] = array('formatselect', 'bold' , 'italic' , 'underline', 'bullist', 'numlist', 'undo', 'redo', 'link', 'unlink','hr', 'pastetext', 'removeformat'  );
  $toolbars['Minimal' ] = array();
  $toolbars['Minimal' ][1] = array('bold' , 'italic' , 'undo', 'redo', 'link', 'unlink', 'removeformat'  );

  // return $toolbars - IMPORTANT!
  return $toolbars;
}

if( function_exists('acf_add_local_field_group') ) {

  require get_template_directory() . '/inc/acf/acf-homepage.php';
  //require get_template_directory() . '/inc/acf/acf-options.php';
  //require get_template_directory() . '/inc/acf/acf-page.php';

}