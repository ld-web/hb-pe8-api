<?php

function getUsers(): array
{
    // Création d'un handler
    $client = curl_init("https://jsonplaceholder.typicode.com/users");

    // Réponse en valeur de retour plutôt que directement à l'écran
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

    // Exécution de la requête
    $response = curl_exec($client);

    // Je ferme mon handler pour libérer toute ressource allouée pour la requête
    curl_close($client);

    // Affichage du contenu de la réponse
    return json_decode($response, true);
}
