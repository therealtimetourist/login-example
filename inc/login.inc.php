<?php
	if(isset($_POST['login-submit'])){
		// db connection
		require 'dbh.inc.php';
		
		$uid = $_POST['uid'];
		$password = $_POST['pwd'];
		
		// error check
		if(empty($uid) || empty($password)){
			header("Location: ../index.php?error=emptyfields");
			exit();
		} else{
			$sql = "SELECT * FROM users WHERE uid = ? OR email = ?;";
			// prepared statement
			$stmt = mysqli_stmt_init($conn);
			
			if(!mysqli_stmt_prepare($stmt, $sql)){
				header("Location: ../index.php?error=sqlerror");
				exit();
			} else{
				mysqli_stmt_bind_param($stmt, "ss", $uid, $uid);
				mysqli_stmt_execute($stmt);
				
				$result = mysqli_stmt_get_result($stmt);
				
				if($row = mysqli_fetch_assoc($result)){
					$pwdCheck = password_verify($password, $row['pwd']);
					if($pwdCheck == false){
						header("Location: ../index.php?error=wrongpwd");
						exit();
					} elseif($pwdCheck == true){
						// create session
						session_start();
						$_SESSION['userId'] = $row['id'];
						$_SESSION['userUid'] = $row['uid'];
						
						header("Location: ../index.php?login=success");
						exit();
					} else{
						header("Location: ../index.php?error=wrongpwd");
						exit();
					}
				 else{
					header("Location: ../index.php?error=nouser");
					exit();
				 }
			}
		}
	}
	// else visitor visits page manually, send visitor to signup page
	else{
		header("Location: ../index.php");
		exit();
	}