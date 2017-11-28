<?php
$server="localhost";
$username="root";
$password="";
$dbname="project";
$conn=mysqli_connect($server,$username,$password,$dbname);
$sql="SELECT count FROM ecount ";
$result=mysqli_query($conn,$sql);
if($result)
{
	while($row = $result->fetch_assoc()) 
	{
		$count=$row['count'];
	}
}
$eid="E00".$count;
?>