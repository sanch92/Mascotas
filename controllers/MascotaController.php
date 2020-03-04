<?php

// CONTROLADOR UsuarioController
class MascotaController{
    
    // operación por defecto
    public function index(){
        $this->list(); // listado de mascotas
    }
    
    // lista los usuarios
    public function list(){
        
           
            $mascotas = Mascotas::get();
            include 'views/mascota/lista.php';
    }
    
    
    
    // muestra un mascota
    public function show(int $id = 0){
        
        // esta operación solamente la puede hacer el administrador
        // o bien el usuario propietario de los datos que se muestran
        if(! (Login::isAdmin() || Login::get()->id == $id))
            throw new Exception('No tienes los permisos necesarios');
            
            // recuperar el usuario
            if(!$mascota = Mascotas::getById($id))
                throw new Exception("No se pudo recuperar la mascota.");
                
                include 'views/mascota/detalles.php';
    }
    
    
    
    
    // muestra el formulario de nuevo usuario
    public function create(){
        include 'views/mascota/nuevo.php';
    }
    
    // guarda el nuevo usuario
    public function store(){
        
        // comprueba que llegue el formulario con los datos
        if(empty($_POST['guardar']))
            throw new Exception('No se recibieron datos');
            
            $mascota = new Mascotas(); //crear el nuevo usuario
            
            $mascota->nombre = DB::escape($_POST['nombre']);
            $mascota->sexo = DB::escape($_POST['sexo']);
            $mascota->biografia = DB::escape($_POST['biografia']);
            $mascota->fechanacimiento = DB::escape($_POST['fechanacimiento']);
            $mascota->fechafallecimiento = DB::escape($_POST['fechafallecimiento']);
          
            
            if(!$mascota->guardar())
                throw new Exception("No se pudo guardar $mascota->mascota");
                
                $mensaje="Guardado la mascota $mascota->mascota correcta.";
                include 'views/exito.php'; //mostrar éxito
    }
    
    
    //ACTUALIZAR SE HACE EN DOS PASOS
    
    // muestra el formulario de edición de un usuario
    public function edit(int $id = 0){
        
        // esta operación solamente la puede hacer el administrador
        // o bien el usuario propietario de los datos que se muestran
        if(! (Login::isAdmin() || Login::get()->id == $id))
            throw new Exception('No tienes los permisos necesarios');
            
            // recuperar el usuario
            if(!$mascota = Mascotas::getById($id))
                throw new Exception("No se indicó la mascota.");
                
                // mostrar el formulario de edición
                include 'views/mascota/actualizar.php';
    }
    
    
    // aplica los cambios de un usuario
    public function update(){
        
        // esta operación solamente la puede hacer el administrador
        // o bien el usuario propietario de los datos que se muestran
        if(! (Login::isAdmin() || Login::get()->id == $id))
            throw new Exception('No tienes los permisos necesarios');
            
            // comprueba que llegue el formulario con los datos
            if(empty($_POST['actualizar']))
                throw new Exception('No se recibieron datos');
                
                $id = intval($_POST['id']); // recuperar el id vía POST
                
                // recuperar el usuario
                if(!$mascota = Mascotas::getById($id))
                    throw new Exception("No existe la mascota $id.");
                    
                    $mascota->nombre = DB::escape($_POST['nombre']);
                    $mascota->sexo = DB::escape($_POST['sexo']);
                    $mascota->biografia = DB::escape($_POST['biografia']);
                    $mascota->fechanacimiento = DB::escape($_POST['fechanacimiento']);
                    $mascota->fechafallecimiento = DB::escape($_POST['fechafallecimiento']);
                    
                    //la clave solamente cambia si se indica una nueva
                    if(!empty($_POST['clave']))
                        $mascota->clave = md5($_POST['clave']);
                        
                        // intenta realizar la actualización de datos
                        if($mascota->actualizar()===false)
                            throw new Exception("No se pudo actualizar $mascota->mascota");
                            
                            // prepara un mensaje
                            $GLOBALS['mensaje'] = "Actualización de la mascota $mascota->mascota correcta.";
                            
                            // repite la operación edit, así mantiene la vista de edición.
                            $this->edit($mascota->id);
    }
    
    
    
    
    // muestra el formulario de confirmación de eliminación
    public function delete(int $id = 0){
        
        // esta operación solamente la puede hacer el administrador
        // o bien el usuario propietario de los datos que se muestran
        if(! (Login::isAdmin() || Login::get()->id == $id))
            throw new Exception('No tienes los permisos necesarios');
            
            // recupera el usuario para mostrar sus datos en la vista
            if(!$mascota = Mascotas::getById($id))
                throw new Exception("No existe la mascota $id.");
                
                // carga la vista de confirmación de borrado
                include 'views/mascota/borrar.php';
    }
    
    //elimina el usuario
    public function destroy(){
        
        // esta operación solamente la puede hacer el administrador
        // o bien el usuario propietario de los datos que se muestran
        if(! (Login::isAdmin() || Login::get()->id == $id))
            throw new Exception('No tienes los permisos necesarios');
            
            //recuperar el identificador vía POST
            $id = empty($_POST['id'])? 0 : intval($_POST['id']);
            
            // borra el usuario de la BDD
            if(!Mascotas::borrar($id))
                throw new Exception("No se pudo dar de baja la mascota $id");
                
                $mensaje = "La mascota ha sido dado de baja correctamente.";
                include 'views/exito.php'; //mostrar éxito
    }
}
