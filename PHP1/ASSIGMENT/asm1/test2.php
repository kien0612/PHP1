<?php

echo "<hr>";
$a = 0.1;
$b = 0.2;
$c = 0.3;

echo(round($a, 1));

if (round($a + $b, 2) == $c){ // làm tròn đến 1 chữ số thập phân
    echo 'Đúng';
} else {
    echo 'Sai';
}