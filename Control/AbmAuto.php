<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/PWD_PDO/configuracion.php');
include_once($ROOT."Modelo/Auto.php");
class AbmAuto{

    private function cargarObjeto($param){
        $obj = null;
        if(array_key_exists('Patente',$param) and array_key_exists('Marca',$param) and array_key_exists('Modelo',$param) and array_key_exists('DniDuenio',$param)){
            $obj = new Auto();
            $obj->setear($param['Patente'], $param['Marca'], $param['Modelo'], $param['DniDuenio']);
        }
        return $obj;
    }
    
    private function cargarObjetoConClave($param){
        $obj = null;
        if( isset($param['Patente']) ){
            $obj = new Auto();
            $obj->setear($param['Patente'], null, null, null);
        }
        return $obj;
    }
    
    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['Patente']))
            $resp = true;
        return $resp;
    }

    public function alta($param){
        $resp = false;
        $param['Patente'] = null;
        $elObjtAuto = $this->cargarObjeto($param);
        if ($elObjtAuto!=null and $elObjtAuto->insertar()){
            $resp = true;
        }
        return $resp;
    }
    
    public function baja($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtAuto = $this->cargarObjetoConClave($param);
            if ($elObjtAuto!=null and $elObjtAuto->eliminar()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    public function modificacion($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtAuto = $this->cargarObjeto($param);
            if($elObjtAuto!=null and $elObjtAuto->modificar()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    public function buscar($param){
        $where = " true ";
        if ($param<>NULL){
            if  (isset($param['patente']))
                $where.=" and Patente ='".$param['patente']."'";
            if  (isset($param['marca']))
                 $where.=" and Marca ='".$param['marca']."'";
            if  (isset($param['modelo']))
                $where.=" and Modelo ='".$param['modelo']."'";
            if  (isset($param['dniDuenio']))
                $where.=" and DniDuenio ='".$param['dniDuenio']."'";
        }
        $arreglo = Auto::listar($where);
        return $arreglo;
    }
    
}