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
      
        // Dados da tabela republica  
        $republica =$_POST['republica'];
        $imagem = $_FILES["imagem"];

       // echo " ERRoo";
       // print_r($_POST['nome']);
    
    $erro = false;  

   # $result_user = "SELECT id FROM usuario WHERE email = '$email'"; //faz uma consulta pegando o emial para ser cadastrado e verificando se ja possui no BD
   # $resultado_user = mysqli_query($conexao, $result_user );

    
    if (!$erro){
        //  echo " sem erros";
        // print_r('<br>');
        // o submite envia os dados e ensere nas tabelas usando o 'INSERT INTO' 
    
        $result = mysqli_query($conexao,"INSERT INTO republica (republica) VALUES('$republica', '$imagem')");
            
        header('Location: login.php');

}
    $msg = false;

  if(isset($_FILES['arquivo'])){

    $extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensao do arquivo
    $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
    $diretorio = "img/fotos"; //define o diretorio para onde enviaremos o arquivo

    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome); //efetua o upload

    $sql_code = "INSERT INTO republica (imagem) VALUES('$novo_nome', NOW())";

    if($mysqli->query($sql_code))
      $msg = "Arquivo enviado com sucesso!";
    else
      $msg = "Falha ao enviar arquivo.";

  }
 
}   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Rep</title>  
    <link rel="stylesheet" href = "css/formulario.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"/>.

</head>
<body>
    <div class = "box">
        <form action = "formulario.php" method = "POST">
            <fieldset>
                <legend><b>Cadastro de repúblicas </b></legend>
                <br><br>
                <div class ="inputBox">
                    <input type = "text" name= "republica" id="republica" class = "inputUser" required>
                    <label for="republica" class = "labelInput" > Republica</label> 
                </div>
                <br>
                <br>
                <?php if(isset($msg) && $msg != false) echo "<p> $msg </p>"; ?>
                <form action="formulario.php" method="POST" enctype="multipart/form-data">
                 Arquivo: <input type="file" required name="arquivo">
		<br/>
                <br><br>             
                
                <input type="submit" name = "submit" id="submit">   
            </fieldset>
        </form>         
    </div>         
    
    <script src="forms.js"></script>
</body>
</html>



