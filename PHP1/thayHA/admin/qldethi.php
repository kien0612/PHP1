<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
?>
<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="../image/icon.png" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<script src="../js/jquery-3.1.1.js"></script>
<style>
	#li8{
		color:rgba(255,204,0,1);
		font-weight:bolder;
	}
</style>
<script>
	$(document).ready(function(e) {
        $(document).ready(function(e) {
		$("#monthi").change(function(e) {
			var d=$("#monthi").val();
            $.ajax({
				type: 'post',
				url: 'qldethiloadmodule.php',
				data: {id:d},
				success: function(data){
					//alert(data);
					$(".load13").html(data);
				}
			});
        });
    });
    });
</script>
</head>

<body>
<div class="M1">
	<div class="M02">
		<h3 style="margin-left:0.9em;" >CHỌN MÔN THI</h3>
  		<label style="margin-left:1em; margin-right:1.5em;">Chọn môn thi</label>
  		<select name="mt" id="monthi">
    		<option value="">---</option>
    		<?php
        		require_once("../config.php");
				mysqli_set_charset($connect,"utf8");
        		$d=mysqli_query($connect,"select mamodun, tenmodun from modun where makythi='".$_SESSION['kythi']."'");
				while ($r=mysqli_fetch_array($d)){
					echo "<option value=".$r['mamodun'].">".$r['tenmodun']."</option>";
				}
    		?>
  		</select>
  
      <div class="load">
      </div>
      
      <hr style="margin-top:1em;">
       
      <div class="load13">
      </div>
  </div>
  </div>
<!-- end .container -->
</div>
</body>
</html>