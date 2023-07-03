<?php
session_start();

require "dbconnection.php";
$conn = createConnection('sql300.epizy.com','epiz_33768646','DnPkUp7wbvcfJ','epiz_33768646_CS4116ProjGroup10');

$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPass = $_POST['confirmPass'];

/*if(empty($firstname)){
	die("First Name is required");
} else if(empty($lastname)){
	die("Last Name is required");
} else if(empty($email)){
	die("Email is required");
} else */

if(preg_match("/^[A-Za-z]+$/",$firstname) == 0){
    die("Please use characters only");
}else if(preg_match("/^[A-Za-z]+$/",$lastname) == 0){
    die("Please use characters only");
}else if(strlen($password) < 8){
	die("Password must be 8 characters");
} else if($confirmPass !== $password){
	die("Passwords must match");
} else {
    $sql = "INSERT INTO user(firstname,lastname,email,password)
       VALUES(?,?,?,?)";

       $stmt = mysqli_stmt_init($conn);

       if(! mysqli_stmt_prepare($stmt,$sql)){
           die(mysqli_error($conn));
       }

       mysqli_stmt_bind_param($stmt,"ssss",$firstname,$lastname,$email,$password);
      if(mysqli_stmt_execute($stmt)){
           echo "Account has been created";
      $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
      $result = $conn->query($sql);
	  $row = $result->fetch_assoc(); 
      if ($row) {
          $_SESSION['loggedin'] = true;
          $_SESSION['userID'] = $row['userID'];
      }
       header("Location: userType.php");
      }else if ($mysqli_errno == 1062){
        die("email already taken");
      }
}


?>