 function mostrar() {
            div = document.getElementById('flotante');
            div.style.display = '';
        }
         function mostrar2() {
            div = document.getElementById('flotante2');
            div.style.display = '';
        }
        function cerrar() {
            div = document.getElementById('ibody');
            div.style.display = 'none';
        }
    	
   	

function validar()
{
	var nombre, apellido, telefono, direccion, dni;
	nombre = document.getElementById("nombre").value;
	apellido = document.getElementById("apellido").value;
	telefono = document.getElementById("telefono").value;
	direccion = document.getElementById("direccion").value;
	dni = document.getElementById("dni").value;

	if (nombre === "" || apellido === "" || telefono === "" || direccion === "" || dni === "")
	{
		alert("Todos los campos son obligatorio");
		return false;
	}
	else if (nombre.length>20)
	{
		alert("El Nombre es muy largo");
		return false;
	}
	else if (apellido.length>20)
	{
		alert("El Apellido es muy largo");
		return false;
	}
	else if (telefono.length>20)
	{
		alert("El Telefono es muy largo");
		return false;
	}
	else if (direccion.length>30)
	{
		alert("La Direccion es muy larga");
		return false;
	}
	else if (dni.length>8)
	{
		alert("El DNI es muy largo");
		return false;
	}
}

function imprimir(muestra) 
    {
    	if (window.print) 
    		{
             window.print();
            } else
             	{
                   alert("La función de impresion no esta soportada por su navegador.");
                }
    }
function imprimir(){
  var objeto=document.getElementById('imprimeme');  //obtenemos el objeto a imprimir
  var ventana=window.open('','_blank');  //abrimos una ventana vacía nueva
  ventana.document.write(objeto.innerHTML);  //imprimimos el HTML del objeto en la nueva ventana
  ventana.document.close();  //cerramos el documento
  ventana.print();  //imprimimos la ventana
  ventana.close();  //cerramos la ventana
}