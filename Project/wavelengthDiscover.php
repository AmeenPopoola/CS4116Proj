<!DOCTYPE html>
<head>
<link rel="stylesheet" href="wavelengthPages.css">
<link rel="stylesheet" href="style.css">
</head>

<body>
<header>    
    
</header>
<h1>Search for fellow artists</h1>

<form method='post'>
        <input type='text' name='search' placeholder='Search users'>
        <input type='submit' value='>>'>
        <br>
    </form>

</body>
</html>

<?php
    session_start();

    require "dbconnection.php";
    $conn = createConnection('sql300.epizy.com','epiz_33768646','DnPkUp7wbvcfJ','epiz_33768646_CS4116ProjGroup10');

    if($conn->connect_error){
        die('Connection failed : '.$conn->connect_error);
    }
    $output = '';

    if (isset($_POST["search"])) {
        $searchq = $_POST["search"];
        //only allows letters and numbers to be searched
        $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);

        $squery ="SELECT * FROM user WHERE firstname LIKE '$searchq%' OR lastname LIKE '$searchq%' OR email LIKE 'searchq%'";
        $result = $conn->query($squery);;

        if($result->num_rows == 0){
            $output = "User doesn't exist";
        }else{
            while($row = $result->fetch_assoc()){
                $fname = $row['firstname'];
                $lname = $row['lastname'];
                echo "<tr><td>" . $fname . " " . $lname . "<td><form method='post'><button type='submit' name='viewProfile' value='" . $row["userID"] . "'>View Profile</button><input type='hidden' name='sprofileID' value='" . $row['userID'] . "'></form></td>";
            }
        }
    }

    if (isset($_POST['viewProfile'])) {
        $viewProfileID = $_POST['sprofileID'];
        $_SESSION['sProfileID'] = $viewProfileID; 
        header("location: displayUserProfile.php");
    }
?>
