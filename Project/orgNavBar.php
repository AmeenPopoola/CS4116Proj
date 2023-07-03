<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="images/sound.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style><?php include 'style.css'; ?></style>
    <!-- jQuery from a CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap from a CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
   session_start();
        require_once 'dbconnection.php';
        $conn = createConnection('sql300.epizy.com','epiz_33768646','DnPkUp7wbvcfJ','epiz_33768646_CS4116ProjGroup10');
        
        if(empty($_SESSION['loggedin'])){ header("location: login.php");} //if user not logged in, send to login
        if(array_key_exists('buttonLogOut', $_POST)) {
            logUserOut();
        }
        function logUserOut() {
            //echo "This is Button1 that is selected";
            $_SESSION = array();
            session_destroy();
            header("location: login.php");
        } 
    ?>
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="wavelengthHome.php"><img class="img-fluid" id ="wavelength" src="images/sound.png"></img></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul id="navID" class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="orgProfilePage.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="orgVacancies.php">Vacancies</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="orgProfilePage.php">Info</a>
        </li>
      </ul>

      
      <form method="post">
        <input type="submit" name="buttonLogOut"
        class="btn btn-primary" value="Logout"
    </div>
  </div>
</nav>