// JavaScript Document
function scrollToAnchor(aid) {
	var aTag = $("div[id='" + aid + "']").offset().top;
    $('html,body').animate({ scrollTop: aTag}, 'slow');
    return false;
}

function fillBackground(label){
	$("div[id='"+label+"']").css("background-color","#08acd1");
}

$(document).ready(function(e) { //Đăng xuất
	$("#redu").click(function(e){
	var t=1;
	$.ajax({
		type: 'post',
		url:'logout.php',
		data: {t:t},
		success: function (data){
			if (data=='true')window.location='index.php';
		}
	});
	});
});