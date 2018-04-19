$(document).ready(function (){
	
	$("#signup").click(function(){
		$("#login_first").slideUp("slow", function(){
			$("#login_second").slideDown("slow");
		});
	});
	
	$("#signin").click(function(){
		$("#login_second").slideUp("slow", function(){
			$("#login_first").slideDown("slow");
		});
	});
});


$(document).ready(function() {
	$("#login_first").show();
	$("#login_second").hide();
});