<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
            crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    
    <title>Login</title>

    <style><?php include 'style.css'; ?></style>
</head>
<body>
    <center>
        <div class="container">
        <i class="bi bi-lock-fill" style="font-size: 75px; color:#BA55D3;"></i>
        <form action="auth.php" method="post">
                <div class="mb-3">
                    <!-- <label for="email">Email:</label> -->
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email address"
                        aria-label="Email" title="Please enter valid email address" required>
                </div>
                <div class="mb-3">
                    <!-- <label for="password">Password:</label> -->
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password"
                    aria-label="Password" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary" style="background-color:#BA55D3">Login</button>
                <a href="signup.php" class="btn btn-primary" style="background-color:#BA55D3">Not a Member Yet?</a><br>
                <a href="adminLogin.html" class"btn bt-primary" style="background-color: green">Admin Login</a>
        </form>
        </div>
    </center>
</body>
</html>