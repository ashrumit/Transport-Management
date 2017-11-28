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
$userid=$_POST['id'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$add=$_POST['add'];
$cno=$_POST['phno'];
$email=$_POST['email'];
$date=$_POST['date1'];
$sql="INSERT INTO registration VALUES('".$userid."','".$fname."','".$lname."','".$add."','".$cno."','".$email."','".$date."')";
$result=mysqli_query($conn,$sql);
if($result)
{
	echo "success";
}
else
{
	echo "not success";
}
}
mysqli_close($conn);
?>