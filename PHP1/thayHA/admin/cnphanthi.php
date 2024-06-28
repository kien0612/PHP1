<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Soạn đề thi</title>
    <link rel="shortcut icon" href="../image/icon.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="../js/jquery-3.1.1.js"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
    <style>
		#li4{color:rgba(255,204,0,1);}
	</style>
    <script>
		$(document).ready(function(e) {
			$("#idanhmuc").change(function(e) {
                var data=$("#tkch").serialize();
				$.ajax({
				type:'POST',
				url:'loadpthi.php',
				data:data,
				success: function(data)
				{
					$(".loadpthi").html(data);
				}
				});
				return false;
            });
		});
	</script> 
</head>

<body>
	<?php
    	require_once("menu.php");require_once("../config.php");
		mysqli_set_charset($connect,'utf8');
		$data=mysqli_query($connect,"select mamodun from modun");
	?>
    <div class="tttk" style="padding-top:3em;">
        <div class="p2">
        	<form name="tkch" id="tkch" method="post">
            	<span style="margin-left:2em;">Danh mục</span>
                	<select name="danhmuc" id="idanhmuc" style="margin-top:2em; width:30%;height:2em; margin-left:1em;">
                    	<option>--Chọn danh mục--</option>
                    	<?php
							while ($row=mysqli_fetch_array($data))
							{
								$html="<option value='".$row['mamodun']."'>".$row['mamodun']."</option>";
								echo $html;
							}
						?>
                    </select>
            </form>
        </div>
        <div class="loadpthi">
        	
        </div>
    </div>
</body>
</html>