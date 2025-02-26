<?php
require 'config.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

$stmt = $pdo->query("SELECT word, description FROM words");
$words = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/baseStyle.css">
</head>

<body>
    <header>
        <nav class="navigation">
            <ul>
                <li><a href="index.php" style="text-decoration: none;">Início</a></li>
                <li><a href="vocabulario.php" style="text-decoration: none;">Vocabulário</a></li>
                <li><a href="informacoes.php" style="text-decoration: none;">Informações</a></li>
                <?php
                if (isset($_SESSION['username'])) {
                    echo '
                    <li><a style="text-decoration: underline overline #6e6e6e;">Dashboard</a></li>
                    ';
                }
                ?>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Dashboard</h1>

        <form action="newWord.php" method="post">
            <input type="text" name="word" id="word" placeholder="Palavra aqui" required>
            <input type="text" name="desc" id="desc" placeholder="Descrição aqui" required>

            <input type="submit">
        </form>

        <h1>Palavras cadastradas: </h1>
        <table>
            <tr>
                <th>Palavra</th>
                <th>Descrição</th>
            </tr>
            <?php foreach ($words as $word): ?>
                <tr>
                    <td><?= htmlspecialchars($word['word']) ?></td>
                    <td><?= htmlspecialchars($word['description']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </main>
</body>

</html>