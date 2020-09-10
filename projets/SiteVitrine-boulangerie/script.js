	//Produits.php
$(".articles").mouseover(function opacity() {
 	$(this).animate({opacity: 1}, 500);
 	$("#viennoiserie").animate({});

 	$(".articles").mouseout(function() {
 		$(this).animate({opacity: 0.4}, 0);
 	});
});

	//Blog.php
function showComment(i) {
	$("#comment-"+i+"").toggle("slow");
}

function reponse(i){
	$("#repondre-"+i+"").toggle("slow");
}

function buttonToggle(i) {
	$("#sendButton-"+i+"").toggle("slow");
}
