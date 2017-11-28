<html>
<head>
</head>
<body>
<?php
$destination_place2 = $collected_from2 = $type_o_goods2 = $type_o_packing2 = $weight2 = "";


session_start();
$id=$_SESSION['id'];
echo $id.'</br>';

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
	$sql = "SELECT receive,send,type,packing,weight FROM order1 WHERE order_id = '$id'";
	$result = mysqli_query($conn,$sql);
	if ($result)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$destination_place2 = $row["send"];
				$collected_from2 = $row["receive"];
				$type_o_goods2 = $row["type"];
				$type_o_packing2 = $row["packing"];
				$weight2 = $row["weight"];
			}
		}
	else
		{
				echo "0 results";
		}






$basic_amount = 500;
$basic_amount2 = "";
$basic_amount3 = "";
$basic_amount4 = "";
$service_tax = "";
$vat_tax = "";
$weight_rate = 50;
$charge1 = 300;
$charge2 = 400;
$charge3 = 500;
$charge4 = 600;
$light = 200;
$normal = 400;
$hard = 700;
if($collected_from2 == 'NEW DELHI')
{
	switch($destination_place2)
	{
		case "MUMBAI":
			$basic_amount2 = $basic_amount + $charge1;
		break;
		case "CHENNAI":
			$basic_amount2 = $basic_amount + $charge4;
		break;
		case "BANGALORE":
			$basic_amount2 = $basic_amount + $charge3;
		break;
		case "KOLKATA":
			$basic_amount2 = $basic_amount + $charge2;
		break;
	}
}
elseif($collected_from2 == 'MUMBAI')
{
	switch($destination_place2)
	{
		case "NEW DELHI":
			$basic_amount2 = $basic_amount + $charge1;
		break;
		case "CHENNAI":
			$basic_amount2 = $basic_amount + $charge3;
		break;
		case "BANGALORE":
			$basic_amount2 = $basic_amount + $charge2;
		break;
		case "KOLKATA":
			$basic_amount2 = $basic_amount + $charge4;
		break;
	}
}
elseif($collected_from2 == 'CHENNAI')
{
	switch($destination_place2)
	{
		case "NEW DELHI":
			$basic_amount2 = $basic_amount + $charge4;
		break;
		case "MUMBAI":
			$basic_amount2 = $basic_amount + $charge2;
		break;
		case "BANGALORE":
			$basic_amount2 = $basic_amount + $charge1;
		break;
		case "KOLKATA":
			$basic_amount2 = $basic_amount + $charge3;
		break;
	}
}
elseif($collected_from2 == 'BANGALORE')
{
	switch($destination_place2)
	{
		case "NEW DELHI":
			$basic_amount2 = $basic_amount + $charge4;
		break;
		case "MUMBAI":
			$basic_amount2 = $basic_amount + $charge2;
		break;
		case "CHENNAI":
			$basic_amount2 = $basic_amount + $charge1;
		break;
		case "KOLKATA":
			$basic_amount2 = $basic_amount + $charge3;
		break;
	}
}
else
{
	switch($destination_place2)
	{
		case "NEW DELHI":
			$basic_amount2 = $basic_amount + $charge1;
		break;
		case "MUMBAI":
			$basic_amount2 = $basic_amount + $charge2;
		break;
		case "CHENNAI":
			$basic_amount2 = $basic_amount + $charge4;
		break;
		case "BANGALORE":
			$basic_amount2 = $basic_amount + $charge3;
		break;
	}
}

if($type_o_packing2 == "HARD")
{
	$basic_amount3 = $basic_amount2 + $hard;
}
elseif($type_o_packing2 == "NORMAL")
{
	$basic_amount3 = $basic_amount2 + $normal;
}
else
{
	$basic_amount3 = $basic_amount2 + $light;
}

echo $basic_amount3.'</br>';
echo 'adding weight charges:-</br>';

$weight_charge = $weight2 * $weight_rate;
echo 'weight charges are:-</br>';
echo $weight_charge.'</br>';

$basic_amount4 = $basic_amount3 + $weight_charge;

echo 'amount before tax </br>';
echo $basic_amount4.'</br>';

echo 'applying 16% VAT:-</br>';
$vat_tax = $basic_amount4 * (16/100);
echo $vat_tax.'</br>';


echo 'applying 10% SERVICE TAX:-</br>';
$service_tax = $basic_amount4 * (10/100);
echo $service_tax.'</br>';


echo 'total amount to be paid:-</br>';
$basic_amount5 = $basic_amount4 + $vat_tax + $service_tax;
echo $basic_amount5;

if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(isset($_POST['ok']))
		{
			$sql2 =	"INSERT INTO bill VALUES ('".$id."','".$basic_amount3."','".$weight_charge."','".$vat_tax."','".$service_tax."','".$basic_amount5."')";
			$result2 = mysqli_query($conn,$sql2);
			if ($result2)
			{
			echo 'BILL GENERATED AND SENDED TO CUSTOMER!!!!!!';
			}
			else
			{
			echo 'records not inserted!!!!';
			}
		}
	}




?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<input type="submit" value="OK" name="ok"/>
</form>
</body>
</html>