<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Detalles del mascota <?=$mascota->mascota?></title>
	</head>
	<body>
	
		<?php 
		  (TEMPLATE)::header("Detalles");
		  (TEMPLATE)::nav();
		  (TEMPLATE)::login();
		?>  
		
		<h2>Detalles del mascota</h2>
		<h3><?="$mascota->nombre $mascota->fechafallecimiento"?></h3>
		
		<p><b>Nombre:</b> <?=$mascota->nombre?></p>
		<p><b>Sexo:</b> <?=$mascota->sexo?></p>
		<p><b>Fecha Nacimiento</b> <?=$mascota->fechanacimiento?></p> 
       	<p><b>Fecha Fallecimiento</b> <?=$mascota->fechafallecimiento?></p>
		
	
	
		<a href="/mascota/edit/<?=$mascota->id?>">Editar mascota</a> - 
		<a href="/mascota/delete/<?=$mascota->id?>">Borrar mascota</a> - 
		<a href="/mascota/list">Lista de mascota</a> 
	
		<?php 
		  (TEMPLATE)::footer();
		?>
	</body>
</html>