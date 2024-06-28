<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
?>
<?php
	#lấy danh sách kỳ thi
	if ($_POST){
		require_once('../config.php');
		mysqli_set_charset($connect,'utf8');
		$makythi=$_POST['kythi'];
		$_SESSION['kythi']=$makythi;
		$dsmodun=mysqli_query($connect,"select mamodun, tenmodun from MODUN where makythi='$makythi'");
	}else echo"false";
?>

<body>
	<form name="tkch" id="tkch" method="post">
	<span style="margin-left:2em;">Danh mục</span>
    	<select name="danhmuc" id="idanhmuc" style="margin-top:2em; width:30%;height:2em; margin-left:1em;">
        <option>--Chọn danh mục--</option>
        <?php
			while ($row=mysqli_fetch_array($dsmodun))
			{
				$html="<option value='".$row['mamodun']."'>".$row['mamodun']."</option>";
				echo $html;
			}
		?>
        </select>
	</form>
</body>