<?php
session_start();

require "dbconnection.php";
$conn = createConnection('sql300.epizy.com','epiz_33768646','DnPkUp7wbvcfJ','epiz_33768646_CS4116ProjGroup10');

session_start();
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
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>User banned, please sign out.</p>

<form method="post">
             <input type="submit" name="buttonLogOut"
                     class="btn btn-primary" value="Logout" />
</form>
</body>
</html>