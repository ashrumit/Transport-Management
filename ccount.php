<?php
$server="localhost";
$username="root";
$password="";
$dbname="project";
$conn=mysqli_connect($server,$username,$password,$dbname);
$sql="SELECT count FROM count ";
$result=mysqli_query($conn,$sql);
if($result)
{
	while($row = $result->fetch_assoc()) 
	{
		$count=$row['count'];
	}

}
$order="TS0".$count;
echo $user;

?>