<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/PWD_PDO/configuracion.php');
include_once($ROOT."Modelo/conector/BaseDatos.php");
class Auto{
    private $patente;
    private $marca;
    private $modelo;
    private $dniDuenio;
    private $op;

    public function __construct(){
        $this->patente = "";
        $this->marca = "";
        $this->modelo = "";
        $this->dniDuenio = "";
        $this->op = "";
    }

    public function setear($patente, $marca, $modelo, $dniDuenio){
        $this->setPatente($patente);
        $this->setMarca($marca);
        $this->setModelo($modelo);
        $this->setDniDuenio($dniDuenio);
    }

    public function getPatente(){
        return $this->patente;
    }
    public function setPatente($patente){
        $this->patente = $patente;
    }
    public function getMarca(){
        return $this->marca;
    }
    public function setMarca($marca){
        $this->marca = $marca;
    }
    public function getModelo(){
        return $this->modelo;
    }
    public function setModelo($modelo){
        $this->modelo = $modelo;
    }
    public function getDniDuenio(){
        return $this->dniDuenio;
    }
    public function setDniDuenio($dniDuenio){
        $this->dniDuenio = $dniDuenio;
    }
    public function getOp(){
        return $this->op;
    }
    public function setOp($op){
        $this->op = $op;
    }

    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM auto WHERE Patente = ".$this->getPatente();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['Patente'], $row['Marca'], $row['Modelo'], $row['DniDuenio']);
                }
            }
        } else {
            $this->setOp("Auto->listar: ".$base->getError());
        }
        return $resp;
    }
    
    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="INSERT INTO auto(Patente, Marca, Modelo, DniDuenio) VALUES('".$this->getPatente()."', '".$this->getMarca()."', '".$this->getModelo()."', '".$this->getDniDuenio().");";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setPatente($elid);
                $resp = true;
            } else {
                $this->setOp("Auto->insertar: ".$base->getError());
            }
        } else {
            $this->setOp("Auto->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="UPDATE auto SET Marca='".$this->getMarca()."', Modelo='".$this->getModelo()."', DniDuenio='".$this->getDniDuenio()."' WHERE Patente=".$this->getPatente();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setOp("Auto->modificar: ".$base->getError());
            }
        } else {
            $this->setOp("Auto->modificar: ".$base->getError());
        }
        return $resp;
    }
    
    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM auto WHERE Patente=".$this->getPatente();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setOp("Auto->eliminar: ".$base->getError());
            }
        } else {
            $this->setOp("Auto->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM auto ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                while ($row = $base->Registro()){
                    $obj= new Auto();
                    $obj->setear($row['Patente'], $row['Marca'], $row['Modelo'], $row['DniDuenio']);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $obj= new Auto();
            $obj->setOp("Auto->listar: ".$base->getError());
        }
        return $arreglo;
    }
}
?>