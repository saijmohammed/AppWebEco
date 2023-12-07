<?php
require_once('connection.php');

$currentUserId = 1; // Exemple d'ID utilisateur - à adapter

$query = "SELECT SUM(quantity) AS total_items FROM panier WHERE user_id = $currentUserId";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totalItems = $row['total_items']; // Nombre total d'articles dans le panier
    echo $totalItems; // Renvoyer le nombre total d'articles dans la réponse
} else {
    $totalItems = 0;
    echo $totalItems; // Renvoyer un nombre par défaut en cas d'erreur
}
?>
