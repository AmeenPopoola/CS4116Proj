<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="images/sound.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<header>
    
        
   </header>  


 <?php
// Check if the form has been submitted
if (isset($_POST['vacancies'])) {
    // Create an array to store the selected vacancies
    //$selectedVacancies = array();

    // Loop through the selected vacancies and retrieve their information
   /* foreach ($_POST['vacancies'] as $vacancyId) {
        $sql = "SELECT * FROM vacancies WHERE id = $vacancyId";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $selectedVacancies[] = $row;
        }
    }*/

    // Redirect to jobs.php and pass the selected vacancies as a GET parameter
    header("Location: newVacancy.php");
    exit();
}
?>

<form action="" method="post">
  <div class="job-container">
    <?php
    session_start();

    $currUser = $_SESSION['userID'];

     $sql0 = "SELECT * FROM profile WHERE userID = '$currUser'";
     $result0 = mysqli_query($conn,$sql0);
     $row0 = mysqli_fetch_array($result0);
     $orgName = $row0['orgName'];

    $sql = "SELECT * FROM vacancies WHERE company_name = '$orgName' ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="card">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . 'Looking for Artists who perform in ' . $row['genre'] . ' for ' . $row['company_name'] . '</h5>';
        echo '<h6 class="card-subtitle mb-2 text-muted">' . 'in ' . $row['location'] . '</h6>';
        echo '<p class="card-text">' . $row['job_description'] . '</p>';
        echo '<p class="card-text">' . ' Audition Date: ' . $row['audition_date'] . '</p>';
        echo '<div class="form-check">';
       // echo '<input type="checkbox" class="form-check-input" name="vacancies[]" value="' . $row['id'] . '">';
       // echo '<label class="form-check-label">Select</label>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
      }
    } else {
      echo '<p>No vacancies found.</p>';
    }
    ?>
  
<button type ="submit" name = "vacancies">Create New Vacancy</button>
  </div>
</form>