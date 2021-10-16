<?php
include_once $_SERVER['DOCUMENT_ROOT']."/PWD_PDO/utiles/idiorm.php";

class DB extends ORM{
    public function __construct(){
        ORM::configure(array(
            'connection_string' => 'mysql:host=localhost;dbname=infoautos',
            'username' => 'root',
            'password' => '',
            'return_result_sets' => true,
            'driver_options' => array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'),
            'id_column_overrides' => array(
                'persona' => 'nroDni',
                'auto' => 'patente'
            )
        ));
    }
}
?>