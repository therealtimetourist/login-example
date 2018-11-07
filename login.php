<?php
	require "header.php";
?>

	<main class="container">
		<?php 
			// logged in: bounce
			if(isset($_SESSION['userId'])){
				header("Location: ../index.php");
				exit();
			} 
			// login error
			if(isset($_GET["error"])){
				switch($_GET["error"]){
					case "emptyfields":
						echo '<p class="signuperror">Fill in all fields</p>';
					break;
					
					case "nouser":
						echo '<p class="signuperror">User profile not found</p>';
					break;
					
					case "passwordcheck":
						echo '<p class="signuperror">Incorrect password</p>';
					break;
					
					case "sqlerror":
						echo '<p class="signuperror">SQL/Database error</p>';
					break;
					
					default:
						echo '<p>&nbsp;</p>';
				}
			} 
		?>
		<!-- login form -->
		<div class="panel panel-primary">
			<div class="panel-heading">Login</div>
			<div class="panel-body">
				<form action="inc/login.inc.php" method="POST">
					<div class="form-group">
						<label for="mailuid">User Name</label>
						<input type="text" name="mailuid" id="mailuid" class="form-control" placeholder="username/e-mail...">
						
						<br><label for="pwd">Password</label>
						<input type="password" name="pwd" id="pwd" class="form-control" placeholder="password...">
					</div>
					<br>
					<button type="submit" class="btn btn-primary" name="login-submit">Log In</button>
				</form>
			</div>
		</div>
		<!-- /login form -->
	</main>
	
<?php
	require "footer.php";
?>