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
		font-size:20px;
		font-family:Futura;
		color: white;
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
		{padding-left: 1500px;
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
		background-size: 1650px 1000px;
		background-repeat: no-repeat;
		}
	</style>
	
</head>
<body>
	<?php error_reporting(0)?>
<center><h1><b>EMPLOYEE-LOGIN</b></h1></center>
</br>
	<div  class="i6" style="width:1650px;height:50px;">
		<ul>
		<li class="i5"><a href="reg1.php"><img src="reg.png" height="30px" width="35px"><label class="i4">CUST-REGISTRATION</label></a></li>
		<li class="i5"><a href="cusin.php"><img src="info.png" height="30px" width="35px"><label class="i4">CUSTOMER-INFO</label></a></li>
		<li class="i5"><a href="empplace.php"><img src="place.png" height="30px" width="35px"><label class="i4"><label class="i4">PLACE-ORDER</label></a></li>
		<li class="i5"><a href="track2.php"><img src="track.png" height="30px" width="35px"><label class="i4"><label class="i4">TRACK-ORDER<label></a></li>
		<li class="i5"><a href="empbill.php"><img src="bill.png" height="30px" width="35px"><label class="i4"><label class="i4">GENERATE-BILL</label></a></li>
		<li class="i5"><a href="update.php"><img src="update.png" height="30px" width="35px"><label class="i4"><label class="i4">UPDATE-ORDER</label></a></li>
		<li class="i5"><a href="erequest.php"><img src="place.png" height="30px" width="35px"><label class="i4"><label class="i4">REQUEST</label></a></li>
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
	</br>
	
</body>
</html>