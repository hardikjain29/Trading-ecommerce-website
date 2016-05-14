<?php  
session_start();
    include("includes/connect.php");
    include("includes/html_codes.php");

    if( isset($_POST['reqbut']) ){
        $x = $_SESSION['user_id'];
        $s=mysql_query("select username from user where user_id=$x");
        $p=mysql_fetch_array($s);
        $username=$p['username'];
        if(is_null($username))
            header('Location:register.php');
            
        else{
            $z=$_POST['reqbut'];
            $result1=mysql_query("select * from items where id=$z");
            $p1=mysql_fetch_array($result1);
            $pn=$p1['name'];
            $r=mysql_query("insert into `".$x."` (reqsItems) values('$pn')") or die(mysql_error());
            $un=$p1['seller_id'];
            $r=mysql_query("insert into `".$un."` (reqrItems) values('$pn')") or die(mysql_error());
            header('Location:prompt.php?x=4');
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<!-- Head Starts -->
    <head>
        <title>Home Page</title>
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

    <div class="container">
    <img style="width:100%;height:450px;padding-top: 15px;" src="img/addtext_com_MDYxNjE3NDY4OTg2.jpg">
    </div>
    <div class="container mar">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <div class="brands_products"><!--brands_products-->
                            <h2>Categories</h2>
                            <div class="brands-name w3-card-12" style="background-color:#39424e">
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="products2.php?x=clothes" value="" typ> <span class="pull-right">(50)</span>Clothes</a></li>
                                    <li><a href="products2.php?x=computer"> <span class="pull-right">(56)</span>Computer Applications</a></li>
                                    <li><a href="products2.php?x=books"> <span class="pull-right">(27)</span>Books</a></li>
                                    <li><a href="products2.php?x=food"> <span class="pull-right">(32)</span>Food</a></li>
                                    <li><a href="products2.php?x=home"> <span class="pull-right">(5)</span>Home Decoration</a></li>
                                    <li><a href="products2.php?x=sport"> <span class="pull-right">(9)</span>Sport Items</a></li>
                                    <li><a href="products2.php?x=furni"> <span class="pull-right">(4)</span>Furniture</a></li>
                                    <li><a href="products2.php?x=electro"> <span class="pull-right">(4)</span>Electronics</a></li>
                                </ul>
                            </div>
                        </div><!--/brands_products-->
                    </div>
                </div>
                <div class="col-md-9 mar">
                 <h2 style="text-align: center;">Products</h2>
                    <div class="row" style="margin-bottom:15px">
                    
  </div>
    <?php

        $result=mysql_query("select * from items");
        for($i=1;$i<=mysql_num_rows($result);$i++){

            $pname=mysql_query("select * from items where id='$i'");
            $row=mysql_fetch_array($pname);
            $name=$row['name'];
            $desc=$row['idescription'];
            $exc=$row['Exchange'];
            $pid=$row['id'];
            
            echo"
            <div class=\"col-md-12 w3-card-8\">
                    <h4><a href=\"single-product.php?x=$pid\">$name</a></h4>
                    <div class=\"col-md-3\">
                        <img class=\"prod_im\" src=\"img/apple_me086ll_a_21_5_imac_desktop_computer_1006607.jpg\">    
                    </div>

                    <div style=\"margin-top:10px\" class=\"col-md-4\">
                        <p>$desc</p>     
                    </div>

                    <div style=\"margin-top:10px\" class=\"col-md-2\">
                        <p>Exchange product</p>
                        <ins>$exc</ins>
                    </div>

                    <form class=\"form-horizontal\" method=\"post\">
                        <div style=\"margin-top:10px;right:0\" class=\"col-md-3 pull-right\">
                            <button style=\"margin-top:6px\"  type=\"submit\" id=\"reqbut\"  value = \"'$pid'\" name=\"reqbut\">Request Owner</button>
                        </div>
                    </form>
            </div>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
            ";
        }
?>
        </div>
    </div>
</div>
    <?php 
            footerCode(); 
    ?>
  </body>
</html>