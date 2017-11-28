<!DOCTYPE html>
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
center{
	color:white;
}
td{
	color: white;
}
	</style>
</head>
<body background="1.jpg">
<?php include 'header.php';?>
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
	$fnameErr = $lnameErr = $addErr = $phnoErr = $emaiErr =  $date1Err= "";
$fname = $lname = $add  = $phno = $emai = $date1 = $fname1= $lname = $phno1 = $email1 = "";
if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
  if (empty($_POST["fname"])) 
 {
    $fnameErr = "Enter First name";
  } else
    {
    $fname=$_POST["fname"];
    if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
      $fnameErr = "Enter a Valid Name";
    }
    else
    {
      $fname1=$fname;
    }
  }
  
  if (empty($_POST["lname"])) {
    $lnameErr = "Enter Last Name";
  } else {
    $lname =$_POST["lname"];
    if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
      $lnameErr = "Enter a Valid Name";
    }
    else
    {
      $lname1=$lname;
    }
  }
  if (empty($_POST["add"])) {
    $addErr = "Enter Address";
  } else {
    $add =$_POST["add"];
  }

  if (empty($_POST["phno"])) {
    $phnoErr = "Enter Phone number";
  } else {
    $phno =$_POST["phno"];
    // check if phno syntax is valid
    if (preg_match("/^[7-9]{3}-[0-9]{4}-[0-9]{4}$/", $phno)) {
      $phnoErr = "Invalid phno";
    }  
    else{
    	$phno1=$phno;
    }  
  }
  if (empty($_POST["emai"])) {
    $emaiErr = "Enter Email";
  } else {
    $emai =$_POST["emai"];
     // check if e-mail address is well-formed
    if (!filter_var($emai, FILTER_VALIDATE_EMAIL)) {
      $emaiErr = "Invalid email format";
    }
    else
    {
    	$email1=$emai;
    }
  }

  if (empty($_POST["date1"])) {
    $date1Err = "Date is required";
  } else {
    $date1 =$_POST["date1"];
  }
$userid=$_POST['custid'];
$fname=$fname;
$lname=$lname;
$add=$_POST['add'];
$cno=$phno1;
$email=$email1;
$date=$_POST['date1'];
if(!$userid || !$fname ||!$lname ||!$add ||!$cno ||!$email ||!$date )
{
  echo "<script>alert(not success);</script>";
}
else
{
$sql="INSERT INTO registration VALUES('".$userid."','".$fname."','".$lname."','".$add."','".$cno."','".$email."','".$date."')";
$result=mysqli_query($conn,$sql);
if($result)
{
	$count++;
$sql1="UPDATE ccount set count=$count WHERE index2=1";
$result1=mysqli_query($conn,$sql1);
	 $data='data success fully inserted';
	 $userpass=$userid;
	 $pass=$userid;
	 $index5=1;
	 $role="cust";
	 $sql2="INSERT into login VALUES('".$userpass. "','".$pass."','".$index5."','".$role."')";
	 $result2=mysqli_query($conn,$sql2);
	 if($result2)
	 {
	  echo "<script type='text/javascript'>alert('login success');";
     echo "</script>";

	 }
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
}
?>
<form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<center><label><h1>CUSTOMER-REGISTERATION</h1></label></center>
<center>
	<div style="width:500px;height:400px;">
		<p><span class="error">* required field.</span></p>
	<center><label><b>FILL THE FOLLOWING INFO:-</b></label></center>
	</br>
	<table>
	<tr>
		<td><b>CUSTOMER_ID GENERATED:-</b></td><td><input type="text" name="custid" value="<?php echo $user?>"/></td>
	</tr>
	<tr>
		<td><b>FIRST-NAME:-</b></td><td><input type="text" name="fname"/>
	<span class="error">* <?php echo $fnameErr;?></span></td></td>
	</tr>
	<tr>
		<td><b>LAST-NAME:-</b></td><td><input type="text" name="lname"/>
	<span class="error">* <?php echo $lnameErr;?></span></td></td>
	</tr>
	<tr>
		<td><b>CUSTOMER-ADDRESS:-</b></td><td><textarea rows="4" cols="25" name="add"></textarea>
	<span class="error">* <?php echo $addErr;?></span></td></td>
	</tr>
	<tr>
		<td><b>CONTACT-NUMBERS:-</b></td><td><input type="text" name="phno"/>
	<span class="error">* <?php echo $phnoErr;?></span></td></td>
	</tr>
	<tr>
		<td><b>E-MAIL:-</b></td><td><input type="email" name="emai"/>
	<span class="error">* <?php echo $emaiErr;?></span></td></td>
	</tr>
	<tr>
		<td><b>DATE:</b></td><td><input type="date" name="date1"/>
	<span class="error">* <?php echo $date1Err;?></span></td></td>
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