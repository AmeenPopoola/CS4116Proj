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
        height:350px;
        width: 550px;
        color: #FFFFFF;
    }

</style>
<body>
    <h1>About You</h1>
    <div class = "infoContainer">
	<form action="info_page.php"  method="post">
        <div class="profile-pic-div">
        <img src="image.jpg">
       <!-- <input type="file" name="photo" id="file">
        <label for="file" id="uploadBtn">Choose Photo</label><br>-->
        </div>
        <div class="info">
		<input type="number" placeholder="Your Age" name="age" required><br>
		<label for="gender">Your Gender: </label>
		<select name = "gender" required>
            <option value=""></option>
			<option value="male">Male</option>
			<option value="female">Female</option>
			<option value="other">Other</option>
		 </select><br>
        </div>
        <div class="musicInfo">
		 <label for="role">Your Role: </label>
		 <select name="role" required>
		 	<option value="artist">Artist</option>
		  </select><br>
		  <label for="band">Are you a Solo Artist or a part of a band?</label>
		  <select name = "band" required>
            <option value=""></option>
		  	<option value="band">Band</option>
		  	<option value="solo">Solo</option>
		  </select><br>
		  <label for="genre">Your Preferred Genre(s) of Music: </label>
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
		  <label for="manager">Do you have a Manager?</label>
		   <select name = "manager">
            <option value=""></option>
		  	<option value="yes">Yes</option>
		  	<option value="no">No</option>
		  </select><br>
		  <label for="label">Are you signed to a Label?</label>
		   <select name = "label">
            <option value=""></option>
		  	<option value="yes">Yes</option>
		  	<option value="no">No</option>
		  </select><br>
        </div>
		   <textarea name="description" placeholder="More About You..."  rows="4" cols="50"></textarea><br>
          <label for="instruments">Instruments You Play</label>
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
          <input type="submit">
	</form>
    </div>
	</body>
