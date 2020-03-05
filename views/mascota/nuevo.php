<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Registro de mascotas</title>
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
		  (TEMPLATE)::header("Registro de mascotas");
		  (TEMPLATE)::nav();
		  (TEMPLATE)::login();
		?>  
		
		<h2>Nueva Mascota</h2>
		
		<form method="post" action="/mascota/store" enctype="multipart/form-data">
			<label>Nombre</label>
			<input type="text" name="nombre">
			<br>
			<label>Sexo</label>
			<input type="password" name="sexo">
			<br>
			<label>Biografia</label>
			<input type="text" name="biografia">
			<br>
			<label>Fecha Nacimiento</label>
			<input type="text" name="fechanacimiento">
			<br>
			<label>Fecha Fallecimiento</label>
			<input type="text" name="fechafallecimiento">
			<br>
			
			 <?php if(Login::isAdmin()){ ?>
			<h4>Operaciones solo para el admin</h4>
			<label>Privilegio</label>
			<input type="number" value="0" min="0" max="9999" name="privilegio">
			<br>
			<input type="checkbox" name="administrador" value="1">
			<label>Conceder privilegio de administrador</label>
			<br>
         <?php } ?>

			<input type="submit" name="guardar" value="Guardar">
		</form>
		<br>
		<a href="/mascota/list">Volver al listado de mascotas</a>
		
		<?php 
		  (TEMPLATE)::footer();
		?>
    		
	</body>
</html>








