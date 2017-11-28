<html>
<head>
	<style>
	.b1
		{
			height:40px;
			width:90px;
		}
		table{
    width: 100%;
}
tr{
	height:40px;
	width:50px;
}
center{
	color:white;
}
td{
	color: white;
	width:50px;
	padding-right: 50px;
	font-size: 20px;
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
	<?php include 'header.php';?>
	<?php
	error_reporting(0);
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

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{

		if(isset($_POST['accc']))
		{
			$cus=$_POST['cccc'];
			$sql5="UPDATE pickacpt set index3=1 where customer_id='$cus'";
			$result5=mysqli_query($conn,$sql5);
			if($result5)
			{
				echo "<script type='text/javascript'>alert('The Request Has Been Accepted');";
     				echo "</script>";
		}
	}
	$date=$_POST['date'];
	$acc=$_POST['acc'];
	if(!empty($date))
	{
	$sql="SELECT * from pickup where date1='$date'";
	$result=mysqli_query($conn,$sql);
	if($result)
	{
			echo "<div class=\"success\">";
		echo "<table border=0 >";
		echo "<tr><td>CUSTOMER_ID</td><td>FROM</td><td>TO</td><td>DATE</td><td>CATEGORY</td><td>WIEGHT</td>";

		while($row = $result->fetch_assoc()) 
	{
      		$cust1=$row['custid'];
			$source=$row['source'];
			$dest=$row['destination'];
			$date2=$row['date1'];
			$cat=$row['category'];
			$wt=$row['weght'];
		   
			echo "<tr><td>".$cust1."</td>"."<td>".$source."</td>"."<td>".$dest."</td>"."<td>".$date2."</td>"."<td>".$cat."</td>"."<td>".$wt."</td></tr>";
			echo "<input type='hidden' name='cust' value='$cust1'>";

	}
	echo "</table></div>";
	}
	else
	{
		echo "not success";
	}


	}
	else if(!empty($acc))
	{
		$ssql="SELECT * FROM pickup where custid='$acc'";
		$rresult=mysqli_query($conn,$ssql);
		if($rresult)
		{
			while($row2 = $rresult->fetch_assoc()) 
	{
      		$cust3=$row2['custid'];
			$source1=$row2['source'];
			$dest1=$row2['destination'];
			$date3=$row2['date1'];
			$cat1=$row2['category'];
			$wt1=$row2['weght'];
		echo "<div class=\"success\">";
		echo "<form method='POST' action='ORDERS-PLACED.php'>";
		echo "<table border=0>";
		echo "<tr><td>CUSTOMER_ID:</td>"."<td>".$cust3."</td>"."<td>"."<input type='submit' name='accc' value='accept'>"."</td></tr>"."<td>FROM:</td>"."<td>".$source1."</td></tr>"."<tr><td>TO:</td>"."<td>".$dest1."</td></tr>"."<tr><td>DATE:</td>"."<td>".$date3."</td></tr>"."<tr><td>CATEGORY:</td>"."<td>".$cat1."</td></tr>"."<tr><td>WEIGHT:</td>"."<td>".$wt1."</td></tr>";
		echo "</table> <input type='hidden' name='cccc' value='$cust3'>";
		echo "</form></div>"; 
	}
	}
	else
	{
		echo "not success";
	}

}
}
}
	?>
</br>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<center><label><b>ORDERS-PLACED!!!!</b></label></center>
</br>
<center>
	<div style="width:1000px;height:390px;">
	</br>
		
	<label><b>ACCEPT/REJECT REQUEST</b></label>&nbsp;&nbsp;<input type="text" name="acc">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="SUBMIT">
	&nbsp;&nbsp;&nbsp;&nbsp;<label><b>PROIVIDE THE DATE:</b></label>&nbsp;&nbsp;&nbsp;<input type="date" name="date"/>
	<div>
</center>
</form>
<body>
</html>