<?php 
	session_start();
	$page = "New Book";
	require ("includes/nav.inc.php");
	require ("includes/dbh.inc.php");
?>

<link rel="stylesheet" type="text/css" href="./css/croppie.css">
<script src="./js/croppie.js"></script>

	<div class="main-wrapper">
		<h2>Adicionar Livro</h2>
		<p>Mais um para a coleção!</p>
		<div class="form-container">
			<!-- <div class="new-book"> -->
			<form class="new-book" method="POST" action="./includes/upload.inc.php" enctype="multipart/form-data">
				<?php
					if(isset($_GET["error"])) {
						if($_GET["error"] == "emptyfields") {
							echo "<p class=\"error-msg\">Faça o favor de preenhcer os campos todos</p>";
						}
						else if($_GET["error"] == "toobig") {
							echo "<p class=\"error-msg\">Imagem demasiado grande</p>";
						}
					}
					else if(isset($_GET["create"])) {
						if($_GET["create"] == "success") {
							echo "<p style=\"color: green\" class=\"error-msg\">Concerto criado!</p>";	
						}
						else if($_GET["create"] == "error") {
							echo "<p class=\"error-msg\">O concerto não foi criado, por favor contactar o mestre do site.</p>";
						}
					}
				?>

				<input type="hidden" name="userId" value="<?php echo $_SESSION['user_id'] ?>">

				<label>Capa</label>
				<label for="upload_image" class="file-upload">Escolher ficheiro</label>
				<input type="file" id="upload_image" name="upload_image" accept="image/*" capture="user">

				<div id="uploaded_image"></div>

				<label>Título</label>
				<input type="text" name="title" placeholder="Título" value="<?php if(isset($_GET['title'])) echo $_GET['title'] ?>">

				<label>Autor</label>
				<input type="text" name="author" placeholder="Autor" value="<?php if(isset($_GET['author'])) echo $_GET['author'] ?>">

				<label>Nacionalidade</label>
				<input type="text" name="nationality" placeholder="Nacionalidade" value="<?php if(isset($_GET['nationality'])) echo $_GET['nationality'] ?>">

				<label>Data</label>
				<input type="date" name="book_date" placeholder="Date" value="<?php if(isset($_GET['book_date'])) echo $_GET['book_date'] ?>">

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

				<input type="submit" class="btn-submit" name="submit" value="Adicionar Livro">
			</form>
			<!-- </div> -->
		</div>

		<div id="uploadimageModal" class="modal" >
		  	<div class="modal-content">
		        <div class="modal-header">
		         	<h4 class="modal-title">Recortar Imagem</h4>
		         	<img src="./imgs/cross.png" id="close-modal">
		        </div>
	        	<div id="image_demo" style="max-width:98%; margin-top:30px"></div>
           		<p><a class="crop_image">Upload</a></p>
		    </div>
		</div>

		<div id="gender-popup">
			<div class="header">
				<h3>Novo Gênero</h3>
				<a href="#/" class="gender-popup-close" style="height: 18px;"><img src="./imgs/cross.png"></a>
			</div>
				<p class="success">Gênero adicionado!</p>
				<input type="text" id="new-gender-input" name="new-gender" placeholder="Novo Gênero">
				<?php echo '<input type="submit" name="submit-gender" class="submit-gender" value="Criar Gênero" data-id="'.$_SESSION['user_id'].'" data-role="add-gender">' ?>
		</div>
	</div>

	<script src="js/main.js"></script>
	<script>
		$(document).ready(function(){
			$(document).on('click', '.submit-gender', function() {
				var user_id = $(this).data('id');
				var gender = $('#new-gender-input').val();
				if(gender == '') {
					alert("Inserir gênero");
					return false;
				}
				else {
					$.ajax({
						url: "./includes/add_gender.inc.php",
						type: "POST",
						cache: false,
						data: {'user_id': user_id, 'gender': gender},
						success: function(data){
							if(data == "e") {
								alert("Erro!");
							}
							else if (data == "s"){
								alert("Gênero criado!")
							}
						}
					})
				}
			});
		});
	</script>

	<script>  


		function openModal() {
			var modal = document.getElementById("uploadimageModal");
			document.getElementById("cover").classList.toggle('open');
			modal.classList.toggle('show');
		}

		var close_modal = document.getElementById("close-modal");
		close_modal.addEventListener('click', function(){
			document.getElementById("cover").classList.toggle('open');uploadimageModal
			document.getElementById("uploadimageModal").classList.toggle('show');
		});

		$(document).ready(function(){

		 $image_crop = $('#image_demo').croppie({
		    // enableExif: true,
		    mouseWheelZoom: false,
		    enableResize: true,
		    viewport: {
		      width:200,
		      height:270,
		      type:'square'
		    },
		    boundary:{
		      width:260,
		      height:300
		    }
		  });

		  $('#upload_image').on('change', function(){
		    var reader = new FileReader();
		    reader.onload = function (event) {
		      $image_crop.croppie('bind', {
		        url: event.target.result
		      }).then(function(){
		        // console.log('jQuery bind complete');
		      });
		    }
		    reader.readAsDataURL(this.files[0]);
		    // $('#uploadimageModal').modal('show');
		    openModal();
		  });

		  $('.crop_image').click(function(event){
		    $image_crop.croppie('result', {
		      type: 'canvas',
		      size: 'viewport'
		    }).then(function(response){
		      $.ajax({
		        url:"./includes/upload.php",
		        type: "POST",
		        data:{"image": response},
		        success:function(data)
		        {
		          // $('#uploadimageModal').modal('hide');
		          openModal();
		          $('#uploaded_image').html(data);
		        }
		      });
		    })
		  });

		});  
	</script>
</body>
</html>