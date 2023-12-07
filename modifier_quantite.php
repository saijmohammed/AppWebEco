<?php
require_once('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['product_id']) && isset($_POST['new_quantity'])) {
        $productId = $_POST['product_id'];
        $newQuantity = $_POST['new_quantity'];

        // Mettre à jour la quantité dans la base de données
        $updateQuery = "UPDATE panier SET quantity = $newQuantity WHERE product_id = $productId";
        $updateResult = mysqli_query($conn, $updateQuery);

        if ($updateResult) {
            // La mise à jour de la quantité a réussi
            echo 'Quantité mise à jour avec succès!';
        } else {
            // Erreur lors de la mise à jour de la quantité
            echo 'Erreur lors de la mise à jour de la quantité.';
        }
    } else {
        // Les données requises ne sont pas fournies
        echo 'Données manquantes pour la mise à jour de la quantité.';
    }
} else {
    // Méthode de requête incorrecte
    echo 'Requête non autorisée.';
}
?>
