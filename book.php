<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start(); 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once('config.php');

require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/SMTP.php';


// Include PHPMailer library


function send_email($email){

    
    
    
    
    // Create a new PHPMailer instance
    $mail = new PHPMailer();
    
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // SMTP server
        $mail->SMTPAuth   = true;                // Enable SMTP authentication
        $mail->Username   = '';  // SMTP username
        $mail->Password   = '';// SMTP password
        $mail->SMTPSecure = 'tls';               // Enable TLS encryption
        $mail->Port       = 587;                 // TCP port to connect to
    
        //Sender and recipient settings
        $mail->setFrom('hzhzhhsj58@gmail.com', 'Metro Car Hire');
        $mail->addAddress($email, 'cow');
    
        // Content
                                         // Set email format to HTML
        $mail->Subject = 'Booking confirmed ';
        $mail->Body    = 'Your booking has been confirmed ';
    
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
    $sql="SELECT * FROM tbl_cars where statu='Unbooked' ";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute();
    return $stmt -> fetchALL(PDO::FETCH_ASSOC);

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
     $params = array($user_id, $name,$email, $id,$car_id,$pickup_date,$drop1);
	 $sql = "INSERT INTO tbl_bookings (user_id, fname, email,id,car_id,pickup,dropoff) VALUES(?,?,?,?,?,?,?)";
     send_email($email);
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
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
     <header>
     <nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="index.html"><h2>Metro Car <em>hire</em></h2></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.html">Home<span class="sr-only">(current)</span></a>
                </li> 
                <li class="nav-item"><a class="nav-link" href="cars.html">Cars</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">More</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="blog.html">Maiiage </a>
                        <a class="dropdown-item" href="team.html">blah</a>
                        <a class="dropdown-item" href="testimonials.html">Blah</a>
                        <a class="dropdown-item" href="terms.html">Bah</a>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="about-us.html">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.html">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.html">Signup</a></li>
            </ul>
        </div>
    </div>
</nav>



     </header>








    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
		
	</head>
    <nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="index.html"><h2>Metro Car <em>hire</em></h2></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.html">Home<span class="sr-only">(current)</span></a>
                </li> 
                <li class="nav-item"><a class="nav-link" href="cars.html">Cars</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">More</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="blog.html">Maiiage </a>
                        <a class="dropdown-item" href="team.html">blah</a>
                        <a class="dropdown-item" href="testimonials.html">Blah</a>
                        <a class="dropdown-item" href="terms.html">Bah</a>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="about-us.html">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.html">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.html">Signup</a></li>
            </ul>
        </div>
    </div>
</nav>

	<body class="is-preload" >
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
				
				
                                
                            
                            <button type="submit" name="book" class="btn btn-dark btn-block">Submit</button>
                        </form>
                    </div>
                    
  
                    
                    
                    
                    
                    
                    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright © 2024 Metro Car </p>
            </div>
          </div>
        </div>
      </div>
    </footer>
                    
                    
                    
                    <script src="assets/js/jquery.min.js"></script>
                    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
                    <script src="assets/js/jquery.scrolly.min.js"></script>
                    <script src="assets/js/jquery.scrollex.min.js"></script>
                    <script src="assets/js/main.js"></script>
        
            </body>
    </html>