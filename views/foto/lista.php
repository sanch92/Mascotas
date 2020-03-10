<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Lista de mascotas</title>
	</head>
	<body>
		<?php 
		  (TEMPLATE)::header("Mascotas");
		  (TEMPLATE)::nav();
		  (TEMPLATE)::login();
		?>  
		<h2>Lista de mascotas</h2>
			
		<table border="1">
			<tr>
				<th>Fichero</th>
				
				
				
			</tr>
    		<?php foreach($fotos as $foto){
    			   echo "<tr>";   
    			   echo "<td>$foto->fichero</td>";
    			   echo "<td>$foto->ubicacion</td>";
    			   echo "<td>";
    			   echo " <a href='/foto/show/$foto->id'>Ver</a>";
    			   if (Login::getUsuario() && Login::getUsuario()->id==$foto->idusuario){
    			   echo "-<a href='/foto/delete/$foto->id'>Borrar</a>";
    			   echo "-<a href='/foto/create/$foto->id'>Crear</a>";
    			   }
    			   echo "</td>";
    			   echo "</tr>";
    		}?>
		</table>
		<br>
		<?php 
		  (TEMPLATE)::footer();
		?>
	</body>
</html>

