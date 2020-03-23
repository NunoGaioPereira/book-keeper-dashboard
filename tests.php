<?php 
	require ("includes/dbh.inc.php");

	try {
		// $password = 'abc123';
		// $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
		// $sql = "INSERT INTO users (userID, pwd) VALUES('nunocgpereira', '$hashedPwd')";

		// $stmt = $conn->prepare("SELECT pwd FROM users WHERE id = '1'");
		// $stmt->execute();
		// $result = $stmt->fetch();
		// $pwdCheck = password_verify('abc123', $result['pwd']); 
		// // $conn->exec($sql);	
		// if ($result == FALSE) {
		// 	echo "Nothing found";
		// } else if($pwdCheck) {
		// 	echo "Success";
		// } else {
		// 	echo "Wrong password";
		// }

		echo "Query successful";
		
	}
	catch(PDOException $exception) {
		echo("<p>Error: ");
		echo($exception->getMessage());
		echo("</p>");
		exit();
	}

?>