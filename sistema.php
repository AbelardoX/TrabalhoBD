<?php
   
    session_start();
    include_once ('config.php');

    // Faz o loga e desloga na pg do sistema
    if ((!isset ($_SESSION['email'])==true) and (!isset ($_SESSION['senha']) == true)) {
        unset ($_SESSION['email']);
        unset ($_SESSION['senha']);
        header('Location: login.php');
    } 

    $logado = $_SESSION['email'];
    
    //verifica se o search não esta vazio
    if(!empty($_GET['search']))
    {
        $data = $_GET['search']; // conferir se os atributos estão na tabela usuario e republica
        $sql = "SELECT *
        FROM usuario AS usr
        INNER JOIN republica AS rep ON rep.id_rep = usr.id
        WHERE usr.nome LIKE '%$data%' OR rep.republica LIKE '%$data%' OR rep.endereço LIKE '%$data%' OR rep.preço LIKE '%$data%' OR usr.telefone LIKE '%$data%' OR rep.cidade LIKE '%$data%'";
        #$sql = "SELECT * From usuario WHERE id LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%' ORDER BY id DESC";
        #$sqlRep = "SELECT * From republica WHERE id_rep LIKE '%$data%' or republica LIKE '%$data%' or imagem LIKE '%$data%' ORDER BY id_rep DESC";  
    }
    else
    {

        $sql = "SELECT * 
        From usuario AS usr
        INNER JOIN republica AS rep ON rep.id_rep = usr.id
        ORDER BY id ASC";
        #$sql = "SELECT * From usuario ORDER BY id DESC";
        #$sqlRep = "SELECT * From republica ORDER BY id_rep DESC";
        // Lista na tela os cadastros contidos em usuario e republica
    // 
    }
    
    $result = $conexao->query($sql);
    #$resultrep = $conexao->query($sqlRep);

    #Capturando o ID do usuário
    $consultaSQL = "SELECT * From usuario where email = '$logado'";
    $resultID = $conexao->query($consultaSQL);
    $dados_usuario = mysqli_fetch_assoc($resultID);
    $_SESSION['id'] = $dados_usuario['id'];
    $idUser = $_SESSION['id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--O link do Bootstrap deverá permanecer aqui!-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Sistema</title>
    <link rel="stylesheet" href="css/sistema.css" />
    <link rel="stylesheet" href="css/btndelete.css">
    <!--chama o aqruivo de formatação em css do container de aviso do btn delete!-->
       
       <style>

        .body {
          background-image: url('img/imagemfundo.png');
          background-repeat: no-repeat;
        }
       
        /* Style the counter cards */
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            padding: 10px;
            margin: 0 auto;
            width: 1000px;
            text-align: center;
            background-color: transparent;
            color: white;
            border: 1px solid #FFFFFF;
            border-radius: 50px;
            display: flex;
        }

        .fa {
            font-size: 50px;
        }

        .btn {
            font-size: 25px;
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
            <a href="sair.php" class="btn btn-danger me-5">Sair</a>
            </div>
            
            </div>
        </div>
    </nav>
    <br>

  

        
    <?php
    echo "<h1>Bem vindo <u>$logado</u> com ID $idUser</h1>";
    //  echo "<h1>Bem vindo <u>$idLogado</u></h1>";
    ?>
    <br>

    <script src="forms.js"></script>

    
    <br><br>
    <div class="row ">
        <div class="card bg-dark">
            <form action="cadastrarrep.php" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <h1> Cadastre sua república</h1>
                   
                    </br></br>
                    <div class="container">
                        <div class="row">
                            <div class="col d-flex justify-content-end">
                                <p><label for="republica"> Nome da república: </label>
                                    <input class="input_redondo" type="text" name="nome"><br>
                            </div>
                            <div class="col d-flex justify-content-start">
                                <label for="republica"> Rua e número: </label>
                                <input class="input_rua" type="text" name="rua"><br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col d-flex justify-content-end">

                                <label for="republica"> CEP: </label>
                                <input class="input_redondo" type="text" name="cep"><br>
                            </div>
                            <div class="col d-flex justify-content-start ">
                                <label for="republica" class="colun_cidade"> Cidade: </label>
                                <input class="input_redondo" type="text" name="cidade"><br>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col coluna_preco">
                            <label for="republica"> Preço quarto: </label>
                            <input class="input_redondo" type="number" name="preço"></p><br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                        <p>Gênero da vaga:</p>
                    <input type="radio" name="genero" id="feminino" value="feminino" required>
                    <label for="feminino"> Feminino</label>
                    <br>
                    <input type="radio" name="genero" id="masculino" value="masculino" required>
                    <label for="masculino"> Masculino</label>
                    <br>
                    <input type="radio" name="genero" id="outro" value="outro" required>
                    <label for="outro"> Outro</label><br>
                    <br>
                        </div>
                    </div>


                    Anexe uma logo: <input type="file" required name="arquivo">
                    <br />
                    <br><br>
                    <input type="submit" name="submit" id="submit" class="btn">
                </fieldset>
            </form>
        </div>
    </div>

            <div class = "m-5">
            <table class="table text-white table-bg">
                    <thead>
                        <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Editar ou apagar</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                $rep_data = mysqli_fetch_assoc($result);
                                $NotRep = 'Sem república';
                                echo "<tr>";
                                echo "<td>" .$dados_usuario ['nome']."</td>";
                                echo "<td>" .$dados_usuario ['email']."</td>";
                                echo "<td>" .$dados_usuario ['telefone']."</td>";
                                
                                //<a class= 'btn btn-danger' href='id=$user_data[id]'>
                                if ($dados_usuario ['email'] == $logado){ //condiciona o usurio logado poder excluir ou editar apenas seu proprio registro
                                    echo "<td>                
                                    <a class= 'btn btn-primary' href='edit.php?id=$dados_usuario[id]'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                            <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                                        </svg>
                                    </a>
                                    <a class= 'btn btn-danger' href='delete.php?id=$dados_usuario[id]'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                            <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                        </svg>
                                    </a>
                                </td>";
                                echo "</tr>";
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
        window.location = 'sistema.php?search='+search.value;
    }                
</script>

<script src="script.js"></script> <!-- chama o arquivo de configuração de aviso do btn delete !-->
</html>