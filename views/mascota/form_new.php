<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Crear nueva Mascota</title>
		
		
		<style>
		  form label{
		      display: inline-block;
		      min-width: 120px;
		      padding: 5px;
		  }
		  form textarea{
		      vertical-align: text-top;
		      height: 100px;
		      width: 30%;
		      min-width: 200px;
		      resize:none;
		  }
		</style>
	</head>
	<body>
		<?php 
		  (TEMPLATE)::header("Formulario de Mascota");
		  (TEMPLATE)::nav();
		  (TEMPLATE)::login();
		?>  
		
		<h2>Contactar</h2>
		
		<form method="post" action="/mascota/store">
			<label>Nombre</label>
			<input type="text" name="nombre" required><br>
			<label>Sexo</label>
			<input type="text" name="sexo" required><br>
			<label>Biografia</label>
			<input type="text" name="biografia" required><br>
			<label>Nacimiento</label>
			<input type="date" name="fechanacimiento"><br>
			<label>Fallecimiento</label>
			<input type="date" name="fechafallecimiento"><br>
			<br><br>
				
    		<select name="raza">
    			<?php 
        		foreach ($razas as $raza)
        		    echo "<option value='$raza->id'>$raza->tipo $raza->raza</option>";
        		?>
    		</select>	
    		<br>
    		<input type="submit" name="guardar" value="Enviar">
    		
		</form>
	
		<?php 
		  (TEMPLATE)::footer();
		?>
		
	</body>
</html>








