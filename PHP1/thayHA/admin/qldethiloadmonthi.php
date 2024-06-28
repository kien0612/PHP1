<div style="margin-top:1em;">
<label style="margin-left:1em; margin-right:0.5em;">Chọn môn thi</label>
	<select name="mt" id="monthi">
		<option value="">---</option>
<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
	if (isset($_POST['id'])){
		$kt=$_POST['id'];
		include("../config.php");
		mysqli_set_charset($connect,"utf8");
		$d=mysqli_query($connect,"select mamodun, tenmodun from modun where makythi='$kt'");
		while ($r=mysqli_fetch_array($d)){
			echo "<option value=".$r['mamodun'].">".$r['tenmodun']."</option>";
		}
	}
?>
	</select>
    </div>
<script>
	
</script>