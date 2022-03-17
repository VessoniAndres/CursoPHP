<?php
    function multiplicate($n1, $n2){
        return $n1*$n2;
    };
    function isNumber($n1, $n2){
        if(is_numeric($n1) && is_numeric($n2)){
            return true;
        }else{
            return false;
        }
    };
    function showError(){
        echo '<span class="error">enter only numbers</span>';
    };
    function validateFields(){
        if(isset($_POST['number1']) && isset($_POST['number2'])){
            $n1 = $_POST['number1'];
            $n2 = $_POST['number2'];
            if(isNumber($n1,$n2)){
                echo multiplicate($n1,$n2);
            }else{
                showError();
            };
        };
    };

?>