<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Visiting Cards- View Data</title>
		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>

<?php
	include 'db.php';
			
	 if(isset($_REQUEST['id'])){
			$id = $_REQUEST['id'];
		 
			$sql = "SELECT * FROM cards WHERE id= '$id'";
			
			$run = mysqli_query($con, $sql);
			
				
				
			if(mysqli_num_rows($run) > 0){
				if($row = mysqli_fetch_array($run)){
					
					$first = $row['first_name'];
					$last = $row['last_name'];
					$email = $row['email'];
					$phone = $row['phone'];
					
					
				}
			}	
			else{
				
				echo "<div class='col-md-4'></div><div class='col-md-4'><div class='alert alert-danger'>Could not find Card.</div></div><div class='col-md-4'></div>";
				die();
				
			}
			
	   }
?>

	<body style="background: #ddd;">	
		<div class="container">
			<h1 class="text-center">Visiting Cards: All Cards</h1>
			
			
			
			<div class="row" style="margin-top: 100px;">
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<div class='panel panel-default'>
						  <div class='panel-heading text-center'><h2><?php echo $first.' '.$last; ?></h2></div>
						  <div class='panel-body'>
							<h4><?php echo $email; ?></h4>
							<h4><?php echo $phone; ?></h4>
						  </div>
						</div>
					</div>
					<div class="col-md-4"></div>
								
			</div>
		</div>
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="main.js"></script>
	</body>
</html>




















