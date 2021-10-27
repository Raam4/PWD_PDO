<?php
/**
 * @property int $nroDni
 * @property string $apellido
 * @property string $nombre
 * @property string $fechaNac
 * @property string $telefono
 * @property string $domicilio
 */
class Persona extends Model{
    public static $_id_column = 'nroDni';

    public function autos(){
        return $this->has_many('Persona', 'nroDni', 'dniDuenio');
    }
}
?>