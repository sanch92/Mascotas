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
		<figure class="portada">
		<?php 
		echo $mascota->imagen ?
		"<img height='30' src='/$mascota->imagen' alt='$mascota->nombre'>":
		"<img height='30' src=/imagenes/mascotas/default.png' alt='$mascota->nombre'>";
		
		?>
		</figure>
		
		<p><b>Nombre:</b> <?=$mascota->nombre?></p>
		<p><b>Sexo:</b> <?=$mascota->sexo?></p>
		<p><b>biografia</b> <?=$mascota->biografia?></p>
		<p><b>Fecha Nacimiento</b> <?=$mascota->fechanacimiento?></p> 
       	<p><b>Fecha Fallecimiento</b> <?=$mascota->fechafallecimiento?></p>
		
	
		<?php if(Login::isAdmin() || Login::hasPrivilege(500)||Login::get()->id==$mascota->idusuario){?>
		<a href="/mascota/edit/<?=$mascota->id?>">Editar mascota</a> - 
		<a href="/mascota/delete/<?=$mascota->id?>">Borrar mascota</a> - 
		<?php }?>
		<a href="/mascota/list">Lista de mascota</a> 
		
			
	
    	<form action="/foto/store">
    		<div>
    		<label>sube la foto de tu mascotaa!</label><br>
    		<input type="hidden" id="idmascota" >
    		<input type="file" id="fichero"  name="file" accept=".jpg, .jpeg, .png">
    		
    		<input type="submit" value="Guardar" name="Guardar"> 
    		</div>
    	    	
    	</form>
		
		<?php 
		  (TEMPLATE)::footer();
		?>
	</body>
</html>