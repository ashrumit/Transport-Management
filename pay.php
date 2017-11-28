<html>
<head>
	<style text="text/css">
	table{
    width: 130%;
}
.error {color: #FF0000;}
tr{
	height:40px;
}
center{
	color:white;
}
td{
	color: white;
}
.success
   {
   	position: absolute;
   	margin-top: 250px;
   	margin-left: 500px;
   	margin-right: 100px;
   }
	</style>
	<script type="text/javascript">
	function myfunction()
	{
		alert("YOUR BILL HAS BEEN SUCCESSFULLY PAID!!!!");
	}
	</script>
</head>
<body background="1.jpg">
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
	if($_SERVER["REQUEST_METHOD"] == "POST") {
 		$oid=$_POST['order'];
 		$sql="SELECT * FROM bill where order_id='$oid'";
 		$result=mysqli_query($conn,$sql);
 		if($result)
 		{
 				while($row = $result->fetch_assoc())
 				{
 					$ord=$row['order_id'];
 					$basic=$row['b_amount'];
 					$weight=$row['w_charge'];
 					$vat=$row['vat_charge'];
 					$service=$row['service_charge'];
 					$total=$row['total']; 					
 				}
 				echo "<div class=\"success\">";
 				echo "<table border=0>";
 				echo "<tr><td>ORDER_ID:</td>"."<td>".$ord."</td></tr>"."<tr><td>BASIC AMT:</td>"."<td>".$basic."</td></tr>"."<tr><td>WEIGHT_CHARGE:</td>"."<td>".$weight."</td></tr>"."<tr><td>VAT:</td>"."<td>".$vat."</td></tr>"."<tr><td>SERVICE_CHARGE:</td>"."<td>".$service."</td></tr>"."<tr><td>TOTAL:</td>"."<td>".$total."</td></tr>";
 				echo "</table></div>";

 		}	
}
}
?>
	</br>
	<center><label><h1><b>PAY BILL</b><h1></label></center>
	</br>
	<center>
	<div style="width:500px;height:350px;">
	</br>
	</br>
	<form method="post" action="pay.php">
    <h3>ORDER_ID:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="order"> 
	<input type="submit" name="submit" value="SEARCH"/></br>
	<input type="button" onclick="myfunction()" value="PAY BILL" />
</center>
</form>

	</center>
	</div>
	</center>
</body>
</html>