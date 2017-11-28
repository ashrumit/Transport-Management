<!DOCTYPE html>
<html>
<head>
	<style>
	h3
	{
	  color: 
	}
	</style>
</head>
<body>
	<?php
	session_start();
	$id=$_SESSION['id'];
	?>
	<?php include 'Front-Page.php';?>
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
		if ($_SERVER["REQUEST_METHOD"] == "POST")
		 {
		 	$pass=$_POST['pass'];
		 	$pass1=$_POST['repass'];
		 	if($pass!=$pass1)
		 	{
		 		echo "<script type='text/javascript'>alert('VALUES NOT MATCHED');";
     				echo "</script>";
		 	}
		 	else
		 	{
		 		$sql="UPDATE login set password='$pass' where username='$id'";
		 		$result=mysqli_query($conn,$sql);
		 		if($result)
		 		{
		 		
		 		$sql2="UPDATE login set index3=0 where username='$id'";
		 		$result2=mysqli_query($conn,$sql2);
		 		echo "<script type='text/javascript'>alert('Password Successfully Updated');";
    		 	echo "</script>";
    		 	header("Location: login.php");

		 	}
		 	}
		 }
		}


	?>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<center>
		<h1>PLEASE CHANGE YOUR PASSWORD</h1>
		<br/>
		<br/>
		<br/>
		<h3>Enter your new Password&nbsp;&nbsp;<input type="password" name="pass"><br/><br/>
		    Re-Enter your Password&nbsp;&nbsp;<input type="password" name="repass"></h3>
		<input type="submit" value="UPDATE" name="update">
	</center>
</form>
</body>
</html>

