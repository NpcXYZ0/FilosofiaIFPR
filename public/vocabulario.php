<?php
require 'config.php';

session_start();

$stmt = $pdo->query("SELECT word, description FROM words");
$words = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="css/baseStyle.css" />
  <link rel="stylesheet" href="css/vocabularioStyle.css" />
</head>

<body>
  <header>
    <nav class="navigation">
      <ul>
        <li><a href="index.php" style="text-decoration: none">Início</a></li>
        <li>
          <a style="text-decoration: underline overline #6e6e6e">Vocabulário</a>
        </li>
        <li>
          <a href="informacoes.php" style="text-decoration: none">Informações</a>
        </li>
        <?php
        if (isset($_SESSION['username'])) {
          echo '
                    <li><a href="dashboard.php" style="text-decoration: none;">Dashboard</a></li>
                    ';
        }
        ?>
      </ul>
    </nav>
  </header>
  <main>
    <h1>Vocabulário</h1>

    <ul class="conteinerWords">
      <?php foreach ($words as $word): ?>
        <li class="<?= htmlspecialchars($word['word']) ?>">
          <p class="name"><?= htmlspecialchars($word['word']) ?></p>
          <p class="desc">
            <?= htmlspecialchars($word['description']) ?>
          </p>
        </li>
      <?php endforeach; ?>
    </ul>
  </main>

  <script>
    document.querySelectorAll(".conteinerWords").forEach((container) => {
      container.querySelectorAll("li").forEach((li) => {
        li.addEventListener("click", (e) => {
          if (e.target == li || e.target == li.querySelector(".name")) {
            if (!li.querySelector(".desc").classList.contains("descOpen")) {
              li.querySelector(".desc").classList.add("descOpen");
            } else {
              li.querySelector(".desc").classList.remove("descOpen");
            }
          }
        });
      });
    });
  </script>
</body>

</html>