<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylepayment.css">
    <title>Payment</title>
</head>

<body>
    <div class="container">
        <div class="column left">

            <?php
            require_once('connection.php');
            $currentUserId = 1; // Exemple d'ID utilisateur - à adapter
            $query = "SELECT products.id, products.product_name, products.price, products.description, products.product_image, products.quantitate, panier.quantity
          FROM products
          JOIN panier ON products.id = panier.product_id
          WHERE panier.user_id = $currentUserId";

            $result = mysqli_query($conn, $query);

            $totalAmount = 0;
            if ($result && mysqli_num_rows($result) > 0) {
                echo '<div class="divproduct1">';
                while ($row = mysqli_fetch_assoc($result)) {
                    // Affichage des détails du produit
                    echo '<div class="divproduct">';
                    echo '<div class="divpanier">';
                    echo '<h4>' . $row['product_name'] . '</h4>';
                    echo '<div class="image">';
                    echo '<img class="imgpanier" src="' . htmlspecialchars($row['product_image']) . '" alt="' . htmlspecialchars($row['product_name']) . '" />';
                    echo '</div>';
                    echo '<div class="product-details">';
                    echo '<p class="price" >Prix: ' . $row['price'] . ' $</p>';
                    echo '<p>Quantité: ' . $row['quantity'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    // Calcul du montant pour ce produit et ajout au total
                    $productPrice = $row['price'];
                    $productQuantity = $row['quantity'];
                    $productTotal = $productPrice * $productQuantity;
                    $totalAmount += $productTotal;
                }
                echo '</div>';
                echo '<button class="btnback" ><a href="panier.php">Back To Panier</a></button>';
                echo '<div class ="total-panier">';
                echo '<table class="total-panier-table">';
                echo '<tr>';
                echo '<th>SOUS-TOTAL</th>';
                echo '<td><h5 class="sous-total" >' . $totalAmount . ' MAD</h5> </td>';
                echo '</tr>';

                echo '<tr>';
                echo '<th>EXPÉDITION</th>';
                echo '<td><h5 class="expedition" > Livraison gratuite par tout au maroc !</h5></td>';
                echo '</tr>';

                echo '<tr>';
                echo '<th>TOTAL PANIER</th>';
                echo '<td><h5 class="sous-total" >' . $totalAmount . ' MAD</h5></td>';
                echo '</tr>';


                echo '</table>';
                echo '<button class="gopayment" ><a href="payment.php">Valider la commande</a></button>';
                echo '</div>';
            } else {
                echo '<div class="Noproduct">';
                echo '<img src="https://ae01.alicdn.com/kf/Sa15be314eadd4a9bb186ab4a0cb971b5D/360x360.png_.webp" class="es--comet-pro-fallback-image--35CZGig" data-spm-anchor-id="a2g0o.cart.0.i3.3244378d1lo9Se"/>';
                echo '<p class="no-product-message">Pas encore d\'articles ? Continuez vos achats pour en savoir plus.</p>';
                echo '<button class="btnback" ><a href="produit1.php">Retour aux produits</a></button>';
                echo '</div>';
            }
            ?>
        </div>
        <div class="column right">
            <h1>Adresse de livraison</h1>
            <h3>Nom de utilisateurs</h3>
            <p>Telephone : 066666666</p>
            <p>Adressse : aaaaaaaaaaaaaaaaaaaaaaaa</p>
            <img class="safe-info-img" src="photo/mouse1.jpg" style="width: 100px; height:auto;">
            <!-- Content for the right column -->
            <!-- Add your content here -->
        </div>
    </div>
</body>

</html>