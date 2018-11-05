<?php
	// if posted from signup page
	if(isset($_POST['signup-submit'])){
		
		// db connection
		require 'dbh.inc.php';
		
		// get user signup input
		$username = $_POST['uid'];
		$email = $_POST['email'];
		$password = $_POST['pwd'];
		$passwordRepeat = $_POST['pwd-repeat'];
		
		//error check input
		// check blank entries
		if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){
			header("Location: ../signup.php?error=emptyfields&uid=".$username."&email=".$email);
			exit();
		}
		// invalid email and username
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
			header("Location: ../signup.php?error=invalidemailuid");
			exit();
		}
		// check valid email
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			header("Location: ../signup.php?error=invalidemail&uid=".$username);
			exit();
		} 
		// check valid username
		elseif(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
			header("Location: ../signup.php?error=invaliduid&email=".$email);
			exit();
		}
		// check password match
		elseif($password !== $passwordRepeat){
			header("Location: ../signup.php?error=passwordcheck&uid=".$username."&email=".$email);
			exit();
		}
		// username already exists
		else{
			//use prepared statement to avoid sql injection
			$sql = "SELECT userId FROM users WHERE userId=?";
			$stmt = mysqli_stmt_init($conn);
			
			if(!mysqli_stmt_prepare($stmt, $sql)){
				header("Location: ../signup.php?error=sqlerror");
				exit();
			} else{
				mysqli_stmt_bind_param($stmt, "s", $username);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$resultCheck = mysqli_stmt_num_rows($stmt);
				// if username already exists return error
				if($resultCheck > 0){
					header("Location: ../signup.php?error=usertaken&email=".$email);
					exit();
				} 
				// else write to db
				else{
					$sql = "INSERT INTO users (userId, email, pwd) VALUES (?,?,?)";
					$stmt = mysqli_stmt_init($conn);
					
					if(!mysqli_stmt_prepare($stmt, $sql)){
						header("Location: ../signup.php?error=sqlerror");
						exit();
					} else{
						// hash password using bCrypt
						$hasedPwd = password_hash($password, PASSWORD_DEFAULT);
						
						mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hasedPwd);
						mysqli_stmt_execute($stmt);
						// return user to login page with success
						header("Location: ../signup.php?signup=success");
						exit();
					}
				}
			}
		}
		// close connections
		mysqli_stmt_close($stmt);
		mysqli_close($conn);
	} 
	// else visitor visits page manually, send visitor to signup page
	else{
		header("Location: ../signup.php");
		exit();
	}