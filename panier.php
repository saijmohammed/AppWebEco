<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylespanier.css">
    <title>Panier</title>
</head>

<body>
    <?php
    session_start();
    require_once('connection.php');



    $currentUserId = 1; // Exemple d'ID utilisateur - à adapter
    $query = "SELECT products.id, products.product_name, products.price, products.product_image, panier.quantity
              FROM products
              JOIN panier ON products.id = panier.product_id
              WHERE panier.user_id = $currentUserId";

    $result = mysqli_query($conn, $query);

    $totalAmount = 0;

    if ($result && mysqli_num_rows($result) > 0) {
        echo '<table>';
        echo '<tr>';
        echo '<th>Numéro du produit</th>';
        echo '<th>Photo</th>';
        echo '<th>Nom</th>';
        echo '<th>Quantité</th>';
        echo '<th>Prix</th>';
        echo '<th>Action</th>';
        echo '</tr>';

        $productNumber = 1;

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $productNumber . '</td>';
            echo '<td><img class="imgpanier" src="' . htmlspecialchars($row['product_image']) . '" alt="' . htmlspecialchars($row['product_name']) . '" /></td>';
            echo '<td>' . $row['product_name'] . '</td>';
            echo '<td>';
            echo '<form method="post" action="panier.php">';
            echo '<input type="number" min="1" name="new_quantity" value="' . $row['quantity'] . '">';
            echo '<input type="hidden" name="update_quantity" value="' . $row['id'] . '">';
            echo '<input type="submit" value="Mettre à jour quantite">';
            echo '</form>';
            echo '</td>';
            echo '<td>' . $row['price'] * $row['quantity'] . ' $</td>';
            echo '<td>';
            echo '<form method="post" action="panier.php">';
            echo '<input  type="hidden" name="remove_product" value="' . $row['id'] . '">';
            echo '<input class="btnremove" type="submit" value="X">';
            echo '</form>';
            echo '</td>';
            echo '</tr>';

            $productNumber++;
            $totalAmount += $row['price'] * $row['quantity'];
        }
        echo '</table>';
        echo '<p class="total-amount">Montant total: ' . $totalAmount . ' $</p>';
        echo '<button class="gopayment" ><a href="payment.php">Aller au paiement</a></button>';
    } else {
        echo '<div class="Noproduct">';
        echo '<img src="https://ae01.alicdn.com/kf/Sa15be314eadd4a9bb186ab4a0cb971b5D/360x360.png_.webp" class="es--comet-pro-fallback-image--35CZGig" data-spm-anchor-id="a2g0o.cart.0.i3.3244378d1lo9Se"/>';
        echo '<p class="no-product-message">Pas encore d\'articles ? Continuez vos achats pour en savoir plus.</p>';
        echo '</div>';
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Suppression d'un produit du panier
        if (isset($_POST['remove_product'])) {
            $productId = $_POST['remove_product'];
            $currentUserId = 1; // Exemple d'ID utilisateur - à adapter

            $query = "DELETE FROM panier WHERE user_id = $currentUserId AND product_id = $productId";
            $result = mysqli_query($conn, $query);

            if ($result) {
                header("Location: panier.php");
                exit();
            } else {
                echo 'Erreur lors de la suppression du produit du panier';
            }
        }

        // Modification de la quantité d'un produit dans le panier
        if (isset($_POST['update_quantity'])) {
            $productId = $_POST['update_quantity'];
            $newQuantity = $_POST['new_quantity'];

            $updateQuery = "UPDATE panier SET quantity = $newQuantity WHERE product_id = $productId";
            $updateResult = mysqli_query($conn, $updateQuery);

            if ($updateResult) {
                header("Location: panier.php");
                exit();
            } else {
                echo 'Erreur lors de la mise à jour de la quantité.';
            }
        }
    }
    ?>
    <button class="btnback"><a href="produit1.php">Retour aux produits</a></button>
</body>

</html>