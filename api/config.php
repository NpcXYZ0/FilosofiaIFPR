<?php

$host = "db.fdfxfwknfofidjviicay.supabase.co";
$port = "5432";
$dbname = "postgres";
$user = "postgres";
$pass = "FilosofiaIFPR@123";

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}
?>
