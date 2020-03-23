<?php
	require ("./dbh.inc.php");

	if(isset($_POST['gender'])) {

		$sql = "INSERT INTO genders(userid, gender) VALUES(?, ?)";

		$stmt = $conn->prepare($sql);
		$stmt->bindParam(1, $_POST['user_id']);
		$stmt->bindParam(2, $_POST['gender']);
		$stmt->execute();
		// header("Location: ../posts.php?msg=deletedconcert");1
		if() {
			
		}
		else{
	        $arr = array('a' => 'Unable to login');
	        echo json_encode($arr);
	    }

		$conn = null;
		exit();
	}

	else {
		header("Location: ../new_book.php");
		$conn = null;
		exit();
	}

?>