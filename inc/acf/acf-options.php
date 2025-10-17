<?php

/**
 * Site options
 */
 
acf_add_local_field_group(array(
  'key' => 'group_site_options',
  'title' => 'Options du site',
  'location' => array(
    array(
      array(
        'param' => 'options_page',
        'operator' => '==',
        'value' => 'site-options',
      ),
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
    
    // Banner
    array(
      'key' => 'field_option_banner_tab',
      'label' => 'Bannière',
      'type' => 'tab',
      'placement' => 'left',
      'endpoint' => 0,
    ),
    array(
      'key' => 'field_show_banner',
      'label' => 'Afficher la bannière ?',
      'name' => 'show_banner',
      'type' => 'true_false',
      'instructions' => '',
      'default_value' => 0,
      'ui' => 1,
      'ui_on_text' => '',
      'ui_off_text' => '',
    ),
    /*
    array(
      'key' => 'field_banner_title',
      'label' => 'Titre de la bannière',
      'name' => 'banner_title',
      'type' => 'text',
    ),
    */
    array(
      'key' => 'field_banner_content',
      'label' => 'Contenu de la bannière',
      'name' => 'banner_content',
      'type' => 'text',
      'instructions' => '',
    ),
    
  ),
));