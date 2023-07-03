<!DOCTYPE html>
<head>
<title>Profile</title>
</head>
<body>
    <header>
    <?php
        include('orgNavBar.php');
        ?>
   </header>  

                    <div class="wrapper">
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

                            <?php echo "The owner of this Record Label is: " . $row2['firstname'] . " " . $row2['lastname'] . "<br>";?>

                            <?php        
                        }
                    }
                }
                ?>

                <?php

                if($results){
                    if(mysqli_num_rows($results)>0){ //IF user has previously set up profile, shows profile info
                        while($row = mysqli_fetch_array($results)){

                            ?>

                            <?php echo "Org Name: " . $row['orgName'] . "<br>";?>

                            <?php

                                $year;

                                if($row['age'] >= 0){
                                    $year = 2023 - $row['age'];
                                }


                             echo "The record label was created in  " . $year . "<br>";?>
                            <?php echo "The genres that our artists perform in: " . $row['genre'] . "<br>";?>
                            <?php echo "A further description of the label: " . $row['description'] . "<br>";?>
                        
                        <?php
                        }
                    }
                }
                ?>

                <button onclick="location.href='editProfile.php'">Edit Profile</button>


                    </div>
                    </div>
                       
</body>
</html>