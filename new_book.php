<?php 
	session_start();
	$page = "New Book";
	require ("includes/nav.inc.php");
	require ("includes/dbh.inc.php");
?>

<link rel="stylesheet" type="text/css" href="./includes/croppie.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="./includes/croppie.js"></script>


	<div class="main-wrapper">
		<h2>Adicionar Livro</h2>
		<p>Mais um para a coleção!</p>
		<div class="form-container">
			<div class="new-book">
			<!-- <form class="new-book" method="POST" action="./includes/upload.inc.php" enctype="multipart/form-data"> -->
				<?php
					if(isset($_GET["error"])) {
						if($_GET["error"] == "emptyfields") {
							echo "<p class=\"error-msg\">Faça o favor de preenhcer os campos todos</p>";
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

				<div id="uploadimageModal" class="modal" role="dialog">
				 <div class="modal-dialog">
				  <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Upload and Crop Image</h4>
				        </div>
				        <div class="modal-body">
				          <div class="row">
				       <div class="col-md-8 text-center">
				        <div id="image_demo" style="width:350px; margin-top:30px"></div>
				       </div>
				       <div class="col-md-4" style="padding-top:30px;">
				        <br />
				        <br />
				        <br/>
				        <button class="btn btn-success crop_image">Crop and Upload Image</button>
				     </div>
				    </div>
				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        </div>
				     </div>
				    </div>
				</div>

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
			<!-- </form> -->
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

	<!-- <script src="js/main.js"></script> -->
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
							// $("#musicians-table").load("./includes/update_pieces.inc.php", {id: id, action: 'fill-musicians-table'});
						}
					})
				}
			});
		});
	</script>

	<!-- <script src="./includes/croppie.js"></script> -->
	<script>  
		$(document).ready(function(){

		 $image_crop = $('#image_demo').croppie({
		    enableExif: true,
		    viewport: {
		      width:200,
		      height:270,
		      type:'square'
		    },
		    boundary:{
		      width:300,
		      height:300
		    }
		  });

		  $('#upload_image').on('change', function(){
		    var reader = new FileReader();
		    reader.onload = function (event) {
		      $image_crop.croppie('bind', {
		        url: event.target.result
		      }).then(function(){
		        console.log('jQuery bind complete');
		      });
		    }
		    reader.readAsDataURL(this.files[0]);
		    $('#uploadimageModal').modal('show');
		  });

		  $('.crop_image').click(function(event){
		  	console.log("Got here");
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
		          $('#uploadimageModal').modal('hide');
		          $('#uploaded_image').html(data);
		        }
		      });
		    })
		  });

		});  
	</script>
</body>
</html>