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
    // Inclure votre fichier de connexion à la base de données
    require_once('connection.php');

    // Sélectionner les produits dans le panier de l'utilisateur actuel
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
        echo '</tr>';

        $productNumber = 1; // Initialisation du numéro du produit

        // ... (votre code existant)

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            // Numéro du produit
            echo '<td>' . $productNumber . '</td>';
            // Photo du produit
            echo '<td><img class="imgpanier" src="' . htmlspecialchars($row['product_image']) . '" alt="' . htmlspecialchars($row['product_name']) . '" /></td>';
            // Nom du produit
            echo '<td>' . $row['product_name'] . '</td>';
            // Quantité du produit
            echo '<td>';
            echo '<input type="number" min="1" id="quantity_' . $row['id'] . '" value="' . $row['quantity'] . '">';
            echo '<button onclick="updateQuantity(' . $row['id'] . ')">Mise à jour de la quantité</button>';
            echo '</td>';
            // Prix du produit
            echo '<td>' . $row['price'] * $row['quantity'] . ' $</td>';
            // Bouton pour supprimer le produit du panier
            echo '<td><button class="btnremove" onclick="removeFromCart(' . $row['id'] . ')">X</button></td>';
            echo '</tr>';

            $productNumber++; // Incrémenter le numéro du produit
            // Calcul du montant pour ce produit et ajout au total
            $productPrice = $row['price'];
            $productQuantity = $row['quantity'];
            $productTotal = $productPrice * $productQuantity;
            $totalAmount += $productTotal;
        }
        echo '</table>';
        echo '<button class="btnback" ><a href="produit1.php">Retour aux produits</a></button>';
    } else {
        echo '<div class="Noproduct">';
        echo '<img src="https://ae01.alicdn.com/kf/Sa15be314eadd4a9bb186ab4a0cb971b5D/360x360.png_.webp" class="es--comet-pro-fallback-image--35CZGig" data-spm-anchor-id="a2g0o.cart.0.i3.3244378d1lo9Se"/>';
        echo '<p class="no-product-message">Pas encore d\'articles ? Continuez vos achats pour en savoir plus.</p>';
        echo '<button class="btnback" ><a href="produit1.php">Retour aux produits</a></button>';
        echo '</div>';
    }
    echo '<p class="total-amount">Montant total: ' . $totalAmount . ' $</p>';
    echo '<button class="gopayment" ><a href="payment.php">Aller au paiement</a></button>';
    ?>

    <script>
        // Script pour supprimer du panier via AJAX
        function removeFromCart(productId) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'supprimer_du_panier.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    location.reload(); // Recharger la page après suppression réussie
                }
            };
            xhr.send('product_id=' + productId);
        }


        function updateQuantity(productId) {
            var newQuantity = document.getElementById('quantity_' + productId).value;

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'modifier_quantite.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    location.reload(); // Recharger la page après mise à jour réussie
                }
            };
            xhr.send('product_id=' + productId + '&new_quantity=' + newQuantity);
        }

        // Vos scripts JavaScript restent les mêmes
    </script>
</body>

</html>