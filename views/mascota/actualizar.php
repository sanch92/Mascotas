<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Actualizar datos de la mascota <?=$mascota->nombre?></title>
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
		<p><?="$mascota->nombre ($mascota->fechanacimiento)"?></p>
		
		<?=empty( $GLOBALS['mensaje'])? "" : "<p>". $GLOBALS['mensaje']."</p>"?>

		<form method="post" action="/mascota/update">
		
		    <!-- id del mascota a modificar -->
			<input type="hidden" name="id" value="<?=$mascota->id?>">
			
			<!-- resto del formulario... -->
			<label>Nombre</label>
			<input type="text" name="nombre" value="<?=$mascota->nombre?>">
			<br>
			<label>Sexo</label>
			<input type="text" name="sexo" value="<?=$mascota->sexo?>">
			<br>
			<label>biografia</label>
			<input type="text" name="biografia" value="<?=$mascota->biografia?>">
			<br>
			<label>nacimiento</label>
			<input type="date" name="fechanacimiento" value="<?=$mascota->fechanacimiento?>">
			<br>
			<label>fallecimiento</label>
			<input type="date" name="fechafallecimiento" value="<?=$mascota->fechafallecimiento?>">
						
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








