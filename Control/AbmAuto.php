<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/PWD_PDO/configuracion.php');
include_once(MODEL_PATH."Auto.php");
class AbmAuto{

    private function cargarObjeto($param){
        $obj = null;
        if(array_key_exists('patente',$param) and array_key_exists('marca',$param) and array_key_exists('modelo',$param) and array_key_exists('dniDuenio',$param)){
            $obj = new Auto();
            $obj->setear($param['patente'], $param['marca'], $param['modelo'], $param['dniDuenio']);
        }
        return $obj;
    }
    
    private function cargarObjetoConClave($param){
        $obj = null;
        if( isset($param['patente']) ){
            $obj = new Auto();
            $obj->setear($param['patente'], null, null, null);
        }
        return $obj;
    }
    
    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['patente']))
            $resp = true;
        return $resp;
    }

    public function alta($param){
        $resp = false;
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
                $where.=" and patente ='".$param['patente']."'";
            if  (isset($param['marca']))
                 $where.=" and marca ='".$param['marca']."'";
            if  (isset($param['modelo']))
                $where.=" and modelo ='".$param['modelo']."'";
            if  (isset($param['dniDuenio']))
                $where.=" and dniDuenio ='".$param['dniDuenio']."'";
        }
        $arreglo = Auto::listar($where);
        $arreglo = $this->objToArr($arreglo);
        return $arreglo;
    }
    
    public function objToArr($arrOfObj){
        $result = array();
        foreach($arrOfObj as $obj){
            $arr = [
                'patente' => $obj->getPatente(),
                'marca' => $obj->getMarca(),
                'modelo' => $obj->getModelo(),
                'dniDuenio' => $obj->getDniDuenio()
            ];
            array_push($result, $arr);
        }
        return $result;
    }
}