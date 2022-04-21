<?php
include './maindocs/pdoConnection.php';
session_start();
//print_r($_SESSION);



// REMEMBER THE RECPIENT IS THE ADMIN ID=2
function getMessages(){
    include './maindocs/pdoConnection.php';
    
    $messages = $pdo->prepare("SELECT text_sent, UsenderID, UrecipientID, timestamp
                        FROM ahmadl1_bankingproject.usersmsg 
                        WHERE UsenderID=? AND UrecipientID=2 
                        UNION
                        (SELECT text_sent, AsenderID, ArecipientID,timestamp
                        FROM ahmadl1_bankingproject.adminmsg 
                        WHERE AsenderID=2 AND ArecipientID=?) ORDER BY timestamp ASC;");


    $messages->execute([$_SESSION['userId'], $_SESSION['userId']]);
    // $messages->execute();

    $messages_query = $messages->fetchAll(PDO::FETCH_ASSOC);

    return $messages_query;
}

//print_r(getMessages());

if (isset($_POST['send'])){
    $message = $_POST['text'];

    
    
    $query = $pdo->prepare("INSERT INTO ahmadl1_bankingproject.usersmsg(text_sent, UsenderID, UrecipientID) VALUES(:mess, :id, :recipient)");
    $query->execute([
            'mess'=> $message,
            'id'=> $_SESSION['userId'],
            'recipient'=> 2,
        ]);
   

    header("location:usersMessage.php");


}


?>

<head>
  <title>Contact Us</title>

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

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
                <div class="sidebar-brand-icon ">

                  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-bank" viewBox="0 0 16 16">
<path d="M8 .95 14.61 4h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.379l.5 2A.5.5 0 0 1 15.5 17H.5a.5.5 0 0 1-.485-.621l.5-2A.5.5 0 0 1 1 14V7H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 4h.89L8 .95zM3.776 4h8.447L8 2.05 3.776 4zM2 7v7h1V7H2zm2 0v7h2.5V7H4zm3.5 0v7h1V7h-1zm2 0v7H12V7H9.5zM13 7v7h1V7h-1zm2-1V5H1v1h14zm-.39 9H1.39l-.25 1h13.72l-.25-1z"/>
</svg>
                </div>
                <div class="sidebar-brand-text mx-3">Reboot</div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item active">
                <a class="nav-link" href="home.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bank" viewBox="0 0 16 16">
                    <path d="M8 .95 14.61 4h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.379l.5 2A.5.5 0 0 1 15.5 17H.5a.5.5 0 0 1-.485-.621l.5-2A.5.5 0 0 1 1 14V7H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 4h.89L8 .95zM3.776 4h8.447L8 2.05 3.776 4zM2 7v7h1V7H2zm2 0v7h2.5V7H4zm3.5 0v7h1V7h-1zm2 0v7H12V7H9.5zM13 7v7h1V7h-1zm2-1V5H1v1h14zm-.39 9H1.39l-.25 1h13.72l-.25-1z"/>
                  </svg>                    <span>Home</span></a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Interface
            </div>

            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="makeATransfer.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet-fill" viewBox="0 0 16 16">
<path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v2h6a.5.5 0 0 1 .5.5c0 .253.08.644.306.958.207.288.557.542 1.194.542.637 0 .987-.254 1.194-.542.226-.314.306-.705.306-.958a.5.5 0 0 1 .5-.5h6v-2A1.5 1.5 0 0 0 14.5 2h-13z"/>
<path d="M16 6.5h-5.551a2.678 2.678 0 0 1-.443 1.042C9.613 8.088 8.963 8.5 8 8.5c-.963 0-1.613-.412-2.006-.958A2.679 2.679 0 0 1 5.551 6.5H0v6A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-6z"/>
</svg>
                    <span>Transfer </span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="printBankStatements.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down-fill" viewBox="0 0 16 16">
<path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0z"/>
</svg>
                    <span>Statements </span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="deposit.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
  <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
  <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
  <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
</svg>
                    <span>Deposit Check</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="onlinebilling.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-receipt" viewBox="0 0 16 16">
<path d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z"/>
<path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
</svg>
                    <span>Online Billing</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="usersMessage.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-forward-fill" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zm10.761.135a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 0 1-.708-.708L14.293 4H9.5a.5.5 0 0 1 0-1h4.793l-1.647-1.646a.5.5 0 0 1 0-.708z"/>
</svg>
                    <span>Contact Us</span></a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <div class="text-center d-none d-md-inline">
            </div>


        </ul>


<!-- LOGOUT BAR STARTS HERE -->
<div id="content-wrapper" class="d-flex flex-column">

        
<div id="content">
  <?php
   include 'maindocs/headerLoad.php';
   include 'maindocs/connectionToDatabase.php';
   include 'maindocs/queries.php';
   ?>
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

   
        <ul class="navbar-nav ml-auto">
         
          <li class="nav-item dropdown no-arrow">

              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $userData['name']; ?></span>
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
   
                
                    </ul>
                </div>

                <div class="chat">
    
                    <div class="chat-header clearfix">
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                                </a>
                                
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
                        
                        <?php if (strcmp($mesage['UsenderID'], $_SESSION['userId']) == 0) {?> 
                            <li class="clearfix">
                                <div class="message-data text-right">
                                    <span class="message-data-time"><?php echo $mesage['timestamp'];?></span>
                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
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
                    <form action="./usersMessage.php" method="POST">
                        <div class="chat-message clearfix">
                            <div class="input-group mb-0">
                                <div class="input-group-prepend">
                                    <!-- <span class="input-group-text"><i class="fa fa-send"></i></span> -->
                                    <input class="input-group-text" type="submit" name="send" value="Send">
                                </div>
                                
                                <!-- <input type="hidden" name="rec" value="<//?php echo $_GET['id'];?>">                               -->
                                <!-- <input type="hidden" name="user" value="<//?php echo $_GET['user'];?>">  -->
                                <input type="text" class="form-control" name="text" placeholder="Enter text here...">   
                            </div>
                        </div>

                    </form>
                    
    
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