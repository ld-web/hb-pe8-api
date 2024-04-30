<?php

// $_POST = données de formulaire (form-data)
// var_dump($_POST);

// Nos données n'arrivent plus d'un formulaire
// Mais au format JSON, dans le corps de la requête
// Je peux récupérer le contenu de ce corps avec le flux
// php://input
$rawData = file_get_contents("php://input");
// Puis je le décode pour en faire un tableau associatif
$data = json_decode($rawData, true);

// Définition du type de contenu : application/json
header('Content-Type: application/json; charset=UTF-8');

// 1 - Valider les données, si invalide alors code 400
if (
    !isset($data['name']) ||
    !isset($data['firstname']) ||
    !isset($data['birth_date']) ||
    !isset($data['email'])
) {
    http_response_code(400);
    echo json_encode(['message' => 'Tous les champs sont obligatoires (name, firstname, birth_date, email)']);
    exit;
}

// 2 - Connexion PDO, et insertion des données
$dsn = "mysql:host=127.0.0.1;port=3640;dbname=hb_api_pe8_users;charset=utf8mb4";
$user = "root";
$password = "mysqltests";

$pdo = new PDO($dsn, $user, $password);

$stmt = $pdo->prepare("INSERT INTO users (name, firstname, birth_date, email) VALUES (:name, :fname, :bdate, :email)");
$res = $stmt->execute([
    'name' => $data['name'],
    'fname' => $data['firstname'],
    'bdate' => $data['birth_date'],
    'email' => $data['email'],
]);

// 2bis - Erreur : code 500
if ($res === false) {
    http_response_code(500);
    echo json_encode(['message' => 'une erreur est survenue lors de l\'insertion dans la base de données']);
    exit;
}

// 2ter - Succès : code 201 Created
http_response_code(201);
$userId = $pdo->lastInsertId();
echo json_encode([
    'uri' => '/users/' . $userId
]);