
$(function() {
  $('.error').hide();
  $(".button").click(function() {
		// validate and process form
		// first hide any error messages
    $('.error').hide();
		
	var name = $("input#nombres").val();
		if (name == "") {
		      $("span#name_error").show();
		      $("input#nombres").focus();
		      return false;
	    }
	
	 var ciudad = $("input#ciudad").val();
	 var pais = $("input#pais").val();
	 var direccion = $("input#direccion").val();
	
	  var email = $("input#email2").val();
	  if (email == "") {
			  $("span#email_error").show();
			  $("input#email2").focus();
			  $("span#email_error").text("Ingrese su e-mail !");
			  return false;
	    }
	
	//evaluacion de email que si funciona
	if($("#email2").val().indexOf('@', 0) == -1 || $("#email2").val().indexOf('.', 0) == -1) {  
        //alert("La dirección e-mail parece incorrecta");  
        $("span#email_error").show();
		$("span#email_error").text("email mal escrito!");
		$("input#email2").focus();
        return false;      
    }
	
	 
	 var telefono = document.getElementById("telefono").value;	
	
	  var msg = $("textarea#adjuntos").val();
	  if (msg == "") {
			  $("span#msg_error").show();
			  $("textarea#adjuntos").focus();
			  return false;
	    }
	   $("#tempo").attr("value","1"); 
	    //----------------------------------------------dddd
		    //$('a.submit-form').bind('click',function(){  
			    //$('form#mi-form').submit();
			    
			    $('form#contact').submit();
			//});
	    //----------------------------------------------
	  //alert("ingresos");
	   /* 
		//var file= document.getElementById("archivos").value;
		//var file= document.getElementName("archivos").value;
		var file= document.getElementById("archivos").name;
		
		//getElementName()
		//LimitAttach(file,"1");
		//$("#archivos") 
		alert(file);
		var dataString = 'name='+ name + '&ciudad=' + ciudad+ '&pais=' + pais+ '&direccion='+ direccion + '&email=' + email + '&telefono=' + telefono + '&msg=' + msg+ '&file=' + file;
		//alert (dataString);return false;
		//alert (dataString);//return false;
	  $.ajax({
	      type: "POST",
	      url: "enviar-dis-online.php",
	      data: dataString,
	      success: function() {
	      
		        //$('#contact_form').html("<div id='message'></div>");
		        
		        $('#message').show();
		       	
		       	$("input#nombres").attr("value","");
		       	$("input#nombres").focus();
		       	$("input#ciudad").attr("value","");
		       	$("input#pais").attr("value","");
		       	$("input#direccion").attr("value","");
		       	$("input#email2").attr("value","");
		       	$("input#telefono").attr("value","");
		       	$("#adjuntos").attr("value","");
		       	$("#archivos").attr("value","");
	      }
     });
     */
     
   
		       	//$("#archivos").attr("value",""); 
    return false;
	});
});


//validar email
function validarEmail(valor) {
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$/.test(valor)){
		alert("La dirección de email " + valor + " es correcta.");
	} else {
		alert("La dirección de email es incorrecta.");
	}
}
//funcion de evaluacion
function LimitAttach(tField,iType) {
		file=tField.value;
		if (iType==1) {
			extArray = new Array(".gif",".jpg",".png");
		}
		if (iType==2) {
			extArray = new Array(".swf");
		}
		if (iType==3) {
			extArray = new Array(".exe",".sit",".zip",".tar",".swf",".mov",".hqx",".ra",".wmf",".mp3",".qt",".med",".et");
		}
		if (iType==4) {
			extArray = new Array(".mov",".ra",".wmf",".mp3",".qt",".med",".et",".wav");
		}
		if (iType==5) {
			extArray = new Array(".html",".htm",".shtml");
		}
		if (iType==6) {
			extArray = new Array(".doc",".xls",".ppt");
		}
		allowSubmit = false;
		if (!file) return;
		while (file.indexOf("\\") != -1) file = file.slice(file.indexOf("\\") + 1);
			ext = file.slice(file.indexOf(".")).toLowerCase();
			for (var i = 0; i < extArray.length; i++) {
			if (extArray == ext) {
			allowSubmit = true;
			break;
		}
		}
		if (allowSubmit) {
		} else {
			tField.value="";
			alert("subir archivos");
			//alert("Usted sólo puede subir archivos con extensiones " + (extArray.join(" ")) + "\nPor favor seleccione un nuevo archivo");
		}
} 
