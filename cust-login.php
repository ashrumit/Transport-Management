<html>
<head>
	<style>
	.i6
		{
		 padding-top:7px;
		 padding-bottom:7px;
		}
		.i4
		{
		font-size:25px;
		font-family:Futura;
		color:	white;
		}
		a
		{
		text-decoration: none;
		}
		.i5
		{
		display:inline;
		padding-right: 15px;
		padding-left: 15px;
		}
		.i7
		{padding-left: 1400px;
         padding-right: 15px;
		}
		.c1
		{
		display:none;
	}
		center{
  color:white;
  }
  body
		{
		background: url(truck.jpg);
		background-size: 1600px 1000px;
		background-repeat: no-repeat;
		}
	</style>
	
</head>
<body>
	<?php error_reporting(0)?>
<center><h1><b>CUSTOMER-LOGIN</b></h1></center>
</br>
	<div  class="i6" style="width:1600px;height:50px;">
		<ul>
		<li class="i5"><a href="cplo.php"><img src="pickup.png" height="30px" width="35px"><label class="i4" >PICKUP REQUEST</label></a></li>
		<li class="i5"><a href="orderupdt.php"><img src="update.png" height="30px" width="35px"><label class="i4">REQUEST-UPDATE</label></a></li>
		<li class="i5"><a href="custtrack.php"><img src="track.png" height="30px" width="35px"><label class="i4">TRACK-YOUR-ORDER<label></a></li>
		<li class="i5"><a href="pay.php"><img src="pay.png" height="30px" width="35px"><label class="i4">PAY-BILL</label></a></li>
		<li class="i5"><a onclick="myFunction9()" ondblclick="myFunction10()"><img src="about.png" height="30px" width="35px"><label class="i4">ABOUT-US</label></a></li>
		<l1 class="15"><label class="i4"> WELCOME:<?php echo $_SESSION['name']?></label></l1>
		</ul>
	</div>
	<div  class="i6" style="width:1600px;height:50px;">
		<form method="POST" action="logout.php">
			<label class="i7"><input type="submit" value="LOGOUT" name="logout"/></label>
				</form>
	</div>
	</br>
	</br>
</body>
</html>