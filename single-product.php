<?php  
session_start();
    include("includes/connect.php");
    include("includes/html_codes.php");
    $x = $_GET['x'];
    $s=mysql_query("select * from items where id=$x");
    $p=mysql_fetch_array($s);
    $name=$p['name'];
    $desc=$p['idescription'];
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
    <link rel="stylesheet" href="css/prompt.css">  
    </head>
  <body>
   
       
    <?php
            headerAndSearchCode();
        ?>
    
    
    <div class="single-product-area" style="margin-top:10px;">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-content-right">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="img/polar.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-7">
                                <div class="product-inner">
                                    <h2 class="product-name"><?php echo "$name"?></h2>
                                    <div class="product-inner-price">
                                        <p style="font-size:14px"> <?php echo "$desc"?></p>
                                    </div>    
                                    
                                    
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        </div>
                                    
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>

    <?php 
            footerCode(); 
        ?>
    
  </body>
</html>