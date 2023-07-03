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
<body>
    <header>
    <?php
        include('navBar.php');
        ?>
   </header> 
   <div class="job-container">
  <h1>Selected Jobs</h1>
  <form method="POST" action="">
  <?php
if (isset($_POST['vacancies'])) {
    $_SESSION['selected_vacancies'] = $_POST['vacancies'];
}
// Remove selected vacancies
if (isset($_POST['remove'])) {
if (isset($_SESSION['selected_vacancies'])) {
$selectedVacancies = $_SESSION['selected_vacancies'];
$removedVacancies = array();
foreach ($selectedVacancies as $vacancyId) {
if (isset($_POST['vacancies'][$vacancyId])) {
// The checkbox for this vacancy was checked, so remove it
$removedVacancies[] = $vacancyId;
}
}
$_SESSION['selected_vacancies'] = array_diff($selectedVacancies, $removedVacancies);
}
}

?>

<!-- Output the selected vacancies -->
<?php
if (isset($_SESSION['selected_vacancies'])) {
    $selectedVacancies = $_SESSION['selected_vacancies'];
    foreach ($selectedVacancies as $vacancyId) {
        $sql = "SELECT * FROM vacancies WHERE id = $vacancyId";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo '<input type="checkbox" name="vacancies['.$vacancyId.']">';
            echo "<p>Position: " . $row['position'] . "</p>";
            echo "<p>Company: " . $row['company'] . "</p>";
            echo "<p>Location: " . $row['location'] . "</p>";
            echo "<p>Job Description: " . $row['job_description'] . "</p>";
            
        }
    }
} else {
    echo "No jobs selected.";
}
echo '<button type="submit" name="remove">Remove selected jobs</button><br><br>';
?>
</form>
</div>
</html>