<?php
include_once 'db_connect.php';
session_start();
//echo $_SESSION['tipocont'];
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
if(isset($_POST['ver'])):
    $tipocont = mysqli_real_escape_string($connect, $_POST['tipo']);
    $filtro = mysqli_real_escape_string($connect, $_POST['filtro']);

    switch($filtro):
        case 1:
           $_SESSION['filtro'] ="";
           //header('location: Gallery.php');
           echo "caso1";
        break;
        case 2:
            echo "legal2";
            //header('location: Gallery.php');
            echo "legal";
         break;
         case 3:
            echo "legal2";
            //header('location: Gallery.php');
         break;
         case 4:
            echo "legal2";
            //header('location: Gallery.php');
         break;
         case 5:
            echo "legal2";
            //header('location: Gallery.php');
         break;
         case 6:
            echo "legal2";
            //header('location: Gallery.php');
         break;
         case 7:
            echo "legal2";
            //header('location: Gallery.php');
         break;
         case 8:
            echo "legal2";
            //header('location: Gallery.php');
         break;
         case 9:
            echo "legal2";
            //header('location: Gallery.php');
         break;
        default:
            echo "Ocorreu algum erro";        
        break;    
    endswitch;
    
    // Experimenting code
    if($tipocont == "imagem"):
        //echo "nao selecionou nenhum tipo de filtro";
        
    elseif($tipocont == "video"):
            
    elseif($tipocont == "audio"):   
           
    elseif($tipocont == "audio"):  
           
    endif;
endif;    

?>