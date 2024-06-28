<?php
	require_once("../config.php");
	mysqli_set_charset($connect,'utf8');
	if (isset($_POST['danhmuc'])) $pt=$_POST['danhmuc'];
	$queryd=mysqli_query($connect,"select count(macauhoi) as 'soluongde' from cauhoi where mamodun='$pt' and mucdo='Dễ'"); //số câu dễ
	$r1=mysqli_fetch_array($queryd);
	$queryt=mysqli_query($connect,"select count(macauhoi) as 'soluongtb' from cauhoi where mamodun='$pt' and mucdo='Trung bình'"); //số câu trung bình
	$r2=mysqli_fetch_array($queryt);
	$queryk=mysqli_query($connect,"select count(macauhoi) as 'soluongkho' from cauhoi where mamodun='$pt' and mucdo='Khó'"); //Số câu khó
	$r3=mysqli_fetch_array($queryk);
?>

<style>
	table{border-collapse:collapse;width:97%;margin-left:1em;padding:0.5em;} td{padding:0.5em;border-left:none;border-right:none;text-align:center;} tr:hover{cursor:default;background:rgba(187,187,187,0.6);} th{height:50px; padding:0.5em;}
</style>
<table>
    	<tr style="margin-bottom:2em;">
            <th style='width:30%;'>Phần thi</th>
            <th style='width:8%;'>Sửa</th>
            <th style='width:8%;'>Xóa</th>
        </tr>
        <tr style="margin-bottom:2em;">
            <td><?php echo $pt.'_Khó ('.$r3['soluongkho'].' câu)'; ?></td>
        </tr>
        <tr style="margin-bottom:2em;">
            <td><?php echo $pt.'_Trung bình ('.$r2['soluongtb'].' câu)'; ?></td>
        </tr>
        <tr style="margin-bottom:2em;">
            <td><?php echo $pt.'_Dễ ('.$r1['soluongde'].' câu)'; ?></td>
        </tr>
</table>