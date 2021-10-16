<?php
class AbmAuto{
    private function seteadosCamposClaves($param){
        return isset($param['patente']);
    }

    public function alta($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $DB = new DB();
            $auto = $DB::factory('Auto')->create();
            $auto->set($param);
            if($auto->save()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    public function baja($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $DB = new DB();
            $auto = $DB::factory('Auto')->find_one($param['patente']);
            if($auto->delete()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    public function modificacion($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $DB = new DB();
            $auto = $DB::factory('Auto')->find_one($param['patente']);
            $auto->set($param);
            if($auto->save()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    public function buscar($param){
        $result = array();
        $DB = new DB();
        if(!$param){
            $autos = $DB::factory('Auto')->find_result_set();
        }else{
            $autos = $DB::factory('Auto')->where($param)->find_result_set();
        }
        foreach($autos as $obj){
            $arr = $obj->as_array();
            array_push($result, $arr);
        }
        return $result;
    }
}