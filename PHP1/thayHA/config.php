<?php
	#Kết nối cơ sở dữ liệu
	$server="localhost";
	$user="abc";
	$mk="842194";
	$csdl="thi_tin_hoc";
	$connect=mysqli_connect($server,$user,$mk,$csdl) or die("Lỗi kết nối cơ sở dữ liệu ");
?>