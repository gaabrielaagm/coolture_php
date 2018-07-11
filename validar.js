function validar() {
		
		var nombre, pass,correo,preferencias, notif;
		//Obten datos de las variables por el id, se guardan en las variables
		nombre=document.getElementById("nombre").value;
		pass=document.getElementById("password").value;
		correo=document.getElementById("correo").value;
		preferencias=document.form_registrar.preferencias;
		notif=document.form_registrar.notif;	
		expresion = /\w+@gmail+\.+[a-z]/;

		if(nombre== "" || pass==="" || correo==="" ){
			alert("Los campos son obligatorios");
			return false; 
		}	
		else if(nombre.length>50){
			alert("El nombre es muy largo");
			return false;
		}
		else if(pass.length>15){
			alert("Contraseña muy larga");
			return false;
		}
		else if(correo.length>80){
			alert("El correo es muy largo");
			return false;
		}
		else if(!expresion.test(correo)){
			alert("El correo no es valido");
			return false;
		}
		var val_select='',i, band;
		/*for(i=0; i<notif.length; i++){
			if(notif[i].checked){
				alert(notif.value);
			}
			
		}*/
		band=1;
		for(i=0; i<preferencias.length; i++){
			if(preferencias[i].checked){
				//val_select= val_select.concat(' ',preferencias[i].value );
				band=0;
			}
		}
		if(band===1){
			alert("Debe tener al menos un TIPO DE ARTE seleccionado");
			return false;
		}
		
	}
	/*
	
function validar_subclasif(){

		var nom_s, desc_s;
		nom_s=document.getElementById("nombre_s").value;
		desc_s=document.getElementById("descripcion").value;

		if(nom_s== "" || desc_s==="" ){
			alert("Los campos son obligatorios");
			return false; 
		}	
		else if(nom_s.length>50){
			alert("El nombre es muy largo");
			return false;
		}else{
			alert ("Todo bien");
		    
		}
}
*/