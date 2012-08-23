//$(function() {
 $(document).ready(function(){ 		
 		$("form").click(function() { 			
 			 return false;
 		});
	

 		$("#enviarmsg").click(function(e) {
			var nombres = $("input#nombres").val();
			if(nombres == ""){		     	
		     	$("input#nombres").focus();		     	
		     	//--------------------------------------------------------------------------------------------
 				e.preventDefault();
    			$.Zebra_Dialog('<strong>Mensaje alerta</strong>, Falta ingresar los nombres');
    			//--------------------------------------------------------------------------------------------	
		     	return false;
		    }
		    
			var email = $("input#email").val();
			if (email == "") {				 
				  $("input#email").focus();
				  //--------------------------------------------------------------------------------------------
	 				e.preventDefault();
	    			$.Zebra_Dialog('<strong>Mensaje alerta</strong>, Falta escribir el email');
	    			//--------------------------------------------------------------------------------------------
				  return false;
			}
						
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			if(!emailReg.test(email)){			
				$("input#email").focus();
				//--------------------------------------------------------------------------------------------
 				e.preventDefault();
    			$.Zebra_Dialog('<strong>Mensaje alerta</strong>, El E-mail esta mal escrito');
    			//--------------------------------------------------------------------------------------------							
				return false;
			}
			
			
		    var telefono1= $("#telefono").val();
			
			  var msg = $("textarea#mensaje").val();
			  if (msg == "") {
					$("textarea#mensaje").focus();
					//--------------------------------------------------------------------------------------------
	 				e.preventDefault();
	    			$.Zebra_Dialog('<strong>Mensaje alerta</strong>, Falta escribir el mensaje');
	    			//--------------------------------------------------------------------------------------------
				  return false;
			    }
				
				
			  var dataString = 'nombres='+ nombres  + '&email=' + email+ '&telefono1=' + telefono1+ '&msg=' + msg;
				//alert(dataString);
				  $.ajax({
				      type: "POST",
				      url: "enviar.php",
				      data: dataString,
				      dataType: 'json',				      
				      success: function(data) {
				      		if(data.resp==1){
								$("#nombres").attr("value","");
								$("#telefono1").attr("value","");
								$("#telefono2").attr("value","");
								$("#email").attr("value","");
								$("#mensaje").attr("value","");
								//--------------------------------------------------------------------------------------------
				 				e.preventDefault();
				    			$.Zebra_Dialog('<strong>Mensaje alerta</strong>, Se registro correctamente');
				    			//--------------------------------------------------------------------------------------------
								$("#nombre").focus();
				      		}				      		
			      		}
		     	});
		     	
		    	return false;		    	
		});
});

