<?php

require("./dbh.inc.php");

if (isset($_POST['login-submit'])) {

		$userid = cleanInput($_POST['id']);
		$password = cleanInput($_POST['pwd']);

		// Error handlers
		if(empty($password) || empty($userid)) {
			header("Location: ../login.php?error=emptyfields");
			exit();
		}
		else {
			// no empty fields
			// Get password from database
			$sql = "SELECT id, userid, pwd FROM users WHERE userid = ?";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(1, $userid);
			$stmt->execute();
			if($stmt->rowCount() > 0) {
				$result = $stmt->fetch();
				$pwdCheck = password_verify($password, $result['pwd']); 
				
				if ($pwdCheck == false) {
					//Wrong password
					header("Location: ../login.php?error=wrongpwd");
					exit();	 
				} 
				else if ($pwdCheck == true and $userid == $result['userid']) {
					// start a session
					session_start();
					$_SESSION['user_id'] = $result['id'];
					echo($_SESSION['user_id']);
					header("Location: ../index.php");
					exit();
				} 
				else {
					//Shouldn't get here
					header("Location: ../index.php?error=ohcrap");
					exit();	
				}
			}
			else {
				header("Location: ../login.php?error=nouser");
					exit();	
			}
		}

}

//Send back to signup page if did not click submit button
else {
	header("Location: ../login.php");
	exit();
}