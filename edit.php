<?php
   if(!empty($_GET['id'])){ // pega o id da URL

        include_once('config.php');
        
        $id = $_GET['id'];  // pega o id da URL e armazena numa varivel 
       
        $sqlSelect = "SELECT * FROM usuario WHERE id=$id"; //faz a consulta no bd buscando o id coletado da URL
        
        $result = $conexao->query($sqlSelect);
        
        if ($result-> num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $nome = $user_data['nome'];
                $email = $user_data['email'];
                $senha = $user_data['senha'];
                $telefone = $user_data['telefone'];
                
            }
           
        }
        else{
            header('Location: sistema.php');
        }
    }
    else{
        header('Location: sistema.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario | GN</title>
    
    <link rel="stylesheet" href = "css/formulario1.css"/> <!--chama o aqruivo de formatação em css que esta na mesma pasta do HTML -->
</head>
<body>
    <div class = "box bg-dark">
        <form action = "saveEdit.php" method = "POST">
        <fieldset>
                <div class="container">
                <div class="row ">
                    <div class="col text-center">
                    <a href="./home.php"><img src="../PHP/img/png-transparent-computer-icons-house-house-angle-text-orange.png" alt="" width="40px"></i> </a>
                    </div>
                    </div>
              
            <br><br>
                <legend><b>Edição de usuário </b></legend>
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
    
</body>
</html> 