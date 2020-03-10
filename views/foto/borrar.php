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
		<p>Estas a punto de borrar la foto <?$foto->id?>
		del libro <?$mascota->nombre;?>.</p>
		
		
		<form method="post" action="/foto/destroy">
			<label>Por favor confirma el borrado:</label>
			<input type="hidden" name="id" value="<?=$foto->id?>">
			
			<input type="submit" name="borrar" value="Borrar">
		</form>
		<br>
		<a href="/foto/show/<?=$foto->id?>">Volver a detalles de las mascotas</a>
		
		
		<?php 
		  (TEMPLATE)::footer();
		?>
	</body>
	
</html>








