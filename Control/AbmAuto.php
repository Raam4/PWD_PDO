<?php
class AbmAuto{
    
    private function seteadosCamposClaves($param){
        return isset($param['patente']);
    }

    public function alta($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $modOrm = new ModOrm();
            $objAuto = $modOrm::for_table('auto')->create();
            $objAuto->set($param);
            if($objAuto->save()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    public function baja($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $modOrm = new ModOrm();
            $objAuto = $modOrm::for_table('auto')->where($param['patente'])->find_one();
            if($objAuto->delete()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    public function modificacion($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $modOrm = new ModOrm();
            $objAuto = $modOrm::for_table('auto')->where('patente', $param['patente'])->find_one();
            $objAuto->set($param);
            if($objAuto->save()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    public function buscar($param){
        $result = array();
        $modOrm = new ModOrm();
        if(!$param){
            $objAuto = $modOrm::for_table('auto')->find_result_set();
        }else{
            $objAuto = $modOrm::for_table('auto')->where($param)->find_result_set();
        }
        foreach($objAuto as $obj){
            array_push($result, $obj->as_array());
        }
        return $result;
    }
}
