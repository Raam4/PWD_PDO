<?php
class Auto{
    private $patente;
    private $marca;
    private $modelo;
    private $objDuenio;
    private $op;

    public function __construct(){
        $this->patente = "";
        $this->marca = "";
        $this->modelo = "";
        $this->objDuenio = "";
        $this->op = "";
    }

    public function setear($patente, $marca, $modelo, $objDuenio){
        $this->setPatente($patente);
        $this->setMarca($marca);
        $this->setModelo($modelo);
        $this->setObjDuenio($objDuenio);
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
    public function getObjDuenio(){
        return $this->objDuenio;
    }
    public function setObjDuenio($objDuenio){
        $this->objDuenio = $objDuenio;
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
        $sql="SELECT * FROM auto WHERE patente = ".$this->getPatente();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['patente'], $row['marca'], $row['modelo'], $row['dniDuenio']);
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
        $dniDuenio = $this->getObjDuenio()['nroDni'];
        $sql="INSERT INTO auto(patente, marca, modelo, dniDuenio) VALUES('".$this->getPatente()."', '".$this->getMarca()."', '".$this->getModelo()."', '".$dniDuenio."');";
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
        $dniDuenio = $this->getObjDuenio()['nroDni'];
        $sql="UPDATE auto SET marca='".$this->getMarca()."', modelo='".$this->getModelo()."', dniDuenio='".$dniDuenio."' WHERE patente='".$this->getPatente()."'";
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
        $sql="DELETE FROM auto WHERE patente=".$this->getPatente();
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
                    $objPersona = new Persona();
                    $objPersona = $objPersona::listar("nroDni = ".$row['dniDuenio'], false);
                    $obj->setear($row['patente'], $row['marca'], $row['modelo'], $objPersona[0]);
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