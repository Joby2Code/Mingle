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

function getLiveSearchUsers(value, user) {

	$.post("includes/handlers/ajax_search.php", {query:value, userLoggedIn: user}, function(data) {

		if($(".search_results_footer_empty")[0]) {
			$(".search_results_footer_empty").toggleClass("search_results_footer");
			$(".search_results_footer_empty").toggleClass("search_results_footer_empty");
		}

		$('.search_results').html(data);
		$('.search_results_footer').html("<a href='search.php?q=" + value + "'>See All Results</a>");

		if(data == "") {
			$('.search_results_footer').html("");
			$('.search_results_footer').toggleClass("search_results_footer_empty");
			$('.search_results_footer').toggleClass("search_results_footer");
		}

	});

}