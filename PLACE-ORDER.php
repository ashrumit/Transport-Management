
<html>
<head>
	<script type="text/javascript">
function change()
{
var options = document.getElementById('countries').getElementsByTagName('option');
var optionVals = [];

for (i=0; i < options.length; i += 1) {
  optionVals.push(options[i].value);
}
var op = document.getElementById('country').value;
for(j=0;j<optionVals.length;j++)
{
	if(op==optionVals[j])
	{
		var c=1;
		break;
	
	}
	else
	{
		c=0;	}
}
if(c==1)
{
	document.getElementById("msg").innerHTML = "";
}
else
{
	document.getElementById("msg").innerHTML = "please enter valid choice";
}
}
</script>
	<style type="text/css">
	.error {
  font-style: oblique;
  color: #FF0000;
  font-size: 18px;
  font-weight: bold;
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
span
{
	width:200px;
}
	</style>
</head>
<body background="1.jpg">
	<?php include 'header.php';?>
	<?php include 'ccount.php';?>
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
		$orderid=$from=$to=$type=$packing=$weight=$date=$cust="";
		$froErr = $tooErr = $typErr = $packErr = $wtErr =  $datErr = "";
        $fro = $too = $typ  = $pack = $wt = $dat= $from1 = $to1 =  "";
		if ($_SERVER["REQUEST_METHOD"] == "POST")
		 {
		 	 if (empty($_POST["fro"])) 
 {
    $froErr = "Enter source address";
  } else
    {
    $fro=$_POST["fro"];
    if (!preg_match("/^[a-zA-Z ]*$/",$fro)) {
      $froErr = "Enter a Valid Address";
    }
    else
    {
      $from1=$fro;
    }
  }
  
  if (empty($_POST["too"])) {
    $tooErr = "Enter Destination address";
  } else {
    $too =$_POST["too"];
    if (!preg_match("/^[a-zA-Z ]*$/",$too)) {
      $tooErr = "Enter a Valid Address";
    }
    else
    {
      $to1=$too;
    }
  }
  if (empty($_POST["typ"])) {
    $typErr = "Enter type";
  } else {
    $typ =$_POST["typ"];
  }

  if (empty($_POST["pack"])) {
    $packErr = "Enter Packing of Goods";
  } else {
    $pack = $_POST["pack"];
  }
  if (empty($_POST["wt"])) {
    $wtErr = "Enter Weight";
  } else {
    $wt = $_POST["wt"];
  }

  if (empty($_POST["dat"])) {
    $datErr = "Date is required";
  } else {
    $dat = $_POST["dat"];
  }
			$cust=$_POST['cid'];
			$orderid=$_POST['orderid'];
			$from=$from1;
			$to=$to1;
			$type=$_POST['typ'];
			$packing=$_POST['pack'];
			$weight=$_POST['wt'];
			$date=$_POST['dat'];
			if(!$cust ||!$orderid ||!$from ||!$to ||!$type ||!$packing ||!$weight ||!$date )
             {
                 echo "<script>alert(not success);</script>";
              }
           else
            {
			$sql1="SELECT * FROM registration where customer_id='$cust'";
		$result1=mysqli_query($conn,$sql1);
			if(mysqli_num_rows($result1)==0)
			{
				echo "<script type='text/javascript'>alert('please enter a valid customer id');";
     				echo "</script>";
			}
			else
			{
				
			$sql="INSERT into order1 VALUES('".$cust. "','".$orderid. "','".$from."','".$to."','".$type."','".$packing."','".$weight."','".$date."')";
	 			$result=mysqli_query($conn,$sql);
	 		if($result)
	 		{
	  				echo "<script type='text/javascript'>alert('success');";
     				echo "</script>";
     				$count++;
     				$sql2="UPDATE count set count=$count WHERE index1=0";
					$result2=mysqli_query($conn,$sql2);
					$sql3="INSERT into updatet (customer_id,order_id,receive,current,next) values('".$cust. "','".$orderid. "','".$from. "','".$from. "','".$to."')";
					$result3=mysqli_query($conn,$sql3);
					if($result3)
					{
						echo "<script type='text/javascript'>alert('success');";
     				echo "</script>";
					}
					else
					{
						echo "<script type='text/javascript'>alert('not success');";
     				echo "</script>";
					}


	 		}

	 	}
		}
	}
	}
	?>

	</br>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<center><h1><b> PLACE YOUR ORDER</b></h1>
	<div style="width:700px;height:540px;">
		<p><span class="error">* required field.</span></p>
	<center>
		<table>
		<caption><b><FILL THE FOLLOWING INFO:-</b></caption>
		<tr>
		<td><b>CUST-ID:-</b></td><td><input type="text" name="cid"></td>
		</tr>
		<tr>
		<td><b>ORDER_ID:-</b></td><td><input type="text" name="orderid" value="<?php echo $order?>" ></td>
		</tr>
		<tr>
			<td>
			<label><b>FROM:-  <b></label>
			</td>
			<td>
			<input type="text"name="fro"/>
			<span class="error">* <?php echo $froErr;?></span>
			</td>
		</tr>
		<tr>
			<td>
			</label><b>TO:-  </b></label>
			</td>
			<td>
			<input type="text" name="too"/>
			<span class="error">* <?php echo $tooErr;?></span>
			</td>
		</tr>
		<tr>
			<td>
			<label><b>Type of goods:<b></label>
			</td>
			<td>
			<input type="text" list="countries" id="country" name="typ" onchange="change()"/><span id="msg" ></span>
			<datalist id="countries">
	<option value="Mobile">
	<option value="Laptop">
	<option value="T.V">
	<option value="Food_items">
	<option value="Letter">
	<option value="Heavy_Electroins">
	<option value="Furniture">
	<option value="Vechiles">
	</datalist>
	<span class="error">* <?php echo $typErr;?></span>

			</td>
		</tr>
		<tr>
			<td>
			<label><b>PACKING:  </b></label>
			</td>
			<td>
			<select name="pack">
  		<option value="Normal">Normal</option>
  		<option value="Hard">Hard</option>
  		<option value="Delicate">Delicate</option>
		</select>
		<span class="error">* <?php echo $packErr;?></span>
			</td>
		</tr>
		<tr>
			<td>
			<label><b>APPROXIMATE-WEIGTH(*in KGs):-</b></label>
			</td>
			<td>
			<input type="number" name="wt" min="50" max="1000">
			<span class="error">* <?php echo $wtErr;?></span>
			</td>
		</tr>
		<tr>
			<td>
			<label><b>DATE:-  </b></label>
			</td>
			<td>
			<input type="date" name="dat"/>
			<span class="error">* <?php echo $datErr;?></span>
			</td>
		</tr>
		
		
		</table>
		</center>
		
		</br>
		<input type="submit" value="PLACE ORDER"/>
	<div>
	</center>
</form>
</body>
</html>