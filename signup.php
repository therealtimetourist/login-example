<?php
	require "header.php";
?>

	<main>
		<div class="wrapper-main">
			<section class="section-default">
				<h1>Sign Up</h1>
				<?php
					// error handling
					if(isset($_GET["error"])){
						switch($_GET["error"]){
							case "emptyfields":
								echo '<p class="signuperror">Fill in all fields</p>';
							break;
							
							case "invaliduidemail":
								echo '<p class="signuperror">Invalid username and email</p>';
							break;
							
							case "invalidemail":
								echo '<p class="signuperror">Invalid email</p>';
							break;
							
							case "passwordcheck":
								echo '<p class="signuperror">password fields do not match</p>';
							break;
							
							case "usertaken":
								echo '<p class="signuperror">Username already exists</p>';
							break;
							
							default:
						}
					} elseif($_GET["signup"] == "success"){
						echo '<p class="signupsuccess">Signup successful!</p>';
					} else{
						echo '<p>&nbsp;</p>';
					}
				?>
				<!-- signup form -->
				<form class="form-signup" action="inc/signup.inc.php" method="POST">
					<input type="text" name="uid" placeholder="Username">
					<input type="text" name="email" placeholder="E-mail">
					<input type="password" name="pwd" placeholder="Password">
					<input type="password" name="pwd-repeat" placeholder="Repeat Password">
					<button type="submit" name="signup-submit">Sign Up!</button>
				</form>
				<!-- /signup form -->
			</section>
		</div>
	</main>
	
<?php
	require "footer.php";
?>