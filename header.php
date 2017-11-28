<html>
<head>
	<style>
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
	font-size: 18px;
	font-family:Futura;
    display: none;
    position: absolute;
    background-color: white;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}
.dropdown-content a {
    color: blue;
    padding: 8px 8px;
    text-decoration: none;
    display: block;
}

.dropdown:hover .dropdown-content {
    display: block;
}
	.i6
		{
		 padding-top:7px;
		 padding-bottom:7px;
		}
		.i4
		{
		font-size:25px;
		font-family:Futura;
		color:white;
		}
		a
		{
		text-decoration: none;
		}
		.i5
		{
		display:inline;
		padding-right: 15px;
		padding-left: 25px;
		}
		.c1
		{
		display:none;
		}
		body{
			background: url(truck.jpg);
			background-size: 1700px 1000px;
			background-repeat: no-repeat; 
		}
		center{
			color: white;
		}
		.i7
		{
			padding-left: 1400px;
			padding-right: 15px;
		}
	</style>
	<script type="text/javascript">
	</script>
</head>
<body>
	<?php
	error_reporting(0);
	session_start();
	if(!isset($_SESSION['name']))
	{
		echo "<script type='text/javascript'>alert('please login firsot');";
        echo "window.location='login.php'";
        echo "</script>";
	}

	?>
<center><label><h1><b>ADMIN-LOGIN</b><h1></label></center>
</br>
	<div  class="i6" style="width:1700px;height:50px;">
		<ul>
		<li class ="i5">
<div class="dropdown">
  <span class="i4">REGISTRATION</span>
  <div class="dropdown-content">
    <a href="empreg.php">Employee registration</a>
    <a href="reg.php">Customer registration</a>
  </div>
</div></li>
		<li class="i5"><a href="cinfo.php"><label class="i4">CUSTOMER-INFO</label></a></li>
		<li class="i5"><a href="PLACE-ORDER.php"><label class="i4"><label class="i4">PLACE-ORDER</label></a></li>
		<li class="i5"><a href="TRACK_ORDER.php"><label class="i4"><label class="i4">TRACK-ORDER<label></a></li>
		<li class="i5"><a href="GENERATE_BILL.php"><label class="i4"><label class="i4">GENERATE-BILL</label></a></li>
		<li class="i5"><a href="ORDERS-PLACED.php"><label class="i4"><label class="i4">NEW REQUEST</label></a></li>
		<l1 class="15"><label class="i4">WELCOME:<?php echo $_SESSION['name']?></label></l1>
		</ul>
	</div>
	<div class ="i6" style="width:1700px;height:50px;">
		<form method="POST" action="logout.php">
			<label class="i7"><input type="submit" value="LOGOUT" name="logout"/> 
			</form>
			</div>
	</br>
	</br>
</body>
</html>