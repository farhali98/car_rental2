<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Metro Car Hire & Reservation Services</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/fontawesome1/css/all.min.css">
  
  
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

        <li class="sidebar-item">
                    <a href="dashboard.php" class="sidebar-link">
                        <i class="fa-solid fa-gear" style="color: red; margin-top:15px; margin-left:30px;"></i>
                    </a>
                </li>
        
      </ul>
      <!---<form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>---->
    </div>
  </div>
</nav>

<!--carousellllll-->



<div class = "row  w-60 h-60 p-5">
	<div class = "col-md-12">
	<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" style ="height: 500px;" data-bs-interval="5000">
      <img  src="img/slide1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" style="height: 500px;" data-bs-interval="5000">
      <img  src="img/slide2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" style="height: 500px;" data-bs-interval="5000">
      <img  src="img/slide3.jpeg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" style="height: 500px;" data-bs-interval="5000">
      <img  src="img/slide4.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" style="height: 500px;">
      <img  src="img/slide5.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
	</div>
</div>

<!---descriptionnnnnn-->
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="description">
        <h3>Rent a car with us</h3>
        <p>Experience convenience and freedom like never before with Metro Car Hire. Our diverse fleet of vehicles ensures that you find the perfect ride for every journey. Whether it's a sleek sedan for a business trip or a spacious SUV for a family adventure, we've got you covered. Explore our range of affordable rental options and hit the road with confidence. Your next great adventure awaits – Book Now!</p>
      </div>
    </div>
    <div class="col-md-6">
      <div class="image-container">
        <img src="img/img1.jpg" alt="Placeholder Image" class="img-fluid">
      </div>
    </div>

    <div class="col-md-6 w-60 mt-5">
      <div class="image-container">
        <img src="img/img2.jpg" alt="Placeholder Image" class="img-fluid">
      </div>
    </div>
    <div class="col-md-6 mt-5">
      <div class="description">
        <h3>Our services</h3>
        <p>At Metro Car Hire, we're committed to providing you with unparalleled service and convenience. With our comprehensive range of services, you can expect: <br>
           > VIP Transportation <br>
           > Airport Transfers<br>
           > Wedding & Bridal Services<br>
           > Tour, Safaris and City Excursions
          </p>
      </div>
    </div>

    <!---rulesssssssss-->
  <div class="container mt-5 p-5">
    <div class="row rules" style= "background: whitesmoke;">
        <h3 class="p-3">Guidelines to follow when renting a vehicle from us</h3>
        <ul class="col-md-6 px-4 p-3" style="color: red;" >
          <li class="mb-3">Plan Ahead: Reserve in advance for availability.</li>
          <li class="mb-3">Choose Wisely: Pick the right size and features.</li>
          <li class="mb-3">Inspect Thoroughly: Note any damage before driving.</li>
          <li class="mb-3">Drive Safely: Follow traffic laws and be responsible.</li>
        </ul>
        <ul class="col-md-6 p-3" style="color: red;">
          <li class="mb-3">Protect the Car: Park securely and avoid damage.</li>
          <li class="mb-3">Refuel Properly: Return with the same fuel level.</li>
          <li class="mb-3">Final Inspection: Confirm condition upon return.</li>
          <li class="mb-3">Enjoy the Ride: Have a safe and enjoyable journey!</li>
        </ul>
      </div>
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


