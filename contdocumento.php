<?php
include_once 'db_connect.php';
session_start();
  if(!isset($_SESSION['id_usuario'])):
    header('location: paginainicial.html');
  endif;
  $id = $_SESSION['id_usuario'];

  $sql = "SELECT * FROM usuarios WHERE id = '$id' AND privilegios = 'admin' OR privilegios = 'cgi';";
  $resultado = mysqli_query($connect, $sql);
  $dados = mysqli_fetch_array($resultado);

  if(!$dados['privilegios'] == "admin" || $dados['privilegios'] == "cgi"):
    header('location: paginainicial.html');
  endif;  
?>

<!DOCTYPE html> 
<html>
<head>
	<title>Galeria</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="Galeria.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-5.0.0-beta1-dist\css\bootstrap.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0e699f5a8d.js" crossorigin="anonymous"></script>
    <style>@media only screen and (min-width: 875px) {
        video {
  max-width: 100%;
}
.card{margin-left: 20px; margin-top: 20px; margin-right: 20px; margin-bottom: 20px}
        }
    </style>
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
				  <a class="nav-link" href="Gallery.php">Home <span class="sr-only"></span></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="#">Conteudos</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="#">Users</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="#">Definições</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="logout.php">Sair</a>
				</li>
			  </ul>
			</div>
		  </nav>

		   
			

			<form action="tipos.php" method="POST">
			<div class="container" style="margin-top: 1.5%;">	
				<div class="dropdown">
				  <select class="form-control" id="select_1" name="tipo" style="margin-top: 3%; margin-bottom: 1.5%; width: 90px; ">
					<option value="imagem">Imagens</option>
					<option value="video">Videos</option>
					<option value="audiohree">Áudios</option>
					<option value="documentos">Documentos</option>
				</select>

				<select class="form-select form-select" aria-label="Default select example" name="filtro" style="margin-bottom: 1%;">
					<option selected>Escolha um filtro</option>
					<option value="1">Nos últimos sete dias</option>
					<option value="2">Two</option>
					<option value="3">Three</option>
				  </select>
				  
                <button type="submit" class="btn btn-primary" name = "ver">Ver</button>
                <br><br><br>
                <?php
                     $sql = "SELECT * FROM conteudos WHERE tipo = 'video' AND statuus = 'disponivel';";
                     $resultado = mysqli_query($connect, $sql);
                     while($dados = mysqli_fetch_array($resultado)):           
                ?>
               
                <div class="embed-responsive embed-responsive-16by9" style="width: 26rem; margin-bottom: 3%;">
                    <iframe class="embed-responsive-item" src="RelatórioFinal.pdf"></iframe>
                    <a href="ConteudoEspecifico.php" class="btn btn-info" style="float: right;">Ver</a>
                </div>
                <?php endwhile;?>
            
            </div>
			</div>
		</form>	

	</body>
</html>