<html>
  <body>
      <?php
          session_start();
          include_once('config.php');
          #$id = $_POST["id"];
          # Buscar o ID do usuário atual e tentar resolver, comparar com o nome da república e trazer o ID para a variável
          $nome = $_POST["nome"];
          $rua = $_POST["rua"];
          $cep = $_POST["cep"];
          $cidade = $_POST["cidade"];
          $preço = $_POST["preço"];
          $genero = $_POST['genero'];  
          $idUsuario = $_SESSION['id'];

          if(isset($_FILES['arquivo'])){
        
            $extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensao do arquivo
            $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
            $diretorio = "img/fotos/"; //define o diretorio para onde enviaremos o arquivo
            move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome); //efetua o upload

            # Verificando se informações estão sendo passadas
            #printf("%s\n", $nome);
            #printf("%s\n", $novo_nome);
            #printf("ID do Usuário: %d\n", $idUsuario);
            #printf("Preço: %d\n", $preço);
            
          }

          #Verificar se REP já foi cadastrada
          $consultaREP = "SELECT republica FROM republica WHERE republica = '$nome'";
          $resultConsultaNome = mysqli_query($conexao, $consultaREP);

          if(($resultConsultaNome) AND ($resultConsultaNome->num_rows !=0)){
            $erro = true;
            
            
            $msg ['mesg']= " <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>Já existe uma república com esse nome!</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div> ";

            print_r($msg['mesg']);

          }

          if (!$erro){
            //  echo " sem erros";
            // print_r('<br>');
            // o submite envia os dados e ensere nas tabelas usando o 'INSERT INTO' 
            $sql = "insert into republica (id_rep, republica, imagem, endereço, cep, cidade, preço, genero) values ('$idUsuario','$nome','$novo_nome', '$rua', '$cep', '$cidade', '$preço', '$genero');";
            $result = mysqli_query($conexao, $sql);

            if($result == true){
              ?>
              <?php
              header('Location: home.php');
            }else{
              ?>
              <h1>Erro ao cadastrar!</h1>
              <?php
            }
        }
          ?>
  </body>

  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv='refresh' content='5;url=sistema.php' />
    <title>Cadastro de Vagas de república</title>  
    <link rel="stylesheet" href = "css/formulario.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"/>.

</head>
    <body>
      <p align="center" class="count"><h2>Você será redirecionado para o sistema em 5 segundos... <h2></p>
    </body>
</html>