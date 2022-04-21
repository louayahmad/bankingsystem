<?php
$server = "localhost";
$username = "ahmadl1_louayahmad20";
$password = 'Redhawks2023@';
$databaseName = "ahmadl1_bankingproject";

	$connectionDatabase = new mysqli($server, $username, $password, $databaseName);
	
	include 'maindocs/queries.php'; //database functions document

	$loginError = "";
	if (isset($_POST['customer'])) {
		  $loginError = "";
			$customerUsername = $_POST['email'];
			$password = '$_POST[password]';
			$hashed = hash('sha512', $password);
			$queryResult = $connectionDatabase->query("SELECT * from useraccounts where email='$customerUsername' AND password='$hashed'");
			if($queryResult->num_rows>0){
				session_start();
				$information = $queryResult->fetch_assoc();
				$_SESSION['userId']=$information['id'];
				$_SESSION['user'] = $information;
				header('location: home.php');
			 }
			else {
				$loginError = "<div class='alert alert-warning text-center rounded-0'>Username or password wrong try again!</div>";
			}
	}

	if (isset($_POST['admin'])){
		  $loginError = "";
			$adminUsername = $_POST['email'];
			$adminPassword = $_POST['password'];

			$queryResult = $connectionDatabase->query("SELECT * from adminlogins where email='$adminUsername' AND password='$adminPassword'");
			if($queryResult->num_rows>0) {
				session_start();
				$information = $queryResult->fetch_assoc();
				$_SESSION['adminId']=$information['id'];

				header('location: adminhomepage.php');
			 }
			else
			{
				$loginError = "<div class='alert alert-warning text-center rounded-0'>Username or password wrong try again!</div>";
			}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Banking</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="login.css">
<body class="bg-light">
<?php echo $loginError?>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg  fixed-top text-light bg-dark" id="mainNav">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                      
                        <li class="nav-item"><a class="nav-link text-light" href="index.php">Home</a></li>
                         <li class="nav-item"><a class="nav-link text-light" href="signuphomepage.php">Sign Up</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    <br>
    <br>
<br>
<br>
<br>
<br>
<div class="container">
        <h1 class="text-center text-dark"><b>Reboot Bank</b></h1>

  <div class="row mt-5">
    <div class="spContainer mx-auto">
      <div class="card px-4 py-5 border-0 shadow">
        <div class="d-inline text-left mb-3">
          <h3 class="font-weight-bold">User Login</h3>
        </div>
        <div class="d-inline text-center mb-0">
        <form method="POST">
          <div class="form-group mx-auto">
            <input class="form-control inpSp" name="email" type="email" value="brookscalvin@gmail.com" placeholder="Enter Email">
          </div>
        </div>
        <div class="d-inline text-center mb-3">
          <div class="form-group mx-auto">
            <input class="form-control inpSp" name="password" type="password" value="12345" placeholder="Enter Password">
          </div>
        </div>
         <button class="btn btn-primary bg-warning" type="submit" name="customer" class="btn btn-sm btn-light">
  Login
</button></form>
      </div>
    </div>
        <div class="spContainer mx-auto">
      <div class="card px-4 py-5 border-0 shadow">
        <div class="d-inline text-left mb-3">
          <h3 class="font-weight-bold">Admin Login</h3>
        </div>
        <div class="d-inline text-center mb-0">
        <form method="POST">
          <div class="form-group mx-auto">
            <input class="form-control inpSp" type="email" name="email" value="adminuser@gmail.com" required placeholder="Enter Email">
          </div>
        </div>
        <div class="d-inline text-center mb-3">
          <div class="form-group mx-auto">
            <input class="form-control inpSp" type="password" name="password" value="12345" required placeholder="Enter Password">
          </div>
        </div>
        <button class="btn btn-primary bg-warning" type="submit" name="admin" class="btn btn-sm btn-light">
  Login
</button>
        </form>
      </div>
    </div>
  </div>
</div>
		</body>
		</html>