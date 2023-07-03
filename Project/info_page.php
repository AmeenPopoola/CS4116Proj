<?php
session_start();
$currUser = $_SESSION['userID'];
//$name = $_POST['name'];

require "dbconnection.php";
$conn = createConnection('sql300.epizy.com','epiz_33768646','DnPkUp7wbvcfJ','epiz_33768646_CS4116ProjGroup10');

/*$tempUserID = $name;
                $sql1 = "SELECT userID FROM user WHERE firstname = '$tempUserID'";
                $results1 = mysqli_query($conn,$sql1);
                $row1 = mysqli_fetch_array($results1);
                $userID = $row1['userID'];
                */

$age = $_POST['age'];
$role =$_POST['role'];
$gender = $_POST['gender'];
$band = $_POST['band'];
$tempgenre = $_POST['genre'];
//$photo= $_POST['photo'];
$manager = $_POST['manager'];
$label = $_POST['label'];
$description = $_POST['description'];
$tempinstruments = $_POST['instruments'];

$instruments = implode(',' ,$tempinstruments);
$genre = implode(',' ,$tempgenre);
//print_r($instruments);

if($age < 0){
    die ("This value is not a valid input");
} else {
$sql = "INSERT INTO profile(userID,age,gender,role,band_type,genre,manager,label,description,instruments)
VALUES('$currUser', '$age','$gender', '$role', '$band', '$genre', '$manager', '$label', '$description', '$instruments')";

$stmt = mysqli_stmt_init($conn);

if(! mysqli_stmt_prepare($stmt,$sql)){
           die(mysqli_error($conn));
       }
       
mysqli_stmt_bind_param($stmt,"iissssssss",$currUser,$age,$gender,$role,$band,$genre,$manager,$label,$description,$instruments);
mysqli_stmt_execute($stmt);

echo "Profile has been setup";
header("Location: profile.php");
}


print_r($_POST);

?>

