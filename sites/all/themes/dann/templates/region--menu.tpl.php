<?php
$array = array(
340, 325, 336, 331, 273, 275, 276, 274
);
$validacion = array_search(arg(1), $array);


 ?>
<div<?php print $attributes; ?>>
  <div<?php print $content_attributes; ?>>
    <?php if ($main_menu || $secondary_menu) { ?>
    <nav class="navigation">
      <?php 
      if(!is_numeric($validacion) && $validacion){
          print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu', 'class' => array('links', 'inline', 'clearfix', 'main-menu')), 'heading' => array('text' => t('Main menu'),'level' => 'h2','class' => array('element-invisible'))));
        }      
      elseif (!drupal_is_front_page() && !$validacion ){
        print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu', 'class' => array('links', 'inline', 'clearfix', 'main-menu')), 'heading' => array('text' => t('Main menu'),'level' => 'h2','class' => array('element-invisible'))));
     } 
    ?>     
    </nav>
    <?php } ?>
    <?php print $content; ?>
  </div>
</div>
