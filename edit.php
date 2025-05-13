<?php
require 'database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $email = $_POST['email'];

        $sql = "UPDATE registros SET nome = :nome, email = :email WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':nome' => $nome, ':email' => $email, ':id' => $id]);

        header("Location: form.php");
        exit();
    }

    $stmt = $pdo->prepare("SELECT * FROM registros WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $registro = $stmt->fetch(PDO::FETCH_ASSOC);
}

if (!$registro) {
    echo "Registro não encontrado.";
    exit();
}
?>

<h2>Editar Registro</h2>
<form method="post">
    Nome: <input type="text" name="nome" value="<?= $registro['nome'] ?>" required><br><br>
    Email: <input type="email" name="email" value="<?= $registro['email'] ?>" required><br><br>
    <button type="submit">Salvar Alterações</button>
</form>
