<?php
require 'config.php';

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$word = $_POST['word'];
$desc = $_POST['desc'];

$verifyQuery = "SELECT * FROM words WHERE word = :word1";

$stmt1 = $pdo->prepare($verifyQuery);
$stmt1->bindParam(":word1", $word);
$stmt1->execute();

$result1 = $stmt1->fetch(PDO::FETCH_ASSOC);

if ($result1) {
    echo 'palavra ja cadastrada';
} else {
    $query = 'INSERT INTO words (word, description) VALUES (:word, :desc)';

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(':word', $word);
    $stmt->bindParam(':desc', $desc);
    $stmt->execute();
    
    echo 'palavra cadastrada';
}
