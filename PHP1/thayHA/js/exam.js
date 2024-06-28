// JavaScript Document
function scrollToAnchor(aid){
	var aTag = $("div[id='" + aid + "']").offset().top;
    $('html,body').animate({ scrollTop: aTag}, 'slow');
    return false;
}

function fillBackground(label){
	$("div[id='"+label+"']").css("background-color","mediumseagreen");
}

function writechoose(str){
	var data=$(".examcontent_p2 .areaexam .dapan ."+str+" input:radio").val();
	var name=$(".examcontent_p2 .areaexam .dapan ."+str+" input:radio").attr("name");
	$.ajax({
		type: 'POST',
		url: 'savechoose.php',
		data: {id:data,name:name},
		success: function(data){}
	});
}