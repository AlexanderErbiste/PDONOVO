<?php
    //vincular o arquivo conexao
include('database.php');

    //GET
// var_dump($_GET);
$nome = $_GET["nome"];
$email = $_GET["email"];

    //variável que simula comando SQL
// $sqlInsert = "INSERT INTO TB_USUARIO( NOME_US, EMAIL_US) 
//                 VALUES(\"$nome\", '$email'); ";

// if ( $con->exec($sqlInsert)){
//     echo "INSERIDO!!!";
//     echo "<br>";
//     echo "id" . $con->lastInsertId();
// }else{
//     echo "ESTUDAR MAIS!!!";
// }

// if ( $con->query($sqlInsert)){
//     echo "INSERIDO!!!";
//     echo "<br>";
//     echo "id" . $con->lastInsertId();
// }else{
//     echo "ESTUDAR MAIS!!!";
// }

// -------------------------------

$sqlInsert = "INSERT INTO TB_USUARIO( NOME_US, EMAIL_US) 
        VALUES( ? , ? ); ";

        $stmt = $con->prepare($sqlInsert);
        $bool = $stmt->execute([$nome, $email]);
        if($bool){
            echo "INSERIDO!!!";
        }else{
            echo "ESTUDAR MAIS!!!";
        }

?>