<?php
    try {
        $conn = new PDO (
            "mysql:host=localhost;
            dbname=asm2_22;
            charset=utf8", "root", "");
    } catch(\Throwable $th) {
        //Throw $th;
        echo "Ket noi khong thanh cong";
    }
?>
