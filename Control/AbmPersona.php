<?php
class AbmPersona{
    private function seteadosCamposClaves($param){
        return isset($param['nroDni']);
    }

    public function alta($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $DB = new DB();
            $persona = $DB::factory('Persona')->create();
            $persona->set($param);
            if($persona->save()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    public function baja($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $DB = new DB();
            $persona = $DB::factory('Persona')->find_one($param['nroDni']);
            if($persona->delete()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    public function modificacion($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $DB = new DB();
            $persona = $DB::factory('Persona')->find_one($param['nroDni']);
            $persona->set($param);
            if($persona->save()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    public function buscar($param){
        $result = array();
        $DB = new DB();
        if(!$param){
            $personas = $DB::factory('Persona')->find_result_set();
        }else{
            $personas = $DB::factory('Persona')->where($param)->find_result_set();
        }
        foreach($personas as $obj){
            $arr = $obj->as_array();
            array_push($result, $arr);
        }
        return $result;
    }
}
?>