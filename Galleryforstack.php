<?php
include_once 'db_connect.php';

session_start();
  if(!isset($_SESSION['id_user'])):
    header('location: homepage.html');
  endif;
  $id = $_SESSION['id_user'];

  $sql = "SELECT * FROM users WHERE id = '$id' AND privilegios = 'admin' OR privilegios = 'cgi';";
  $resultado = mysqli_query($connect, $sql);
  $data = mysqli_fetch_array($result);

  if(!$data['privilegios'] == "admin" || $dados['privilegios'] == "cgi"):
    header('location: homepage.html');
  endif;  
?>


<!DOCTYPE html>
<html>
<head>
	<title>Gallery</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="Galeria.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-5.0.0-beta1-dist\css\bootstrap.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/0e699f5a8d.js" crossorigin="anonymous"></script>
	
</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="#" style="margin-left:39px";>
				<img src="logo1.png" width="100" height="70"  alt="">
			  </a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav" style="float: right; margin-left: 750px;">
			  <ul class="navbar-nav">
				<li class="nav-item active">
				  <a class="nav-link" href="Gallery.html">Home<span class="sr-only"></span></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="#">Content</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="#">Profile</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="#">Definitions</a>
				</li>
			  </ul>
			</div>
		  </nav>

		   
			

			<form action="tipos.php" method="POST">
			<div class="container" style="margin-top: 1.5%;">	
				<div class="dropdown">
				  <select class="form-control" id="select_1" name="thenumbers" style="margin-top: 3%; margin-bottom: 1.5%; width: 90px; ">
					<option value="one">Images</option>
					<option value="two">Videos</option>
					<option value="three">Áudio</option>
					<option value="four">Documents</option>
				</select>

				<select class="form-select form-select" aria-label="Default select example" style="margin-bottom: 1%;">
					<option selected>Choose a filter</option>
					<option value="1">One</option>
					<option value="2">Two</option>
					<option value="3">Three</option>
				  </select>
				  
				<button type="submit" class="btn btn-primary">View</button>
				</div>
			</div>
		</form>	
		
		<?php
			$sql = "SELECT * FROM content WHERE type = 'image' AND statuus = 'ready';";
			$result = mysqli_query($connect, $sql);

			while($data = mysqli_fetch_array($result)):
      
        ?>
			<div class="container-grid">
					<div class="row">
						<div class="col-md-6 col-lg-3">
							<div class="card" style="width: 18rem; margin-bottom: 3%;">
							  <img src="<?php echo $data['location']?>" class="card-img-top" alt="...">
							  <div class="card-body">
								    <h5 class="card-title"><?php echo $data['name']?></h5>
								    <p class="card-text"><?php echo $data['description']?></p>
									    <div class="stars">
										    <input type="radio" name="rate" id="rate-5">
										    <label for="rate-5" class="fas fa-star"></label>
										    <input type="radio" name="rate" id="rate-4">
										    <label for="rate-4" class="fas fa-star"></label>
										    <input type="radio" name="rate" id="rate-3">
										    <label for="rate-3" class="fas fa-star"></label>
										    <input type="radio" name="rate" id="rate-2">
										    <label for="rate-2" class="fas fa-star"></label>
										    <input type="radio" name="rate" id="rate-1">
										    <label for="rate-1" class="fas fa-star"></label>
										</div>
								    <div class="thumbs" style=" margin-top: 2%;">
										<a href="#"><i class="fas fa-thumbs-up"></i></a>
								    	<a href="#"><i class="fas fa-thumbs-down" style="margin-left: 3%;"></i></a>
								    	<a href="#"><i class="fas fa-comment" style="margin-left: 3%;"></i></a>
								    	<a href="SpecificContent.php" class="btn btn-info" style="float: right;">View</a>
									</div>
							  </div>
							</div>
						</div>

						<?php endwhile;?>
						
						
					</div>
			</div>

		
			
	</body>
</html>