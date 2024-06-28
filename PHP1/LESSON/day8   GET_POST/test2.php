<?php
    if (isset($_POST["a"]) && isset($_POST["b"])){
        $a = $_POST["a"];
        $b = $_POST["b"];
        if ( $a == 0){
           echo ($b == 0) ? "Phương trình $a x + $b = 0 vô số nghiệm !" : "Phương trình $a x + $b = 0 vô nghiệm !";
        }else {
           echo ($b == 0) ? "Phương trình $a x + $b = 0 có nghiệm x = 0" : "Phương trình $a x + $b = 0 có nghiệm x = " . -$b/$a;
        }
    }
?>