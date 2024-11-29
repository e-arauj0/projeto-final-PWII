<?php
session_start();
include('../config/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];
    $id_usuario = $_SESSION['usuario_id'];

    // Verificar e fazer upload da imagem
    $imagem = null;
    if ($_FILES['imagem']['error'] == 0) {
        $imagem = 'uploads/' . basename($_FILES['imagem']['name']);
        move_uploaded_file($_FILES['imagem']['tmp_name'], "../assets/images/" . basename($_FILES['imagem']['name']));
    }

    // Inserir a notícia no banco de dados
    $stmt = $pdo->prepare("INSERT INTO noticias (titulo, conteudo, imagem, id_usuario) VALUES (:titulo, :conteudo, :imagem, :id_usuario)");
    $stmt->execute([
        'titulo' => $titulo,
        'conteudo' => $conteudo,
        'imagem' => $imagem,
        'id_usuario' => $id_usuario
    ]);

    header('Location: ../index.php');
    exit();
}
?>
