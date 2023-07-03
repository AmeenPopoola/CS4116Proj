<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="images/sound.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style><?php include 'style.css'; ?></style>
</head>

<style>
    img{
        max-width: 100%;
        max-height: 100%;
        height:25px;
        width: 25px;
        color: #FFFFFF;
    }

</style>


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
                <form action="adminAction.php" method="post">
                <button name="banUser">Ban User</button>
                <button name="unbanUser">Unban User</button>
                <button name="removeUser">Remove User</button>
                <button name="editUser">Edit User Profile</button>
                <br>
                <input type = "text" name = "reason" placeholder ="Reason For Action" required>
                </input>
                </form>

                    </div>
                       
</body>
</html>