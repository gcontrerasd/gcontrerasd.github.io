<?php
	ob_start();
	//Importamos las variables del formulario de contacto

	@$nombre = trim($_POST['name']);
	@$email=  trim($_POST['correo']);
	@$mensaje = trim($_POST['message']);
        
        $correo = $email;
	$Mensaje = 'aaa.cl';
	//Preparamos el mensaje de contacto
	//$cabeceras = 'From: '.$email.'\n' //La persona que envia el correo
	// . 'Reply-To: '.$email.'\n';

        $cabeceras = 'From: Drezzer.cl <'.$email.'>' ;
	$asunto = 'Mensaje desde Drezzer.cl'; //asunto aparecera en la bandeja del servidor de correo
	$email_to = 'gabo.contrerasd@gmail.com'; //cambiar por tu email
        
	$contenido = ''.$nombre.' ha enviado un mensaje desde Drezzer.cl 
				
				Nombre: '.$nombre.'
				Email: '.$correo.'
				Mensaje: '.$mensaje.'
				
				'; 
    if(validarCampo($nombre) && validarCampo($mensaje)){
	    if (@mail($email_to, $asunto ,$contenido ,$cabeceras)){
		    echo "Thank you, your message is being sent, redirected.";
		    header( "refresh:3;url=sent.html" );
	    }else{ //Si el mensaje no se envía muestra el mensaje de error
		    echo "Error: Your information could not be sent, try again later by redirecting.";
		    header( "refresh:3;url=sent.html" );
	    }
	    ob_end_flush();
    }
    else{
        echo "Error: content is invalid, try again";
        header( "refresh:3;url= contact.html");
        ob_end_flush();
    }
    function validarCampo($variable){
	    if($variable ==" "){
	        return false;
	    }elseif($variable =="  "){
	        return false;
	    }elseif($variable =="   "){
	        return false;
	    }
	    elseif($varialbe == null){
	        return false;
	    }
	    else{
	        return true;
	    }
	    
	}
?>