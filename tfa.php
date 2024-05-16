<?php 
session_start(); 
$tfa = $_SESSION['2fa'];

if(isset($_POST['2fa'])){

$tfa2 = $_POST['2fa'];

if ($tfa2 == $tfa){

    ?>
					<div class="row">
						<div class="col-md-12">
							<div class="alert alert-success">
								<div class = "text-center">Login successful, please enter tfa...</div>
							</div>
						</div>
					</div>
				<?php
				header('Refresh:3; url=dashboard.php');




}
else{
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger">
                <div class = "text-center">please enter tfa...</div>
            </div>
        </div>
    </div>
<?php




}




}



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
</head>
<body>
    

<div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
  <div class="card-header">Header</div>
  <div class="card-body">
   
  <form method="POST" action="tfa.php">
					
					<label>2 factor</label>
					<input class="form-control" type="number" name="2fa">
					
					
					<button style="float: right;" class="btn btn-primary mt-3 mb-3" type="submit" name="tfa">Sign In<i class="fa fa-right-to-bracket ps-2"></i></button>
				</form>
  </div>
</div>




</body>
</html>