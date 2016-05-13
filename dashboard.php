<?php
	session_start();
	include("includes/html_codes.php");
	include("includes/connect.php");
	$x = $_SESSION['user_id'];
	$s=mysql_query("select username from user where user_id=$x");
	$p=mysql_fetch_array($s);
	$username=$p['username'];
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
</head>
<body>
	<?php
            headerAndSearchCode();
    ?>
	<div class = "container" >
		<h3>
			Hello <?php echo" $username !"?>
		</h3>

		<div class="col-md-3 w3-card-4">
			<h4>Requests Sent</h4>
			<ol class="listeditems">
			<?php
				$result=mysql_query("select * from `".$x."`");
				for($i=1;$i<=mysql_num_rows($result);$i++){

					$rsname=mysql_query("select reqsItems from `".$x."` where id='$i'");
		            $row=mysql_fetch_array($rsname);
		            $reqsent=$row['reqsItems'];

		            $pname=mysql_query("select * from items where '$reqsent'=name");
            		$row=mysql_fetch_array($pname);
           	 		$pid=$row['id'];	

		            if($reqsent!=NULL)
		            echo "<li> <a href=\"single-product.php?x=$pid\"> $reqsent</a></li>";
				}
			?>
			</ol>
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-3  w3-card-4">
			<h4>Items Submitted</h4>
			<ol class="listeditems">
			<?php
				$result=mysql_query("select * from `".$x."`");
				for($i=1;$i<=mysql_num_rows($result);$i++){

					$subname=mysql_query(" select subItems from `".$x."`  where id='$i'");
		            $row=mysql_fetch_array($subname);
		            $submitted=$row['subItems'];

		            $pname=mysql_query("select * from items where '$submitted'=name");
            		$row=mysql_fetch_array($pname);
           	 		$pid=$row['id'];	

		            if($submitted!=NULL)
		            echo "<li><a href=\"single-product.php?x=$pid\">  $submitted </a></li>";
				}
			?>
			</ol>
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-3  w3-card-4">
			<h4>Requests Received</h4>
			<ol class="listeditems">
			<?php
				$result=mysql_query("select * from `".$x."`");
				for($i=1;$i<=mysql_num_rows($result);$i++){

					$sbname=mysql_query(" select reqrItems from `".$x."`  where id='$i'");
		            $rw=mysql_fetch_array($sbname);
		            $submited=$rw['reqrItems'];

		            $pname=mysql_query("select * from items where '$submited'=name");
            		$row=mysql_fetch_array($pname);
           	 		$pid=$row['id'];

		            if($submited!=NULL)
		            echo "<li><a href=\"single-product.php?x=$pid\">  $submited </a></li>";
				}
			?>
			</ol>
		</div>
		<div class="col-md-1"></div>
	</div>
	<?php 
            footerCode(); 
    ?>
</body>
</html>