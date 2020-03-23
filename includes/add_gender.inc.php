<?php
	require ("./dbh.inc.php");

	if(isset($_POST['gender'])) {

		try {
			$sql = "INSERT INTO genders(userid, gender) VALUES(?, ?)";

			$stmt = $conn->prepare($sql);
			$stmt->bindParam(1, $_POST['user_id']);
			$stmt->bindParam(2, $_POST['gender']);
			$stmt->execute();
			// header("Location: ../posts.php?msg=deletedconcert");1
			echo "s";
		}
		catch(PDOException $e) {
			// $arr = array('e' => $e->getMessage());
		 //    echo json_encode($arr);		
		    echo "e";
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