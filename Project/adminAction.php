


<?php
session_start();

require "dbconnection.php";
$conn = createConnection('sql300.epizy.com','epiz_33768646','DnPkUp7wbvcfJ','epiz_33768646_CS4116ProjGroup10');

 $sViewUser = $_SESSION['sProfileID'];
 $currUser = $_SESSION['userID'];
 $reason = $_POST['reason'];
 $date = date('Y-m-d H:i:s');

 if(isset($_POST['removeUser'])){
     $sqldel = "DELETE FROM user WHERE userID = '$sViewUser'";
     $sqldel1 ="DELETE FROM profile WHERE userID = '$sViewUser'";
     $sqldel2 ="DELETE FROM connections WHERE userid1 = '$sViewUser' OR userid2 = '$sViewUser'";
     $conn->query($sqldel);
     $conn->query($sqldel1);
     $conn->query($sqldel2);
     header("location: adminHome.php");        
 }

 if(isset($_POST['banUser'])){
     $checkSql = "SELECT * FROM banned WHERE userID = '$sViewUser'";
     $result_check = $conn->query($checkSql);
    if($conn->connect_error){
        die('Connection failed : '.$conn->connect_error);
     } else  if($result_check ->num_rows > 0){
         echo "User has already been banned";
     } else {
     $sqlban = "INSERT INTO banned(userID,bannedBy,date,reason)
     VALUES('$sViewUser','$currUser','$date','$reason')";

     $stmt = mysqli_stmt_init($conn);

     if(! mysqli_stmt_prepare($stmt,$sqlban)){
           die(mysqli_error($conn));
       }

       mysqli_stmt_bind_param($stmt,"ssss",$sViewUser,$currUser,$date,$reason);
mysqli_stmt_execute($stmt);
}
header("Location: adminHome.php");
}

if(isset($_POST['unbanUser'])){
    $checkSql2 = "SELECT * FROM banned WHERE userID = '$sViewUser'";
    $result_check = $conn->query($checkSql2);
     if($conn->connect_error){
        die('Connection failed : '.$conn->connect_error);
     } else  if($result_check->num_rows == 0){
         echo "User is not banned";
} else {
    $sqlunban = "DELETE FROM banned WHERE userID = '$sViewUser'";
    $conn->query($sqlunban);
    header("location: adminHome.php");   
}
}

if(isset($_POST['editUser'])){
    header("Location: adminEdit.php");
}

?>