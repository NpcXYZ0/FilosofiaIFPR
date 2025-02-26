<?php
session_start();
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
                <li><a style="text-decoration: underline overline #6e6e6e;">Início</a></li>
                <li><a href="vocabulario.php" style="text-decoration: none;">Vocabulário</a></li>
                <li><a href="informacoes.php" style="text-decoration: none;">Informações</a></li>
                <?php
                if(isset($_SESSION['username'])){
                    echo '
                    <li><a href="dashboard.php" style="text-decoration: none;">Dashboard</a></li>
                    ';
                }
                ?>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Início</h1>
    </main>
</body>
</html>