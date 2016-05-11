<?php
	session_start();
	include("includes/connect.php");
	include("includes/html_codes.php");

	//Register script
	if( isset($_POST['regbut']) ){
		$error = array();

		//first name
		if( ctype_alnum($_POST['fname']) ){
			$fname = $_POST['fname'];
		}

		//last name
		if( ctype_alnum($_POST['lname']) ){
			$lname = $_POST['lname'];
		}

		//username
		if( empty($_POST['username']) ){
			$error[] = 'Please enter a username.';
		}
		else if( ctype_alnum($_POST['username']) ){
			$username = $_POST['username'];
		}
		else{
			$error[] = 'Username must consist of letters and numbers only. ';	
		}

		//email
		if( empty($_POST['email']) ){
			$error[] = 'Please enter your email.';
		}
		else if( filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) ){
			$email = mysql_real_escape_string($_POST['email']);
		}
		else{
			$error[] = 'Your email is invalid. ';
		}

		//password
		if( empty($_POST['password']) ){
			$error[] = 'Please enter your password.';
		}
		else{
			$password = mysql_real_escape_string($_POST['password']);
		}

		if(empty($error)){
			$result=mysql_query("select * from user where email='$email' or username='$username'") or die(mysql_error());

			if(mysql_num_rows($result)==0){

				// $activation=md5(uniqid(rand(),true));
				$result2=mysql_query( "insert into user(user_id,fname,lname,username,email,password)
				values('','$fname','$lname','$username','$email','$password')" ) or die(mysql_error());
			}
			else
				header('Location:prompt.php?x=2');

			$result3 = mysql_query("select * from user where username='$username'");
			$row = mysql_fetch_array($result3);
			$x = $row['user_id'];
			$utable = mysql_query("create table `".$x."` (id Integer(50) PRIMARY KEY AUTO_INCREMENT,subItems varchar(50), reqrItems varchar(50), reqsItems varchar(50))");
		}
	}

	//Login script
	if( isset($_SESSION['user_id']) ){
		header('Location:dashboard.php');
	}

	if( isset($_POST['loginbut']) ){
		$error = array();

		//username
		if( empty($_POST['username']) ){
			$error[] = 'Please enter a username.';
		}
		else if( ctype_alnum($_POST['username']) ){
			$username = $_POST['username'];
		}
		else{
			$error[] = 'Username must consist of letters and numbers only. ';	
		}

		//password
		if( empty($_POST['password']) ){
			$error[] = 'Please enter your password.';
		}
		else{
			$password = mysql_real_escape_string($_POST['password']);
		}

		if(empty($error)){
			$result=mysql_query("select * from user where username='$username' and password='$password'") or die(mysql_error());

			if(mysql_num_rows($result)==1){
				//login code
				while( $row=mysql_fetch_array($result) ){
					$_SESSION['user_id'] = $row['user_id'];
					header('Location:dashboard.php');
				}
			}
			else
				header('Location:prompt.php?x=1');
		}
	}
	//Login script ends

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
		<!-- Header Starts -->
		<?php
			headerAndSearchCode();
		?>
		<!-- Header ends and Nav-Bar Stars-->
		
		<!-- Navbar Ends -->
		<div class="container">
			<div class="col-md-5">
				<form  class="form-horizontal register" action="register.php" method="post"> 
					<h3>REGISTER</h3>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-4">
								<input type="text" class="form-control" placeholder="First Name" id="fname" name="fname" required>
							</div>
							<div class="col-sm-1"></div>
							<div class="col-sm-4">
								<input type="text" class="form-control" placeholder="Last Name" id="lname" name="lname" required>
							</div>
						</div>
					</div> 	
		      		<div class="form-group">
		   				<div class="col-sm-8">
		       				<input type="email" class="form-control" placeholder="&#xf0e0;  E-Mail" id="email" name="email" required>
	     				</div>
	  		 		</div>
					<div class="form-group">
		    			<div class="col-sm-8">
		   					<input type="text" class="form-control" placeholder="&#xf007;  Username" id="username" name="username" required>
		   				</div>
	 				</div>
					<div class="form-group">
		    			<div class="col-sm-8">
		   					<input type="password" class="form-control" placeholder="&#xf023;  Password" id="password" name="password" required>
		   				</div>
					</div> 
	  				<div class="form-group">
		    			<div class="col-sm-3 regb">
		      				<button type="submit" class="form-control" id="regbut" name="regbut" required>Create</button>
		   				</div>
		  			</div> 
    			</form>
			</div>
			<div class="col-md-2">
			</div>
			<div class="col-md-5">
				<form  class="form-horizontal login" action="" method="post"> 
					<h3>LOGIN</h3>	
		      		<div class="form-group">
		   				<div class="col-sm-8">
		       				<input type="text" class="form-control" placeholder="&#xf007;  Username" id="username" name="username" required>
	     				</div>
	  		 		</div>
					<div class="form-group">
		    			<div class="col-sm-8">
		   					<input type="password" class="form-control" placeholder="&#xf023;  Password" id="password" name="password" required>
		   				</div>
					</div> 
	  				<div class="form-group">
		    			<div class="col-sm-3 regb">
		      				<button type="submit" class="form-control" id="loginbut" name="loginbut" required>Log In</button>
		   				</div>
		  			</div> 
    			</form>
			</div>
		</div>
		<?php 
			footerCode(); 
		?>
	</body>
<!-- Body Ends -->
</html>
