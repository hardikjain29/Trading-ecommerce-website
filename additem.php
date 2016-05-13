<?php
	session_start();
	include("includes/connect.php");
	include("includes/html_codes.php");
	//$x = $_SESSION['user_id'];
	if(isset($_POST['addbut'])){

		$x = $_SESSION['user_id'];

		
			$iname = $_POST['iname'];
			$idesc = $_POST['idesc'];
			$iwant = $_POST['iwant'];

			
		$category = $_POST['category'];
		$result=mysql_query("select * from items where name='$iname' and idescription='$idesc' and category='$category'") or die
		(mysql_error());
		if(mysql_num_rows($result)==0)
		{
			// $activation=md5(uniqid(rand(),true));
			$result1=mysql_query("insert into `".$x."` (subItems) values('$iname')");

			$result2=mysql_query( "insert into items(id,name,idescription,exchange,category,seller_id)
			values('','$iname','$idesc','$iwant','$category','$x')" ) or die(mysql_error());
			header('Location:prompt.php?x=0');

		}
		else
			header('Location:prompt.php?x=3');
	}

	
?>

<!DOCTYPE html>
<html lang="en">
<!-- Head Starts -->
	<head>
		<title>Register</title>
		<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
		<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/main1.css">	
	</head>
<!-- Head Ends And Body Starts -->
	<body>
		<?php
			headerAndSearchCode();
		?>
		<div class="container">
			<div class="col-md-3"></div>
			<div class="col-md-6">
					<form  class="form-horizontal login" action="" method="post"> 
						<h3>Add Item</h3>
				      		<div class="form-group">
				   				<div class="col-sm-8">
				       				<input type="text" class="form-control" placeholder="Item name" id="iname" name="iname" required>
			     				</div>
			  		 		</div>
							<div class="form-group">
				    			<div class="col-sm-8">
				   					<textarea type="text" class="form-control" placeholder="Item Description" id="idesc" name="idesc" required></textarea>
				   				</div>
							</div>
							<div class="form-group">
				   				<div class="col-sm-8">
				       				<input type="text" class="form-control" placeholder="Item Wanted" id="iwant" name="iwant" required>
			     				</div>
			  		 		</div>
			  		 		<div class="form-group">
			  		 			<div class="col-sm-8">
			  		 				<div class="col-md-4">
			  		 					<label>Categories</label>
			  		 				</div>
			  		 				<div class="col-md-8">
					       				<select style="width: 220px" id="category" name="category">
					       					<option value="computer" name="computer">Computer Appliances</option>
					       					<option value="clothes">Clothes</option>
					       					<option value="food">Food</option>
					       					<option value="books">Books</option>
					       					<option value="home">Home Decoration</option>
					       					<option value="furni">Furniture</option>
					       					<option value="electro">Electronics</option>
					       				</select>
					       			</div> 	
			     				</div>
			  		 		</div>
			  		 		<div class="form-group">
				   				<div class="col-sm-8">
				       				<div class="col-md-4"><label>Image 1</label></div>
				       					<div class="col-md-8">
				       						<input type="file">
				       					</div>
			     				</div>
			  		 		</div><div class="form-group">
				   				<div class="col-sm-8">
				       				<div class="col-md-4"><label>Image 2</label></div>
				       					<div class="col-md-8">
				       						<input type="file">
				       					</div>
			     				</div>
			  		 		</div> 
			  				<div class="form-group">
				    			<div class="col-sm-3 regb">
				      				<button type="submit" class="form-control" id="addbut" name="addbut" required>Add</button>
				   				</div>
				  			</div> 
		    		</form>	
			</div>
			<div class="col-md-3"></div>
		</div>
			<?php 	
			footerCode(); 
			?>
	</body>
</html>