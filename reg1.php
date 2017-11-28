<!DOCTYPE html>
<head>
	<style>
	label{
  font-size: 20px;
  color: black;
}
	#i1
		{
		font-family:MS Arial;
		float:center;
		font-size:30px;
		color:#483D8B;
		}
		#b1
		{
			height:50px;
			width:100px;
		}
		table{
    width: 100%;
}
tr{
	height:40px;
}
center{
	color:white;
}
td{
	color: white;
}
	</style>
</head>
<body>
<?php include 'EMP-LOGIN.php';?>
<?php include 'count.php';?>
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
	$userid=$fname=$lname=$add=$cno=$email=$date="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$userid=$_POST['custid'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$add=$_POST['add'];
$cno=$_POST['phno'];
$email=$_POST['email'];
$date=$_POST['date1'];
$sql="INSERT INTO registration VALUES('".$userid."','".$fname."','".$lname."','".$add."','".$cno."','".$email."','".$date."')";
$result=mysqli_query($conn,$sql);
if($result)
{
	 $data='data success fully inserted';
	 $userpass=$userid;
	 $pass=$userid;
	 $index5=1;
	 $sql2="INSERT into login VALUES('".$userpass. "','".$pass."','".$index5."')";
	 $result2=mysqli_query($conn,$sql2);
	 $message="you default user name is".$userpass."<br/>"."the default  password is".$pass;
	 echo "<script type='text/javascript'>alert('$message');";
     echo "</script>";
}
else
{
	echo "not sucessfull inserted";
}
}
}

?>
<form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<center><label><h1>CUSTOMER-REGISTERATION</h1></label></center>
<center>
	<div style="width:500px;height:400px;">
	<center><label><b>FILL THE FOLLOWING INFO:-</b></label></center>
	</br>
	<table>
	<tr>
		<td><label><b>CUSTOMER_ID GENERATED:-</b></label></td><td><input type="text" name="custid" value="<?php echo $user?>"/></td>
	</tr>
	<tr>
		<td><label><b>FIRST-NAME:-</b></label></td><td><input type="text" name="fname"/></td>
	</tr>
	<tr>
		<td><label><b>LAST-NAME:-</b></label></td><td><input type="text" name="lname"/></td>
	</tr>
	<tr>
		<td><label><b>CUSTOMER-ADDRESS:-</b></label></td><td><textarea rows="4" cols="25" name="add"></textarea></td>
	</tr>
	<tr>
		<td><label><b>CONTACT-NUMBERS:-</b></label></td><td><input type="text" name="phno"/></td>
	</tr>
	<tr>
		<td><label><b>E-MAIL:-</b></label></td><td><input type="email" name="email"/></td>
	</tr>
	<tr>
		<td><label><b>DATE:</b></label></td><td><input type="date" name="date1"/></td>
	</tr>
	</table>
	</br>
	</br>
	</br>
	<center><input type="submit" value="SUBMIT"></center>
	</div>
</center>
</form>

</body>
</html>