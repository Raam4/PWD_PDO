<?php
class AbmPersona{
    private function seteadosCamposClaves($param){
        return isset($param['nroDni']);
    }

    public function alta($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $modOrm = new ModOrm();
            $objPersona = $modOrm::for_table('persona')->create();
            $objPersona->set($param);
            if($objPersona->save()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    public function baja($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $modOrm = new ModOrm();
            $objPersona = $modOrm::for_table('persona')->where($param['nroDni'])->find_one();
            if($objPersona->delete()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    public function modificacion($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $modOrm = new ModOrm();
            $objPersona = $modOrm::for_table('persona')->where('nroDni', $param['nroDni'])->find_one();
            $objPersona->set($param);
            if($objPersona->save()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    public function buscar($param){
        $result = array();
        $modOrm = new ModOrm();
        if(!$param){
            $objPersona = $modOrm::for_table('persona')->find_result_set();
        }else{
            $objPersona = $modOrm::for_table('persona')->where($param)->find_result_set();
        }
        foreach($objPersona as $obj){
            array_push($result, $obj->as_array());
        }
        return $result;
    }
}
?>
