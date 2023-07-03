<?php
session_start();
$currUser = $_SESSION['userID'];

require "dbconnection.php";
$conn = createConnection('sql300.epizy.com','epiz_33768646','DnPkUp7wbvcfJ','epiz_33768646_CS4116ProjGroup10');

/*$tempUserID = $fname;
                $sql1 = "SELECT userID FROM user WHERE firstname = '$fname'";
                $results1 = mysqli_query($conn,$sql1);
                $row1 = mysqli_fetch_array($results1);
                $userID = $row1['userID'];
  */              

$orgName = $_POST['name'];
$age = $_POST['age'];
$role =$_POST['role'];
$description = $_POST['description'];
$tempgenre = $_POST['genre'];

$genre = implode(',' ,$tempgenre);

if($age < 0){
    die ("This value is not a valid input");
} else {
	$sql = "INSERT INTO profile(userID,age,orgName,role,genre,description)
    VALUES('$currUser','$age','$orgName','$role','$genre','$description')";

    $stmt = mysqli_stmt_init($conn);

if(! mysqli_stmt_prepare($stmt,$sql)){
           die(mysqli_error($conn));
       }
       
mysqli_stmt_bind_param($stmt,"iissss",$currUser,$age,$orgName,$role,$genre,$description);
if(mysqli_stmt_execute($stmt)){

echo "Profile has been setup";
header("Location: orgProfilePage.php");
}
}

print_r($_POST);

?>
