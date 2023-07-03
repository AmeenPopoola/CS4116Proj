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
    <?php
    session_start();
        require_once 'dbconnection.php';
        $conn = createConnection('sql300.epizy.com','epiz_33768646','DnPkUp7wbvcfJ','epiz_33768646_CS4116ProjGroup10');
        
        if(empty($_SESSION['loggedin'])){ header("location: login.php");} //if user not logged in, send to login
        if(array_key_exists('buttonLogOut', $_POST)) {
            logUserOut();
        }
        function logUserOut() {
            //echo "This is Button1 that is selected";
            $_SESSION = array();
            session_destroy();
            header("location: login.php");
        } 
    ?>
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="wavelengthHome.php"><img class="img-fluid" id ="wavelength" src="images/sound.png"></img></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul id="navID" class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="profile.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="jobs.php">Jobs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="wavelengthFriends.php">Connections</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="vacancies.php">Vacancies</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="infoPage.php">Info</a>
        </li>
      </ul>

      
      <form method="post">
        <input type="submit" name="buttonLogOut"
        class="btn btn-primary" value="Logout"
    </div>
  </div>
</nav>
<?php
$userID = $_SESSION['userID']; // assuming userID is stored in a session variable
		$sql = "SELECT * FROM profile WHERE userID = '$userID'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();

		// Update user's profile in database
		if (isset($_POST['submit'])) {
			$age = $_POST['age'];
			$gender = $_POST['gender'];
			$role = $_POST['role'];
			$band_type = $_POST['band_type'];
			$tempgenre = $_POST['genre'];
            $genre = implode(',' ,$tempgenre);
			$tempinstruments = $_POST['instruments'];
            $instruments = implode(',' ,$tempinstruments);
			$description = $_POST['description'];
			$sql = "UPDATE profile SET age='$age', orgName='$orgName', gender='$gender', role='$role', band_type='$band_type', genre='$genre', instruments='$instruments', description='$description' WHERE userID= '$userID'";
			if ($conn->query($sql) === TRUE) {
				echo "Profile updated successfully";
				// Refresh page to show updated profile
				header("Refresh:0");
			} else {
				echo "Error updating profile: " . $conn->error;
			}
		}

		// Close database connection
		$conn->close();
	?>

	<h1>Edit Profile</h1>
	<form method="post">
		<label>Age:</label>
		<input type="number" name="age" value="<?php echo $row['age']; ?>"><br>
		<input type="radio" name="gender" value="male" <?php if ($row['gender'] == 'male') echo 'checked'; ?>>Male
		<input type="radio" name="gender" value="female" <?php if ($row['gender'] == 'female') echo 'checked'; ?>>Female
        <input type="radio" name="gender" value="other" <?php if ($row['gender'] == 'other') echo 'checked'; ?>>Other<br>
		<label>Role:</label>
		<input type="text" name="role" value="<?php echo $row['role']; ?>"><br>
		<label>Band Type:</label>
		<input type="text" name="band_type" value="<?php echo $row['band_type']; ?>"><br>
		<label>Instruments:</label>
		<select data-placeholder="Begin typing a name to filter..." multiple class="chosen-select" name="instruments[]">
           <option value=""></option>
		  	<option value="Piano">Piano</option>
		  	<option value="Guitar">Guitar</option>
		  	<option value="Violin">Violin</option>
		  	<option value="Drums">Drums</option>
		  	<option value="Saxophone">Saxophone</option>
		  	<option value="Cello">Cello</option>
		  	<option value="Tinwhistle">Tinwhistle</option>
		  	<option value="Bass">Bass</option>
		  </select><br>
          <label>Genre:</label>
		<select data-placeholder="Begin typing a name to filter..." multiple class="chosen-select" name="genre[]" required>
            <option value=""></option>
		  	<option value="Pop">Pop</option>
		  	<option value="Rock">Rock</option>
		  	<option value="R&B">R&B</option>
		  	<option value="Hip-Hop">Hip-Hop</option>
		  	<option value="Jazz">Jazz</option>
		  	<option value="Classical">Classical</option>
		  	<option value="Dance">Dance</option>
		  	<option value="Traditional">Traditional</option>
		  </select><br>
		<label>Description:</label>
		<textarea name="description"><?php echo $row['description']; ?></textarea><br>
		<input type="submit" name="submit" value="Save Changes">
	</form>

</body>
</html>



   