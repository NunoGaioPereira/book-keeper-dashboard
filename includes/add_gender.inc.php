<?php
	if(isset($_POST['action'])) {
		if($_POST['action'] == "add-gender") {

			if()

			$sql = "INSERT INTO genders VALUES(userid, gender)";

			$stmt = $conn->prepare($sql);
			$stmt->bindParam(1, $gender);
			$stmt->execute();
			// header("Location: ../posts.php?msg=deletedconcert");1
			$conn = null;
			exit();
		}
	}

?>