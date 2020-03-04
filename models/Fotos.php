<?php
class Fotos{
    //Propiedades de la tabla fotos
    public $id=0, $fichero='', $ubicacion=0, $idmascota='';
    
    
    // Metodos CRUD
    //recuperar todas las fotos
    public static function get():array{
        $consulta="SELECT * FROM fotos"; //prepara la consulta
        return DB::selectAll($consulta, self::class);
    }
    
    //recuperar una foto concreto por id
    public static function getFoto(int $id):?Fotos{
        $consulta="SELECT * FROM fotos WHERE id=$id"; //prepara la consulata
        return DB::select($consulta, self::class); // ejectuar y retorna el resultado
        
    }
    
    //public function guardar
    public function guardar(){
        $consulta="INSERT INTO fotos(fichero, ubicacion, idmascota)
                VALUES('$this->fichero','$this->ubicacion','$this->idmascota')";
                   
                   return DB::insert($consulta);
                   
    }
    
    public static function borrar(int $id) {
        $consulta="DELETE FROM fotos WHERE id=$id";
        
        return DB::delete($consulta);
    }
    
    public function actualizar(){
        //preparar la consulta
        $consulta="UPDATE fotos SET
                                fichero='$this->fichero',
                                ubicacion='$this->ubicacion',
                                idmascota='$this->idmascota',
                             WHERE id=$this->id";
        
        return DB::update($consulta);
    }
    
    public function __toString():string{ //__toString
        return "$this->fichero $this->ubicacion, $this->idmascota";
    }
    
    //Recuperar fotos con un filtro avanzado
    public static function getFiltered(string $campo='nombre', string $valor='',
        string $orden='id', string $sentido='ASC'):array{
            
            $consulta="SELECT *
                                FROM fotos
                                WHERE $campo LIKE '%$valor%'
                                ORDER BY $orden $sentido";
            
            return DB::selectAll($consulta, self::class);
            
    }
    
}
