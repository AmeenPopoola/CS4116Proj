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
	<h1>Before We Start Setting Up Your Account...</h1>
	<form action="user_type.php" method="post">
		 <label for="role">What is Your Role In The Music Industry? </label>
		 <select name="role" required>
            <option value=""></option>
		 	<option value="artist">Artist</option>
		 	<option value="label">Record Label</option>
		  </select><br>
		  <button type="submit">Go</button>
	</form>
</body>