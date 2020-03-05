<?php
class Raza{
    //Propiedades
    public $id=0, $nombre='', $descripcion='', $idtipo='';
    //metodos del crud
    //recuperar todas las razas
    public static function get():array{
        $consulta="SELECT t.nombre AS tipo, r.id, r.nombre AS raza
            FROM razas r
            INNER JOIN tipos t on r.idtipo=t.id;";
        return DB::selectAll($consulta,self::class);
    }
    
}