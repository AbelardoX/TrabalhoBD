<!DOCTYPE html> <!--verificado!-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href = "css/login1.css"/> <!--chama o aqruivo de formatação em css que esta na mesma pasta do HTML -->
    
</head>
<body>
    

<div class="row  login_linha">
        <div class="col bg-dark">
        <a href="./home.php"><img src="../PHP/img/png-transparent-computer-icons-house-house-angle-text-orange.png" alt="" width="40px"></i> </a>
        <br><br>
        <h1>ENTRAR</h1>

        <form action="testeLogin.php" method = "POST">
        <input type="text" name="email" placeholder="Email">
        <br><br>
        <input type="password" name="senha" placeholder="password">
        <br><br>
        <input class="enviar" type="submit" name="submit" value="Enviar"> 
        </div>
        </div>
</body> 
</html>