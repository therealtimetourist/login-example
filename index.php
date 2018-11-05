<?php
	require "header.php";
?>

	<main>
		<div class="wrapper-main">
			<?php 
				if(isset($_SESSION['uid'])){
					echo '<p class="login-status">You are logged in</p>';
				} else{
					echo '<p class="login-status">You are logged out</p>';
				}
			?>
		</div>
	</main>
	
<?php
	require "footer.php";
?>