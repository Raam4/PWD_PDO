<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/PWD_PDO/configuracion.php');
include_once($ROOT."Modelo/Persona.php");
class AbmPersona{

    private function cargarObjeto($param){
        $obj = null;
        if(array_key_exists('nroDni',$param) and array_key_exists('apellido',$param) and array_key_exists('nombre',$param) and array_key_exists('fechaNac',$param) and array_key_exists('telefono',$param) and array_key_exists('domicilio',$param)){
            $obj = new Persona();
            $obj->setear($param['nroDni'], $param['apellido'], $param['nombre'], $param['fechaNac'], $param['telefono'], $param['domicilio']);
        }
        return $obj;
    }
    
    private function cargarObjetoConClave($param){
        $obj = null;
        if( isset($param['nroDni']) ){
            $obj = new Persona();
            $obj->setear($param['nroDni'], null, null, null, null, null);
        }
        return $obj;
    }
    
    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['nroDni']))
            $resp = true;
        return $resp;
    }

    public function alta($param){
        $resp = false;
        $param['nroDni'] = null;
        $elObjtPersona = $this->cargarObjeto($param);
        if ($elObjtPersona!=null and $elObjtPersona->insertar()){
            $resp = true;
        }
        return $resp;
    }
    
    public function baja($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtPersona = $this->cargarObjetoConClave($param);
            if ($elObjtPersona!=null and $elObjtPersona->eliminar()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    public function modificacion($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtPersona = $this->cargarObjeto($param);
            if($elObjtPersona!=null and $elObjtPersona->modificar()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    public function buscar($param){
        $where = " true ";
        if ($param<>NULL){
            if  (isset($param['nroDni']))
                $where.=" and nroDni =".$param['nroDni'];
            if  (isset($param['apellido']))
                 $where.=" and apellido ='".$param['apellido']."'";
            if  (isset($param['nombre']))
                $where.=" and nombre ='".$param['nombre']."'";
            if  (isset($param['fechaNac']))
                $where.=" and fechaNac ='".$param['fechaNac']."'";
            if  (isset($param['telefono']))
                $where.=" and telefono ='".$param['telefono']."'";
            if  (isset($param['domicilio']))
                $where.=" and domicilio ='".$param['domicilio']."'";
        }
        $arreglo = Persona::listar($where);  
        return $arreglo;
    }
    
}
?>