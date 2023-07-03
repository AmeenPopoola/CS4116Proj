<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require "dbconnection.php";
$conn = createConnection('sql300.epizy.com','epiz_33768646','DnPkUp7wbvcfJ','epiz_33768646_CS4116ProjGroup10');

$email = $_POST['email'];
$password = $_POST['password'];


if($conn->connect_error){
    die('Connection failed : '.$conn->connect_error);
} else {
	 $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
		echo "\n".$sql;
		$result = $conn->query($sql);
		$row = $result->fetch_assoc(); 
		echo "\n".$row;
		if ($row) {
			if ($row['userType'] == 'Administrator') {
			 $_SESSION['loggedin'] = true;
			 $_SESSION['userID'] = $row['userID'];
             header("Location: adminHome.php");
        }else{
            echo "This user is not an admin";
            header("location: adminLogin.html");
        }
        } else {
            echo "Login credentials are incorrect";
        }
}
?>
