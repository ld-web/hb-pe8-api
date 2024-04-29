<?php

$dsn = "mysql:host=127.0.0.1;port=3640;dbname=hb_api_pe8_users;charset=utf8mb4";
$user = "root";
$password = "mysqltests";

$pdo = new PDO($dsn, $user, $password);

$stmt = $pdo->prepare("SELECT * FROM users WHERE id=:id");
$stmt->execute([
    'id' => $_GET['id']
]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Définition du type de contenu : application/json
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Origin: http://localhost:5500');

if ($user === false) {
    http_response_code(404);
    echo json_encode(["message" => "Utilisateur non trouvé"]);
} else {
    echo json_encode($user);
}
