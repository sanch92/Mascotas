<?php
class Mascotas{
    //Propiedades
    public $id=0, $nombre='', $sexo=0, $biografia=0, $fechanacimiento='', $fechafallecimiento='',
    $idusuario='', $idraza='';
    
    
    // Metodos CRUD
    //recuperar todos los mascotas
    public static function get():array{
        $consulta="SELECT * FROM mascotas"; //prepara la consulta
        return DB::selectAll($consulta, self::class);
    }
    
    //recuperar un mascota concreto por id
    public static function getMascota(int $id):?Mascota{
        $consulta="SELECT * FROM mascotas WHERE id=$id"; //prepara la consulata
        return DB::select($consulta, self::class); // ejectuar y retorna el resultado
        
    }
    
    //public function guardar
    public function guardar(){
        $consulta="INSERT INTO mascotas(nombre, sexo, biografia, fechanacimiento, fechafallecimiento,
                        idusuario, idraza)
                VALUES('$this->nombre','$this->sexo', '$this->biografia', '$this->fechanacimiento',
                   '$this->fechafallecimiento', $this->idusuario, $this->idraza)";               
                 
                 return DB::insert($consulta);
                 
    }
    
    public static function borrar(int $id) {
        $consulta="DELETE FROM mascotas WHERE id=$id";
        
        return DB::delete($consulta);
    }
    
    public function actualizar(){
        //preparar la consulta
        $consulta="UPDATE mascotas SET
                                nombre='$this->nombre',
                                sexo='$this->sexo',
                                biografia='$this->biografia',
                                fechanacimiento='$this->fechanacimiento',
                                fechafallecimiento='$this->fechafallecimiento',                              
                            WHERE id=$this->id";
        
        return DB::update($consulta);
    }
    
    public function __toString():string{ //__toString
        return "$this->nombre $this->sexo, $this->biografia $this->fechanacimiento, $this->fechafallecimiento";
    }
    
    //REcuperar mascotas con un filtro avanzado
    public static function getFiltered(string $campo='nombre', string $valor='',
        string $orden='id', string $sentido='ASC'):array{
            
            $consulta="SELECT *
                                FROM mascotas
                                WHERE $campo LIKE '%$valor%'
                                ORDER BY $orden $sentido";
            
            return DB::selectAll($consulta, self::class);
            
    }
    
}


