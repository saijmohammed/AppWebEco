<?php
// Inclure votre fichier de connexion à la base de données
require_once('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id']) && isset($_POST['new_quantity'])) {
    $productId = $_POST['product_id'];
    $newQuantity = intval($_POST['new_quantity']); // Convertir la nouvelle quantité en entier
    $currentUserId = 1; // Exemple d'ID utilisateur - à adapter

    // Mettre à jour la quantité du produit dans le panier
    $query = "UPDATE panier SET quantity = $newQuantity WHERE user_id = $currentUserId AND product_id = $productId";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Envoyer une réponse de succès si la mise à jour est réussie
        echo json_encode(array('success' => true));
    } else {
        // Envoyer une réponse d'erreur si nécessaire
        echo json_encode(array('success' => false, 'message' => 'Échec de la mise à jour de la quantité'));
    }
} else {
    // Retourner une réponse d'erreur si nécessaire
    echo json_encode(array('error' => 'Requête invalide'));
}
?>
