<?php
class Persona{
    private $nrodni;
    private $apellido;
    private $nombre;
    private $fechaNac;
    private $telefono;
    private $domicilio;
    private $colObjAuto;
    private $op;

    public function __construct(){
        $this->nrodni = "";
        $this->apellido = "";
        $this->nombre = "";
        $this->fechaNac = "";
        $this->telefono = "";
        $this->domicilio = "";
        $this->colObjAuto = "";
        $this->op = "";
    }

    public function setear($nrodni, $apellido, $nombre, $fechaNac, $telefono, $domicilio, $colObjAuto){
        $this->setNroDni($nrodni);
        $this->setApellido($apellido);
        $this->setNombre($nombre);
        $this->setFechaNac($fechaNac);
        $this->setTelefono($telefono);
        $this->setDomicilio($domicilio);
        $this->setColObjAuto($colObjAuto);
    }

    public function getNroDni(){
        return $this->nrodni;
    }
    public function setNroDni($nrodni){
        $this->nrodni = $nrodni;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getFechaNac(){
        return $this->fechaNac;
    }
    public function setFechaNac($fechaNac){
        $this->fechaNac = $fechaNac;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }
    public function getDomicilio(){
        return $this->domicilio;
    }
    public function setDomicilio($domicilio){
        $this->domicilio = $domicilio;
    }
    public function getColObjAuto(){
        return $this->colObjAuto;
    }
    public function setColObjAuto($colObjAuto){
        $this->colObjAuto = $colObjAuto;
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
        $sql="SELECT * FROM persona WHERE nroDni = ".$this->getNrodni();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $objAuto = new Auto();
                    $row['colObjAuto'] = $objAuto::listar("dniDuenio = ".$row['nroDni']);
                    if(count($row['colObjAuto'])!=0){
                        $row['colObjAuto'] = $row['colObjAuto'][0];
                    }
                    $this->setear($row['nroDni'], $row['apellido'], $row['nombre'], $row['fechaNac'], $row['telefono'], $row['domicilio'], $row['colObjAuto']);
                }
            }
        } else {
            $this->setOp("Persona->listar: ".$base->getError());
        }
        return $resp;
    
        
    }
    
    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="INSERT INTO persona(nroDni, apellido, nombre, fechaNac, telefono, domicilio) VALUES('".$this->getNroDni()."', '".$this->getApellido()."', '".$this->getNombre()."', '".$this->getFechaNac()."', '".$this->getTelefono()."', '".$this->getDomicilio()."');";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                //$this->setNrodni($elid);
                $resp = true;
            } else {
                $this->setOp("persona->insertar: ".$base->getError());
            }
        } else {
            $this->setOp("persona->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="UPDATE persona SET apellido='".$this->getApellido()."', nombre='".$this->getNombre()."', fechaNac='".$this->getFechaNac()."', telefono='".$this->getTelefono()."', domicilio='".$this->getDomicilio()."' WHERE nroDni=".$this->getNrodni();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setOp("persona->modificar: ".$base->getError());
            }
        } else {
            $this->setOp("persona->modificar: ".$base->getError());
        }
        return $resp;
    }
    
    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM persona WHERE nroDni=".$this->getNrodni();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setOp("persona->eliminar: ".$base->getError());
            }
        } else {
            $this->setOp("persona->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM persona ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $objAuto = new Auto();
                    $row['colObjAuto'] = $objAuto::listar("dniDuenio = ".$row['nroDni']);
                    if(count($row['colObjAuto'])!=0){
                        $row['colObjAuto'] = $row['colObjAuto'][0];
                    }
                    $obj= new persona();
                    $obj->setear($row['nroDni'], $row['apellido'], $row['nombre'], $row['fechaNac'], $row['telefono'], $row['domicilio'], $row['colObjAuto']);
                    array_push($arreglo, $obj);
                }
               
            }
            
        } else {
            $obj= new persona();
            $obj->setOp("persona->listar: ".$base->getError());
        }
 
        return $arreglo;
    }
}
?>