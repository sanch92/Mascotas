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
				<th>Nombre</th>
				<th>Sexo</th>
				<th>Biografia</th>
				<th>Fecha Nacimiento</th>
				<th>Operaciones</th>
				
			</tr>
    		<?php foreach($mascotas as $mascota){
    			   echo "<tr>";   
    			   echo "<td>";
    			   echo $mascota->imagen ?
    			   "<img height='30' src='/$mascota->imagen' alt='$mascota->nombre'>":
    			   "<img height='30' src=/imagenes/mascotas/default.png' alt='$mascota->nombre'>";
    			   echo "<td>$mascota->nombre</td>";
    			   echo "<td>$mascota->sexo</td>";
    			   echo "<td>$mascota->biografia</td>";
    			   echo "<td>$mascota->fechanacimiento</td>";
    			   //echo "<td>$mascota->idusuario</td>";
    			   echo "<td>";
    			   echo " <a href='/mascota/show/$mascota->id'>Ver</a>";
    			   
    			   if(Login::isAdmin() || Login::hasPrivilege(500)||Login::get()->id==$mascota->idusuario){
    			       
    			   echo "-<a href='/mascota/edit/$mascota->id'>Actualizar</a>";
    			   echo "-<a href='/mascota/delete/$mascota->id'>Borrar</a>";
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

