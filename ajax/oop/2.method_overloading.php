<?php
// Having same name with different parameters =>overloading
//Having same name and parameter into different class =>overridding
class calculator{
    function __call($method_name,$params){
        if($method_name ='sum'){
            if(count($params)==2){
                return $params[0]+params[1];
            }
            else if(count($params)==3){
                return $params[0]+$params[1]+$params[2];
            }
            else if(count($params)==4){
                return $params[0]+$params[1]+$params[2]+$params[3];
            }
        }
        elseif($method_name =='product'){
            if(count($params)==2){
                return $params[0]*$params[1];
            }
        elseif(count($params)==3){
            return $params[0]*$params[1]*$params[2];
        }
        elseif(count($params)==4){
            return $params[0]*$params[1]*$params[2]*$params[3];
        }
        }

    }
}
        $calc = new Calculator();
        echo $calc->sum(65,98);
        echo '<br/>';
        echo $calc->sum(65,98,32);
        echo '<br/>';
        echo $calc->sum(65,98,32,45);
        echo '<br/>';
    

?>