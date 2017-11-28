<html>
<head>
	<style text="text/css">
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
.success
   {
   	position: absolute;
   	margin-top: 250px;
   	margin-left: 500px;
   	margin-right: 100px;
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
<body>
<?php include 'cust-login.php';?>
<?php
session_start();
?>
	<?php
// define variables and set to empty values
$oidErr = "";
$oid = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	 if (empty($_POST["oid"])) {
    $oidErr = "Order id is required";
  } else {
    $oid = test_input($_POST["oid"]);
  }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
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
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$id=$_POST['oid'];
		$sql="SELECT * FROM pickacpt where customer_id='$id'";
		$result=mysqli_query($conn,$sql);
		if($result)
		{
			while($row = $result->fetch_assoc()) 
			{
				$ins=$row['index3'];
			}
			if($ins==0)
			{
				echo "<div class=\"success\">";
				echo "<h3> YOUR REQUEST IS UNDER PROCESS AND WAITING FOR ACCEPTANCE</h3>";
				echo "</div>";
			}
			else if($ins==1)
			{
			echo "<div class=\"success\">";
				echo "<h3> YOUR REQUEST IS ACCPETED AND IT IS UNDER PROCESS</h3>";
				echo "</div>";	
			}
		}

	}
}
	?>
    </br>
    <center><label><h2><b> REQUEST UPDATE</b></h2></label>
	<center>
	<div style="width:500px;height:300px;">
	</br>
	<p><span class="error">* required field.</span></p>
<form method="post" action="orderupdt.php">
	<center>
    <table>
	<tr>
		<td><label><b>CUSTOMER ID:-  </b></label></td><td><input type="text" name="oid" value="<?php echo $_SESSION['id'];?>" /></br></td>
	<td><input type="submit" name="submit" value="SEARCH"/>
		<span class="error">*<?php echo $oidErr;?></span></td>
	</tr>
	</table>
	</center>
	</form>
	</div>
	</center>
</body>
</html>