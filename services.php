<!DOCTYPE html>
<html lang="en">
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

<div class = "row  w-60 h-60 p-5">
	<div class = "col-md-12">
	<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" style ="height: 300px;" data-bs-interval="5000">
      <img  src="img\cs6.jpg" class="d-block w-100" alt="...">
    </div>
  </div>


       <div class="container">
        <div class="head-container" id="shoes" style="font-weight: bold; font-size: 25px; color: red; border-bottom: solid; margin-bottom:20px">
            <p>Our Services</p>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card" style="width: 100%; background: lightgray">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 100%; background: lightgray">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 100%; background: lightgray">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 100%; background: lightgray; margin-top:20px;">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 100%; background: lightgray; margin-top:20px; ">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 100%; background: lightgray; margin-top:20px;">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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