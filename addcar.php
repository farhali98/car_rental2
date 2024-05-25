
<?php
session_start();
require_once('config.php');



function add_car($pdo){
 
  $user_id = $_SESSION['uid'];
   if(isset($_POST['book'])){
     $name = $_POST['name'];
     $type = $_POST['type'];
     $price = $_POST['price'];
     $status=$_POST['status'];
    
    
     $params = array($name,$type, $price,$status);
	 $sql = "INSERT INTO tbl_cars (car_name, car_type,price_per_day,statu) VALUES(?,?,?,?,?,?,?)";
    
     $stmt = $pdo -> prepare($sql);
	 $stmt -> execute($params);
                       
   }
  }				




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="vendor/css/bootstrap.min.css"  rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

::after,
::before {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

a {
    text-decoration: none;
}

li {
    list-style: none;
}

h1 {
    font-weight: 600;
    font-size: 1.5rem;
}

body {
    font-family: 'Poppins', sans-serif;
}

.wrapper {
    display: flex;
}

.main {
    min-height: 100vh;
    width: 100%;
    overflow: hidden;
    transition: all 0.35s ease-in-out;
    background-color: white;
}

#sidebar {
    width: 70px;
    min-width: 70px;
    z-index: 1000;
    transition: all .25s ease-in-out;
    background-color: lightgray;
    display: flex;
    flex-direction: column;
}

#sidebar.expand {
    width: 260px;
    min-width: 260px;
}

.toggle-btn {
    background-color: transparent;
    cursor: pointer;
    border: 0;
    padding: 1rem 1.5rem;
}

.toggle-btn i {
    font-size: 1.5rem;
    color: black;
}

.sidebar-logo {
    margin: auto 0;
}

.sidebar-logo a {
    color: #FFF;
    font-size: 1.15rem;
    font-weight: 600;
}

#sidebar:not(.expand) .sidebar-logo,
#sidebar:not(.expand) a.sidebar-link span {
    display: none;
}

.sidebar-nav {
    padding: 2rem 0;
    flex: 1 1 auto;
}

a.sidebar-link {
    padding: .625rem 1.625rem;
    color: black;
    display: block;
    font-size: 0.9rem;
    white-space: nowrap;
    border-left: 3px solid transparent;
}

.sidebar-link i {
    font-size: 1.1rem;
    margin-right: .75rem;
}

a.sidebar-link:hover {
    background-color: rgba(255, 255, 255, .075);
    border-left: 3px solid #3b7ddd;
}

.sidebar-item {
    position: relative;
}

#sidebar:not(.expand) .sidebar-item .sidebar-dropdown {
    position: absolute;
    top: 0;
    left: 70px;
    background-color: red;
    padding: 0;
    min-width: 15rem;
    display: none;
}

#sidebar:not(.expand) .sidebar-item:hover .has-dropdown+.sidebar-dropdown {
    display: block;
    max-height: 15em;
    width: 100%;
    opacity: 1;
}

#sidebar.expand .sidebar-link[data-bs-toggle="collapse"]::after {
    border: solid;
    border-width: 0 .075rem .075rem 0;
    content: "";
    display: inline-block;
    padding: 2px;
    position: absolute;
    right: 1.5rem;
    top: 1.4rem;
    transform: rotate(-135deg);
    transition: all .2s ease-out;
}

#sidebar.expand .sidebar-link[data-bs-toggle="collapse"].collapsed::after {
    transform: rotate(45deg);
    transition: all .2s ease-out;
}



    </style>




</head>

<body>
    <h1>

       


    </h1>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="fa-solid fa-list"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="index.php" style="color:red;">Metro car hire</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="dashboard.php" class="sidebar-link">
                        <i class="fa-solid fa-house"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="customer.php" class="sidebar-link ">
                        <i class="fa-solid fa-address-book"></i>
                        <span>Customers</span>
                    </a>
                    
                </li>
                <li class="sidebar-item">
                    <a href="all_bookings.php" class="sidebar-link">
                        <i class="fa-brands fa-product-hunt"></i>
                        <span>Bookings</span>
                    </a>
                    
                </li>
                
                <li class="sidebar-item">
                    <a href="cars.php" class="sidebar-link">
                        <i class="fa-brands fa-product-hunt"></i>
                        <span>cars</span>
                    </a>
                   
                </li>





              
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="fa-solid fa-gear"></i>
                        <span>Setting</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="#" class="sidebar-link">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
        <div class="main p-3">
          

        <div class="card bg-light mb-3">
  <div class="card-body">

                    
                    <div class="container pt-6 mt-6">
                        <h2 class="text-center mb-4">Book a Car</h2>
                       
                        <form method="POST" action="addcar.php">
                        <label>Car name:</label>
					<input class="form-control" type="text" name="name">
					<label>Car type:</label>
					<input class="form-control" type="text" name="type">
                    <label>price per day:</label>
					<input class="form-control" type="number" name="price">
          <label>status:</label>
					<input class="form-control" type="text" name="status">
                   
      
				
				
                                
                            
                            <button style="float: right;" type="submit"  name="book" class="btn btn-danger mt-3  btn-block">Submit</button>
                        </form>
                    </div>
	









        </div>

   
    <script>
 
    
 const hamBurger = document.querySelector(".toggle-btn");

hamBurger.addEventListener("click", function () {
  document.querySelector("#sidebar").classList.toggle("expand");
});


    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>
















