<?php
	session_start();
	if (isset($_POST['t'])){
		session_destroy();
		echo "true";
	}
?>