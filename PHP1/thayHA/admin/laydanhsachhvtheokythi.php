<?php session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
?>
<?php
	#lấy danh sách thí sinh	
	if ($_POST)
	{
		$_SESSION['tenphong']=$_POST['phong'];
		require_once('../config.php');
		mysqli_set_charset($connect,'utf8');
		$tenphong=$_POST['phong'];
		$dshv=mysqli_query($connect,"select sbd,hodem,ten,ngaysinh,noisinh,HOCVIEN.madonvi as 'madonvi',tendonvi, tenphongthi from HOCVIEN,DONVI where HOCVIEN.madonvi=DONVI.madonvi and HOCVIEN.makythi='".$_SESSION['kythi']."' and hocvien.tenphongthi='$tenphong'");
	}
	else echo"false";
?>

<style>
	.thb{
		border:1px solid rgba(136,136,136,0.8);
		border-collapse:collapse;
		width:99%;
		margin:auto;
		margin-top:1em;
	}
	.thb td{
		padding:0.5em 0.5em;
		text-align:left;
	}
	
	.thb tr:nth-child(even){background-color:white;}
	.thb tr:nth-child(odd){background-color:#f1f1f1;}
	
	.thb tr:hover{
		cursor:default;
		background:rgba(0,102,153,0.1);
	}
	.thb th{
		height:22px;
		padding:0.1em;
		background:#4267b2;
		color:white;
		font-size:14px;
	}
</style>
<script>
	$("tr").click(function(e) {
		$("input[id='sbd']").val($(this).children("td:eq(0)").text());
		$("input[id='hodem']").val($(this).children("td:eq(1)").text());
		$("input[id='ten']").val($(this).children("td:eq(2)").text());
		$("input[id='ns']").val($(this).children("td:eq(3)").text());
		$("input[id='noisinh']").val($(this).children("td:eq(4)").text());
		$("input[id='madonvi']").val($(this).children("td:eq(5)").text());
		$("input[id='tendonvi']").val($(this).children("td:eq(6)").text());
		$("input[id='phongthi']").val($(this).children("td:eq(7)").text());
    });
</script>

<body>
<form method="post" action="" name='f'>
	<table class="thb" border="1">
    	<tr style="color:rgba(255,153,0,1); margin-bottom:2em;">
        	<th style='width:7%;'>SBD</th>
            <th style='width:13%;'>Họ đệm</th>
            <th style='width:7%;'>Tên</th>
            <th style='width:11%;'>Ngày sinh</th>
            <th style='width:15%;'>Nơi sinh</th>
            <th style='width:10%;'>Mã đơn vị</th>
            <th style='width:27%;'>Tên đơn vị</th>
            <th style='width:13%;'>Tên PT</th>
        </tr>
                
            <?php
				while ($r=mysqli_fetch_array($dshv))
				{
					echo "<tr>";
					echo "
						<td>".$r['sbd']."</td>
						<td>".$r['hodem']."</td>
						<td>".$r['ten']."</td>
						<td>".$r['ngaysinh']."</td>
						<td>".$r['noisinh']."</td>
						<td>".$r['madonvi']."</td>
						<td>".$r['tendonvi']."</td>
						<td>".$r['tenphongthi']."</td>
					";
					echo "</tr>";
				}
    		?>
	</table>
</form>
</body>