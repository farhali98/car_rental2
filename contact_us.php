<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'PHPMailer\PHPMailer-master\src\PHPMailer.php';
require_once 'PHPMailer\PHPMailer-master\src\Exception.php';
require_once 'PHPMailer\PHPMailer-master\src\SMTP.php';



function send_email($tfa){

    
    
    
    
    // Create a new PHPMailer instance
    $mail = new PHPMailer();
    
    
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // SMTP server
        $mail->SMTPAuth   = true;                // Enable SMTP authentication
        $mail->Username   = 'hzhzhhsj58@gmail.com';  // SMTP username
        $mail->Password   = 'lyog wdhy dzrv pvkk';// SMTP password
        $mail->SMTPSecure = 'tls';               // Enable TLS encryption
        $mail->Port       = 587;                 // TCP port to connect to
    
        //Sender and recipient settings
        $mail->setFrom('hzhzhhsj58@gmail.com', 'Metro Car Hire');
        $mail->addAddress('farhamusaali@gmail.com' , 'cow');
    
        // Content
                                         // Set email format to HTML
        $mail->Subject = 'tfa code';
        $mail->Body    = $tfa;
    
        // Send the email
        $mail->send();
    }

    if(isset($_POST['submit'])){
        $message = $_POST['message'];
        send_mail($message);
    
        
        
}



?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Metro Car Hire & Reservation Services</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/fontawesome1/css/all.min.css">


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
    /* Style the "Shop Now" button */
.shop-button {
  display: inline-block;
  padding: 10px 20px;
  background-color: black;
  color: white;
  text-decoration: none;
  border-radius: 5px;
  margin-top: 20px;
  font-weight: bold;
}

.head-container{
  font-size: 30px;
  margin-left: 30px;
  margin-top: 30px;
}

.product-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
  gap: 20px;
}

.product {
  text-align: center;
  position: relative;
  display: inline-block;
  overflow: hidden;
}

.product img {
  width: 100%;
  
}

.buttons {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  background: rgba(0, 0, 0, 0.6);
  opacity: 0;
  transition: opacity 0.2s;
}

.buttons a {
  color: #fff;
  text-decoration: none;
  padding: 10px 20px;
  background: black;
  margin: 5px;
  border-radius: 5px;
}

.product:hover .buttons {
  opacity: 1;
}
.bullet-align {
        display: inline-block;
        text-align: left;
    }

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

<!-- Contact 5 - Bootstrap Brain Component -->
<section class="py-3 py-md-5 py-xl-8">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-10 col-lg-8">
        <h2 class="fs-5 mb-2 text-secondary text-uppercase">Contact Us</h2>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row gy-4 gy-md-5 gy-lg-0 align-items-md-center">
      <div class="col-12 col-lg-6">
        <div class="border overflow-hidden">

          <form action="contact_us.php">
            <div class="row gy-4 gy-xl-5 p-4 p-xl-5">
              <div class="col-12">
                <label for="fullname" class="form-label">Full Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="fullname" name="fullname" value="" required>
              </div>
              <div class="col-12 col-md-6">
                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                <div class="input-group">
                  <span class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                      <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                    </svg>
                  </span>
                  <input type="email" class="form-control" id="email" name="email" value="" required>
                </div>
              </div>
              <div class="col-12 col-md-6">
                <label for="phone" class="form-label">Phone Number</label>
                <div class="input-group">
                  <span class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                      <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                    </svg>
                  </span>
                  <input type="tel" class="form-control" id="phone" name="phone" value="">
                </div>
              </div>
              <div class="col-12">
                <label for="subject" class="form-label">Subject <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="subject" name="subject" value="" required>
              </div>
              <div class="col-12">
                <label for="message" class="form-label">Message <span class="text-danger">*</span></label>
                <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
              </div>
              <div class="col-12">
                <div class="d-grid">
                  <button class="btn btn-primary btn-lg" style="font-size:17px;" name="submit" type="submit">Send Message</button>
                </div>
              </div>
            </div>
          </form>

        </div>
      </div>
      <div class="col-12 col-lg-6">
        <div class="row justify-content-xl-center">
          <div class="col-12 col-xl-11">
            <div class="mb-4 mb-md-5">
              <div class="mb-3 text-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-geo" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z" />
                </svg>
              </div>
              <div>
                <h4 class="mb-2" style="font-size:20px;">Office</h4>
                <p class="mb-2" style="font-size:15px">Please visit us to have a discussion.</p>
                <hr class="w-50 mb-3 border-dark-subtle">
                <address class="m-0 text-secondary">8014 Edith Blvd NE, Albuquerque, New York, United States</address>
              </div>
            </div>
            <div class="row mb-sm-4 mb-md-5">
              <div class="col-12 col-sm-6">
                <div class="mb-4 mb-sm-0">
                  <div class="mb-3 text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-telephone-outbound" viewBox="0 0 16 16">
                      <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5z" />
                    </svg>
                  </div>
                  <div>
                    <h4 class="mb-2" style="font-size:20px;">Phone</h4>
                    <p class="mb-2" style="font-size:15px;">Please speak with us directly.</p>
                    <hr class="w-75 mb-3 border-dark-subtle">
                    <p class="mb-0">
                      <a class="link-secondary text-decoration-none" href="tel:+15057922430">(505) 792-2430</a>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6">
                <div class="mb-4 mb-sm-0">
                  <div class="mb-3 text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16">
                      <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z" />
                      <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z" />
                    </svg>
                  </div>
                  <div>
                    <h4 class="mb-2" style="font-size:20px;">Email</h4>
                    <p class="mb-2"style="font-size:15px;">Please write to us directly.</p>
                    <hr class="w-75 mb-3 border-dark-subtle">
                    <p class="mb-0">
                      <a class="link-secondary text-decoration-none" href="mailto:demo@yourdomain.com">demo@yourdomain.com</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div>
              <div class="mb-3 text-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
                  <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z" />
                  <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z" />
                </svg>
              </div>
              <div>
                <h4 class="mb-2" style="font-size:20px;">Opening Hours</h4>
                <p class="mb-2"style="font-size:15px;">Explore our business opening hours.</p>
                <hr class="w-50 mb-3 border-dark-subtle">
                <div class="d-flex mb-1">
                  <p class="text-secondary fw-bold mb-0 me-5" style="font-size:15px;">Mon - Fri</p>
                  <p class="text-secondary mb-0" style="font-size:15px;">9am - 5pm</p>
                </div>
                <div class="d-flex">
                  <p class="text-secondary fw-bold mb-0 me-5" style="font-size:15px;">Sat - Sun</p>
                  <p class="text-secondary mb-0" style="font-size:15px;">9am - 2pm</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>

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

<script src = "js/jq.js"></script>
<script src = "bootstrap/js/bootstrap.min.js"></script>
<script src = "bootstrap/js/bootstrap.bundle.min.js"></script>
<script src = "fontawesome/js/all.min.js"></script>
</html>
