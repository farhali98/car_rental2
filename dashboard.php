<?php
session_start();
$roleid = $_SESSION['rid'];
if($roleid == 4){
	require('user_profile.php');
}else{
	require('admin_profile.php');
} 

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard: : Mashpoa Booking App</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
</head>
<body class="vh-100">
	<div class="row vh-100">
		<div class="col-md-2" style="height: 100%; background-color: #4D4D4D; border-right: 1px #FCB629 solid">
			<p class="text-center mt-2">
				<img class="img-fluid" style="height: 80px; border: 2px #ffffff solid; border-radius: 100%" src="assets\logo.jpeg">
			</p>
			<nav class ="navbar ">
				<ul class ="nav navbar-nav">
					
					
				</ul>
			</nav>
		</div>
		<div class="col-md-10">
			<div class="row">
				<div class="col-md-12" style="height: 90px; background-color: #4D4D4D;" >
					
				</div>
			</div>
		</div>
	</div>

<script type="text/javascript" src="assets/js/jquery-3.7.1.min.js"></script>
<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/fontawesome/js/all.min.js"></script>
</body>
</html>