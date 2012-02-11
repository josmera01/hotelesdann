<?php

/**
 * @file
 * This file is empty by default because the base theme chain (Alpha & Omega) provides
 * all the basic functionality. However, in case you wish to customize the output that Drupal
 * generates through Alpha & Omega this file is a good place to do so.
 * 
 * Alpha comes with a neat solution for keeping this file as clean as possible while the code
 * for your subtheme grows. Please read the README.txt in the /preprocess and /process subfolders
 * for more information on this topic.
 */

//<link href='http://fonts.googleapis.com/css?family=Tenor+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>


function dann_preprocess_html(&$variables) {
	
/*Implementación de metaetiquedao para multisitios SEO (Google) "rel="alternate" hreflang="x" "*/ 
$language =$variables['language']->language;
$en_language = array(
    '#type' => 'html_tag',
    '#tag' => 'link',
    '#attributes' => array(
      'rel' => 'alternate',
      'hreflang' => 'en',
      'href' => 'http://www.hotelesdann.com/en/'
   ));
   
  $es_language = array(
    '#type' => 'html_tag',
    '#tag' => 'link',
    '#attributes' => array(
      'rel' => 'alternate',
      'hreflang' => 'es',
      'href' => 'http://www.hotelesdann.com/es/'
   ));
   
  $pt_language = array(
    '#type' => 'html_tag',
    '#tag' => 'link',
    '#attributes' => array(
      'rel' => 'alternate',
      'hreflang' => 'pt',
      'href' => 'http://www.hotelesdann.com/pt/'
   ));     
  if($language=="es"){
    drupal_add_html_head( $en_language, 'en_language');
    drupal_add_html_head( $pt_language, 'pt_language');

  }
  if($language=="en"){
    drupal_add_html_head( $es_language, 'es_language');
    drupal_add_html_head( $pt_language, 'pt_language');
  }
  
  if($language=="pt-br"){
    drupal_add_html_head( $es_language, 'es_language');
    drupal_add_html_head( $en_language, 'en_language');
  }
/*FIn de implementación de etiquetas "rel="alternate" hreflang="x""*/


  $element = array(
  '#tag' => 'link', // The #tag is the html tag - <link />
  '#attributes' => array( // Set up an array of attributes inside the tag
    'href' => 'http://fonts.googleapis.com/css?family=Tenor+Sans&subset=latin',
    'rel' => 'stylesheet',
    'type' => 'text/css',
  ),
);
drupal_add_html_head($element, 'google_font_cardo');
$js = "  var __lc = {};
  __lc.license = 1078953;
  __lc.lang = 'es';

  (function() {
    var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
    lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
  })();
";
drupal_add_js($js, 'inline');
}



function dann_field(&$variables) {
  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<div class="field-label"' . $variables['title_attributes'] . '>' . $variables['label'] . '</div>';
  }

  // Render the items.
  $output .= '<div class="field-items"' . $variables['content_attributes'] . '>';
  foreach ($variables['items'] as $delta => $item) {
    $classes = 'field-item ' . ($delta % 2 ? 'odd' : 'even');
    $output .= '<div class="' . $classes . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</div>';
  }
  $output .= '</div>';

  // Render the top-level DIV.
  $output = '<div class="' . $variables['classes'] . '"' . $variables['attributes'] . '>' . $output . '</div>';

  return $output;
}
