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
	<title>User Info</title>
    
	<body>
    <h1>About Your Record Label</h1>
    <div class = "infoContainer">
	<form action="orgInfo_page.php"  method="post">
        <div class="profile-pic-div">
        <img src="image.jpg">
        <!--<input type="file" name="photo" id="file">
        <label for="file" id="uploadBtn">Choose Photo</label><br>-->
    </div>
        <div class="name">
        	<input type="text" placeholder="Record Label Name" name="name" required><br>
        </div>
        <div class="labelInfo">
        	<input type="number" placeholder="How Old Is This Record Label?" name="age" required><br>
        	<select name="role" required>
		 	<option value="Record Label">Record Label</option>
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
		   <textarea name="description" placeholder="More About The Label..." rows="4" cols="50"></textarea><br>
		</div>
		  <input type="submit">
		 </form>
    </div>
</body>
