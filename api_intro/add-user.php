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
header('Access-Control-Allow-Origin: http://localhost:5500');
