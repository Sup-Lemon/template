<?php

/** 
 * Page
 */

acf_add_local_field_group(array(
  'key' => 'group_fields_page',
  'title' => 'Contenu complémentaires',
  'location' => array(
    array(
      array(
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'page',
      ),
      /*
			array(
				'param' => 'page_template',
				'operator' => '!=',
				'value' => 'page-templates/page-projects.php',
      ),
      */
    ),
  ),
  'menu_order' => 0,
  'position' => 'normal',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => '',
  'active' => true,
  'description' => '',
  
  // FIELDS
  'fields' => array(

    // Intro
    array(
      'key' => 'field_page_intro_tab',
      'label' => 'Introduction',
      'type' => 'tab',
      'placement' => 'left',
      'endpoint' => 0,
    ),
    array(
      'key' => 'field_page_intro_img',
      'label' => 'Image principale',
      'name' => 'page_intro_img',
      'type' => 'image',
      'instructions' => '',
      'required' => 0,
      'return_format' => 'id',
      'preview_size' => 'medium',
      'library' => 'all',
      'min_width' => 1440,
      'min_height' => 960,
      'min_size' => '',
      'max_width' => '',
      'max_height' => '',
      'max_size' => '',
      'mime_types' => 'jpeg, jpg',
    ),
  ),
  // END FIELDS
));