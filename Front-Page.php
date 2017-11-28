<html>
<head>
<style type="text/css">
.i6
{
	padding-top:7px;
	padding-bottom:7px;
}
.i7
{
	padding-top:7px;
	padding-bottom:7px;
}
.i4
		{
		font-size:20px;
		font-family:Futura;
		color:white;
		padding-bottom:7px;
		}
.i5
{
	display:inline;
	padding-right: 10px;
	padding-left: 100px;
	color:white;
}
.i8
{
	display:inline;
	padding-right: 10px;
	padding-left: 320px;
	color:white;
}
a
{
	text-decoration: none;
}
h1 { color: #fff; font-family: 'Bitter', serif; font-size: 50px; font-weight: normal; line-height: 54px; margin: 0 0 54px; }
body
{
    background: url(2.jpg);
    background-size: 1700px 1000px;
    background-repeat: no-repeat;
}
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
    background-color: #3e8e41;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {background-color: #f1f1f1}

.show {display:block;}
</style>
<script>
function myFunction2() {
    alert("PLEASE REGISTER YOURSELF WITH US TO AVAIL SERVICES!!!!!");
}
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
</head>
<body>
	<div  class="i6" style="width:1700px;height:50px;">
		<center><h1>Trans-Cargo</h1></center>
		<ul>
		<li class="i5"><a href="Home-Content.php"><img src="home.png" height="40px" width="40px"><label class="i4">  About-Us</label></a></li>
		<li class="i5">
		<div class="dropdown">
		<img src="s3.png" height="35px" width="35px"><label class="i4" onmouseover="myFunction()">Services</label>
			<div id="myDropdown" class="dropdown-content">
			<a href="product-services.php">Product & Services</a>
			<a href="Packaging-Solution.php">Packaging-Solution</a>
			<a href="rbitem.php">Restricted & Banned Items</a>
			</div>
		</div>
		</li>
		<li class="i5"><a href="LOGIN.php" onclick="myFunction2()"><label class="i4"><img src="rfs.png" height="35px" width="35px">Request-Services</label></a></li>
		<li class="i5"><a href="new.php"><label class="i4"><img src="c7.png" height="35px" width="35px">Contact</label></a></li>
		<li class="i5"><a href="LOGIN.php"><label class="i4"><img src="l.png" height="30px" width="30px">Login</label></a></li>
		</ul>
	</div>
	</br>
	
</body>
</html>