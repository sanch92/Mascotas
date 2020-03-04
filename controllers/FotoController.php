<?php

// CONTROLADOR UsuarioController
class FotoController{
    
    // operación por defecto
    public function index(){
        $this->list(); // listado de mascotas
    }
    
    // lista los usuarios
    public function list(){
        
        // solamente el administrador
        if(!Login::isAdmin())
            throw new Exception('No tienes permiso para hacer esto');
            
            $fotos = Foto::get();
            include 'views/foto/lista.php';
    }
    
     
    
    // muestra el formulario de nuevo usuario
    public function create(){
        include 'views/foto/nuevo.php';
    }
    
    // guarda el nuevo usuario
    public function store(){
        
        // comprueba que llegue el formulario con los datos
        if(empty($_POST['guardar']))
            throw new Exception('No se recibieron datos');
            
            $mascota = new Foto(); //crear el nuevo usuario
            
            $mascota->fichero = DB::escape($_POST['fichero']);
            $mascota->ubicacion = DB::escape($_POST['ubicacion']);
            
            
            
            if(!$mascota->guardar())
                throw new Exception("No se pudo guardar la $foto->foto");
                
                $mensaje="Guardado la $foto->foto correcta.";
                include 'views/exito.php'; //mostrar éxito
    }

}
