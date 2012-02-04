<?php
/**
 * @file
 * boton_facebook.ds.inc
 */

/**
 * Implements hook_ds_field_settings_info().
 */
function boton_facebook_ds_field_settings_info() {
  $export = array();

  $ds_fieldsetting = new stdClass;
  $ds_fieldsetting->api_version = 1;
  $ds_fieldsetting->id = 'node|hotel|custom_view';
  $ds_fieldsetting->entity_type = 'node';
  $ds_fieldsetting->bundle = 'hotel';
  $ds_fieldsetting->view_mode = 'custom_view';
  $ds_fieldsetting->settings = array(
    'pais' => array(
      'weight' => '4',
      'label' => 'hidden',
      'format' => 'default',
    ),
    'title' => array(
      'weight' => '1',
      'label' => 'hidden',
      'format' => 'default',
      'formatter_settings' => array(
        'link' => '1',
        'wrapper' => 'h1',
        'class' => '',
      ),
    ),
  );
  $export['node|hotel|custom_view'] = $ds_fieldsetting;

  return $export;
}

/**
 * Implements hook_ds_custom_fields_info().
 */
function boton_facebook_ds_custom_fields_info() {
  $export = array();

  $ds_field = new stdClass;
  $ds_field->api_version = 1;
  $ds_field->field = 'boton_facebook';
  $ds_field->label = 'Boton facebook';
  $ds_field->field_type = 6;
  $ds_field->entities = array(
    'node' => 'node',
  );
  $ds_field->properties = array(
    'block' => 'custom_dann|boton-facebook',
    'block_render' => '3',
  );
  $export['boton_facebook'] = $ds_field;

  return $export;
}

/**
 * Implements hook_ds_layout_settings_info().
 */
function boton_facebook_ds_layout_settings_info() {
  $export = array();

  $ds_layout = new stdClass;
  $ds_layout->api_version = 1;
  $ds_layout->id = 'node|hotel|full';
  $ds_layout->entity_type = 'node';
  $ds_layout->bundle = 'hotel';
  $ds_layout->view_mode = 'full';
  $ds_layout->layout = 'ds_2col';
  $ds_layout->settings = array(
    'hide_empty_regions' => 1,
    'hide_sidebars' => 0,
    'regions' => array(
      'left' => array(
        0 => 'group_header_hotel',
        1 => 'title',
        2 => 'field_link_menu',
        3 => 'group_title_wrapper',
        4 => 'field_city',
        5 => 'group_contact_wrapper',
        6 => 'field_address_phone',
        7 => 'pais',
        8 => 'field_phone',
      ),
      'right' => array(
        0 => 'the_best_rates_starting_at',
        1 => 'field_min_price',
        2 => 'group_banner',
        3 => 'field_select_money',
        4 => 'field_slideshow',
        5 => 'boton_facebook',
        6 => 'field_select_desayuno',
        7 => 'group_content_top',
        8 => 'booking_view',
        9 => 'group_content_center',
        10 => 'boton_booking',
        11 => 'group_content_bottom',
        12 => 'view_room',
        13 => 'group_content_bottom_right',
        14 => 'view_plan',
        15 => 'group_content_left',
        16 => 'field_gmap_location',
        17 => 'clone_direccion',
        18 => 'group_content_right',
        19 => 'field_text_event_summary',
        20 => 'clone_tel',
        21 => 'field_text_nearby_attractions',
        22 => 'field_image_destion',
        23 => 'field_text_summary_services',
        24 => 'body',
        25 => 'group_tarifa',
        26 => 'field_promocion',
      ),
    ),
    'fields' => array(
      'group_header_hotel' => 'left',
      'title' => 'left',
      'field_link_menu' => 'left',
      'group_title_wrapper' => 'left',
      'the_best_rates_starting_at' => 'right',
      'field_city' => 'left',
      'field_min_price' => 'right',
      'group_banner' => 'right',
      'group_contact_wrapper' => 'left',
      'field_address_phone' => 'left',
      'field_select_money' => 'right',
      'field_slideshow' => 'right',
      'boton_facebook' => 'right',
      'pais' => 'left',
      'field_select_desayuno' => 'right',
      'group_content_top' => 'right',
      'field_phone' => 'left',
      'booking_view' => 'right',
      'group_content_center' => 'right',
      'boton_booking' => 'right',
      'group_content_bottom' => 'right',
      'view_room' => 'right',
      'group_content_bottom_right' => 'right',
      'view_plan' => 'right',
      'group_content_left' => 'right',
      'field_gmap_location' => 'right',
      'clone_direccion' => 'right',
      'group_content_right' => 'right',
      'field_text_event_summary' => 'right',
      'clone_tel' => 'right',
      'field_text_nearby_attractions' => 'right',
      'field_image_destion' => 'right',
      'field_text_summary_services' => 'right',
      'body' => 'right',
      'group_tarifa' => 'right',
      'field_promocion' => 'right',
    ),
    'classes' => array(),
  );
  $export['node|hotel|full'] = $ds_layout;

  return $export;
}
