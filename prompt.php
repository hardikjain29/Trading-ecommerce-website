<?php
	session_start();
	include("includes/connect.php");
	include("includes/html_codes.php");
	
	$x = $_GET['x'];
	function createMessage($x){
		if(is_numeric($x)){
			switch($x){
				case 0:
					$message = "Item Successfully Added";
					break;
				case 1:
					$message = "Invalid username/password";
					break;
				case 2:
					$message = "Entered email or username already exists";
					break;
				case 3:
					$message = "Entered item already exists";
					break;	
				case 4:
					$message = "Request has been sent.";
					break;
				case 5:
					$message = "Message Sent";
					break;
				case 6:
					$message = "Username does not Exist";
					break;
				default:
					$message = "Error";
			}
		echo $message;
		}
	}
?>

<!DOCTYPE html>
<html lang-"en">
<head>
	<title>Prompt</title>
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/main1.css">
	<link rel="stylesheet" href="css/prompt.css">
</head>
<body>
	<div id="wrapper">
		<?php headerAndSearchCode(); ?>

			<div id="outer">
				<div id="inner">
					<?php createMessage($x); ?>
				</div>				
			</div>

		<?php footerCode(); ?>
	</div>
</body>
