<?php
session_start();
if(!isset($_SESSION['userId'])){ header('location:index.php');}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Banking</title>
  <?php require 'assets/autoloader.php'; ?>
  <?php require 'assets/db.php'; ?>
  <?php require 'assets/function.php'; ?>
  
</head>
<body style="background:#96D678;background-size: 100%">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
 <a class="navbar-brand" href="#">
    <img src="data:image/png;base64,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" width="30" height="30" class="d-inline-block align-top" alt="">
   <h5>MCB Bank</h5>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">  <a class="nav-link" href="accounts.php">Accounts</a></li>
      <li class="nav-item ">  <a class="nav-link" href="statements.php">Account Statements</a></li>
      <li class="nav-item ">  <a class="nav-link" href="transfer.php">Funds Transfer</a></li>
      <li class="nav-item ">  <a class="nav-link" href="customertable.html">View all Customers</a></li>
     


    </ul>
    <?php include 'sideButton.php'; ?>
    
  </div>
</nav><br><br><br>
<div class="row w-100" >
  <div class="col" style="padding: 22px;padding-top: 0">
    <div class="jumbotron shadowBlack" style="padding: 25px;min-height: 241px;max-height: 241px">
  <h4 class="display-5">Welecome to SG Bank</h4>
  <p  class="lead alert alert-warning"><b>Latest Notification:</b>

  <?php 
      $array = $con->query("select * from notice where userId = '$_SESSION[userId]' order by date desc");
      if ($array->num_rows > 0)
      {
        $row = $array->fetch_assoc();
        // {
          echo $row['notice'];
        // }
      }
      else
        echo "<div class='alert alert-info'>Notice box empty</div>";
     ?></p>
  
</div>
        <div id="carouselExampleIndicators" class="carousel slide my-2 rounded-1 shadowBlack" data-ride="carousel" >
          <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="https://cdn.pixabay.com/photo/2018/12/21/09/58/india-3887561__340.jpg" alt="First slide" style="max-height: 250px">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="https://cdn.pixabay.com/photo/2019/08/09/18/08/rupee-4395553__340.jpg" alt="Second slide" style="max-height: 250px">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="https://cdn.pixabay.com/photo/2016/01/19/15/48/luggage-1149289__340.jpg" alt="Third slide" style="max-height: 250px">
          </div>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
  </div>
<div class="col">
    <div class="row" style="padding: 22px;padding-top: 0">
      <div class="col">
        <div class="card shadowBlack ">
          <img class="card-img-top" src="images/acount.jpg" style="max-height: 155px;min-height: 155px" alt="Card image cap">
          <div class="card-body">
            <a href="accounts.php" class="btn btn-outline-success btn-block">Account Summary</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card shadowBlack ">
          <img class="card-img-top" src="images/transfer.jpg" alt="Card image cap" style="max-height: 155px;min-height: 155px">
        <div class="card-body">
          <a href="transfer.php" class="btn btn-outline-success btn-block">Transfer Money</a>
         </div>
        </div>
      </div>
    </div>
    

    </div>
  </div>
</div>
</body>
</html>