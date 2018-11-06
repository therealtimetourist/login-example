<?php
	require "header.php";
?>

	<main class="container">
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
			<div class="panel panel-primary">
				<div class="panel-heading">Sign Up</div>
				<div class="panel-body">
					<form action="inc/signup.inc.php" method="POST">
						<div class="form-group">
							<label for="uid">User Name</label>
							<input type="text" name="uid" id="uid" placeholder="Username">
							
							<label for="email">E-mail</label>
							<input type="text" name="email" id="email" placeholder="E-mail">
							
							<label for="pwd">Password</label>
							<input type="password" name="pwd" id="pwd" placeholder="Password">
							
							<label for="pwd-repeat">Repeat Password</label>
							<input type="password" name="pwd-repeat" id="pwd-repeat" placeholder="Repeat Password">
						</div>
						<br>
						<button type="submit" name="signup-submit">Sign Up!</button>
					</form>
				</div>
			</div>	
			<!-- /signup form -->
		</section>
	</main>
<?php
	require "footer.php";
?>