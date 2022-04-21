<?php session_start(); ?>
<?php  error_reporting( error_reporting() & ~E_NOTICE ) ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Admin Dashboard</title>

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
    <link rel="stylesheet" href="css/navbar.css">

</head>

<body id="page-top">
  <?php
   include 'maindocs/headerLoad.php';
   include 'maindocs/connectionToDatabase.php';
   include 'maindocs/queries.php';
   ?>


    <div id="wrapper">

       
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="adminhomepage.php">
              <div class="sidebar-brand-icon ">

                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-bank" viewBox="0 0 16 16">
<path d="M8 .95 14.61 4h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.379l.5 2A.5.5 0 0 1 15.5 17H.5a.5.5 0 0 1-.485-.621l.5-2A.5.5 0 0 1 1 14V7H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 4h.89L8 .95zM3.776 4h8.447L8 2.05 3.776 4zM2 7v7h1V7H2zm2 0v7h2.5V7H4zm3.5 0v7h1V7h-1zm2 0v7H12V7H9.5zM13 7v7h1V7h-1zm2-1V5H1v1h14zm-.39 9H1.39l-.25 1h13.72l-.25-1z"/>
</svg>
              </div>
                <div class="sidebar-brand-text mx-3">Reboot</div>
            </a>

          
            <hr class="sidebar-divider my-0">

          
            <li class="nav-item active">
                <a class="nav-link" href="adminhomepage.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
<path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
</svg>
                    <span>Home</span></a>
            </li>

    
            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Interface
            </div>

       
            <hr class="sidebar-divider">



            
            <li class="nav-item">
                <a class="nav-link" href="usersNewAccount.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
</svg>
                    <span>Add New Account</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="search.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg>
                    <span>Search Accounts</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="depositmoneymanager.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                    <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
                  </svg>
                    <span>Deposit/Withdrawl/Transfer</span></a>
            </li>
              <li class="nav-item">
                <a class="nav-link" href="accountcreationrequests.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                    <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
                  </svg>
                    <span>Account Creation Requests</span></a>
            </li>

            <li class="nav-item">
        <a class="nav-link" href="./adminMSG.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-forward-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zm10.761.135a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 0 1-.708-.708L14.293 4H9.5a.5.5 0 0 1 0-1h4.793l-1.647-1.646a.5.5 0 0 1 0-.708z"/>
        </svg>
            <span>Help Requests</span></a>
    </li> 


    
            <hr class="sidebar-divider d-none d-md-block">

            
            <div class="text-center d-none d-md-inline">
            </div>


        </ul>
     
       
        <div id="content-wrapper" class="d-flex flex-column">

        
            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                 
                    <ul class="navbar-nav ml-auto">
                     
                      <li class="nav-item dropdown no-arrow">

                          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                              <img class="img-profile rounded-circle"
                                  src="img/undraw_profile.svg">
                          </a>

                      </li>
                      <?php include 'loggingOut2.php'; ?>

                    </ul>

                </nav>
               
                <div class="container-fluid">

                    
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Admin Dashboard</h1>

                    </div>


                    <div class="row">

                        
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                              
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Search Accounts By Account Number And Name</h6>

                                </div>
                               
                                <div class="card-body">
                                  <form class="form-inline mr-auto" method="post">
                                  <label></label>
                                  <input class="form-control mr-sm-2" type="text" name="search">

                                  <button class="btn btn-outline-success btn-rounded btn-sm my-0" type="submit" name="submit" value="search">Search</button>

                                  </form>
                                  <?php

                                  $connectionDatabase = new PDO("mysql:host=localhost;dbname=ahmadl1_bankingproject",'ahmadl1_louayahmad20','Redhawks2023@');

                                  if (isset($_POST["submit"])) {
                                  	$name = $_POST["search"];
                                    $accountNum = $_POST["search"];
                                  	$sth = $connectionDatabase->prepare("SELECT * FROM `useraccounts` WHERE name LIKE '%$name%' OR accountNo LIKE '%$accountNum%'");

                                  	$sth->setFetchMode(PDO:: FETCH_OBJ);
                                  	$sth -> execute();

                                  	if($row = $sth->fetch())
                                  	{
                                  		?>
                                  		<br><br><br>
                                  		<table class="table table-bordered table-sm">
                                  			<tr>
                                  				<th>Name</th>
                                  				<th>Account Number</th>
                                          <th>Balance</th>
                                          <th>Account Type</th>
                                          <th>Contact Info.</th>
                                          <th>Actions</th>

                                  			</tr>
                                  			<tr>
                                  				<td><?php echo $row->name; ?></td>
                                  				<td><?php echo $row->accountNo;?></td>
                                          <td>$<?php echo $row->balance; ?></td>
                                          <td><?php echo $row->accountType;?></td>
                                          <td><?php echo $row->number; ?></td>
                                          <td>
                                            <a href="updateaccount.php?id=<?php echo $row->id ?>" class='btn btn-primary btn-sm' data-toggle='tooltip' title="Update this account">Update Account</a>
                                          </td>


                                  			</tr>


                                  		</table>
                                  <?php
                                  	}


                                  		else{
                                  			echo "Account does not exist";
                                  		}


                                  }

                                  ?>


                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="row">


                        <div class="col-lg-6 mb-4">

                        </div>
                    </div>

                </div>
               

            </div>
          



        </div>
       

    </div>
  
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

  
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>


    <script src="js/sb-admin-2.min.js"></script>


    <script src="vendor/chart.js/Chart.min.js"></script>

  
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>


</html>
