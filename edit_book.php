<?php 
	session_start();
	$page = "Editar Livro";
	require ("includes/nav.inc.php");
	require ("includes/dbh.inc.php");

	if(isset($_GET['book'])) {
		$id = $_GET['book'];
		try {
			$sql = "SELECT * FROM books WHERE id = ?";	
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(1, $id);
			$stmt->execute();
		} catch(Exception $ex) {
			echo ("Exception message: ".$ex->getMessage());
			exit();
		}
		$result = $stmt->fetch();
		$dt = new DateTime($result['date_']);
		$dt = $dt->format('Y-m-d');
	}
	// Redirect to posts if no ID defined (got here by chance)
	else {
		header("Location: ./books.php");
		exit();
	}
?>

<link rel="stylesheet" type="text/css" href="./css/croppie.css">
<script src="./js/croppie.js"></script>

	<div class="main-wrapper">
		<h2>Editar Livro</h2>
		<p>B</p>
		<div class="form-container">
			<form class="new-book" method="POST" action="./includes/upload.inc.php" enctype="multipart/form-data">
				<?php
					if(isset($_GET["error"])) {
						if($_GET["error"] == "emptyfields") {
							echo "<p class=\"error-msg\">Faça o favor de preenhcer os campos todos</p>";
						}
					}
					else if(isset($_GET["create"])) {
						if($_GET["create"] == "error") {
							echo "<p class=\"error-msg\">O concerto não foi criado, por favor livro o mestre do site.</p>";
						}
					}
				?>
				<label>Título</label>
				<input type="text" name="title" placeholder="Título" value="<?php echo $result['title']?>">

				<label>Autor</label>
				<input type="text" name="author" placeholder="Autor" value="<?php echo $result['author']?>">

				<label>Nacionalidade</label>
				<input type="text" name="nationality" placeholder="Nacionalidade" value="<?php echo $result['nationality']?>">

				<label>Data</label>
				<input type="date" name="book_date" placeholder="Date" value="<?php echo $dt ?>">

				<div class="gender">
					<div class="gender-input">
						<label>Gênero</label>
						<select name="gender">
							<?php
								try {
									$sql = "SELECT * FROM genders";
									$stmt = $conn->prepare($sql);
									$stmt->execute();
									if($stmt->rowCount() > 0)
									{
										$result = $stmt->fetchAll();

										foreach($result as $row)
										{	
											echo "<option>".$row['gender']."</option>";
										}
									}
								}
								catch(PDOException $e) {
								    echo "No categories found.";
								}
							?>
						</select>
						<a href="#/" class="add-gender">+</a>
					</div>
				</div>

				<input type="submit" class="btn-submit" name="submit" value="Editar">
			</form>
			<!-- </div> -->
		</div>
	</div>
</body>
</html>