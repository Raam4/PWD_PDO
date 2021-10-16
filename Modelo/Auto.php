<?php
/**
 * @property string $patente
 * @property string $marca
 * @property int $modelo
 * @property int $dniDuenio
 */
class Auto extends Model{
    //public static $_table = 'persona';

    public static $_id_column = 'patente';

    public function persona(){
        return $this->belongs_to('Persona', 'dniDuenio');
    }
}
?>