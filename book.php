<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start(); 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once('config.php');

require_once 'PHPMailer/PHPMailer-master/src/PHPMailer.php';
require_once 'PHPMailer/PHPMailer-master/src/Exception.php';
require_once 'PHPMailer/PHPMailer-master/src/SMTP.php';

// Include PHPMailer library

function send_email($email, $carname, $pickupdate, $dropoffdate, $totalamount) {
    $mail = new PHPMailer();
    
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'farhamusaali@gmail.com';
        $mail->Password   = 'wsat blaz eyrc zody';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;
    
        //Sender and recipient settings
        $mail->setFrom('farhamusaali@gmail.com', 'Metro Car Hire');
        $mail->addAddress($email, 'cow');
    
        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Booking confirmed';
        $mail->Body = 'Car booked: ' . $carname . ', Pick up date: ' . $pickupdate . ', Drop off date: ' . $dropoffdate . ', Total amount: ' . $totalamount;
    
        // Send the email
        $mail->send();
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
                    <div class="text-center">Your Booking details have been shared to your email</div>
                </div>
            </div>
        </div>
        <?php
    } catch (Exception $e) {
        echo "Mailer Error: {$mail->ErrorInfo}";
    }
}

function get_car($pdo) {
    $sql = "SELECT * FROM tbl_cars";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function carname($pdo, $id) {
    $sql = "SELECT car_name FROM tbl_cars WHERE car_id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchColumn();
}

function add_booking($pdo) {
    $user_id = $_SESSION['uid'];
    if (isset($_POST['book'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $id = $_POST['id'];
        $pickup_date = $_POST['pdate'];
        $drop1 = $_POST['return-date'];
        $car_id = $_POST['car_id'];
        $carname = carname($pdo, $car_id);

        send_email($email, $carname, $pickup_date, $drop1, 100);

        

        if ($carname) {
            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success">
                        <div class="text-center">Your Booking has been created successfully</div>
                    </div>
                </div>
            </div>
            <?php
        } else {
            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        <div class="text-center">There was a problem booking. Please try again later</div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
}

$cars = get_car($pdo);
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Metro Car Hire</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/owl.css">
</head>
<body>
    <style>
        .custom-navbar {
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
        /* background color of the dropdown button when the dropdown content is shown */
        .dropdown:hover .dropbtn {background-color: white;}
        /* description */
        .description h3 {
            display: inline-block;
            border-bottom: 2px solid;
        }
        .rules h3 {
            text-align: center;
        }
    </style>

    <!--navbar-->
    <nav class="navbar navbar-expand-lg custom-navbar">
        <div class="container-fluid">
            <a class="navbar-brand logo-text" style="font-weight: bold; color: red; font-size: 30px; margin-left: 30px;" href="index.php">Metro</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
                        <a class="nav-link dropdown-toggle" style="color: red;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Account</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="signup.php">Sign Up</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="signin.php">Sign In</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Wrapper -->
    <div class="card bg-light mb-3" style="max-width: 1500px;">
        <div class="card-body">
            <div class="container mt-5">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title" style="text-align: center; font-size: 30px;">Booking Form</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="car_id">Car:</label>
                                        <select class="form-control" name="car_id" id="car_id" required>
                                            <?php foreach ($cars as $car) { ?>
                                                <option value="<?php echo $car['car_id']; ?>"><?php echo $car['car_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="name">Name:</label>
                                        <input type="text" class="form-control" name="name" id="name" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" name="email" id="email" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="id">ID Number:</label>
                                        <input type="text" class="form-control" name="id" id="id" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="pdate">Pickup Date:</label>
                                        <input type="date" class="form-control" name="pdate" id="pdate" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="return-date">Return Date:</label>
                                        <input type="date" class="form-control" name="return-date" id="return-date" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" name="book" class="btn btn-primary btn-block">Book</button>
                                    </div>
                                </div>
                            </form>
                            <?php add_booking($pdo); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
