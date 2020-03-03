<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Baja de mascota</title>
	</head>
	
	<body>
		<?php 
		  (TEMPLATE)::header("Baja de mascota");
		  (TEMPLATE)::nav();
		  (TEMPLATE)::login();
		?>  
		<h2>Confirmar baja de mascota</h2>
		<p><?="$mascota->mascota ($mascota->fechafallecimiento)"?></p>
		
		<form method="post" action="/mascota/destroy">
			<p>Confirmar el borrado del mascota <?=$mascota->mascota?>.</p>
			<input type="hidden" name="id" value="<?=$id?>">
			<input type="submit" name="borrar" value="Borrar">
		</form>
		<br>
		<a href="/mascota/show/<?=$mascota->id?>">Detalles</a> -
		<a href="/mascota/list">Volver al listado de mascotas</a>
		
		<?php 
		  (TEMPLATE)::footer();
		?>
	</body>
	
</html>








