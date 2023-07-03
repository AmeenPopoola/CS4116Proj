<!DOCTYPE html>
<html>
<head>
    <title>Auth</title>
    <!-- <meta http-equiv = "refresh" content = "3; url = http://cs4116group10.epizy.com/profile.php" /> -->
</head>
<body>
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    session_start();

    require_once 'dbconnection.php';
    $conn = createConnection('sql300.epizy.com','epiz_33768646','DnPkUp7wbvcfJ','epiz_33768646_CS4116ProjGroup10');

  if (isLoggedIn()) {
	// redirect to feed
	if ($_SESSION['isAdmin']) {
		header("Location: adminHome.php");
	} else {
		header("Location: profile.php");
	}
	exit(); 
	// redirects to the feed or admin page
} else {

	// not logged in
	if (wasPosted(array('email', 'password'))) {
		// if credentials were posted
		$email = $_POST['email'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
		echo "\n".$sql;
		$result = $conn->query($sql);
		$row = $result->fetch_assoc(); 
		echo "\n".$row;
		if ($row) {
			$_SESSION['loggedin'] = true;
			$_SESSION['userID'] = $row['userID'];
			$_SESSION['is_admin'] = $row['is_Admin'];
            $currUser = $_SESSION['userID'];
		    $checkbanned = "SELECT * FROM banned WHERE userID = '$currUser'";
		    $resultbanned = $conn->query($checkbanned);
            if($resultbanned->num_rows > 0){
                header("location: bannedPage.php");
            } else if (! $row['is_Admin']) {
				$sql_2 = "SELECT * FROM profile WHERE userID = '$currUser';";
				$result_2 = $conn->query($sql_2);
				$result_3 = $result_2->fetch_assoc();
				if($result_3['role'] == 'Artist'){
                    header("Location: profile.php");
                    }else if($result_3['role'] == 'Record Label' ){
                        header("Location: orgProfilePage.php");
                    }
			} else {
				header("Location: adminLogin.html");
			}
		} else {
			echo "Login failed, please check the credentials";
		}
		$conn->close();
	} else {
		header("Location: login.php");
	}
    }
    ?>
</body>
</html>