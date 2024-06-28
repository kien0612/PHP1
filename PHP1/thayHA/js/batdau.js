// JavaScript Document
function show(str){
	var d=$("."+str).text();
	$.ajax({
		type:'post',
		url:'batdauluusesion.php',
		data:{d:d},
		success: function(e){
			$(".loadchinh").css("display","none");
			$(".right").css("display","block");
			$(".load5").css("display","none");
			$(".load6").css("display","none");
			$(".load1").html(e);
		}
	});
}

$(document).ready(function(e) {
	$("#li6").click(function(e) {
		$(".loadchinh").css("display","block");
		$(".load5").css("display","none");
		$(".load6").css("display","none");
		$(".loadchinh").load("exportdiem.php");
 	});
	$("#li8").click(function(e) {
		$(".loadchinh").css("display","block");
		$(".load5").css("display","none");
		$(".load6").css("display","none");
		$(".loadchinh").load("qldethi.php");
 	});
	$("#li9").click(function(e) {
		$(".loadchinh").css("display","block");
		$(".load5").css("display","none");
		$(".load6").css("display","block");
		$(".loadchinh").load("taodethi.php");
 	});
	$("#li5").click(function(e) {
		$(".loadchinh").css("display","block");
		$(".load5").css("display","none");
		$(".load6").css("display","none");
		$(".loadchinh").load("pqthi.php");
 	});
	$("#li1").click(function(e){
		$(".loadchinh").css("display","block");
		$(".load5").css("display","block");
		$(".load6").css("display","none");
		$(".loadchinh").load("qtht.php");
 	});
	$("#li3").click(function(e) {
		$(".loadchinh").css("display","block");
		$(".load5").css("display","none");
		$(".load6").css("display","none");
		$(".loadchinh").load("dtdanhmuc.php");
 	});
});