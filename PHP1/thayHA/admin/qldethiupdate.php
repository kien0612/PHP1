<?php
	//update quản lí đề thi
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
	if (isset($_POST['id'])){
		require_once("../config.php");
		mysqli_set_charset($connect,"utf8");
		$mt=$_SESSION['monthi1'];
		$b=$_POST['id'];
		$a=array();
		$a1=array();
		$a2=array();
		$a3=array();
		$a=preg_split("/&/",$b); //Cắt chuỗi vào mảng, ký tự phân cách '&'
		$len=count($a);
		$i=0;
		$socauhoi=0;
		while ($i<$len){
			$str=$a[$i];
			$j=0;$mch="";
			while ($str[$j]!="~"){
				$mch.=$str[$j];
				$j++;
			}
			//echo $mch."<br>";
			$j++;
			$md="";
			while ($str[$j]!="="){
				$md.=$str[$j];
				$j++;
			}
			//echo $md."<br>";
			$j++;
			$sl="";
			while ($j<strlen($str)){
				$sl.=$str[$j];
				$j++;
			}
			//echo $sl."<br>";
			$a1[$i]=$mch;
			$a2[$i]=$md;
			$a3[$i]=$sl;
			$socauhoi+=$sl;
			//echo $mch." - ".$md." - ".$sl."<br>";
			$i++;
		}
		$i--;
		$tongch=$_GET['SUM'];
		$tg=$_GET['time'];
		if ($tongch==$socauhoi){
			mysqli_query($connect,"delete from thoigianthi where mamodun='$mt'");
			mysqli_query($connect,"insert into thoigianthi (mamodun, tongcauhoi, tgthi)
									values ('".$mt."','".$tongch."','".$tg."')");
			mysqli_query($connect,"delete from dethiprofile where mamodun='$mt'") or die(mysqli_error($connect));
			$ii=0;
			while ($ii<=$i){
				$stt=$mt."-".$ii;
				mysqli_query($connect,"insert into dethiprofile (id, cauhoi, pmucdo, soluong ,mamodun) values ('".$stt."','".$a1[$ii]."','".$a2[$ii]."','".$a3[$ii]."','$mt')");
				$ii++;
			}
		}
		else echo "false";
		//print_r($a);
	}
?>