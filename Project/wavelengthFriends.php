<!DOCTYPE html>
<head>
<title>Friends</title>
</head>
<body>
    <header>
    <?php
        include('navBar.php');
        ?>
   </header> 

   <!DOCTYPE html>
<html>
<head>
	<title>Friends</title>
</head>
<body>
<?php
	// Retrieve the user ID of the currently logged-in user
$userID = $_SESSION["userID"];

if (isset($_POST["connect"])) {
    // Retrieve the ID of the user to connect with from the form
    $connectID = $_POST["connectID"];
    // Check if the searched user exists and is not already connected to the current user
    $sql_check = "SELECT * FROM user WHERE userID = $connectID";
    $result_check = $conn->query($sql_check);
    if ($result_check->num_rows == 0) {
        echo "User not found.";
    } else {
        $sql_check2 = "SELECT * FROM connections WHERE (userid1 = $userID AND userid2 = $connectID) OR (userid1 = $connectID AND userid2 = $userID)";
        $result_check2 = $conn->query($sql_check2);
        if ($result_check2->num_rows > 0) {
            echo "You are already connected with this user.";
        } else {
            // Add the connection to the database
            $sql = "INSERT INTO connections (userid1, userid2) VALUES ($userID, $connectID)";
            if ($conn->query($sql) === TRUE) {
                echo "Connection added.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}

if (isset($_POST["search"])) {
    $searchTerm = $_POST["search-term"];
    // Query the database to search for users matching the search term
    $sql = "SELECT * FROM user WHERE firstname LIKE '%$searchTerm%' OR lastname LIKE '%$searchTerm%' OR email LIKE '%$searchTerm%'";
    $result = $conn->query($sql);
    // Display the search results
    if ($result->num_rows > 0) {
        echo "<h2>Search Results</h2>";
        echo "<div class='friend-list'>";
        echo "<table style='margin: 0 auto;'>";
        echo "<tr><th>Name</th><th>Action</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["firstname"] . " " . $row["lastname"] . "</td>";
            // Check if the user is already connected to the current user
            $sql_check = "SELECT * FROM connections WHERE (userid1 = $userID AND userid2 = " . $row["userID"] . ") OR (userid1 = " . $row["userID"] . " AND userid2 = $userID)";
            $result_check = $conn->query($sql_check);
            if ($result_check->num_rows > 0) {
                echo "<td>Already connected</td>";
            } else {
                echo "<td><form method='post'><button type='submit' name='connect' value='" . $row["userID"] . "'>Connect</button><input type='hidden' name='connectID' value='" . $row["userID"] . "'></form></td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    } else {
        echo "No results found.";
    }
}

// Check if the form has been submitted
    if (isset($_POST["remove"])) {
        // Retrieve the ID of the user to remove connection with from the form
        $connectionID = $_POST["connectionID"];
        // Remove the connection from the database
        $sql = "DELETE FROM connections WHERE connectionID = '$connectionID'";
        if ($conn->query($sql) === TRUE) {
            echo "Connection removed.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }



// Query the database to retrieve the list of users (excluding the current user)
$sql = "SELECT * FROM user WHERE userID <> $userID";
$result = $conn->query($sql);

// Query the database to retrieve the list of connections for the current user
$sql2 = "SELECT connections.connectionID, user.firstname, user.lastname
        FROM connections
        INNER JOIN user ON connections.userid1 = user.userID OR connections.userid2 = user.userID
        WHERE (connections.userid1 = $userID OR connections.userid2 = $userID) AND user.userID <> $userID";
$connectionsResult = $conn->query($sql2);

// Close the database connection
$conn->close();
?>

<form method="post" onkeydown="return event.key != 'Enter';">>
    <label for="search-term">Search:</label>
    <input type="text" id="search-term" name="search-term" placeholder="Enter a search term...">
    <button type="submit" name="search">Search</button>
</form>

<h2>Your Connections</h2>
<div class="friend-list">
<table style="margin: 0 auto;">
    <tr>
        <th>Name</th>
        <th>Remove</th>
    </tr>
    <?php while($row = $connectionsResult->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row["firstname"] . " " . $row["lastname"]; ?></td>
            <td>
                <form method="post">
                    <button type="submit" name="remove" value="<?php echo $row["connectionID"]; ?>">Delete</button>
                    <input type="hidden" name="connectionID" value="<?php echo $row["connectionID"]; ?>">
                </form>
            </td>
        </tr>
    <?php } ?>
</table>
</div>
	
</body>
</html>