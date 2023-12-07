<?php
// Inclure votre fichier de connexion à la base de données
require_once('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    // Récupérer l'ID du produit à supprimer du panier depuis la requête POST
    $productId = $_POST['product_id'];

    // Supprimer le produit du panier de l'utilisateur actuel (supposons que $currentUserId contient l'ID de l'utilisateur)
    $currentUserId = 1; // Exemple d'ID utilisateur - à adapter

    $query = "DELETE FROM panier WHERE user_id = $currentUserId AND product_id = $productId";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Le produit a été supprimé du panier avec succès
        // Vous pouvez retourner une réponse JSON ou un message de succès si nécessaire
        echo json_encode(array('success' => true, 'message' => 'Produit supprimé du panier'));
    } else {
        // Il y a eu une erreur lors de la suppression du produit du panier
        // Retourner une réponse d'erreur si nécessaire
        echo json_encode(array('success' => false, 'message' => 'Erreur lors de la suppression du produit du panier'));
    }
} else {
    // La requête n'est pas de type POST ou l'ID du produit n'a pas été fourni
    // Retourner une réponse d'erreur si nécessaire
    echo json_encode(array('success' => false, 'message' => 'Requête invalide'));
}

