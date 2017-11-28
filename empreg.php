<!DOCTYPE HTML> 
<html>
<head>
	<style>
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
		.error {color: #FF0000;}
	</style>
</head>
<body bgcolor="">
<?php include 'ecount.php';?>
<?php include 'header.php';?>
<?php
$first_name = $last_name = $department = $empl_add = $cont_no = $e_mail = "";
$ferror = $lerror = $dperror = $adderror = $e_error = $cerror = "";
$first_name2 = $last_name2 = $department2 = $cont_no2 = $e_mail2 = "";
	
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";
$conn=mysqli_connect($servername,$username,$password,$dbname);
	
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if (empty($_POST["fn"]))
	{
		$ferror = "NAME FIELD IS REQUIRED!!!!";
	} 
	else
	{
		$first_name = test_input($_POST["fn"]);
		if (!preg_match("/^[a-zA-Z ]*$/",$first_name))	/* */
		{
			$ferror = "Only letters and white space allowed";
		}
		else
		{
			$first_name2 = test_input($_POST["fn"]);
		}
	}
	
	
	if (empty($_POST["ln"]))
	{
		$lerror = "NAME FIELD IS REQUIRED!!!!";
	} 
	else
	{
		$last_name = test_input($_POST["ln"]);
		if (!preg_match("/^[a-zA-Z ]*$/",$last_name))	/* */
		{
			$lerror = "Only letters and white space allowed";
		}
		else
		{
			$last_name2 = test_input($_POST["ln"]);
		}
	}
	
	
	if (empty($_POST["dt"]))
	{
		$dperror = "DEPARTMENT FIELD IS REQUIRED!!!!";
	} 
	else
	{
		$department = test_input($_POST["dt"]);
		if (!preg_match("/^[a-zA-Z ]*$/",$department))	/* */
		{
			$dperror = "Only letters and white space allowed";
		}
		else
		{
			$department2 = test_input($_POST["dt"]);
		}
	}
	
	
	
	if (empty($_POST["ea"]))
	{
		$adderror = "YOU CANT LEAVE ADDRESS FIELD EMPTY";
	} 
	else
	{
		$empl_add = test_input($_POST["ea"]);
	}
	
	
	if (empty($_POST["cn"]))
	{
		$cerror = "Phone Number is required";
	}
	else
	{
		$cont_no = test_input($_POST["cn"]);
		if(!preg_match("/^[0-9]{10}$/",$cont_no))
		{
			$cerror = "Type numbers Not in correct format!!!!";
		}
		else
		{
			$cont_no2 = test_input($_POST["cn"]);
		}
	}
	
	
	if (empty($_POST["ei"]))
	{
		$e_error = "Email is required";
	}
	else
	{
			$e_mail = test_input($_POST["ei"]);
			if (!filter_var($e_mail, FILTER_VALIDATE_EMAIL))
			{
				$e_error = "Invalid email format";
			}
			else
			{
				$e_mail2 = test_input($_POST["ei"]);
			}
	}
	
	
	
	if (!$conn)
	{
		die("Connection failed: " . mysqli_connect_error());
	}
	else
	{
		echo "Connection Succesfull";
		$empid = $_POST['eid'];
		$sql3 = "INSERT INTO employee
		VALUES ('".$empid."','".$first_name2."','".$last_name2."','".$department2."','".$empl_add."','".$cont_no2."','".$e_mail2."')";
		if (mysqli_query($conn, $sql3))
		{
		$username = $empid;
        $pass = $empid;
        $index5 = 1;
        $role = "emp";
        $sql2 = "INSERT INTO login VALUES('".$username."','".$pass."','".$index5."','".$role."')";
        $result2 = mysqli_query($conn,$sql2);
        $message = "YOUR DEFAULT ID IS ".$username."</br>"."YOUR DEFAULT PASSWORD IS ".$pass;
        echo "<script type='text/javascript'>alert('$message');";
        echo "</script>";	
		$count++;
		$sql1="UPDATE ecount set count=$count WHERE index2=1";
		$result1=mysqli_query($conn,$sql1);
		} 
		else
		{
			echo "Error in creation of records";
		}
}
		
}
function test_input($data)
{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
}


?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
<center>
	<div style="width:1000px;height:800px;">
	<center><label>FILL THE FOLLOWING INFO:-</label></center>
	</br>
	<table>
	<tr>
		<td>EMPLOYEE_ID GENERATED:-</td><td><input type="text" name="eid" value="<?php echo $eid?>"/></td>
	</tr>
	<tr>
		<td>FIRST-NAME:-</td><td><input type="text" name="fn"/><span class="error">* </td><td><?php echo $ferror;?>
  </span></td>
	</tr>
	<tr>
		<td>LAST-NAME:-</td><td><input type="text" name="ln"/><span class="error">* </td><td><?php echo $lerror;?>
  </span></td>
	</tr>
	<tr>
		<td>DEPARTMENT:-</td><td><input type="text" name="dt"/><span class="error">* </td><td><?php echo $dperror;?>
  </span></td>
	</tr>
	<tr>
		<td>EMPLOYEE-ADDRESS:-</td><td><textarea rows="4" cols="25" name="ea"></textarea><span class="error">* </td><td><?php echo $adderror;?>
  </span></td>
	</tr>
	<tr>
		<td>CONTACT-NUMBERS:-</td><td><input type="text" name="cn"/><span class="error">*</td><td> <?php echo $cerror;?>
  </span></td>
	</tr>
	<tr>
		<td>E-MAIL:-</td><td><input type="text" name="ei"/><span class="error">* </td><td><?php echo $e_error;?>
  </span></td>
	</tr>
	<tr><td><input type="submit" value="SUBMIT" id="b1"/></td></tr>
	</table>
	<center></center>
</center>
</form>
</body>
</html>