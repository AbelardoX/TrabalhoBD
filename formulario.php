<?php

// testa os campos antes do envio ao BD
    if(isset($_POST['submit'])){
    /*
      print_r($_POST['nome']);
      print_r('<br>');
        print_r($_POST['email']);
        print_r('<br>');
        print_r($_POST['telefone']); 
        print_r('<br>');
        print_r($_POST['genero']); 
        print_r('<br>');
        
        print_r($_POST['republica']); 
        print_r('<br>');
       */
    
   include_once('config.php');
    
     // os dados deveram ser divididos em tabelas diferentes 
      //Dados da tabela usuario 
       
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        // Dados da tabela republica  
        $telefone = $_POST['telefone'];   

       // echo " ERRoo";
       // print_r($_POST['nome']);
    
    $erro = false;  

    $result_user = "SELECT id FROM usuario WHERE email = '$email'"; //faz uma consulta pegando o emial para ser cadastrado e verificando se ja possui no BD
    $resultado_user = mysqli_query($conexao, $result_user );
 
    if (($resultado_user) AND ( $resultado_user->num_rows !=0)){
        $erro = true;   
        //echo " ERRoo! email ja cadastradoo";  
        
        $msg ['mesg']= " <div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Este e-mail ja foi cadastrado para outro usuario!</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div> ";

        print_r($msg['mesg']);

    }
    
    if (!$erro){
        //  echo " sem erros";
        // print_r('<br>');
        // o submite envia os dados e ensere nas tabelas usando o 'INSERT INTO' 
        $result = mysqli_query($conexao,"INSERT INTO usuario (nome,email,senha,telefone) 
        VALUES('$nome','$email','$senha','$telefone')");
            
        header('Location: login.php');

    }
 
}   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre sua conta</title>  
    <link rel="stylesheet" href = "css/formulario1.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"/>.

</head>
<body>
    <div class = "box bg-dark">
        <form action = "formulario.php" method = "POST">
            <fieldset>
                <div class="container">
                <div class="row ">
                    <div class="col text-center">
                    <a href="./home.php"><img src="../PHP/img/png-transparent-computer-icons-house-house-angle-text-orange.png" alt="" width="40px"></i> </a>
                    </div>
                    </div>
              
            <br><br>
                <legend><b>Cadastro de usuário </b></legend>
                <br><br>
                <div class ="inputBox">
                    <input type = "text" name= "nome" id="nome" class = "inputUser" required>
                    <label for="nome" class = "labelInput" > Nome completo</label> 
                </div>
                <br><br>
                <div class ="inputBox">
                    <input type = "email" name= "email" id="email" class = "inputUser" required>
                    <label for="email" class = "labelInput" > e-mail</label> 
                </div>
                <br><br>
                <div class ="inputBox">
                    <input type = "password" name= "senha" id="senha" class = "inputUser" required>
                    <label for="senha" class = "labelInput" > Senha</label> 
                </div>
                <br><br>
                <div class ="inputBox">
                    <input type = "tel" name= "telefone" id="telefone" class = "inputUser" required>
                    <label for="telefone" class = "labelInput" > Telefone</label> 
                </div>
                <br><br>
                
                
                <input type="submit" name = "submit" id="submit">  
                </div> 
            </fieldset>
        </form>         
    </div>         
    
    <script src="forms.js"></script>
</body>
</html>



