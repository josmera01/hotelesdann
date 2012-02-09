jQuery(document).ready(function(){
  
  function sendEvent(category, action, tag){
    _gaq.push(['_trackEvent', category, action,tag]);
    console.log(category, action, tag);
  }
  
  var form=jQuery("#booking-form");
  var fecha=jQuery("input#datepicker");
  var hotel=jQuery("#booking-form input[name='hotel']");
  var disp=jQuery("div.group_tarifa a");
  
  if(hotel.val()!=undefined){
	form.submit(function(){
	  if(fecha.val()!=""){
	    sendEvent("Booking", "Reservar", "Formulario Portada Hotel");
	  }
	});
	
	disp.click(function(){
      sendEvent("Booking", "Reservar", "Boton Hotel");
	});
  }
  else{
	form.submit(function(){
	  if(fecha.val()!=""){
	    sendEvent("Booking", "Reservar", "Formulario Full Inicio");
	  }
	});  
    

  }

});
