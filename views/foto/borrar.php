<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Baja de mascota</title>
	</head>
	
	<body>
		<?php 
		  (TEMPLATE)::header("Baja de fotografia");
		  (TEMPLATE)::nav();
		  (TEMPLATE)::login();
		?>  
		<h2>Confirmar baja de mascota</h2>
		<p><?="$foto->fichero ($foto->ubicacion)"?></p>
		
		<form method="post" action="/foto/destroy">
			<p>Confirmar el borrado del mascota <?=$foto->foto?>.</p>
			<input type="hidden" name="id" value="<?=$id?>">
			<input type="submit" name="borrar" value="Borrar">
		</form>
		<br>
		<a href="/foto/show/<?=$foto->id?>">Detalles</a> -
		<a href="/foto/list">Volver al listado de fotografias</a>
		
		<?php 
		  (TEMPLATE)::footer();
		?>
	</body>
	
</html>








