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
	<?php include 'header.php';?>
	<?php
	session_start();
	if(!isset($_SESSION['name']))
	{
		echo "<script type='text/javascript'>alert('please login firsot');";
        echo "window.location='login.php'";
        echo "</script>";
	}

	?>
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
	$custid=$date="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(isset($_POST['delete']))
	{
		$cust=$_POST['cust'];
		$sql4="DELETE FROM registration where customer_id='$cust'";
		$result4=mysqli_query($conn,$sql4);
		if($result4)
		{
			echo "delete is success";
		}
		else
		{
			echo "not success";
		}
	}
	else
	{
	$custid=$_POST['cid'];
	$date=$_POST['date'];
	if(!empty($custid))
	{
		$sql="SELECT * FROM registration where customer_id='$custid'";
		$result=mysqli_query($conn,$sql);
		if($result)
		{
			while($row = $result->fetch_assoc()) 
	{
      		$cust1=$row['customer_id'];
			$fname=$row['firstname'];
			$lname=$row['lastname'];
			$addr=$row['address'];
			$phno=$row['phno'];
			$email=$row['email'];
			$date1=$row['date1'];
			echo "<div class=\"success\">";
		   echo "<form method='POST' action='cinfo.php';>";
		   echo "<table border=0>";
			echo "<tr><td>CUSTOMER_ID</td>"."<td>".$cust1."</td>"."<td>"."<input type='submit' name='delete' value='DELETE'>"."</td></tr>"."<tr><td>FIRSTNAME</td>"."<td>".$fname."</td></tr>"."<tr><td>LASTNAME</td>"."<td>".$lname."</td></tr>"."<tr><td>ADDRESS</td>"."<td>".$addr."</td></tr>"."<tr><td>PHONE</td>"."<td>".$phno."</td></tr>"."<tr><td>EMAIL</td>"."<td>".$email."</td></tr>"."<tr><td>DATE</td>"."<td>".$date1."</td></tr>";
			echo "</table></div>";
			echo "<input type='hidden' name='cust' value='$cust1'>";
			   echo "</form>";
	}
		}
		else
		{
			echo "not fount";
		}


	}
	else
	{
		if(!empty($date))
		{
			$sql2="SELECT * FROM registration where date1='$date'";
			$result1=mysqli_query($conn,$sql2);
			if($result1)
			{
				echo "<div class=\"success\">";
				echo "<table border=0 class=\"i5\"><tr><td><b>CUSTOMER_ID</b></td><td><b>FIRSTNAME</b></td><td><b>LASTNAME</b></td><td><b>ADDRESS</b></td><td><b>PHNO</b></td><td><b>EMAIL</b></td><td><b>DATE</b></td></tr>";
				while($row = $result1->fetch_assoc()) 
	{

			$cust=$row['customer_id'];
			$fname=$row['firstname'];
			$lname=$row['lastname'];
			$addr=$row['address'];
			$phno=$row['phno'];
			$email=$row['email'];
			$date1=$row['date1'];
			
		    echo "<tr>"."<td>".$cust."</td>"."<td>".$fname."</td>"."<td>".$lname."</td>"."<td>".$addr."</td>"."<td>".$phno."</td>"."<td>".$email."</td>"."<td>".$date1."</td>"."</tr>";
		    	
	}
		   echo "</table></div>";
			}
			else
			{
				echo "not success";
			}
		}
	}
}
}
}
?>
   <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		</br>
	<center>
	<div style="width:800px;height:350px;">
	<center><h1><b>CUSTOMER INFO</b></h1></center>
	</br>
	<label><b>CUSTOMER_ID:- </b></label><input type="text" name="cid"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;<label><b>OR</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

	<label><b>DATE:</b></label><input type="date" name="date"/><input type="submit" value="SEARCH">	
	</center>
	</div>
</form>
</body>
</html>