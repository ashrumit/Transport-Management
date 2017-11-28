<?php
session_start();
?>
<!DOCTYPE HTML> 
<html>
<head>
	<style text="text/css">
	.error {color: #FF0000;}
	.success
   {
   	position: absolute;
   	margin-top: 100px;
   	margin-left: 500px;
   	margin-right: 100px;
   }
   .suc{
   	position: fixed;
   }
	</style>
</head>
<body bgcolor="">
	<?php include 'EMP-LOGIN.php';?>
<?php
$c_id = $o_id = $place_r = $appr_to = $complete = "";
$c_error = $o_error = $p_error = $a_error = $complete_error = "";
$c_id2 = $o_id2 = $place_r2 = $appr_to2 = $complete2 = "";
$service = $place_reached = $approachig_to = "";

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
	if(isset($_POST['search']))
	{
			if (empty($_POST["ci"]))
			{
				$c_error = "Customer id is required";
			}
			else
			{
				$c_id  = test_input($_POST["ci"]);
				if(!preg_match("/^[C][0-9]{4}$/",$c_id ))
				{
					$c_error = "Type numbers Not in correct format!!!!";
				}
				else
				{
					$c_id2 = test_input($_POST["ci"]);
				}
			}
	
	
			if (empty($_POST["di"]))
			{
				$o_error = "Order Id id is required";
			}
			else
			{
				$o_id  = test_input($_POST["di"]);
				if(!preg_match("/^[T]{1}[S]{1}[0-9]{2}$/",$o_id ))
				{
					$o_error = "Type numbers Not in correct format!!!!";
				}
				else
				{
					$o_id2 = test_input($_POST["di"]);
				}
			}
			echo $o_id2;
			echo $c_id2;
			$sql="SELECT receive,current,next FROM updatet WHERE customer_id='$c_id2' AND order_id='$o_id2'";
			$result=mysqli_query($conn,$sql);
			if (mysqli_num_rows($result) > 0)
			{
				// output data of each row
				while($row = mysqli_fetch_assoc($result))
				{
					$service = $row["receive"];
					$approachig_to = $row["next"];
					$place_reached = $row["current"];
				}
				echo "<div class=\"success\">";
		   		echo "<form method='POST' action='update.php';>";
		   		echo " FROM PLACE:<input type='text' value='$service' name='sc'>"."<br/>";
		   		echo " PLACE REACHED:<input type='text' value='$place_reached' name='ci'>"."<br/>";
			    echo " APPROACHING TO:<input type='text' value='$approachig_to' name='di'>";
			 	echo "<input type='submit' value='update' name='update'>";
			   echo "</form>";
			   echo "</div>";
			}
			else
			{
				echo "0 results";
			}
	}
	else
	{
		
		$c_id2 = test_input($_POST["ci"]);
		$o_id2 = test_input($_POST["di"]);
		if (empty($_POST["pr"]))
		{
			$p_error = "Name is required";
		} 
		else
		{
			$place_r = test_input($_POST["pr"]);
			if (!preg_match("/^[a-zA-Z ]*$/",$place_r))	/* */
			{
				$p_error = "Only letters and white space allowed";
			}
			else
			{
				$place_r2 = test_input($_POST["pr"]);
			}
		}
		if (empty($_POST["at"]))
		{
			$a_error = "Name is required";
		} 
		else
		{
			$appr_to = test_input($_POST["at"]);
			if (!preg_match("/^[a-zA-Z ]*$/",$appr_to))	/* */
			{
				$a_error = "Only letters and white space allowed";
			}
			else
			{
				$appr_to2 = test_input($_POST["at"]);
			}
		}
		if (empty($_POST["sc"]))
		{
			$complete_error = "Name is required";
		} 
		else
		{
			$complete = test_input($_POST["sc"]);
			if (!preg_match("/^[a-zA-Z ]*$/",$complete))	/* */
			{
				$complete_error = "Only letters and white space allowed";
			}
			else
			{
				$complete2 = test_input($_POST["sc"]);
			}
		}
		echo $place_r2;
		echo $appr_to2;
		echo $complete2;
		$sql = "UPDATE updatet SET receive = '$complete2',current = '$place_r2',next = '$appr_to2' 
		WHERE customer_id = '$c_id2' AND order_id = '$o_id2'";
		if (mysqli_query($conn, $sql))
		{
			echo "Record updated successfully";
		}
		else
		{
			echo "Error updating record: " . mysqli_error($conn);
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
<center>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  
	CUSTOMER_ID:- </label><input type="text" name="ci" value="<?php echo isset($_POST['ci']) ? $_POST['ci'] : '' ?>"/><span class="error">* <?php echo $c_error;?></br>
	ORDER_ID:-</label><input type="text" name="di" value="<?php echo isset($_POST['di']) ? $_POST['di'] : '' ?>"/><span class="error">* <?php echo $o_error;?></br>
	<input type="submit" value="SEARCH" name="search"/></br>
</form> 	
</center>
</body>
</html>