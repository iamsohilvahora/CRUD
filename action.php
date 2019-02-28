<?php
		include 'db.php';
		
		/* Get all data */
		if(isset($_POST['getCardData'])){
			
			$limit = 5;
			if(isset($_POST['setPage'])){
				$page = $_POST['pageNo'];	
				$start = ($page * $limit) - $limit ;
			}
			else{
				$start = 0;
			}
					
			$sql = "SELECT * FROM cards LIMIT $start, $limit";  
		 
			$run = mysqli_query($con, $sql);
			
			echo "<div class='table-responsive'>";
			echo "<table class='table table-bordered'>
						<tr>
							<th class='text-center'>Sr.No.</th>
							<th class='text-center'>Name</th>
							<th class='text-center'>Email</th>
							<th class='text-center'>Phone</th>
							<th class='text-center'>Action</th>
						</tr>";
						
			if(mysqli_num_rows($run) > 0){
				$count = 0;
				while($row = mysqli_fetch_array($run)){
					$count = $count +1;
					$id = $row['id'];
					$first = $row['first_name'];
					$last = $row['last_name'];
					$email = $row['email'];
					$phone = $row['phone'];
					
					echo "<tr class='text-center'>
							<td>$count</td>
							<td>$first $last</td>
							<td>$email</td>
							<td>$phone</td>
							<td><a href='view.php?id=$id' name='viewCardData' cid='$id' class='btn btn-primary view'>View</a>
								<a href='form.php?edit=$id' cid='$id' class='btn btn-default edit'>Edit</a>
								<a href='' cid='$id' class='btn btn-danger delete'>Delete</a></td>
						</tr>";
				}
			}
			echo "</table>";
						
						
				echo "</div>";		
	   }
	   
	   /* Pagination */
	   if(isset($_POST['page'])){
			$query = "SELECT * FROM cards";
			$run = mysqli_query($con, $query);
			
			$count = mysqli_num_rows($run);
			
			$page = ceil($count/5);
			
			echo "<center>";
			echo "<ul class='pagination pagination-md'>";
			for($i=1;$i<=$page;$i++){
				echo "<li><a href='#' page='$i' id='page'>$i</a></li>";
			}
			echo "</ul>";
			echo "</center>";
		}
	    
	   
	   /* Delete card data */
	   if(isset($_POST['deleteCardData'])){
			$id = $_POST['cid'];
		 
			$sql = "DELETE FROM cards WHERE id= '$id' ";
			
			if(mysqli_query($con, $sql)){
				echo "<div class='alert alert-warning alert-dismissible' role='alert'>
						  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
							   Record Deleted Successfully!
					 </div>";
				
			}			
	   }
	   
	   
	   /* Search data by firstname */
	   if(isset($_POST['search'])){
		   $keyword = $_POST['keyword'];
		   $sql = "SELECT * FROM cards WHERE first_name LIKE '%$keyword%'";
		   
		   $run = mysqli_query($con, $sql);
		   
		   echo "<div class='table-responsive'>";
			echo "<table class='table table-bordered'>
						<tr>
							<th class='text-center'>Sr.No</th>
							<th class='text-center'>Name</th>
							<th class='text-center'>Email</th>
							<th class='text-center'>Phone</th>
							<th class='text-center'>Action</th>
						</tr>";
						
			//$output = '<ul class="list-unstyled">';			
		   if(mysqli_num_rows($run) > 0){
			   $count = 0;
			   while($row = mysqli_fetch_array($run)){
				   $count +=1;
				   
				   $id = $row['id'];
					$first = $row['first_name'];
					$last = $row['last_name'];
					$email = $row['email'];
					$phone = $row['phone'];
					
					//$output .= '<li>'.$row["first_name"].' '.$row["last_name"].'</li>';
					echo "<tr class='text-center'>
							<td>$count</td>
							<td>$first $last</td>
							<td>$email</td>
							<td>$phone</td>
							<td><a href='view.php?id=$id' name='viewCardData' cid='$id' class='btn btn-primary view'>View</a>
								<a href='form.php?edit=$id' cid='$id' class='btn btn-default edit'>Edit</a>
								<a href='' cid='$id' class='btn btn-danger delete'>Delete</a></td>
						</tr>";
			   }
		   }
		   else{
					//$output .= '<li>Name Not Found</li>';
					echo '<p><b>Data Not Found</b></p>';
				}
				
				//$output .= '</ul>';
				//echo $output;
		  echo "</table>";
						
						
				echo "</div>";	
	   }
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   


?>