<?php
session_start(); 
	require_once('config.php');

	function loginUser($pdo){
		if(isset($_POST['signup'])){
			$uname = $_POST['uname'];
			$pass = $_POST['pass'];
		
			if(empty($uname)||empty($pass)){
					?>
						<div class="row">
							<div class="col-md-12">
								<div class="alert alert-danger">
									<div class = "text-center">Provide username and password to continue</div>
								</div>
							</div>
						</div>
					<?php
			}else{
				$encpass = hash('sha256', $pass);
				$params = array($uname, $encpass);
				$sql = "SELECT * FROM tbl_users WHERE username = ? AND password = ?";
				$stmt = $pdo -> prepare($sql);
				$stmt -> execute($params);
				$count = $stmt -> rowCount();
				if($count > 0){
					$row = $stmt -> fetch();
					$userid = $row['user_id'];
					$roleid = $row['role_id'];
					$_SESSION['uid'] = $userid;
					$_SESSION['rid'] = $roleid;
					?>
					<div class="row">
						<div class="col-md-12">
							<div class="alert alert-success">
								<div class = "text-center">Login successful, please wait...</div>
							</div>
						</div>
					</div>
				<?php
				header('Refresh:3; url=dashboard.php');
				}else{
				?>
					<div class="row">
						<div class="col-md-12">
							<div class="alert alert-danger">
								<div class = "text-center">Invalid username or password, try again</div>
							</div>
						</div>
					</div>
				<?php
				}
			}

		}
	} 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign In : : Mash Poa Bus Booking System</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">


	<style>
        .custom-navbar{
            background-color: #D0D0D0;
            height: 100px;
        }
        .navbar-nav .nav-link {
            font-size: 16px;
            color: black;
            padding: 10px 15px;
        }
        .navbar-nav .nav-link:hover,
        .navbar-nav .dropdown:hover .nav-link {
            background-color: white;
        }



        
/* Dropdown Button */
        .dropbtn {
        font-size: 16px;
        border: none;
        background: none;
        padding: 10px 15px;
        }

/* Dropdown Content */
        .dropdown-content {
        display: none;
        position: fixed;
        margin-top: 2px;
        background-color: white;
        min-width: 150px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        }

/* Links inside the dropdown */
        .dropdown-content a {
        color: black;
        padding: 10px 15px;
        text-decoration: none;
        display: block;
        }

/* color of dropdown links on hover */
        .dropdown-content a:hover {color: red;}

/* dropdown menu on hover */
        .dropdown:hover .dropdown-content {display: block;}

/*background color of the dropdown button when the dropdown content is shown */
        .dropdown:hover .dropbtn {background-color: white;}
		</style>
</head>
<body>

	<!--navbarrrrr-->

	<nav class="navbar navbar-expand-lg custom-navbar">
  	<div class="container-fluid">
    <a class="navbar-brand" href="#">
        <img src="img/logo/logo.png" style="height: 120px; width: 120px;">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="dropdown">
            <button class="dropbtn">Cars For Hire</button>
            <ul class="dropdown-content">
              <a href="#">Saloon Cars</a>
              <a href="#">4x4 SUVs</a>
              <a href="#">Executive Cars</a>
              <a href="#">Shuttle Busses</a>
            </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Our Services</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="#">About us</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Inquiries</a>
          </li>
        
        <li class="nav-item dropdown" style="margin-left: 550px;">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Account
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Sign Up</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Sign In</a></li>
            
            
          </ul>
        </li>
        
      </ul>
      <!---<form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>---->
    </div>
  </div>
</nav>
	<div class="container-fluid">
		<div class="row mt-4">
			<div class="col-md-4 offset-4">
				<h3>Sign In</h3>
				<?= loginUser($pdo);?>
				<form method="POST" action="signin.php">
					
					<label>Username:</label>
					<input class="form-control" type="text" name="uname">
					<label>Password:</label>
					<input class="form-control" type="password" name="pass">
					
					<button style="float: right;" class="btn btn-primary mt-3 mb-3" type="submit" name="signup">Sign In<i class="fa fa-right-to-bracket ps-2"></i></button>
				</form>
			</div>
		</div>
	</div>
</body>
<script src="js/jquery-3.7.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="fontawesome/js/all.min.js"></script>
</html>


