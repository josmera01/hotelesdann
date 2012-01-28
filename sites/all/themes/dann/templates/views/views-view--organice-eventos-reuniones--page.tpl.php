<?php
/**
 * @file views-view.tpl.php
 * Main view template
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 *
 * @ingroup views_templates
 */
?>
<div class="<?php print $classes; ?>">
  <?php print render($title_prefix); ?>
  <?php 

  if ($title): ?>
    <?php print $title; ?>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php if ($header): ?>
    <div class="view-header">
      <?php print $header; ?>
    </div>
  <?php endif; ?>

  <?php if ($exposed): ?>
    <div class="view-filters">
      <?php print $exposed; ?>
    </div>
  <?php endif; ?>

  <?php if ($attachment_before): ?>
    <div class="attachment attachment-before">
      <?php print $attachment_before; ?>
    </div>
  <?php endif; ?>

  <?php if ($rows): ?>
    <div class="view-content">
      <?php print $rows; ?>
    </div>
    
    <?php 
    
        // Se invocan los salones relacionados con el hotel
        $view = views_get_view('salones');
        // Especificamos el tipo de visualización que se va a usar, en este caso de tipo bloque (pasamos el id).
        $view->set_display('block_3');
        // Le pasamos el argumento
        $view->set_arguments(array(arg(1)));
        //
        $view->set_items_per_page(0);
        // Ejecutamos el objeto para obtener el nuevo resultado
        $view->execute();
        
        $salones = $view->result;
        
    ?>
    <div id="salones">
    <?php foreach($salones as $key => $salon): ?>
    
    <div class="salon-<?php print $key ?> salon-eventos">
        
        <h3><?php print $salon->node_title?></h3>
        
        <ul>
            <li><a href="#caracteristicas"><?php print t('Features') ?></a></li>
            <li><a href="#fotografias"><?php print t('Gallery')?></a></li>
        </ul>  
        
        <div id="caracteristicas">
            <?php

                $view = views_get_view('salones');
                // Especificamos el tipo de visualización que se va a usar, en este caso de tipo bloque (pasamos el id).
                $view->set_display('block_1');
                // Le pasamos el argumento
                $view->set_arguments(array($salon->node_title));
                //
              //  $view->set_items_per_page(1);
                // Ejecutamos el objeto para obtener el nuevo resultado
                $view->execute();
                // Renderizamos la vista ejecutada y la imprimimos
                print $view->render();

            ?>
        </div>
        <div id="fotografias">
            <?php   

                $view = views_get_view('salones');
                // Especificamos el tipo de visualización que se va a usar, en este caso de tipo bloque (pasamos el id).
                $view->set_display('block_2');
                // Le pasamos el argumento
                $view->set_arguments(array($salon->node_title));
                //
                $view->set_items_per_page(0);
                // Ejecutamos el objeto para obtener el nuevo resultado
                $view->execute();
                // Renderizamos la vista ejecutada y la imprimimos
                print $view->render();

            ?>
        </div>
        
    </div>
    
    <script type="text/javascript">
        
        (function($){
            
           $('.salon-<?php print $key ?>').tabs(); 
           
        })(jQuery);
        
    
    </script>
    
    <?php endforeach; ?>
    </div>
    
  <?php elseif ($empty): ?>
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
  <?php endif; ?>

  <?php if ($pager): ?>
    <?php print $pager; ?>
  <?php endif; ?>

  <?php if ($attachment_after): ?>
    <div class="attachment attachment-after">
      <?php print $attachment_after; ?>
    </div>
  <?php endif; ?>

  <?php if ($more): ?>
    <?php print $more; ?>
  <?php endif; ?>

  <?php if ($footer): ?>
    <div class="view-footer">
      <?php print $footer; ?>
    </div>
  <?php endif; ?>

  <?php if ($feed_icon): ?>
    <div class="feed-icon">
      <?php print $feed_icon; ?>
    </div>
  <?php endif; ?>

</div> <?php /* class view */ ?>