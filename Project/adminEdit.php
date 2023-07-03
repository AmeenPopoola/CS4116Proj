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


$sViewUser = $_SESSION['sProfileID']; // assuming the users ID is stored in a session variable
		$sql = "SELECT * FROM profile WHERE userID = '$sViewUser'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();

		// Update user's profile in database
		if (isset($_POST['submit'])) {
			$age = $_POST['age'];
			$gender = $_POST['gender'];
			$band_type = $_POST['band_type'];
			$tempgenre = $_POST['genre'];
            $genre = implode(',' ,$tempgenre);
			$tempinstruments = $_POST['instruments'];
            $instruments = implode(',' ,$tempinstruments);
			$description = $_POST['description'];
			$sql = "UPDATE profile SET age='$age', orgName='$orgName', gender='$gender', band_type='$band_type', genre='$genre', instruments='$instruments', description='$description' WHERE userID = '$sViewUser'";
			if ($conn->query($sql) === TRUE) {
				echo "Profile updated successfully";
				// Refresh page to show updated profile
				header("Location: adminHome.php");
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
		<label>Role:  <?php echo $row['role']; ?> </label>
        <br>
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
