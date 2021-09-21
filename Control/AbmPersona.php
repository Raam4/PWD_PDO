<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/PWD_PDO/configuracion.php');
include_once($ROOT."Modelo/Persona.php");
class AbmPersona{

    private function cargarObjeto($param){
        $obj = null;
        if(array_key_exists('NroDni',$param) and array_key_exists('Apellido',$param) and array_key_exists('Nombre',$param) and array_key_exists('FechaNac',$param) and array_key_exists('Telefono',$param) and array_key_exists('Domicilio',$param)){
            $obj = new Persona();
            $obj->setear($param['NroDni'], $param['Apellido'], $param['Nombre'], $param['FechaNac'], $param['Telefono'], $param['Domicilio']);
        }
        return $obj;
    }
    
    private function cargarObjetoConClave($param){
        $obj = null;
        if( isset($param['NroDni']) ){
            $obj = new Persona();
            $obj->setear($param['NroDni'], null, null, null, null, null);
        }
        return $obj;
    }
    
    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['NroDni']))
            $resp = true;
        return $resp;
    }

    public function alta($param){
        $resp = false;
        $param['NroDni'] = null;
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
            if  (isset($param['NroDni']))
                $where.=" and NroDni =".$param['NroDni'];
            if  (isset($param['Apellido']))
                 $where.=" and Apellido ='".$param['Apellido']."'";
            if  (isset($param['Nombre']))
                $where.=" and Nombre ='".$param['Nombre']."'";
            if  (isset($param['FechaNac']))
                $where.=" and FechaNac ='".$param['FechaNac']."'";
            if  (isset($param['Telefono']))
                $where.=" and Telefono ='".$param['Telefono']."'";
            if  (isset($param['Domicilio']))
                $where.=" and Domicilio ='".$param['Domicilio']."'";
        }
        $arreglo = Persona::listar($where);  
        return $arreglo;
    }
    
}
?>