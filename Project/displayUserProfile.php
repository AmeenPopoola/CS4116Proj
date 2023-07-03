<!DOCTYPE html>
<head>
<title>Friends</title>
</head>
<body>
    <header>
    <?php
        include('navBar.php');
       // require('profile.php');
        ?>
   </header> 
</html>

<?php
    session_start();

        require_once 'dbconnection.php';
        $conn = createConnection('sql300.epizy.com','epiz_33768646','DnPkUp7wbvcfJ','epiz_33768646_CS4116ProjGroup10');

                $sViewUser = $_SESSION['sProfileID'];

                $sql = "SELECT * FROM profile WHERE userID = '$sViewUser'";
                $sql2 = "SELECT * FROM user WHERE userID = '$sViewUser'";

                $results = mysqli_query($conn,$sql);
                $results2 = mysqli_query($conn, $sql2);

                if($results2){
                    if(mysqli_num_rows($results2)){
                        while($row2 = mysqli_fetch_array($results2)){

                            ?>
                            <?php echo $row2['firstname'] . " " . $row2['lastname'] . "<br>";?>
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
                            <?php echo "Org Name: " . $row['orgName'] . "<br>";?>
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