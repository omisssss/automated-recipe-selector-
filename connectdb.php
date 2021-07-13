<!DOCTYPE html>
<html>
 


<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>automated recpie maker - browse </title>
    
         <link rel="stylesheet" href="http://localhost/omphpproj/css/omcss1.css"> 
      
         


         
</head>
<style>





.intro {
  background-color: yellow;
}

.bbb {
          /* background-image: url('http://localhost/foodytest.jpg'); */
          background-repeat: no-repeat; 
          background-attachment: fixed;
          background-size: cover;
          background-size: 100% 100%;
          background-color: purple;
          color: white
        }



        body   {
 background-color: blueviolet; 
  background-image: url(pixel2xl.jpeg);
  background-size: cover;
  transition: 0.8s;
}

  .details{
  float: left;
  padding: 20px;
  width: 100%;
  background-color: #f1f1f1;
  height: 300px; /* only for demonstration, should be removed */
}

 
#tab {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  
}

#tab td, #tab th {
  border: 1px solid #ddd;
  padding: 8px;
}

#tab tr:nth-child(even){background-color: #f2f2f2;}

#tab tr:hover {background-color: #ddd;}

#tab th  {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: purple;
    color: white;
}
 
 </style>

















<body>

<div class = "bbb"> <br>
  <center><h1> Here is the list of recepies in our collection...  </h1></center> <br>
</div>
  <div>
  <table id = "tab"> <br> <br>
  <tr>
    <th>Rcp_id</th>
    <th>Category</th>
    <th>Name</th>
    <th>Main Ingredient</th>
    <th>Ingredient 2</th>
    <th>Ingredient 3</th>
    <th>Procedure</th>
  </tr>

<!--  =========================================================== 
  PHP code below to connect to db and get the data  
 ===========================================================  -->
<?php
$servername = "localhost";
$database = "rcpdb";
$username = "root";
$password = "";

//// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

//// Check connection

if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
   }

//cretae a list of items chekcbox from ingredint checkbox 
$cat=$_POST["category"];
$sqlcat="";
if ($cat=='Veg')
        $sqlcat= "AND rcp_cat='Veg'";
elseif ($cat=='Non-Veg')
        $sqlcat= "AND rcp_cat='Non-veg'";
else
($sqlcat="");


$foodaa="";  
$food=$_POST["food"];



foreach  ($food as $check1)
{

$foodaa.=$check1."','";

}

 // create sql statementand fire it to db
 $sql1 = "SELECT rcp_id, rcp_cat ,rcp_name,ingr1,ingr2 , ingr3 , proced FROM rcp ";


 $sql4= " Where ( ingr1 in (". "'".$foodaa."b'".")";
 $sql5= " or ingr2 in (". "'".$foodaa."b'".") ";
 $sql6= " or ingr3 in (". "'".$foodaa."b'".") ) ";
 
 $sql = $sql1 . $sql4 . $sql5 . $sql6. $sqlcat.";" ;

//  print $sql;
 $result = $conn->query($sql); 

 // If there are results then fetch and print
//=========================================================== 
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    print "<tr>";
    
    print "<td> " . $row["rcp_id"]. "</td>";
    print "<td> " . $row["rcp_cat"]. "</td>";
    print "<td> " . $row["rcp_name"]. "</td>";
    print "<td> " . $row["ingr1"]. "</td>";
    print "<td> " . $row["ingr2"]. "</td>";
    print "<td> " . $row["ingr3"]. "</td> ";
    print "<td> " . $row["proced"]. "</td>";
    print "</tr>";
  }
} else {
  print "0 results";
}
 
//$conn->close();
 
 mysqli_close($conn);
 
?> 

<!--  =========================================================== 
  end of PHP code    
 ===========================================================  -->

</table>
 </div>
  <br> <br>
 <center>
 <div id="goback"> <button class="rbut"><a href="http://localhost/omphpproj/index.html"> Back to home </button></a></div>
</center>
</body>
</html>