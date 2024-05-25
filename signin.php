<?php
session_start(); 
error_reporting(E_ALL);
ini_set('display_errors', 1);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once('config.php');

require_once 'PHPMailer\PHPMailer-master\src\PHPMailer.php';
require_once 'PHPMailer\PHPMailer-master\src\Exception.php';
require_once 'PHPMailer\PHPMailer-master\src\SMTP.php';











function send_email($email, $tfa){

    
    
    
    
  // Create a new PHPMailer instance
  $mail = new PHPMailer();
  
  try {
      //Server settings
      $mail->isSMTP();
      $mail->Host       = 'smtp.gmail.com'; // SMTP server
      $mail->SMTPAuth   = true;                // Enable SMTP authentication
      $mail->Username   = 'farhamusaali@gmail.com';  // SMTP username
      $mail->Password   = 'wsat blaz eyrc zody';// SMTP password
      $mail->SMTPSecure = 'tls';               // Enable TLS encryption
      $mail->Port       = 587;                 // TCP port to connect to
  
      //Sender and recipient settings
      $mail->setFrom('farhamusaali@gmail.com', 'Metro Car Hire');
      $mail->addAddress($email, 'cow');
  
      // Content
                                       // Set email format to HTML
      $mail->Subject = 'This is your 2 factor authentication code ';
      $mail->Body    = $tfa;
  
      // Send the email
      $mail->send();
      ?>
        <div class="row">
          <div class="col-md-12">
            <div class="alert alert-success">
              <div class = "text-center">UR EMAIL HAS BEEN SENT SUCCESFULLY</div>
            </div>
          </div>
        </div>
      <?php
  } catch (Exception) {
      echo "Mailer Error: {$mail->ErrorInfo}";
  }
  
  
  

}






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
       

        $tfa = mt_rand (1000, 5000);

				$count = $stmt -> rowCount();
				if($count > 0){
					$row = $stmt -> fetch();
					$userid = $row['user_id'];
					//$roleid = $row['role_id'];
					$sql2 = "SELECT email FROM tbl_customers WHERE user_id=$userid";
          $stmt2 = $pdo -> prepare($sql2);
				  $stmt2 -> execute();

          $email=$stmt2->fetchColumn();

          $_SESSION['2fa'] = $tfa;
					//$_SESSION['rid'] = $roleid;
          $_SESSION['uid'] = $userid;

          send_email($email, $tfa);
          header('Refresh:3; url=tfa.php');
          
      
			
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
    <a class="navbar-brand logo-text" style="font-weight: bold; color: red; font-size: 30px; margin-left: 30px;" href="index.php">Metro</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="dropdown">
            <button class="dropbtn">Cars For Hire</button>
            <ul class="dropdown-content">
              <a href="saloon.php">Saloon Cars</a>
              <a href="4x4.php">4x4 SUVs</a>
              <a href="executive.php">Executive Cars</a>
              <a href="shuttle.php">Shuttle Busses</a>
            </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="services.php">Our Services</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="aboutus.php">About us</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="contact_us.php">Inquiries</a>
          </li>
        
        <li class="nav-item dropdown" style="margin-left: 500px; font-weight: bold;">
          <a class="nav-link dropdown-toggle" style="color: red;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Account
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="signup.php">Sign Up</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="signin.php">Sign In</a></li>
            
            
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


