<?php
session_start();
if ($_SESSION['usuario_tipo'] != 'admin') {
    header('Location: login.php');
    exit();
}
include('../config/db.php');

if (isset($_POST['id'])) {
    $stmt = $pdo->prepare("UPDATE noticias SET aprovado = 'sim' WHERE id = :id");
    $stmt->execute(['id' => $_POST['id']]);

    header('Location: ../admin.php');
    exit();
}
?>
