<?php
    require 'sql.php';
    $sql_delete_all = 'DELETE FROM students';
    $delete_all_student = $connect->prepare($sql_delete_all);
    $delete_all_student->execute();
    header('Location: index.php');
?>
