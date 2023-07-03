<!DOCTYPE html>
<head>
<title>Connection</title>
</head>
<body>
    <header>
    <?php
        include('navBar.php');
        ?>
   </header> 

   <form action="wavelengthConnection.php" method="post">
    <label for="friend_email">Enter your friend's email:</label>
    <input type="email" name="friend_email" id="friend_email" required>
    <button type="submit">Add Friend</button>
</form>
 
 <?php
session_start(); // start the session
$userid1 = $_SESSION['userid']; // get the ID of the user making the request from the session
$friend_email = $_POST['friend_email']; // get the email of the friend being added

// check if the email exists in the user table
$query = "SELECT userID, email FROM user WHERE email = '$friend_email'";
$result = $conn->query($query);
if ($result->num_rows == 0) {
    // email not found, show an error message
    echo "Sorry, that email address doesn't exist.";
} else {
    // email found, get the ID and email of the friend
    $friend = $result->fetch_assoc();
    $userid2 = $friend['userID'];
    $friend_email = $friend['email'];
    // check if the friend's email is the same as the current user's email
    if ($friend_email == $_SESSION['email']) {
        echo "You can't add yourself as a friend!";
    } else {
        // check if the connection already exists in the connections table
        $query = "SELECT * FROM connections WHERE userid1 = '$userid1' AND userid2 = '$userid2'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            // connection already exists, show a message
            echo "You're already friends with that person.";
        } else {
            // connection doesn't exist, add it to the connections table
            $query = "INSERT INTO connections (userid1, userid2) VALUES ('$userid1', '$userid2')";
            $result = $conn->query($query);
            if ($result) {
                // connection added successfully, show a success message
                echo "Friend added successfully!";
            } else {
                // error adding the connection, show an error message
                echo "Sorry, something went wrong. Please try again.";
            }
        }
    }
}
$conn->close(); // close the database connection
?>
