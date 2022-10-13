<?php
   
    session_start();
    include_once ('config.php');

    $sql = "SELECT * from republica";
    $result = $conexao->query($sql);
    // Retornando o número de elementos na tabela
    $vagas = mysqli_num_rows($result);
    
    $sql = "SELECT * from usuario";
    $result = $conexao->query($sql);
    $usuarios = mysqli_num_rows($result);
    
    mysqli_close($conexao);

?>

<!DOCTYPE html>  
<html>
<head>
<title>Replive: Repúblicas com vagas para você</title>
<meta charset="utf-8">
<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
<meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no">

<style>

body {
  font-family: Arial, Helvetica, sans-serif;
  background-image: url('img/imagemfundo.png');
  background-repeat: no-repeat;
}

* {
  box-sizing: border-box;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 50%;
  padding: 0 70px;
}

.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 10px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 5px;
  text-align: center;
  background-color: transparent;
  color: white;
  border: 1px solid #FFFFFF;
  border-radius: 50px;
}

.fa {font-size:50px;}

.btn {
      font-size:25px;
      padding: 5px 10px;
      background: transparent;
      background-blend-mode: normal;
      color: #FFFFFF;
      border: 1px solid #FFFFFF;
      text-decoration: none;
      border-radius: 20px;
}

</style>
</head>
<body>
<p align = "center"/>
<img src="img/logo_w.png" width="30%"/>
</p>
<br><br>
<p align = "center"/><a href="home.php" class="btn">Buscar minha vaga</a></p>
</br></br>
<br><br><br><br>

<div class="row">
  <div class="column">
    <div class="card">
      <p><i class="fa fa-key"></i></p>
      <p><?php
      printf("Vagas disponíveis: %d\n", $vagas);
      ?></p>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <p><i class="fa fa-user"></i></p>
      <p><?php
      printf("Usuários cadastrados: %d\n", $usuarios);
      ?></p>
    </div>
  </div>
</div>


</body>
</html>