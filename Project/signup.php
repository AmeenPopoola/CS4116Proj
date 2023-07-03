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
	<header>
	</header>
	<div class="main">
		<div class="signup-box">
			<div class="left-box">
				<img src="signup.jpg" alt="Some text">
				<div class="right-box">
					<h1>Create an Account</h1>
					<form action="sign_up.php" method="post">
						<input type="text" placeholder="First Name" name="fname" required class="input-box"><br>
						<input type="text" placeholder="Last Name" name="lname" required class="input-box"><br> 
						<input type="email" placeholder="Email" name="email" required class="input-box"><br>
						<input type="Password" placeholder="Password" name="password" required class="input-box"><br>
						<input type="Password" placeholder="Confirm Password" name="confirmPass" required class="input-box"><br>
						<button type="submit">Sign Up</button>
					</form>
					<p>You already have an account?Log in <a href="login.php">here</a></p>
				</div>
			</div>
		</div>
	</div>
	




</body>