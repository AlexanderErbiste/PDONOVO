<?php
require 'database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM registros WHERE id = :id");
    $stmt->execute([':id' => $id]);
}

header("Location: form.php");
exit();
