<?php
	include 'db.php';
			$success = false;
			$error = null;
			$msg = '';
			$id = '';
			$first = $last = $email = $phone = '';
			
			if(isset($_REQUEST['edit'])){	 
				    $id = $_REQUEST['edit'];		 
					$sql = "SELECT * FROM cards WHERE id= '$id'";
					$run = mysqli_query($con, $sql);
					
					if(mysqli_num_rows($run) > 0){
						if($row = mysqli_fetch_array($run)){
							$id = $row['id'];
							$first = $row['first_name'];
							$last = $row['last_name'];
							$email = $row['email'];
							$phone = $row['phone'];						
						}
					}		
			}
			
			if(isset($_POST['save'])){		
				$id = (int)$_POST['hid'];
				$first = htmlspecialchars($_POST['first_name']);
				$last = htmlspecialchars($_POST['last_name']);
				$email = htmlspecialchars($_POST['email']);
				$phone = (int)$_POST['phone'];
				
				if(empty($first) || empty($last) || empty($email) || empty($phone)){
					$error =  'Please fil all fields';
					
				}
				else if($id != ''){
					$sql = "UPDATE cards SET first_name='$first', last_name='$last', email='$email', phone='$phone' WHERE id = '$id'";	
					$run = mysqli_query($con, $sql);
					if($run){
						$success = true;
						$msg = 'Data Edited successfully.';
					}	
				} 
				else{
					$sql = "INSERT INTO cards (id, first_name, last_name, email, phone) VALUES (NULL, '$first', '$last', '$email', '$phone')";
					$run = mysqli_query($con, $sql);
					if($run){
						$success = true;
						$msg = 'Registered successfully.';
						$first = $last = $email = $phone = '';
					}	
				}			
		   }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Visiting Cards- Add Card</title>
		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
	<body>	
		<div class="container">
			<h1 class="text-center">Visiting Card: All Cards</h1><br /><br /><br />
			
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<!-- <div id="get_msg"></div> -->
					<?php if (!is_null($error)): ?>
						<p class="alert alert-danger">
							<?php echo $error; ?>
						</p>
					<?php endif;?>
					<?php if ($success): ?>
						<p class="alert alert-success">
							<?php echo $msg; ?>
						</p>
					<?php endif;?>
					
				</div>
				<div class="col-md-4"></div>
			</div>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<form method="POST" action="form.php">
						<div class="row">
							<input type="hidden" name="hid" value="<?php echo $id; ?>" />
							<div class="col-md-6">
								<label for="first_name">First Name</label>
								<input type="text" name="first_name" id="first_name" class="form-control" value="<?php echo $first; ?>" />
							</div>
							<div class="col-md-6">
								<label for="last_name">Last Name</label>
								<input type="text" name="last_name" id="last_name" class="form-control" value="<?php echo $last; ?>" />
							</div>	
						</div><br />
						<div class="row">
							<div class="col-md-12">
								<label for="email">Email</label>
								<input type="email" name="email" id="email" class="form-control" value="<?php echo $email; ?>" />
							</div>
						</div><br />
						<div class="row">		
							<div class="col-md-12">
								<label for="phone">Phone No.</label>
								<input type="text" maxLength="10" name="phone" id="phone" class="form-control" value="<?php echo $phone; ?>" />
							</div>	
						</div><br />
						<div class="row">		
							<div class="col-md-12">
								<a href="index.php" class="btn btn-default pull-left">Back</a>
								<button type="submit" class="btn btn-success pull-right" name="save">Save</a>
							</div>	
						</div>
					</form>
					
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



















