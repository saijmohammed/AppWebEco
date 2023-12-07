<?php
// Inclure votre fichier de connexion à la base de données
require_once('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    // Récupérer l'ID du produit à ajouter au panier depuis la requête POST
    $productId = $_POST['product_id'];

    // Ajouter le produit au panier de l'utilisateur actuel (supposons que $currentUserId contient l'ID de l'utilisateur)
    $currentUserId = 1; // Exemple d'ID utilisateur - à adapter
    $selectedQuantity = 1; // Par défaut, ajoutez une seule unité - vous pouvez adapter cela selon votre logique

    $query = "INSERT INTO panier (user_id, product_id, quantity) VALUES ($currentUserId, $productId, $selectedQuantity)";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script>updateCartItemCount();</script>';
        echo 'Le produit a été ajouté au panier avec succès';
        // Vous pouvez retourner une réponse JSON ou un message de succès si nécessaire
        echo json_encode(array('success' => true, 'message' => 'Produit ajouté au panier'));
    } else {
        echo 'Il y a eu une erreur lors de l ajout du produit au panier';
        // Retourner une réponse d'erreur si nécessaire
        echo json_encode(array('success' => false, 'message' => 'Erreur lors de l\'ajout du produit au panier'));
    }
} else {
    // La requête n'est pas de type POST ou l'ID du produit n'a pas été fourni
    // Retourner une réponse d'erreur si nécessaire
    echo json_encode(array('success' => false, 'message' => 'Requête invalide'));
}

header("Location: produit1.php");
exit();
