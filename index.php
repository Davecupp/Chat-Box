<?php include 'database.php' ; ?>

<?php 
	// Create Select Query
	$query = "SELECT * FROM chat ORDER BY id DESC";
	$chats = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chat Box</title>
	<link rel="stylesheet" type="text/css" href="css/main.css" />
</head>
	<body>
		<div id='container'>

		<header>
			<h1>Chat Box - Post your chat messages here!</h1>		
		</header>
			<div id="chats">
				<ul>
					<?php while($row = mysqli_fetch_assoc($chats)) : ?>
						<li class="chat"><span><?php echo $row['time'] ?> - </span><strong><?php echo $row['user'] ?></strong>: <?php echo $row['message'] ?></li>
					<?php endwhile; ?>
					
				</ul>
			</div>
			<div id="input">
			<?php if(isset($_GET['error'])) : ?>
				<div class="error"><?php echo $_GET['error']; ?></div>
			<?php endif; ?>
				<form method="post" action="process.php">
						<input type="text" name="user" placeholder="Enter Your Name" />
						<input type="text" name="message" placeholder="Enter Your Message" />
						<br />
						<input class="chat-btn" type="submit" name="submit" value="Post Your Chat!" />

				</form>
			</div>
		</div>
	</body>
</html>