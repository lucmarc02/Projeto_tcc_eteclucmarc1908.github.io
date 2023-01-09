<?php
    
   



   /* FILTER_SANITIZE_STRING COMANDO PARA PROTEGER DO SQL INJETION , TRANSFORMANDO EM TEXTO */ 

   $descricao_medida     = filter_input(INPUT_POST, "descricao_medida", FILTER_SANITIZE_STRING);
   $abrev_medida     = filter_input(INPUT_POST, "abrev_medida", FILTER_SANITIZE_STRING);
  /*
   $endereco = filter_input(INPUT_POST, "endereco", FILTER_SANITIZE_STRING); 
   $cidade   = filter_input(INPUT_POST, "cidade", FILTER_SANITIZE_STRING); 
   $cep      = filter_input(INPUT_POST, "cep", FILTER_SANITIZE_STRING); 
   $cpf      = filter_input(INPUT_POST, "cpf", FILTER_SANITIZE_STRING); 
   $telefone = filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_STRING); 
   $email    = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL); 
*/

 require_once("../conexao/conexao.php"); // comando para abrir  a conexão com o  banco


try { // O que deve ser feito.

    $comandoSQL = $conexao->prepare("INSERT INTO c_medida (nome_med, abrev_medida)

        VALUES (:descricao_medida, :abrev_medida)");


    $comandoSQL->execute(array(

      ":descricao_medida"     => $descricao_medida,
      ":abrev_medida"         => $abrev_medida
     
    ));
    
       if($comandoSQL->rowCount() > 0)
       {
       
        echo "Os dados foram inseridos com sucesso!";

       }
       else
       {
     
        echo"Erro na inserção dos dados!!!";

       }
    } 

// retorno de mensagem de erro
catch (PDOException $erro) 
{
  echo $erro->getMessage();
}

$conexao = null; // comando para fechar a conexão aberta do banco.








     /* IMPRIMIR EM OUTRA PAGINA, E PODE USAR TAG'S HTML PRA FORMATAR O TEXTO QUE SERÁ IMPRESSO*/

 /*   echo "<h1>" .$_GET["nome"]. "</h1>";
    echo"<br>";
    echo $_GET["endereco"]; */

    
    /*Teste  de visualzar os dados na outra pagina
    echo $email;*/

