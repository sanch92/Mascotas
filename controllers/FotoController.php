<?php

// CONTROLADOR Foto
class FotoController{
    
    // muestra el formulario de nueva foto
    public function create(int $id=0){
        
        //recupera el libro para mostrar informacion en la vista
        $fotos = Fotos:: getFoto($id);
        
        //si no hay foto..
        if(!$foto)
            throw new Exception("No se encontro la foto");
            
            //carga la vista de crear fotos
            include 'view/foto/nuevo.php';
    }
    
    // guardar la nueva foto
    public function store(){
        
        //comprueba que llegue el formulario con los datos
        if(empty($_POST['guardar']))
            throw new Exeption('No se recibieron datos');
            
            $e = new Foto();
            
            //recupera los datos que llegan por post
            $e->id = intval($_POST['id']);
            $e->fichero = ($_POST['fichero']);
            $e->ubicacion = ($_POST['ubicacion']);
            $e->idmascota = intval($_POST['idmascota']);
            
            if(!$e->guardar()) //guarda la foto en la bdd
                throw new Exception("No se pudo guardar");
                
                // redireccionar el FotoController::show($id);
                // para ver de nuevo los detalles del libro
                (new FotoController())->show($e->id);
                
    }
    
    //muestra el formulario de confirmacion de eliminacion
    public function delete(int $id = 0){
        
        //recupero el ejemplar para poder mostrar info
        if(!$foto = Foto::get($id))
            throw new Exception("No se encontro el ejemplar $id.");
            
            //recupero la foto para mostrar la info
            $foto = $foto->getFoto();
            
            include 'view/foto/borrar.php';
            
    }
    
    // elimina la fotografia
    public function destroy(){
        
        //cormprueba que llegue el formulario de confirmacion
        if(empty($_POST['borrar']))
            throw new Exception('No se recibio confirmacion');
            
            $id = intval($_POST['id']);
            
            //recupero el ejemplar para poder mostrar info
            if(!$foto = Foto::get($id))
                throw new Exception("No se encontro la foto $id.");
                
                //recupero la foto para poder mostrar la info
                $foto = $foto->getFoto();
                
                //intenta borrar la fotografia de la bdd
                if(Foto::borrar($id)===false)
                    throw new Exception('No se pudo borrar');
                    
                    $mensaje="Guardado la $foto->foto correcta.";
                    include 'views/exito.php'; //mostrar éxito
    }
    
    

    
}
