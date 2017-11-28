<!DOCTYPE html>
<html>
    <head>
	<style text="text/css">
	td
	{
		padding-right: 250px;
		width: 50px;
		color:white;
	}
	tr
	{
		width: 100px;
		height: 50px;
	}
    center{
	color:white;
}
   table.i5 td
   {
   	padding-right: 50px;
		width: 50px;
		color:white;
   }
   .success
   {
   	position: absolute;
   	margin-top: 250px;
   	margin-left: 500px;
   	margin-right: 100px;
   }
    	</style>
</head>
<body background="1.jpg">
	<?php
	session_start();
	if(!isset($_SESSION['name']))
	{
		echo "<script type='text/javascript'>alert('please login firsot');";
        echo "window.location='login.php'";
        echo "</script>";
	}

	?>
	<?php include 'cust-login.php';?>
	<?php
$server="localhost";
$username="root";
$password="";
$dbname="project";
$conn=mysqli_connect($server,$username,$password,$dbname);
if(!$conn)
{
	die('could not connect'.mysql_error());
}
else
{
	$custid=$order="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$custid=$_POST['cid'];
$order=$_POST['orderid'];
$sql="SELECT * from updatet where order_id='$order'";
	$result=mysqli_query($conn,$sql);
	if($result)
	{
		while($row = $result->fetch_assoc()) 
	{
      		$cust=$row['customer_id'];
			$oi=$row['order_id'];
			$from=$row['receive'];
			$place=$row['current'];
			$next=$row['next'];
			echo "<div class=\"success\">";
		   echo "<table border=0>";
			echo "<tr><td>CUSTOMER_ID</td>"."<td>".$cust."</td>"."<td></tr>"."<tr><td>ORDER_ID</td>"."<td>".$oi."</td></tr>"."<tr><td>FROM</td>"."<td>".$from."</td></tr>"."<tr><td>CURRENT_PLACE</td>"."<td>".$place."</td></tr>"."<tr><td>NEXT_PLACE:</td>"."<td>".$next."</td></tr>";
			echo "</table></div>";
	}
	}
	else
	{
		echo "not sucess";
	}	
}
}





	?>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		</br>
	<center>
	<div style="width:800px;height:350px;">
	<center><h1><b>TRACK ORDER</b></h1></center>
	</br>
	<label><b>ORDER ID:</b></label><input type="text" name="orderid"/><input type="submit" value="SEARCH">	
	</center>
	</div>
</form>
</body>
</html>