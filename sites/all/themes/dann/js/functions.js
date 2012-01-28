/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


(function($) {

Drupal.dann = Drupal.dann || {};


    Drupal.behaviors.dann = {
    attach: function (context) {

    jQuery("#booking-form").validate();
    
    jQuery( ".field-name-field-link-menu .field-items a:first" ).addClass('first');
    jQuery( ".field-name-field-link-menu .field-items a:last" ).addClass('last');
    jQuery('.gallery-frame ul').innerfade({
           speed: 1000,
           timeout: 5000,
           type: 'sequence'
        });

     
       jQuery("#datepicker").datepicker({
            numberOfMonths: 2,
            showButtonPanel: false,
           dateFormat: 'dd-mm-yy'	
        });
        //alert('hola');
    //});

    }
  };
})(jQuery);


        

