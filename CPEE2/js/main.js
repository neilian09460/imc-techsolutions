$(document).ready(function(){
	
	$("body").delegate("#addProd","click",function(event){
		event.preventDefault();
		var p_id = $(this).attr('value');
		console.log(p_id);
		$.ajax({
			url : "action.php",
			method : "GET",
			data : {addToProduct:1, product_id:p_id},
			success : function(data){
				$("#product_msg").html(data);
			}
		})
	})


	// $("#checkout").click(function(event){
	// 	event.preventDefault();
	// 	$.ajax({
	// 		url : "action.php",
	// 		method : "POST",
	// 		data : {checkout:1, },
	// 		success : function(data){
	// 			$("").html(data);
	// 		}
	// 	})
	// })

})	