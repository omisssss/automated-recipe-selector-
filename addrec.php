<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/omcss1.css">
</head>
<body> <br> <br>
  <center>
    <h3> Thanks for sharing your recipe! Your recipe has been added to our database !</h3><br>
</center>
<div class="all-browsers">
<center>
    The name of your recipie is:   <?php echo $_POST["rname"]; ?><br><br>
Your recipe category  is:  <?php echo $_POST["rcpcat"]; ?> <br><br>
Ingredient 1:  <?php echo $_POST["ig1"]; ?><br><br>
Ingredient 2:  <?php echo $_POST["ig2"]; ?><br><br>
Ingredient 3:  <?php echo $_POST["ig3"]; ?><br><br>
<!-- The procedure  of your recipie:   <?php echo $_POST["procedure"]; ?><br> -->
</center>
</div>
<?php

$rname=$_POST["rname"];
$rcpcat=$_POST["rcpcat"];
$ig1=$_POST["ig1"];
$ig2=$_POST["ig2"];
$ig3=$_POST["ig3"];
$procedure=$_POST["procedure"];

// *******************
//start connecting to database 
$servername = "localhost";
$database = "rcpdb";
$username = "root";
$password = "";
// print  "Debug message to be removed after testing ..Connected staring";
//// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

//// Check connection

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
print "connect failed";
}

// print  "Debug message to be removed after testing ...Connected successfully  <br>";




 // create sql and send it to table
 $sql1 = "INSERT into rcp (rcp_name, rcp_cat, ingr1,ingr2,ingr3, proced )  VALUES ( " ;
 $sql2 =  '"'. $rname .'","'. $rcpcat .'","' .$ig1 .'","'.  $ig2 .'","' .$ig3 .'","'. $procedure .'"'. ")" ;
 $sql = $sql1.$sql2;
 //$sqlx="INSERT into rcp (rcp_name, rcp_cat, ingr1,ingr2,ingr3, proced )  VALUES ( '"'. $rname .'","'. $rcpcat .'","' .$ig1 .'","'.  $ig2 .'","' .$ig3 .'","'. $procedure .'"'. ")" ;
   
//  print $sql;
 
$result = $conn->query($sql);
 
if ( $result >= 1)
  { print " " ;
  }

//$conn->close();

 mysqli_close($conn);

//******************** */



?>

<br> <br>
<center>
<div id="goback"> <button class="rbut"><a href="http://localhost/omphpproj/index.html"> Back to home </button></a></div>
</center>
</body>
</html>