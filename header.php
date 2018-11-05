<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name= "description" content="login system example, hand coded from scratch.">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>LOGIN</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="style.css">
	</head>
	
	<body>
	
		<header>
			<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span> 
						</button>
						<a class="navbar-brand" href="#">WebSiteName</a>
					</div>
					<div class="collapse navbar-collapse" id="myNavbar">
						<ul class="nav navbar-nav">
							<li class="active"><a href="index.php">Home</a></li>
							<li><a href="#">About</a></li>
							<li><a href="#">Contact</a></li>
						</ul>
						
						<ul class="nav navbar-nav navbar-right">
							<li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
						</ul>
						
						<?php 
							if(isset($_SESSION['uid'])){
								echo '
								<div class="header-login navbar-right">
									<form class="navbar-form navbar-left" action="inc/logout.inc.php" method="POST">
										<button type="submit" class="btn btn-default" name="logout-submit">Log Out</button>
									</form>
								</div>';
							} else{
							
							echo '<div class="header-login navbar-right">
									<form class="navbar-form navbar-left" action="inc/login.inc.php" method="POST">
										<div class="form-group">
											<input type="text" name="mailuid" class="form-control" placeholder="username/e-mail...">
											<input type="password" name="pwd" class="form-control" placeholder="password...">
										</div>
										<button type="submit" class="btn btn-default" name="login-submit">Log In</button>
									</form>
								</div>';
							}
						?>
					</div>
				</div>
			</nav>
			
			<div class="jumbotron">
				<h1>Bootstrap Tutorial</h1> 
				<p>Bootstrap is the most popular HTML, CSS, and JS framework for developing responsive,
				mobile-first projects on the web.</p> 
			</div>
		</header>