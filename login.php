<html>
	<head>
		<style type="text/css">
		#i1
		{
		font-family:MS Arial;
		float:center;
		font-size:30px;
		color:#483D8B;
		}
		#i2
		{
		font-family:MS Arial;
		float:center;
		font-size:30px;
		color:white;
		}
		.i3
		{
		font-family:Futura;
		font-size:20px;
		color:white;
		}
		.i4
		{
		font-size:20px;
		font-family:Futura;
		color:#A52A2A;
		}
		.i5
		{
		display:inline;
		padding-right: 30px;
		padding-left: 70px;
		}
		a
		{
		text-decoration: none;
		}
		#i7
		{
		display:none;
		}
		.b1
		{
		width:130px;
		}
		body
		{
		background: url(truck.jpg);
		
		background-repeat: no-repeat;
		}
		</style>
	</head>
	<body bgcolor="">
		<?php include 'Front-Page.php';?>
		<?php
		error_reporting(0);
		  session_start();
		  if($_SESSION['name']=='admin')
		  {
     		header("Location: header.php");
		 }
		 else if($_SESSION['role']=='cust')
		 {
		 	header("Location: cust-login.php");
		 }
		 else if($_SESSION['role']=="emp")
		 {
		 	header("Location: EMP-LOGIN.php");
		 }

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
		$name=$pass="";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$user=$_POST['user'];
			$pass=$_POST['pass'];
			$sql="SELECT * from login where username='$user' and password='$pass'";
			$result=mysqli_query($conn,$sql);
			$count=mysqli_num_rows($result);
			if($count==1)
			{
				
					while($row = $result->fetch_assoc())
					{
						$role=$row['role'];
						$id=$row['username'];
						$ind=$row['index3'];

					}
					

				if($role=='admin')
				{
					$_SESSION['name']="admin";	
					header("Location: header.php");
				}
				else if($role=='cust')
				{
					$sql2="SELECT * from registration where customer_id='$id'";
					$result2=mysqli_query($conn,$sql2);
					if($result2)
					{
						while($row2 = $result2->fetch_assoc())
					{
						$name=$row2['firstname'];
						$id2=$row2['customer_id'];
					}
					$_SESSION['name']=$name;
					$_SESSION['role']='cust';
					$_SESSION['id']=$id2;
					if($ind==1)
					{
						header("Location: firstlog.php");
					}
					else
					{
					header("Location: cust-login.php");
				}
				}
			}
				else if($role=='emp')
				{
					$sql4="SELECT * from employee where e_id='$id'";
					$result4=mysqli_query($conn,$sql4);
					if($result4)
					{
						while($row4 = $result4->fetch_assoc())
					{
						$name1=$row4['f_name'];
						$id1=$row4['e_id'];
					}
					$_SESSION['name']=$name1;
					$_SESSION['role']='emp';
					$_SESSION['id']=$id1;	
					if($ind==1)
					{
						header("Location: firstlog.php");
					}
					else
					{
					header("Location: EMP-LOGIN.php");
				}
				}
		}
}
			else
			{
				echo "soory worng password or username";
			}
		}
	}
	?>
	</br>
	</br>
	</br>
	</br>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<center>
	<div style="width:350px;height:240px;background-color:;">
		<center><label id="i2">USER-LOGIN</label></center>
		</br>
		</br>
		<center>
		<table>
		<tr>
			<td>
			<label class="i3">User Name*:-</label>
			</td>
			<td>
			<input type="text" name="user"/> 
			</td>
		</tr>
		<tr>
			<td>
			<label class="i3">Password*:-</label>
			</td>
			<td>
			<input type="password" name="pass"/>
			</td>
		</tr>
		</table>
		</br>
		<input type="submit" value="LOGIN" class="b1"/>
		</br>
		</center>
	</div>
	</center>
</form>
	</body>
</html>