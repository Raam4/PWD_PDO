<?php
class AbmPersona{
    private function seteadosCamposClaves($param){
        return isset($param['nroDni']);
    }

    public function alta($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $modOrm = new ModOrm();
            $persona = $modOrm::factory('Persona')->create();
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
            $modOrm = new ModOrm();
            $persona = $modOrm::factory('Persona')->find_one($param['nroDni']);
            if($persona->delete()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    public function modificacion($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $modOrm = new ModOrm();
            $persona = $modOrm::factory('Persona')->find_one($param['nroDni']);
            $persona->set($param);
            if($persona->save()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    public function buscar($param){
        $result = array();
        $modOrm = new ModOrm();
        if(!$param){
            $personas = $modOrm::factory('Persona')->find_result_set();
        }else{
            $personas = $modOrm::factory('Persona')->where($param)->find_result_set();
        }
        foreach($personas as $obj){
            $arr = $obj->as_array();
            array_push($result, $arr);
        }
        return $result;
    }
}
?>