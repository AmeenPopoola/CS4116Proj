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

require "dbconnection.php";
$conn = createConnection('sql300.epizy.com','epiz_33768646','DnPkUp7wbvcfJ','epiz_33768646_CS4116ProjGroup10');

if($conn->connect_error){
    die('Connection failed : '.$conn->connect_error);
}


/*if (isset($_POST['viewProfile'])) {
    $_SESSION['viewProfileID'] = $_POST['sprofileID'];
    header("location : adminProfile.php");
}
if(empty($_SESSION['loggedin'])){ 
    header("location: adminLogin.html");
    }*/



    $role=$_POST['role'];

    $output = '';
if($role == 'artist'){
    if (isset($_POST["search"])) {
        $searchq = $_POST["search"];
        //only allows letters and numbers to be searched
        $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);

        $sqlquery = "SELECT * FROM user WHERE firstname LIKE '%$searchq%' OR lastname LIKE '%$searchq%'";
        $result = $conn->query($sqlquery);

        if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc()){
                $fname = $row['firstname'];
                $lname = $row['lastname'];
                echo "<tr><td>" . $fname . " " . $lname . "<td><form method='post'><button type='submit' name='viewProfile' value='" . $row["userID"] . "'>View Profile</button><input type='hidden' name='sprofileID' value='" . $row['userID'] . "'></form></td>";
               } 
            }else {
                   echo "User doesn't exist";
               }
       }
     } else if($role == 'label'){
         if (isset($_POST["search"])) {
        $searchq = $_POST["search"];
        //only allows letters and numbers to be searched
        $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
        $sqlquery2 = "SELECT * FROM profile WHERE orgName LIKE '%$searchq%'";
        $result2 = $conn->query($sqlquery2);
       if ($result2->num_rows > 0){
            while($row = $result2->fetch_assoc()){
                $orgName =$row['orgName'];
                echo '<div>' .$orgName. '</div>'. "<td><form method='post'><button type='submit' name='viewProfile' value='" . $row['userID'] . "'>View Profile</button><input type='hidden' name='sprofileID' value='" . $row['userID'] . "'></form></td>";
        }
        }else{
            echo "Label doesn't exist";
        }
     }
     }

     if (isset($_POST['viewProfile'])) {
   $viewProfileID = $_POST['sprofileID'];
   $_SESSION['sProfileID'] = $viewProfileID; 
  // print  $_SESSION['sProfileID'];
header("location: adminProfile.php");
}



     if(array_key_exists('buttonLogOut', $_POST)) {
            logUserOut();
        }
        function logUserOut() {
            //echo "This is Button1 that is selected";
            $_SESSION = array();
            session_destroy();
            header("location: adminLogin.html");
        } 
?>

<!DOCTYPE html>
<head>
    <meta name="viewport" content="width-device-width, intial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Admin Page</title>
</head>
<h1>Admin Home Page</h1>
 <form method="post">
                         <input type="submit" name="buttonLogOut"
                     class="btn btn-primary" value="Logout" />
         </form>
         <br>
<form action="adminHome.php" class="d-flex input-group w-auto" method='post'>
<select name="role" required>
            <option value=""></option>
		 	<option value="artist">Artist</option>
		 	<option value="label">Record Label</option>
		  </select>
    <input
    type="search"
    class="form-control rounded"
    name = "search"
    placeholder="Search"
    aria-label="Search"
    aria-describedby="search-addon"
    />
    <span class="input-group-text border-0" id="search-addon">
        <i class="fas fa-search"></i>
    </span>
     <input type='submit' value='Go'>
</form>

<?php print("$output"); ?>

</body>
</html>