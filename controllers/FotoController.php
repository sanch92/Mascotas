<?php

// CONTROLADOR Foto
class FotoController{
    
    // operación por defecto
    public function index(){
        $this->list(); // listado de fotos
    }
    
    // lista de las fotos
    public function list(){
        
        // solamente el administrador
        if(!Login::isAdmin())
            throw new Exception('No tienes permiso para hacer esto');
            
            $fotos = Fotos::getFoto($id);
            include 'views/foto/lista.php';
    }
    
     
    
    // muestra el formulario de nuevo usuario
    public function create(){
        include '/views/foto/nuevo.php';
    }
    
    // guarda el nuevo usuario
    public function store(){
        
        // comprueba que llegue el formulario con los datos
        if(empty($_POST['guardar']))
            throw new Exception('No se recibieron datos');
            
            $foto = new Fotos(); //crear el nuevo usuario
            
            $foto->fichero = DB::escape($_POST['fichero']);
            $foto->ubicacion = DB::escape($_POST['ubicacion']);
            
            
            
            if(!$foto->guardar()){
                throw new Exception("No se pudo guardar la $foto->fichero");
                
                $mensaje="Guardado la $foto->foto correcta.";
                include '/views/exito.php'; //mostrar éxito
    }
    
        //TRATAMIENTO DEL FICHERO DE IMAGEN
        if(Upload::llegaFichero('fichero'))
            $foto->fichero = Upload::procesar(
                $_FILES['fichero'], '/fichero/fotos', true, 0, 'image/*');
            if(!$foto->guardar()){ //guarda las fotos en la bdd
                //SI NO SE PUDO GUARDAR
                @unlink($foto->fichero); //borra la imagen recien subida
                throw new Exception("No se pudo guardar $foto->fichero");
                
            }
            
            $mensaje="Guardado la foto $foto->fichero correcto.;";
                include '/views/exito.php'; //muestra la vista con exito.

}

}
