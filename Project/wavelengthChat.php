<!DOCTYPE html>
<head>
<title>Chat</title>
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
	<title>Chat with Friend</title>
</head>
<body>
	<?php
		// retrieve the friend's name from the users table
		$friend_id = $_GET['firstname'];
		$friend_name = get_username($friend_id);
	?>
	<h1>Chatting with <?php echo $friend_name; ?></h1>
	<div id="chat-messages">
		<!-- display chat messages here -->
	</div>
	<form id="chat-form" action="send_message.php" method="POST">
		<input type="hidden" name="friend_id" value="<?php echo $friend_id; ?>">
		<input type="text" name="message" placeholder="Type your message here">
		<button type="submit">Send</button>
	</form>
</body>
</html>


</html>