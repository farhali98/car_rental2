<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start(); 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once('config.php');

require_once 'PHPMailer\PHPMailer-master\src\PHPMailer.php';
require_once 'PHPMailer\PHPMailer-master\src\Exception.php';
require_once 'PHPMailer\PHPMailer-master\src\SMTP.php';



// Include PHPMailer library


function send_email($email,$carname,$pickupdate,$dropoffdate,$totalamount){

    
    
    
    
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
        $mail->Subject = 'Booking confirmed ';
        $mail->Body = 'car booked'.$carname . ',' . 'pick up date'.$pickupdate . ',' . 'drop off date'.$dropoffdate . ',' . 'total amount'.$totalamount;

    
        // Send the email
        $mail->send();
        ?>
					<div class="row">
						<div class="col-md-12">
							<div class="alert alert-success">
								<div class = "text-center">Your Booking details have been shared to ur emails</div>
							</div>
						</div>
					</div>
				<?php
    } catch (Exception) {
        echo "Mailer Error: {$mail->ErrorInfo}";
    }
    
    
    

}

function get_car($pdo){
    $sql="SELECT * FROM tbl_cars ";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute();
    return $stmt -> fetchALL(PDO::FETCH_ASSOC);

}


function carname($pdo, $id) {
 
    $sql = "SELECT car_name FROM tbl_cars WHERE car_id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    
    
    return $stmt->fetchColumn();
}



$cars = get_car($pdo);





function add_booking($pdo){
 
  $user_id = $_SESSION['uid'];
   if(isset($_POST['book'])){
     $name = $_POST['name'];
     $email = $_POST['email'];
     $id = $_POST['id'];
     $pickup_date=$_POST['pdate'];
     $drop1=$_POST['return-date'];
     $car_id=$_POST['car_id'];
     $carname=carname($pdo,$car_id);

     send_email($email,$carname,$pickup_date,$drop1,100);

     $params = array($user_id, $name,$email, $id,$car_id,$pickup_date,$drop1);
	 $sql = "INSERT INTO tbl_bookings (user_id, fname, email,id,car_id,pickup,dropoff) VALUES(?,?,?,?,?,?,?)";
     send_email($email,$car_id,$pickup_date,$drop1,100);
     $stmt = $pdo -> prepare($sql);
      update_status($pdo,$car_id);
	 $stmt -> execute($params);
    

				if($stmt){
                    send_email($email);
					?>
					<div class="row">
						<div class="col-md-12">
							<div class="alert alert-success">
								<div class = "text-center">Your Booking has been created successfully</div>
							</div>
						</div>
					</div>
				<?php
				}else{
				?>
					<div class="row">
						<div class="col-md-12">
							<div class="alert alert-danger">
								<div class = "text-center">There was a problem booking. Please try again later</div>
							</div>
						</div>
					</div>
				<?php
				}

                
			
                
              
 


            }
}
    


?>












<!DOCTYPE HTML>
<html>
	<head>
		<title>Metro car hire</title>
		
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Metro car hire</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/owl.css">
     








    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
		
	</head>
   

	<body>
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

/*descriptionnnnnnnn*/
        

      .description h3 {
      
      display: inline-block;
      border-bottom: 2px solid;
      }
      .rules h3{
        text-align: center;
      }
     
      
       

       
    </style>
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
		<!-- Wrapper -->
			

				
                    
        <div class="card bg-light mb-3">
  <div class="card-body">

                    
                    <div class="container pt-6 mt-6">
                        <h2 class="text-center mb-4">Book a Car</h2>
                        <?= add_booking($pdo);?>
                        <form method="POST" action="Book.php">
                        <label>Full Name:</label>
					<input class="form-control" type="text" name="name">
					<label>Email:</label>
					<input class="form-control" type="email" name="email">
                    <label>Id number:</label>
					<input class="form-control" type="text" name="id">
                    <label>Select car:</label>
					<select class="form-control" id="carSelect" name="car_id">
                    <option value="">Select Car</option>
                    <?php foreach ($cars as $car) : ?>
                        <option value="<?= $car['car_id'] ?>"><?= $car['car_name'] ?></option>
                    <?php endforeach; ?>
                </select>
                     

					<label>Pickup Date:</label>
					<input class="form-control" type="date" name="pdate">
                    <label>Return Date:</label>
					<input class="form-control" type="date" name="return-date">
				
				
                                
                            
                            <button style="float: right;" type="submit"  name="book" class="btn btn-danger mt-3  btn-block">Submit</button>
                        </form>
                    </div>
                    
  
                    
                    
                    
                    
                    
                   <!-- Footer -->
<footer class="bg-body-white-tertiary mt-3 text-center bg-none">
  <!-- Grid container -->
  <div class="container p-4">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-facebook-f"></i
      ></a>

      <!-- Twitter -->
      <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-twitter"></i
      ></a>

      <!-- Google -->
      <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-google"></i
      ></a>

      <!-- Instagram -->
      <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-instagram"></i
      ></a>

      <!-- Linkedin -->
      <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-linkedin-in"></i
      ></a>

      
    </section>
    <!-- Section: Social media -->

    

    <!-- Section: Links -->
    <section class="">
      <!--Grid row-->
      <div class="row justify-content-center">
        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Rental Car Types</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a class="text-body" href="saloon.php">Saloon Cars</a>
            </li>
            <li>
              <a class="text-body" href="4x4.php">4x4 SUVs</a>
            </li>
            <li>
              <a class="text-body" href="executive.php">Executive Cars</a>
            </li>
            <li>
              <a class="text-body" href="shuttle.php">Shuttle Busses</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Our Services</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a class="text-body" href="services.php">VIP Transportation</a>
            </li>
            <li>
              <a class="text-body" href="services.php">Airport Transfers</a>
            </li>
            <li>
              <a class="text-body" href="services.php">Wedding & Bridal Services</a>
            </li>
            <li>
              <a class="text-body" href="services.php">Tour & Safaris</a>
            </li>
            <li>
              <a class="text-body" href="services.php">City Excursion</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Contact Details</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a class="text-body" href="#!">Metro Car Hire</a>
            </li>
            <li>
              <a class="text-body" href="#!">Nairobi, Kenya</a>
            </li>
            <li>
              <a class="text-body" href="#!">+254757449656</a>
            </li>
            <li>
              <a class="text-body" href="#!">metro@gmail.com</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </section>
    <!-- Section: Links -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3">
    Copyright © : Metro Car Hire. All Rights Reserved
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
                    
                    
                    
                    <script src="assets/js/jquery.min.js"></script>
                    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
                    <script src="assets/js/jquery.scrolly.min.js"></script>
                    <script src="assets/js/jquery.scrollex.min.js"></script>
                    <script src="assets/js/main.js"></script>
        
            </body>
    </html>
