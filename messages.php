<?php
	session_start();
	include("includes/connect.php");
	include("includes/html_codes.php");
	if(isset($_POST['sendm'])){
		$x = $_SESSION['user_id'];
		$username = $_POST['uname'];
		echo"$username";
		$msg = $_POST['msg'];
		$s=mysql_query("select * from user where username = '$username'");
        $p=mysql_fetch_array($s);
        $rid=$p['user_id'];
        if(is_null($rid))
        {
        	header('Location:prompt.php?x=6');	
        }
        else{
			$result2=mysql_query( "insert into messages  values('$x','$msg','$rid')" ) or die(mysql_error());
			header('Location:prompt.php?x=5');
		}
	}
	
	

?>
<!DOCTYPE html>
<html lang="en">
<!-- Head Starts -->
	<head>
		<title>Messages</title>
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
			<div class="col-md-6">
					<form  class="form-horizontal login" action="" method="post"> 
						<h3>Send Message</h3>
				      		<div class="form-group">
				   				<div class="col-sm-8">
				       				<input type="text" class="form-control" placeholder="User ID" id="uname" name="uname" required>
			     				</div>
			  		 		</div>
							<div class="form-group">
				    			<div class="col-sm-8">
				   					<textarea type="text" class="form-control" placeholder="Message" id="msg" name="msg" required></textarea>
				   				</div>
							</div>
							
			  				<div class="form-group">
				    			<div class="col-sm-3 regb">
				      				<button type="submit" class="form-control" id="sendm" name="sendm" required>Send</button>
				   				</div>
				  			</div> 
		    		</form>	
			</div>

			<div class="col-md-6">
	             <!-- start for loop -->
	             <?php
	             	 $x = $_SESSION['user_id'];
	             	 $result1=mysql_query("select * from messages where receiver = '$x'");
				     $result2=mysql_fetch_array($result1);
        			 for($i=1;$i<=mysql_num_rows($result1);$i++){
        			 	$result1=mysql_query("select * from messages where receiver = '$x'");
				     	$result2=mysql_fetch_array($result1);
        			 	$userid=$result2['Sender'];
        			 	$result3=mysql_query("select * from user where user_id='$userid'");
				        $result4=mysql_fetch_array($result3);
				        $username=$result4['username'];
						$message=$result2['message'];
						
	        			 	echo "
				              		<div class=\"panel-group\" id=\"accordion\" role=\"tablist\" aria-multiselectable=\"true\">
								  	<div class=\"panel panel-default  rowcolor\">
								    <div class=\"panel-heading\" role=\"tab\" id=\"headingOne\">
								      <h4 class=\"panel-title\">
								        <a role=\"button\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#$i\" aria-expanded=\"false\" aria-controls=\"collapseOne\">
								          <div class=\"row\">
								            <div class=\"col-md-1\"></div>
					            			<div class=\"col-md-11\">
					            				<p style=\"padding-top: 5px;\">Message from: $username</p>
					            			</div>
								          </div>
								        </a>
								      </h4>
								    </div>
								    <div id=\"$i\" class=\"panel-collapse collapse\" role=\"tabpanel\" aria-labelledby=\"headingOne\">
								      <div class=\"panel-body\">
								        $message
								      </div>
								    </div>
								  	</div>	
									</div>
								";
								$result5 = mysql_query("update table messages set where message='$message' and Sender='$userid')");							
					 	
			}
				?>
<!-- End for loop -->
        	
        	</div>
        
        </div>
		<?php 	
			footerCode(); 
		?>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
<script>
    $('#headingOne').collapse('hide');
</script>
	</body>
</html>