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
		  (TEMPLATE)::header("Formulario de fotografia");
		  (TEMPLATE)::nav();
		  (TEMPLATE)::login();
		?>  
		
		<h2>Contactar</h2>
		
		<form method="post" action="/foto/store">
			<label>fichero</label>
			<input type="text" name="fichero" required><br>
			<label>ubicacion</label>
			<input type="text" name="ubicacion" required><br>
			<br><br>
			<input type="submit" name="guardar" value="Enviar">
			<?php 
		foreach ($fotos as $foto)
		    echo "<option value='$foto->id'>$foto->fichero $foto->ubicacion</option>";
		?>
		</form>
		
		
	
		<?php 
		  (TEMPLATE)::footer();
		?>
		
	</body>
</html>








