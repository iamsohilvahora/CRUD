<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Visiting Cards- All Cards</title>
		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
		
		
	</head>
	<body>	
		<div class="container">
			<h1>Visiting Cards: All Cards</h1>
			<a href="form.php" class="btn btn-success">Add Card</a>
			<a class="btn btn-primary pull-right" onclick="print()">Print</a><br /><br />	

			<div class="row">
					<form method="post" class="form-group">
						<div class="col-md-12">
							<input type="text" class="form-control" id="search" placeholder="Search by your firstname">
							<div id="answer"></div>
						</div>
						<!--<div class="col-md-2">
							<input type="submit" id="search_btn" class="btn btn-success" value="Search" />
						</div>-->
			
					</form>
			</div>
			<br />
			
			<div class="row">		
					<div id="get_result"></div>
				  
					<div id="get_data"></div>	
						
					<div id="get_page"></div>
					
					<!--<tr>
							<td>Sohil Vahora</td>
							<td>sohilvahora1996@gmail.comsohi</td>
							<td>9824686104</td>
							<td><a href='' class='btn btn-primary'>View</a><a href='' class='btn btn-default'>Edit</a><a href='' class='btn btn-danger'>Delete</a></td>
						</tr>-->	

					

						
			</div>	

			
			
		</div>
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="main.js"></script>
	</body>
</html>




















