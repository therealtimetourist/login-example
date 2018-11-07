<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<title>Contact</title>
		<link rel="stylesheet" href="style.css">
	</head>
	
	<body>
		<main>
			<h1>CONTACT US</h1>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sollicitudin sapien a mi tincidunt molestie. 
				Aliquam ut maximus eros. Proin ut ex sem. Proin malesuada accumsan faucibus. Pellentesque commodo tellus id 
				elit eleifend venenatis. Nulla nec euismod lorem, vitae aliquet ligula. Etiam sodales sem ut ex dictum, sed 
				bibendum orci feugiat. Nullam nec metus dignissim, lacinia massa sed, porttitor enim. Nulla eget porttitor magna.
			</p>
			
			<?php
				// error handling
				if(isset($_GET["mailsent"])){
					echo '<p class="signupsuccess">E-mail sent!</p>';
				} else{
					echo '<p>&nbsp;</p>';
				}
			?>
			<!-- contact form -->
			<form class="contact-form" action="process_contact.php" method="POST">
				<input type="text" name="name" placeholder="Your Name">
				<input type="text" name="email" placeholder="Your E-mail">
				<textarea name="message" placeholder="Your Message"></textarea>
				<button type="submit" name="submit">SEND</button>
			</form>
			<!-- /contact form -->
		</main>
	</body>
</html>