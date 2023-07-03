<?php 

  //adding in more varibales for error handling 

    require_once 'dbconnection.php';
    $conn = createConnection('sql300.epizy.com','epiz_33768646','DnPkUp7wbvcfJ','epiz_33768646_CS4116ProjGroup10');

  $message = "";

  if(isset($_POST['saveProfile'])) {


      //Declaring Variables
    $userID;
    $firstname;
    $age;
    $orgName;
    $gender;
    $role;
    $band_type;
    $genre;
    $photo;
    $manager;
    $label;
    $description;
    $instruments;
      
        $userID = $_POST['userID'];
        $firstname = $_POST['firstname'];
        $email = $_POST['email'];
        $lastname = $_POST['lastname'];
        $bio = $_POST['bio'];

        $sql = "UPDATE profile SET firstname='$firstname', age='$age', orgName='$orgName',gender='$gender', role='$role', 
        band_type='$band_type', genre='$genre', manager='$manager', label='$label', description='$description', instruments='$instruments' WHERE userID ='$userID'";
          if (mysqli_query($conn, $sql)) {
             $message = "Updated Details Uploaded To Database";
                
          } else {
             $message = "Failed to Upload Details to Database";           
          }
  }



?>