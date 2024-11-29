<?php
session_start();
if ($_SESSION['usuario_tipo'] != 'admin') {
    header('Location: login.php');
    exit();
}
include('../config/db.php');

$stmt = $pdo->prepare("SELECT * FROM noticias WHERE aprovado = 'nao'");
$stmt->execute();
$noticias = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Administração - Aprovar Notícias</title>
</head>
<body>
    <h1>Aprovar Notícias</h1>
    <table>
        <tr>
            <th>Título</th>
            <th>Data de Criação</th>
            <th>Aprovar</th>
        </tr>
        <?php foreach ($noticias as $noticia): ?>
            <tr>
                <td><?= htmlspecialchars($noticia['titulo']) ?></td>
                <td><?= $noticia['data_criacao'] ?></td>
                <td>
                    <form action="actions/aprovar_noticia.php" method="POST">
                        <input type="hidden" name="id" value="<?= $noticia['id'] ?>">
                        <button type="submit">Aprovar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
