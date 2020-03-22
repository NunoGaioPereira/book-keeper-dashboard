<?php

require("./dbh.inc.php");

if (isset($_POST['login-submit'])) {

		$userid = cleanInput($_POST['id']);
		$password = cleanInput($_POST['pwd']);
		// $passwordRepeat = cleanInput($_POST['pwd-repeat']);

		// Error handlers
		if(empty($password) || empty($userid)) {
			header("Location: ../login.php?error=emptyfields");
			exit();
		}
		/*else if ($password !== $passwordRepeat) {
			header("Location: ../login.php?error=nomatch");
			exit();
		} */
		else {
			// passwords match and no empty fields
			// Get password from database
			$sql = "SELECT userid, pwd FROM users WHERE userid = ?";
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
					$_SESSION['userId'] = $row['userid'];
					// $_SESSION['userId'] = '316429';
					$_SESSION['time'] = $_SERVER['REQUEST_TIME'];
					header("Location: ../index.php");
					exit();
				} 
				else {
					//Shouldn't get here
					header("Location: ../index.php?error=ohcrap");
					exit();	
				}
			}
		}

}

//Send back to signup page if did not click submit button
else {
	header("Location: ../login.php");
	exit();
}