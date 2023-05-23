<?php 

// Conecção
require_once 'db_connect.php';


// Sessão
session_start();

    if(isset($_POST['mandar'])):
        $erros = array();
        $login = mysqli_real_escape_string($connect, $_POST['login']);
        $senha = mysqli_real_escape_string($connect, $_POST['senha']);
    
        if(empty($login) or empty($senha)):
            $erros[] = "<li>O campo login e o campo senha não podem ficar vazios.</li>";
        else:
            $sql = "SELECT login FROM usuarios WHERE login = '$login'";
            $resultado = mysqli_query($connect, $sql);
    
            if(mysqli_num_rows($resultado) > 0):
                $sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
                $resultado = mysqli_query($connect, $sql);
                
                if(mysqli_num_rows($resultado) ==  1):
                   //echo "Login efectuado.<br>";  
                   $dados = mysqli_fetch_array($resultado);
                   $_SESSION['logado'] = true;
                   $_SESSION['id_usuario'] = $dados['id'];
                                 
                   if($dados['privilegios'] == 'admin'):
                       header('location: Gallery.php');
                   elseif($dados['privilegios'] == 'cgi'):
                       header('location: Gallery.html');     
                   elseif($dados['privilegios'] == 'user'):
                       header('location: Gallery.html');      
                   endif; 
                     
                else:
                    $erros[] =  "<li>O campo de campo de senha esta incorrecto.</li>";
                    echo "<script>alert('A senha introduzida esta incorrecta')
                    window.location = 'index.html';
                    </script>";
                endif;           
            else:
                echo "<script>alert('Utilizador inexistente no sistema')
                window.location = 'index.html';
                </script>";
            endif;
    
        endif;
            
    endif;    
    
    //mysqli_close($connect);
    
    ?>
