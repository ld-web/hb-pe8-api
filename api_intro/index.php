<?php

// Par exemple /users
$uri = $_SERVER['REQUEST_URI'];
// Par exemple POST
$httpMethod = $_SERVER['REQUEST_METHOD'];

if ($uri === '/users' && $httpMethod === 'POST') {
    // Création d'un utilisateur
}