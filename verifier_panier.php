<?php
// Inclure votre fichier de connexion à la base de données
require_once('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];
    $currentUserId = 1; // Exemple d'ID utilisateur - à adapter

    // Vérifier si le produit existe déjà dans le panier de l'utilisateur actuel
    $query = "SELECT * FROM panier WHERE user_id = $currentUserId AND product_id = $productId";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $quantity = $row['quantity']; // Récupérer la quantité actuelle du produit dans le panier

        // Récupérer la quantité disponible du produit dans la table products
        $queryProduct = "SELECT quantitate FROM products WHERE id = $productId";
        $resultProduct = mysqli_query($conn, $queryProduct);

        if ($resultProduct && mysqli_num_rows($resultProduct) > 0) {
            $rowProduct = mysqli_fetch_assoc($resultProduct);
            $availableQuantity = $rowProduct['quantitate']; // Récupérer la quantité disponible du produit
            echo json_encode(array('exists' => true, 'quantity' => $quantity, 'availableQuantity' => $availableQuantity));
        } else {
            echo json_encode(array('exists' => false, 'message' => 'Quantité disponible non trouvée pour ce produit'));
        }
    } else {
        echo json_encode(array('exists' => false, 'message' => 'Produit non trouvé dans le panier'));
    }
} else {
    // Retourner une réponse d'erreur si nécessaire
    echo json_encode(array('error' => 'Requête invalide'));
}
