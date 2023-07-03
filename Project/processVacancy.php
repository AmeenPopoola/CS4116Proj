<?php
session_start();

require "dbconnection.php";
$conn = createConnection('sql300.epizy.com','epiz_33768646','DnPkUp7wbvcfJ','epiz_33768646_CS4116ProjGroup10');


$currUser = $_SESSION['userID'];
$sql = "SELECT * FROM profile WHERE userID = '$currUser'";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
$company_name = $row['orgName'];

$date = date("Y/m/d");


$location = $_POST['location'];
$description = $_POST['description'];
$tempgenre = $_POST['genre'];
$tempinstruments= $_POST['instruments'];
$audition_date =  $_POST['audition_date'];

$instruments = implode(',' , $tempinstruments);
$genre = implode(',' , $tempgenre);


    if($conn->connect_error){
        die('Connection failed : '.$conn->connect_error);
    }/*else if($audition_date <= $date){
        echo "This is an invalid date";
        header("Refresh:0");
    } */else if(isset($_POST['newVacancy'])){
$sql0 = "INSERT INTO vacancies(instrument,genre,company_name,location,job_description,audition_date)
VALUES('$instruments','$genre','$company_name','$location','$description','$audition_date')";

$stmt = mysqli_stmt_init($conn);

if(! mysqli_stmt_prepare($stmt,$sql0)){
           die(mysqli_error($conn));
       }

mysqli_stmt_bind_param($stmt,"ssssss",$instruments,$genre,$company_name,$location,$description,$audition_date);
mysqli_stmt_execute($stmt);
}

print_r($_POST);

header("Location:orgVacancies.php");
?>
