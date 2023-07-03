<!DOCTYPE html>
<head>
<title>Profile</title>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="images/sound.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style><?php include 'style.css'; ?></style>
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
          <a class="nav-link active" aria-current="page" href="profile.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="editProfile.php">Edit Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="jobs.php">Jobs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="wavelengthFriends.php">Connections</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="wavelengthDiscover.php">Discover</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="vacancies.php">Vacancies</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="infoPage.php">Info</a>
        </li>
      </ul>

      
      <form method="post">
        <input type="submit" name="buttonLogOut"
        class="btn btn-primary" value="Logout"
    </div>
  </div>
</nav>
<div class="profile-container">
<?php
                $currUser = $_SESSION['userID'];

                $sql = "SELECT * FROM profile WHERE userID = '$currUser'";
                $sql2 = "SELECT * FROM user WHERE userID = '$currUser'";

                $results = mysqli_query($conn,$sql);
                $results2 = mysqli_query($conn, $sql2);

                if($results2){
                    if(mysqli_num_rows($results2)){
                        while($row2 = mysqli_fetch_array($results2)){

                            ?>
                            <?php echo $row2['firstname'] . " " . $row2['lastname'] . "<br>";?>

                            <?php        
                        }
                    }
                }
                ?>

                <?php

                if($results){
                    if(mysqli_num_rows($results)>0){ //IF user has previously set up profile, shows profile info
                        while($row = mysqli_fetch_array($results)){
                                 echo "Age: " . $row['age'] . "<br>";?>
                            <?php echo "Gender: " . $row['gender'] . "<br>";?>
                            <?php echo "Role: " . $row['role'] . "<br>";?>
                            <?php echo "Band Type: " . $row['band_type'] . "<br>";?>
                            <?php echo "Genre: " . $row['genre'] . "<br>";?>
                            <?php echo "Instruments: " . $row['instruments'] . "<br>";?>
                            <?php echo "Bio: " . $row['description'] . "<br>";?>
                        
                        <?php
                        }
                    }
                }
                ?>

                    </div>
                       
</body>
</html>