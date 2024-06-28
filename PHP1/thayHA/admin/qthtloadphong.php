<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
	require_once('../config.php');
	mysqli_set_charset($connect,'utf8');
	echo "<p style='float:left; margin:0;margin-left:3em; margin-right:2.8em;'>Chọn phòng</p>
            <form method='post' id='loaddshvphong' style='margin-top:1em;'>
            	<select style='width:50%; height:1.6em;' id='phong' name='phong' style='margin-top:0.6em;'>
            		<option value=''>------</option>";
					if (isset($_SESSION['kythi'])){
						$phongthi=mysqli_query($connect,"SELECT distinct tenphongthi FROM hocvien where makythi='".$_SESSION['kythi']."'");
						while ($t=mysqli_fetch_array($phongthi))
							echo "<option value='".$t['tenphongthi']."'>".$t['tenphongthi']."</option>";
					}
	echo "</select>
            </form>";
?>

<script>
	$("#phong").change(function(e){
                var data=$("#loaddshvphong").serialize();//Lấy dữ liệu trong form
				//alert(data);
				$.ajax({
				type:'POST',
				url:'laydanhsachhvtheokythi.php',
				data:data,
				success: function(data){
					$(".loaddshv").html(data);
					//alert(data);
				}
				});
				return false;
            });
</script>