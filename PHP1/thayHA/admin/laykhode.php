<?php session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
	if ($_POST){
		require_once('../config.php');
		mysqli_set_charset($connect,'utf8');
		$_SESSION['danhmuc']=$_POST['danhmuc'];
		$dsdemuc=mysqli_query($connect,"select mabode,tenbode from BODE where mamodun='".$_POST['danhmuc']."'");
		
	}else echo"false";
?>

<script>
	$("#pthi").change(function(e) {
    data=$("#bodeload").serialize();//Lấy dữ liệu trong form
	$.ajax({
		type:'POST',
		url:'layde.php',
		data:data,
		success: function(data)
		{
			//alert(data);
			$("#loadndch").html(data);
		}
	});
	return false;
    });
	</script>

<form name="bodeload" id="bodeload" method="post">
	<span style="margin-left:2em;">Bộ đề</span>
        <select id="pthi" name="pthi" style="margin-top:1em;margin-left:7.6em;width:30%;height:2em;">
        	<option value="all">--Chọn phần thi--</option>
            <?php
				while ($r=mysqli_fetch_array($dsdemuc))
				{
					echo "<option value='".$r['mabode']."'>".$r['mabode']."-".$r['tenbode']."</option>";
				}
			?>
        </select>
	</form>