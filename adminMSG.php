<?php
include './maindocs/pdoConnection.php';
session_start();
// print_r($_SESSION);

$users = $pdo->prepare("SELECT id, name, accountType FROM ahmadl1_bankingproject.useraccounts");
$users->execute();
$users_query = $users->fetchAll(PDO::FETCH_ASSOC);

// REMEMBER THE RECPIENT IS THE ADMIN ID=2
function getMessages(){
    include './maindocs/pdoConnection.php';
    
    $messages = $pdo->prepare("SELECT text_sent, AsenderID, ArecipientID, timestamp
                        FROM ahmadl1_bankingproject.adminmsg 
                        WHERE AsenderID=2 AND ArecipientID=? 
                        UNION
                        (SELECT text_sent, UsenderID, UrecipientID,timestamp
                        FROM ahmadl1_bankingproject.usersmsg 
                        WHERE UsenderID=? AND UrecipientID=2) ORDER BY timestamp ASC;");


    $messages->execute([$_GET['id'], $_GET['id']]);
    // $messages->execute();

    $messages_query = $messages->fetchAll(PDO::FETCH_ASSOC);

    return $messages_query;
}

// print_r(getMessages());

if (isset($_POST['send'])){
    $message = $_POST['text'];
    $rec = $_POST['rec'];
    $user = $_POST['user'];
    
    
    $query = $pdo->prepare("INSERT INTO ahmadl1_bankingproject.adminmsg(text_sent, AsenderID, ArecipientID) VALUES(:mess, :id, :recipient)");
    $query->execute([
            'mess'=> $message,
            'id'=> $_SESSION['adminId'],
            'recipient'=> $rec,
        ]);
   

    header("location:adminMSG.php?id=$rec&user=$user");


}


?>

<head>
  <title>Admin Dashboard</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

 
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/navbar.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />


</head>


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
</svg><span>Search Accounts</span></a>
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


<!-- LOGOUT BAR STARTS HERE -->
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
          <form class="form-inline my-2 my-lg-0">
                <a href="./logout.php" data-toggle="tooltip" class="btn btn-danger" ><i ></i>Logout</a>
          </form>

         

        </ul>

    </nav>

    <div class="container-fluid">




    <div class="container">
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card chat-app">
                <div id="plist" class="people-list">
                    <!-- <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search...">
                    </div> -->
                    <ul class="list-unstyled chat-list mt-2 mb-0">
                        <!-- HEREEEE -->
    <?php foreach ($users_query as $userAccounts)
    {?>

        
    <!-- SENDS USER AND ID -->
            <a href="./adminMSG.php?id=<?php echo $userAccounts['id'];?>&user=<?php echo $userAccounts['name'];?>" style="text-decoration: none; color: #444;" href="google.com">
                        <li class="clearfix">
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar">
                            <div class="about">
                            <div class="name"><?php echo $userAccounts['name'];?></div>

                                <!-- <div class="status"> <i class="fa fa-circle offline"></i> left 7 mins ago </div>                                             -->
                            </div>
                        </li></a>
    <?php }?>
                
                    </ul>
                </div>

                <div class="chat">
    <?php if(isset($_GET['user'])){?>
                    <div class="chat-header clearfix">
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                                </a>
                                <div class="chat-about">
                    
                                    <!-- DINAMICALLY CHANGES USER CONVERSATIONS -->

                                    <h6 class="m-b-0"><?php echo $_GET['user']?></h6>
                
                                    <!-- <small>Last seen: 2 hours ago</small> -->
                                </div>
                            </div>
                            <!-- <div class="col-lg-6 hidden-sm text-right">
                                <a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="fa fa-camera"></i></a>
                                <a href="javascript:void(0);" class="btn btn-outline-primary"><i class="fa fa-image"></i></a>
                                <a href="javascript:void(0);" class="btn btn-outline-info"><i class="fa fa-cogs"></i></a>
                                <a href="javascript:void(0);" class="btn btn-outline-warning"><i class="fa fa-question"></i></a>
                            </div> -->
                        </div>
                    </div>

                    <div class="chat-history">
                        <ul class="m-b-0">

                <?php foreach (getMessages() as $mesage){?>
                        
                        <?php if (strcmp($mesage['AsenderID'], $_SESSION['adminId']) == 0) {?> 
                            <li class="clearfix">
                                <div class="message-data text-right">
                                    <span class="message-data-time"><?php echo $mesage['timestamp'];?></span>
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                                </div>
                                <div class="message other-message float-right"><?php echo $mesage['text_sent'];?></div>
                            </li>
                        <?php }else{?>

                            <li class="clearfix">
                                <div class="message-data">
                                    <span class="message-data-time"><?php echo $mesage['timestamp'];?></span>
                                </div>
                                <div class="message my-message"><?php echo $mesage['text_sent'];?></div>                                    
                            </li>     
                        <?php }?>
                <?php }?>
                    
                        </ul>
                    </div>
                    <form action="./adminMSG.php" method="POST">
                        <div class="chat-message clearfix">
                            <div class="input-group mb-0">
                                <div class="input-group-prepend">
                                    <!-- <span class="input-group-text"><i class="fa fa-send"></i></span> -->
                                    <input class="input-group-text" type="submit" name="send" value="Send">
                                </div>
                                
                                <input type="hidden" name="rec" value="<?php echo $_GET['id'];?>">                              
                                <input type="hidden" name="user" value="<?php echo $_GET['user'];?>">
                                <input type="text" class="form-control" name="text" placeholder="Enter text here...">   
                            </div>
                        </div>

                    </form>
                    
    <?php }?> 
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
</div>

<!-- COPY THIS PART FOR LOGOUT BAR -->




<style type="text/css">
   
    .card {
        background: #fff;
        transition: .5s;
        border: 0;
        margin-bottom: 30px;
        border-radius: .55rem;
        position: relative;
        width: 100%;
        box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%);
        
    }
    .chat-app .people-list {
        width: 280px;
        position: absolute;
        left: 0;
        top: 0;
        padding: 20px;
        z-index: 7;
        
    }

    .chat-app .chat {
        margin-left: 280px;
        border-left: 1px solid #eaeaea;
        
    }

    .people-list {
        -moz-transition: .5s;
        -o-transition: .5s;
        -webkit-transition: .5s;
        transition: .5s;
    }

    .people-list .chat-list li {
        padding: 10px 15px;
        list-style: none;
        border-radius: 3px;
    }

    .people-list .chat-list li:hover {
        background: #efefef;
        cursor: pointer;
    }

    .people-list .chat-list li.active {
        background: #efefef;
    }

    .people-list .chat-list li .name {
        font-size: 15px;
    }

    .people-list .chat-list img {
        width: 45px;
        border-radius: 50%;
    }

    .people-list img {
        float: left;
        border-radius: 50%;
    }

    .people-list .about {
        float: left;
        padding-left: 8px;
    }

    .people-list .status {
        color: #999;
        font-size: 13px;
    }

    .chat .chat-header {
        padding: 15px 20px;
        border-bottom: 2px solid #f4f7f6;
    }

    .chat .chat-header img {
        float: left;
        border-radius: 40px;
        width: 40px;
    }

    .chat .chat-header .chat-about {
        float: left;
        padding-left: 10px;
    }

    .chat .chat-history {
        padding: 20px;
        border-bottom: 2px solid #fff;
        overflow-y: scroll;
        height: 500px;
        display: flex;
        flex-direction: column-reverse;

    }

    .chat .chat-history ul {
        padding: 0;
    }

    .chat .chat-history ul li {
        list-style: none;
        margin-bottom: 30px;
    }

    .chat .chat-history ul li:last-child {
        margin-bottom: 0px;
    }

    .chat .chat-history .message-data {
        margin-bottom: 15px;
    }

    .chat .chat-history .message-data img {
        border-radius: 40px;
        width: 40px;
    }

    .chat .chat-history .message-data-time {
        color: #434651;
        padding-left: 6px;
    }

    .chat .chat-history .message {
        color: #444;
        padding: 18px 20px;
        line-height: 26px;
        font-size: 16px;
        border-radius: 7px;
        display: inline-block;
        position: relative;
    }

    .chat .chat-history .message:after {
        bottom: 100%;
        left: 7%;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
        border-bottom-color: #fff;
        border-width: 10px;
        margin-left: -10px;
    }

    .chat .chat-history .my-message {
        background: #efefef;
    }

    .chat .chat-history .my-message:after {
        bottom: 100%;
        left: 30px;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
        border-bottom-color: #efefef;
        border-width: 10px;
        margin-left: -10px;
    }

    .chat .chat-history .other-message {
        background: #e8f1f3;
        text-align: right;
    }

    .chat .chat-history .other-message:after {
        border-bottom-color: #e8f1f3;
        left: 93%;
    }

    .chat .chat-message {
        padding: 20px;
    }

    .online,
    .offline,
    .me {
        margin-right: 2px;
        font-size: 8px;
        vertical-align: middle;
    }

    .online {
        color: #86c541;
    }

    .offline {
        color: #e47297;
    }

    .me {
        color: #1d8ecd;
    }

    .float-right {
        float: right;
    }

    .clearfix:after {
        visibility: hidden;
        display: block;
        font-size: 0;
        content: " ";
        clear: both;
        height: 0;
    }

    @media only screen and (max-width: 767px) {
        .chat-app .people-list {
            height: 465px;
            width: 100%;
            overflow-x: auto;
            background: #fff;
            left: -400px;
            display: none;
        }
        .chat-app .people-list.open {
            left: 0;
        }
        .chat-app .chat {
            margin: 0;
        }
        .chat-app .chat .chat-header {
            border-radius: 0.55rem 0.55rem 0 0;
        }
        .chat-app .chat-history {
            height: 300px;
            overflow-x: auto;
        }
    }

    @media only screen and (min-width: 768px) and (max-width: 992px) {
        .chat-app .chat-list {
            height: 650px;
            overflow-x: auto;
        }
        .chat-app .chat-history {
            height: 600px;
            overflow-x: auto;
        }
    }

    @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {
        .chat-app .chat-list {
            height: 480px;
            overflow-x: auto;
        }
        .chat-app .chat-history {
            height: calc(100vh - 350px);
            overflow-x: auto;
        }
    }
</style>

<script type="text/javascript">

</script>
</body>