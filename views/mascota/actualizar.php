<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Actualizar datos de la mascota <?=$mascota->mascota?></title>
		<style>
		  form label{
		      display: inline-block;
		      min-width: 100px;
		      padding: 5px;
		  }
		</style>
	</head>
	<body>
		<?php 
		  (TEMPLATE)::header("Actualizar datos del mascota");
		  (TEMPLATE)::nav();
		  (TEMPLATE)::login();
		?>  
				
		<h2>Formulario de edición</h2>
		<p><?="$mascota->mascota ($mascota->email)"?></p>
		
		<?=empty( $GLOBALS['mensaje'])? "" : "<p>". $GLOBALS['mensaje']."</p>"?>

		<form method="post" action="/mascota/update">
		
		    <!-- id del mascota a modificar -->
			<input type="hidden" name="id" value="<?=$mascota->id?>">
			
			<!-- resto del formulario... -->
			<label>Nombre</label>
			<input type="text" name="name" value="<?=$mascota->nombre?>">
			<br>
			<label>Sexo</label>
			<input type="password" name="clave">
			<label>En blanco para no cambiar la clave actual</label>
			<br>
			
			<label>biografia</label>
			<input type="text" name="biografia" value="<?=$mascota->biografia?>">
			<br>
			<label>fechanacimiento</label>
			<input type="text" name="fechanacimiento" value="<?=$mascota->fechanacimiento?>">
			<br>
			<label>fechafallecimiento</label>
			<input type="text" name="fechafallecimiento" value="<?=$mascota->fechafallecimiento?>">
						
			<h4>Operaciones solo para el admin</h4>
			<label>Privilegio</label>
			<input type="number" min="0" max="9999" name="privilegio" 
				   value="<?=$mascota->privilegio?>">
			<br>
			<input type="checkbox" name="administrador" value="1"
				   <?=empty($mascota->administrador)? '' : ' checked'?>>
			<label>Conceder privilegio de administrador</label>
			<br>
			
			<input type="submit" name="actualizar" value="Actualizar">
		</form>
		<br>
		
		<a href="/mascota/show/<?=$mascota->id?>">Detalles</a> - 
		<a href="/mascota/list">Volver al listado de mascotas</a>
		
		<?php 
		  (TEMPLATE)::footer();
		?>
		
	</body>
</html>








