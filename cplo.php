<html>
<head>
<style>
label{
  font-size: 20px;
  color: black;
}
.error {
  font-style: oblique;
  color: #FF0000;
  font-size: 18px;
  font-weight: bold;
}
table{
    width: 130%;
}
tr{
  height:40px;
}
</style>
</head>
<body>
  <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection (MySQLi Procedural)
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn)
 {
    die("Connection failed: " . mysqli_connect_error());
}
else
{
  $custid=$source=$destination=$date=$category=$weight="";
  $fromErr = $toErr = $cidErr = $dateErr = $cogErr =  $weiErr= "";
$from = $to = $cid  = $date = $cog = $wei= $from1 = $to1 = "";
if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
  if (empty($_POST["from"])) 
 {
    $fromErr = "Enter source address";
  } else
    {
    $from=$_POST["from"];
    if (!preg_match("/^[a-zA-Z ]*$/",$from)) {
      $fromErr = "Enter a Valid Address";
    }
    else
    {
      $from1=$from;
    }
  }
  
  if (empty($_POST["to"])) {
    $toErr = "Enter Destination address";
  } else {
    $to =$_POST["to"];
    if (!preg_match("/^[a-zA-Z ]*$/",$to)) {
      $toErr = "Enter a Valid Address";
    }
    else
    {
      $to1=$to;
    }
  }
  if (empty($_POST["date"])) {
    $dateErr = "Enter Date";
  } else {
    $date =$_POST["date"];
  }

  if (empty($_POST["cog"])) {
    $cogErr = "Enter Category of Goods";
  } else {
    $cog =$_POST["cog"];
  }
  if (empty($_POST["wei"])) {
    $weiErr = "Enter Weight";
  } else {
    $wei =$_POST["wei"];
  }

  if (empty($_POST["cid"])) {
    $cidErr = "Custid is required";
  } else {
    $cid =$_POST["cid"];
  }
$custid=$_POST["cid"];
$source=$from1;
$destination=$to1;
$date=$_POST["date"];
$category=$_POST["cog"];
$weight=$_POST["wei"];
if(!$custid ||!$source ||!$destination ||!$date ||!$category ||!$weight )
{
  echo "<script>alert(not success);</script>";
}
else
{
$sql="INSERT INTO pickup VALUES('".$custid."','".$source."','".$destination."','".$date."','".$category."','".$weight."')";
$result=mysqli_query($conn,$sql);
}
}
}
?> 
<?php include 'cust-login.php';?>
<?php
$fromErr = $toErr = $cidErr = $dateErr = $cogErr =  $weiErr= "";
$from = $to = $cid  = $date = $cog = $wei= $from1 = $to1 = "";
if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
 if (empty($_POST["from"])) 
 {
    $fromErr = "Enter source address";
  } else
    {
    $from=$_POST["from"];
    if (!preg_match("/^[a-zA-Z ]*$/",$from)) {
      $fromErr = "Enter a Valid Address";
    }
    else
    {
      $from1=$from;
    }
  }
  
  if (empty($_POST["to"])) {
    $toErr = "Enter Destination address";
  } else {
    $to =$_POST["to"];
    if (!preg_match("/^[a-zA-Z ]*$/",$to)) {
      $toErr = "Enter a Valid Address";
    }
    else
    {
      $to1=$to;
    }
  }
  if (empty($_POST["date"])) {
    $dateErr = "Enter Date";
  } else {
    $date =$_POST["date"];
  }

  if (empty($_POST["cog"])) {
    $cogErr = "Enter Category of Goods";
  } else {
    $cog =$_POST["cog"];
  }
  if (empty($_POST["wei"])) {
    $weiErr = "Enter Weight";
  } else {
    $wei =$_POST["wei"];
  }

  if (empty($_POST["cid"])) {
    $cidErr = "Custid is required";
  } else {
    $cid =$_POST["cid"];
  }
}
?>
<center><label><h2>PICK UP REQUEST</h1></label></center>
<center>
  <div style="width:600px;height:400px;">
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table>
  <tr>
      <td><label><b>CUSTOMER_ID:- </b></label></td><td><input type="text" name="cid">
      <span class="error">* <?php echo $cidErr;?></span></td>
  </tr>
<tr>  
  <td><label><b>FROM: </label></b></td><td><input type="text" name="from">
  <span class="error">* <?php echo $fromErr;?></span></td>
</tr>
  <tr>  
  <td><b><label>TO: </label></b></td><td><input type="text" name="to">
   <span class="error">* <?php echo $toErr;?></span></td>
</tr>
  <tr>
  <td><b><label>DATE: </label><b/></td><td><input type="date" name="date">
  <span class="error">* <?php echo $dateErr;?></span></td>
</tr>
  <tr>
    <td><b><label>CATEGORY OF GOODS </label></b></td><td><input list="text" name="cog">
  <span class="error">*<?php echo $cogErr;?></span></td>
</tr>
  <tr>
      <td>
      <label><b><label>APPROXIMATE-WEIGTH(*in KGs):-</label></b></label>
      </td>
      <td>
      <input type="number" name="wei" min="50" max="1000">
      <span class="error">*<?php echo $weiErr;?></span></td>
      </td>
    </tr>
</table>
<br><br>
  <input type="submit" name="submit" value="Request_pickup">  
</center>
</form>
</center>
</body>
</html>