<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Excel READER</title>
</head>
<body>
	<form action=<?php echo base_url().index_page()."/admin/products ";?> method="get">
		<input type="submit" value="volver a dashboard">
	</form>
	<h2>Esta es una prueba</h2>
	<h3>Si no sabe como debe ser el formato excel, aquí tiene un ejemplo</h3>
	<form action=<?php echo base_url()."assets/admin/template-files/importar_productos.xlsx ";?> method="get">
		<input type="submit" value="ver template">
	</form>
	<br/>
	<h3>Importar Archivo</h3>
	<form method="POST" action=<?php echo base_url().index_page()."/admin/import ";?> enctype="multipart/form-data">
		<table>
			<tr>
				<td colspan="2">
					Archivo a importar:   <input type="file" name="file">
				</td>
			</tr>		  		
			<tr>
				<td colspan="2">
					<br/>
				</td>
			</tr>		  		
			<tr>
				<td colspan="2">
					<input type="submit" value="enviar">
				</td>
			</tr>
			
		</table>
	</form> 
</body>
</html>