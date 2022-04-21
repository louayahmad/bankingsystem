<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Banking</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

   
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

 
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
  <?php
   include 'maindocs/headerLoad.php';
   include 'maindocs/connectionToDatabase.php';
   include 'maindocs/queries.php';
   
   ?>
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
                        <li class="nav-item"><a class="nav-link text-light" href="login.php">Login</a></li>
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
   <div class="container-fluid align-center">
                    <?php
                    if (isset($_POST['creationOfAccount']))
                    {
                      $password = '$_POST[password]';
                      $hashed = hash('sha512', $password);
                      $ssn = '$_POST[ssn]';
                      $hashedssn = hash('sha512', $ssn);
                      if (!$connectionDatabase->query("INSERT INTO newaccountrequests (name,ssn,accountType, address,email,password,balance,number) values ('$_POST[name]','$hashedssn','$_POST[accountType]','$_POST[address]','$_POST[email]','$hashed','$_POST[balance]','$_POST[number]')")) {
                        echo "<div claass='alert alert-success'>Cannot add user to the database:".$connectionDatabase->error."</div>";
                      }
                      
                      else
                        echo "<div class='alert alert-info text-center'>New account request has been sent to the bank staff. You will be notified upon approval.</div>";
                    }
                     ?>
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                      <table class="table">
                                        <tbody>
                                          <tr>
                                            <form method="POST">
                                            <th>Name</th>
                                            <td><input type="text" name="name" class="form-control input-sm" required></td>
                                            <th>SSN</th>
                                            <td><input type="number" name="ssn" class="form-control input-sm" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="9" required></td>
                                          </tr>
                                          <tr>
                                            <th>Account Type</th>
                                            <td>
                                              <select class="form-control input-sm" name="accountType" required>
                                                <option value="Checking" selected>Checking</option>
                                                <option value="Saving" selected>Saving</option>
                                              </select>
                                            </td>
                                          </tr>
                                          <th>Email</th>
                                          <td><input type="email" name="email" class="form-control input-sm" required></td>
                                            
                                            <th>Password</th>
                                            <td><input type="password" name="password" class="form-control input-sm" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" required></td>


                                          <tr>
                                            <th>Address</th>
                                            <td><input type="text" name="address" class="form-control input-sm" required></td>
                                            <th>Contact Number</th>
                                            <td><input type="number" name="number"  class="form-control input-sm" required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10"></td>

                                          </tr>
                                          <tr>
                                            <th>Deposit</th>
                                            <td><input type="number" name="balance" min="500" class="form-control input-sm" required></td>
                                            

                                          </tr>
                                          <tr>
                                            <td colspan="4">
                                              <button type="submit" name="creationOfAccount" class="btn btn-primary btn-sm bg-warning">Sign Up</button>
                                              <button type="Reset" class="btn btn-secondary btn-sm bg">Reset</button></form>
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>



                                  </div>



                                </div>
                            </div>
                      

                    </div>
  </div>
</div>
    </body>
</html>