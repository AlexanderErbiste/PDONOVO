<?php
include('database.php');

$sql = "Select * from tb_usuario";

 $stmt = $con->prepare($sql);
  $resultado = $stmt->execute();
  $resultado->fetchAll();


?>