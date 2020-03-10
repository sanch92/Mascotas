<h2>Nueva foto</h2>
<h3><?=$mascota->nombre?></h3>

	<form method="post" action="/foto/store">
	<input type="hidden" name="idmascota" value="<?$mascota->id?>">
	
	<label>Nombre</label>
	<input type="text" name="nombre"><br>
	<label>sexo</label>
	<input type="text" name="sexo"><br>
	<label>FechaNacimiento</label>
	<input type="date" name="fechanacimiento"><br>
	<label>fechaFallecimiento</label>
	<input type="date" name="fechafallecimiento"><br>
	
	<input type="submit" name="guardar" value="Guardar">
	</form>
	
	<br>
	<a href="/foto/show/<?$foto->id?>">Volver a detalles</a>
	
	
	

