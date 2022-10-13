<?php
   
    session_start();
    include_once ('config.php');

    if(!empty($_GET['search'])) // faz a busca se o campo for diferente de vazio
    {
        $data = $_GET['search']; // conferir se os atributos estão na tabela usuario
        $sql = "SELECT *
        FROM usuario AS usr
        INNER JOIN republica AS rep ON rep.id_rep = usr.id
        WHERE usr.nome LIKE '%$data%' OR rep.republica LIKE '%$data%' OR rep.endereço LIKE '%$data%' OR rep.preço LIKE '%$data%' OR usr.telefone LIKE '%$data%' OR rep.cidade LIKE '%$data%'";
        #$sql = "SELECT * From usuario WHERE nome LIKE '%$data%' OR telefone LIKE '%$data%' ORDER BY id ASC";
        #$sqlRep = "SELECT * From republica WHERE republica LIKE '%$data%' or endereço LIKE '%$data%' or cep LIKE '%$data%' or preço LIKE '%$data%' ORDER BY preço ASC"; 

        
    }
    else
    {
        $sql = "SELECT * 
        From usuario AS usr
        INNER JOIN republica AS rep ON rep.id_rep = usr.id
        ORDER BY id ASC";

        #$sqlRep = "SELECT * From republica ORDER BY preço ASC";
        
        // Lista na tela os cadastros contidos em usuario em ordem de preço
    // 
    } 
    $result = $conexao->query($sql);
    #$resultrep = $conexao->query($sqlRep);

?>
<!DOCTYPE html>  
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Home</title>
    <link rel="stylesheet" href = "css/sistema.css"/> <!--css erdado de sistema!-->
    <style>


</style>
  
</head>
<body>
    <!-- Bootstrap Navbar inicio !-->


    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container c_t d-normal justify-content-around">
        <div class="row ">
            <div class="col">
            <a class="home" href="./home.php"> <img src="./img/logo_w.png" alt="" width="150px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <!-- <span class="navbar-toggler-icon"></span> !-->
            </button>
            </div>
      <div class="col">
            <a href="./home.php"><img src="../PHP/img/png-transparent-computer-icons-house-house-angle-text-orange.png" alt="" width="40px"></i> </a>
            </div>
            <div class="col">
            <a href= "login.php" class ="btn btn-outline-info me-2">Entrar</a>
            <a href= "formulario.php" class ="btn btn-outline-info me-5">Cadastrar</a>
            </div>
            </div>
            
            </div>
        </div>
    </nav>
    <br>

 <!-- Bootstrap Navbar fim !-->
   
 <div class="infr">
    <div class="container container_logo bg-dark">
    <div class="row ">
            <div class="col">
            <img src="https://tecstudio.com.br/trabalhobd/img/logo_w.png"/>
             <h1 class="texto_procura"> Você pode procurar alguma das vagas listadas abaixo ou pesquisar por nome, preço ou localização.</h1>
        <br>
        <h1 class="texto_procura"> Se você faz parte de uma república, cadastre uma vaga disponível!</h1>
    </div>
    <br>
    <div class="box-search"> <!-- Bootstrap Pesquisar inicio !-->
        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
        <button onclick="searchData()" class="btn btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg>
        </button>
        </div>
            </div>
        </div>
    </div><!-- Bootstrap Pesquisar fim !-->

    <div class = "m-4">
       <table class="table text-white table-bg  table-bg bg-dark">
            <thead>
                <tr>
                <th scope="col">Logomarca</th>
                <th scope="col">Anfitrião</th>
                <th scope="col">República</th>
                <th scope="col">Rua</th>
                <th scope="col">CEP</th>
                <th scope="col">Cidade</th>                  
                <th scope="col">Telefone</th>
                <th scope="col">Gênero da vaga</th>
                <th scope="col">Preço quarto</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $cifrão = 'R$';
                    while(($user_data = mysqli_fetch_assoc($result))){
                        $idfoto = $user_data ['imagem'];
                        echo "<tr>";
                        echo "<td> <img width='50' height='50' src='img/fotos/" .  $user_data['imagem']  . ".'/>    </td>";
                        echo "<td>" .$user_data ['nome']."</td>";
                        echo "<td>" .$user_data ['republica']."</td>";
                        #echo "<td>" .$rep_data ['endereço']."</td>";
                        $endereço_google = $user_data ['endereço'];
                        echo "<td> <a target='_blank' href='https://www.google.com.br/maps/place/".$user_data['endereço']."/@-19.8394528,-43.2264868,12z/data=!3m1!4b1!4m5!3m4!1s0xa5074a4d4ea109:0x9d11749c0f294637!8m2!3d-19.8082073!4d-43.1735457'>$endereço_google</a>  </td>";
                        echo "<td>" .$user_data ['cep']."</td>";
                        echo "<td>" .$user_data ['cidade']."</td>";
                        echo "<td>" .$user_data ['telefone']."</td>";
                        echo "<td>" .$user_data ['genero']."</td>";
                        echo "<td>" .$cifrão .$user_data ['preço']."</td>";        
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>

<script>
    var  search= document.getElementById('pesquisar');
    
    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter"){
            searchData();
        }
    });

    function searchData(){
        window.location = 'home.php?search='+search.value;
    }                
</script>
</html>

