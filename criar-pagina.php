<?php
session_start();
if ($_SESSION['usuario_tipo'] != 'escritor') {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Criar Notícia</title>
</head>
<body>
    <h1>Criar Notícia</h1>
    <form action="actions/create_action.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="titulo" placeholder="Título da notícia" required>
        <textarea name="conteudo" placeholder="Conteúdo da notícia" required></textarea>
        <input type="file" name="imagem">
        <button type="submit">Publicar</button>
    </form>
</body>
</html>
