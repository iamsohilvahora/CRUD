$(document).ready(function(){
	getData();
	/*    Add Card Data       */
	/*
		$("#save").on("click", function(event){
			event.preventDefault();
			
			
			
			$.ajax({
				type: "POST",
				url: "form.php",
				data: $('form').serialize(),
				success: function(data){
					$("#get_msg").html(data);
						$("#first_name").val('');
						$("#last_name").val('');
						$("#email").val('');
						$("#phone").val('');
				}
			});
			
		});
	*/
	
	
	/*    Getting card data on index.php page*/
	function getData(){
		
		$.ajax({
			type: "POST",
			url: "action.php",
			data: {getCardData:1},
			success: function(data){
				$("#get_data").html(data);
			}
		});
		
	}
	
	
	/*        Delete card data         */
	$("body").delegate(".delete", "click", function(event){
		event.preventDefault();
		
		var cid = $(this).attr('cid');
		
		$.ajax({
			type: "POST",
			url: "action.php",
			data: {deleteCardData:1, cid:cid},
			success: function(data){
				$("#get_result").html(data);
				
				getData();
			}
		});	
	});
	
	
	/* Pagination */
	
	page();
	function page(){
		
		$.ajax({
				method: "POST",
				url: "action.php",
				data: {page:1},
				success: function(data){
						$("#get_page").html(data);
				}		
		});	
	}
	
	$('body').delegate('#page','click', function(){
		var pn = $(this).attr('page');
		$.ajax({
				method: "POST",
				url: "action.php",
				data: {getCardData:1, setPage:1, pageNo:pn},
				success: function(data){
						$("#get_data").html(data);
				}		
		});	
	});
	
	/* Search by firstname */
	$("#search").keyup(function(){
		var keyword = $(this).val();
		
		
		
		if(keyword != ""){
				$.ajax({
				type: "POST",
				url: "action.php",
				data: {search:1, keyword:keyword},
				success: function(data){
					$("#get_data").fadeIn();
					$("#get_data").html(data);
				}
			});
		}
	});
	
	/*$(document).on("click", "li", function(){
					$("#search").val($(this).text());
					$("#answer").fadeOut();				
	});	*/
	
	
	
	
	
	
	
	
	
	
	
	
});