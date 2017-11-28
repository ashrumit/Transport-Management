<html>
<head>
	<style text="text/css">
	body
	{
    background: url(2.jpg);
    background-size: 1460px 1000px;
    background-repeat: no-repeat;
	}
	input[type=submit]
	{
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
	}
	</style>
</head>
<body bgcolor="">
	<?php include 'header.php';?>
<?php
	$o_id = $o_error = $o_id2 = "";
	$destination_place = $collected_from = $type_o_goods = $type_o_packing = $weight = $complete = "";
	$check_complete = "";
	
	$server = "localhost";
	$username = "root";
	$password = "";
	$dbname = "project";
	$conn = mysqli_connect($server,$username,$password,$dbname);

	if (!$conn)
	{
		die("Connection failed: " . mysqli_connect_error());
	}
	else
	{
		echo "Connection Succesfull</br>";
	}	
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$odd = $_POST['di'];
		if(isset($_POST['search']))
		{
	
			if (empty($_POST["di"]))
			{
				$o_error = "Order Id id is required";
			}
			else
			{
				$o_id  = test_input($_POST["di"]);
				if(!preg_match("/^[T][S][0-9]{2}$/",$o_id ))
				{
					$o_error = "Type numbers Not in correct format!!!!";
				}
				else
				{
					$o_id2 = test_input($_POST["di"]);
				}
			}
			echo $o_id2;
			$sql = "SELECT receive,send,type,packing,weight FROM order1 WHERE order_id = '$o_id2'";
			$sql2 = " SELECT complete FROM updatet WHERE order_id = '$o_id2'";
			$result2 = mysqli_query($conn,$sql2);
			$result = mysqli_query($conn,$sql);
			if ($result)
			{
				while($row = mysqli_fetch_assoc($result))
				{
					$destination_place = $row["send"];
					$collected_from = $row["receive"];
					$type_o_goods = $row["type"];
					$type_o_packing = $row["packing"];
					$weight = $row["weight"];
				}
			}
			else
			{
				echo "0 results";
			}
			if ($result2)
			{
				while($row2 = mysqli_fetch_assoc($result2))
				{
					$complete = $row2["complete"];
				}
			}
			else
			{
				echo "0 results";
			}
			
		}
		else
		{
			$check_complete = test_input($_POST["com"]);
			$collected_from2 = test_input($_POST["pickup"]);
			$destination_place2 = test_input($_POST["destination"]);
			$type_o_goods2 = test_input($_POST["tog"]);
			$type_o_packing2 = test_input($_POST["top"]);
			$weight2 = test_input($_POST["we"]);
			if($check_complete == "YES")
			{
				session_start();
				$_SESSION['id'] = $odd;
				header("Location: billout.php"); 
				
			}
			else
			{
				echo 'Bill cant be calculated';
			}
		}
	}
	else
	{
		
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
	<div style="width:500px;height:350px;background-color:">
	<table>
		<tr>
		<td>ORDER_ID:-</td><td><input type="text" name="di" value="<?php echo isset($_POST['di']) ? $_POST['di'] : '' ?>"/>* <?php echo $o_error;?></td>
		</tr>
		<tr>
			<td><input type="submit" value="search" name="search"/></td>
		</tr>
		<tr>
		<td>FROM:-</td><td><input type="text" name="pickup" value="<?php echo $collected_from ?>"/></td>
		</tr>
		<tr>
		<td>TO:-</td><td><input type="text" name = "destination" value="<?php echo $destination_place ?>"/></td>
		</tr>
		<tr>
		<td>TYPE OF GOODS:-</td><td><input type="text" name = "tog"  value="<?php echo $type_o_goods ?>"/></td>
		</tr>
		<tr>
		<td>TYPE OF PACKAGING:-</td><td><input type="text" name = "top" value="<?php echo $type_o_packing ?>"/></td>
		</tr>
		<tr>
		<td>WEIGHT:-</td><td><input type="text" name = "we" value="<?php echo $weight ?>"/></td>
		</tr>
		<tr>
		<td>Serive complete:-</td><td><input type="text" name = "com" value="<?php echo $complete ?>"/></td>
		</tr>
		<tr>
		<td><input type="submit" value="generate bill" name="bill"/></td>
		</tr>
	</table>
	</div>
	</center>
	</form>
</body>
</html>