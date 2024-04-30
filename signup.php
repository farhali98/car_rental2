<?php
    require_once('config.php');
    function insertUser($pdo, $uname, $encpass){
      $sql = "INSERT INTO tbl_users(username,password) VALUES (?,?)";
      $stmt = $pdo -> prepare($sql);
      $stmt -> execute([$uname, $encpass]);
    }
    function getUserID($pdo){
      $uid = 0;
      $sql = "SELECT MAX(user_id) AS uid FROM tbl_users";
      $stmt = $pdo -> prepare($sql);
      $stmt -> execute();
      $row = $stmt -> fetch();
      $uid = $row['uid'];

      return $uid;

    }
    //change thisssssss
    function registerUser($pdo){
      if(isset($_POST['signup'])){
        $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $dob = $_POST['dob'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $town = $_POST['town'];
      $uname = $_POST['uname'];
      $pass = $_POST['pass'];
      $cpass = $_POST['cpass'];

      
      if(empty($fname)||empty($lname)||empty($dob) ||empty($phone)||$email ==""||
      $town ==""||$uname ==""||$pass ==""||$cpass ==""){
        ?>
        <div class = "row">
          <div class = "col-md-12">
            <div class = "alert alert-danger">
              <div class = "text-center">Fill all blanks fields</div>
            </div>
          </div>
          
        <div>
        <?php

        
      }elseif($pass!=$cpass){
        ?>
        <div class = "row">
          <div class = "col-md-12">
            <div class = "alert alert-danger">
              <div class = "text-center">Passwords do not match</div>
            </div>
          </div>
          
        <div>

        <?php
      }else{
       $encpass = hash('sha256',$pass);
       insertUser($pdo, $uname, $encpass);
       $userid = getUserID($pdo);
       $role_id = 11;

       
       $params = array($userid, $fname, $lname, $dob , $phone, $email, $town);
       $sql = "INSERT INTO tbl_customers(user_id, fname, lname, dob, phone, email, town) VALUES(?,?,?,?,?,?,?)";
       $stmt = $pdo -> prepare($sql);
       $stmt -> execute($params);
       if($stmt){
        ?>
        <div class = "row">
          <div class = "col-md-12">
            <div class = "alert alert-success">
              <div class = "text-center">Your account has been created successfully</div>
            </div>
          </div>
          
        <div>

        <?php
       }else{
        ?>
        <div class = "row">
          <div class = "col-md-12">
            <div class = "alert alert-danger">
              <div class = "text-center">There was a problem creating your account.
                Please try again later</div>
            </div>
          </div>
          
        <div>

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
	<title>Sign Up</title>
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

<div class = "container-fluid">
<div class = "row  mt-3 mb-3">
    <div class = "col-md-6 offset-3">
    <h3>
      signup
    </h3>
    <?= registerUser($pdo);?>
    <form method ="POST" action = "signup.php">
        <label>First Name:</label>
        <input class = "form-control" type="text" name = "fname">
        <label>Last Name:</label>
        <input class = "form-control" type="text" name = "lname">
        <label>Date of Birth:</label>
        <input class = "form-control" type="date" name = "dob">
        <label>Gender:</label>
        <select class = "form-control" name = "gender">
            <option>Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>

        <label>Phone Number:</label>
        <input class = "form-control" type="text" name = "phone">
        <label>Email:</label>
        <input class = "form-control" type="email" name = "email">
        <label>Town/City:</label>
        <input class = "form-control" type="text" name = "town">
        <label>Username:</label>
        <input class = "form-control" type="text" name = "uname">
        <label>Password:</label>
        <input class = "form-control" type="password" name = "pass">
        <label>Confirm Password:</label>
        <input class = "form-control" type="password" name = "cpass">
        <button class = "btn btn-primary mt-3 mb-3 " style=" float:right" type = "submit" name = "signup">Register<i class="fa-solid fa-user-plus"></i></button>



    </form>
    </div>
</div>
</div>


</body>

<script src = "js/jquery-3.7.1.min.js"></script>
<script src = "bootstrap/js/bootstrap.min.js"></script>
<script src = "bootstrap/js/bootstrap.bundle.min.js"></script>
<script src = "fontawesome/js/all.min.js"></script>
</html>


