<?php
class AbmPersona{
    private function seteadosCamposClaves($param){
        return isset($param['nroDni']);
    }

    public function alta($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $DB = new DB();
            $objPersona = $DB::for_table('persona')->create();
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
            $DB = new DB();
            $objPersona = $DB::for_table('persona')->where($param['nroDni'])->find_one();
            if($objPersona->delete()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    public function modificacion($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $DB = new DB();
            $objPersona = $DB::for_table('persona')->where('nroDni', $param['nroDni'])->find_one();
            $objPersona->set($param);
            if($objPersona->save()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    public function buscar($param){
        $result = array();
        $DB = new DB();
        if(!$param){
            $objPersona = $DB::for_table('persona')->find_result_set();
        }else{
            $objPersona = $DB::for_table('persona')->where($param)->find_result_set();
        }
        foreach($objPersona as $obj){
            array_push($result, $obj->as_array());
        }
        return $result;
    }
}
?>
