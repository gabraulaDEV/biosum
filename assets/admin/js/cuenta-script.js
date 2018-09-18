function verActual()
{
	document.getElementById("contacto").style.visibility="hidden";
	document.getElementById("contacto").style.display="none";
	document.getElementById("actual").style.visibility="visible";
	document.getElementById("actual").style.display="block";
}

function verContacto()
{
	document.getElementById("actual").style.visibility="hidden";
	document.getElementById("actual").style.display="none";
	document.getElementById("contacto").style.visibility="visible";
	document.getElementById("contacto").style.display="block";
}

function mostrarAgregarAsesor()
{
	document.getElementById("cont_sobre_asesor").style.visibility="visible";
	document.getElementById("cont_sobre_asesor").style.display="block";
}
function ocultarAgregarAsesor()
{
	document.getElementById("cont_sobre_asesor").style.visibility="hidden";
	document.getElementById("cont_sobre_asesor").style.display="none";
}