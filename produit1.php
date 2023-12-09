    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="stye eco.css">
        <link rel="stylesheet" href="product.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
        <title>ShoppingPlanet</title>
    </head>

    <body>
        <header>
            <div class="compte">
                <a><i class="fas fa-user"></i></a>
            </div>
            <div class="logo">
                <h1><a href="home.php">ShoppingPlanet</a></h1>
            </div>
            <div class="search-box">
                <form method="GET" action="produit1.php">
                    <input type="search" id="search" name="search" placeholder="Rechercher des produits" />
                    <button id="submitsearch" type="submit" class="button" name="search">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
            <nav>
                <ul>
                    <li>
                        <a href="home.php"><i class="fas fa-home"></i> Accueil</a>
                    </li>
                    <li>
                        <a href="produit1.php"><i class="fas fa-shopping-bag"></i> Produits</a>
                        <ul class="submenu">
                            <li><a href="#section1">Claviers</a></li>
                            <hr>
                            <li><a href="#section2">Écouteurs</a></li>
                            <hr>
                            <li><a href="#section3">Souris</a></li>
                            <!-- Ajoutez autant d'options que nécessaire -->
                        </ul>
                    </li>
                    <li>
                        <a href="panier.php"><i class="fas fa-shopping-cart"></i> Mon Panier</a>
                        <span id="nombreProduitsPanier" class="cart-item-count"></span>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-info-circle"></i> À Propos</a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-sign-in-alt"></i> Connexion</a>
                    </li>

                </ul>
            </nav>
        </header>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
    </body>

    <section id="section1">
        <h2 class="h2section">Claviers</h2>
        <?php
        session_start();
        // Inclure votre fichier de connexion à la base de données
        require_once('connection.php');


        $id = 1;
        // Récupérer les produits depuis la base de données
        $query = "SELECT * FROM products WHERE categories = 'Keyboards'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo '<div class="product">';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="product-details">';
                echo '<div class="image-container">';
                echo '<img class="product-image" src="' . htmlspecialchars($row['product_image']) . '" alt="' . htmlspecialchars($row['product_name']) . '" />';
                echo '</div>';
                echo '<h4>' . htmlspecialchars($row['product_name']) . '</h4>';
                echo '<p class="price">Prix: ' . htmlspecialchars($row['price']) . ' $</p>';
                echo '<p>Quantité: ' . htmlspecialchars($row['quantitate']) . '</p>';
                echo '<div class="button-container">';
                echo '<form method="post" class="inline-form">';
                echo '<input type="hidden" name="product_id" value="' . $row['id'] . '">';
                echo '<button class="addpanier" type="submit" name="add_to_cart" data-product-id="' . $row['id'] . '">Ajouter au Panier</button>';
                echo '</form>';
                echo '<button class="affdetails"><a class="stretched-link" href="details.php?id=' . $id . '">Voir les détails</a></button>';
                echo '</div>';
                echo '</div>';
                $id++;
            }
            echo '</div>';
        }
        ?>
    </section>


    <section id="section2">
        <h2 class="h2section">Écouteurs</h2>
        <?php

        // Récupérer les produits depuis la base de données
        $query = "SELECT * FROM products WHERE categories = 'headphones'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo '<div class="product">';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="product-details">';
                echo '<div class="image-container">';
                echo '<img class="product-image" src="' . htmlspecialchars($row['product_image']) . '" alt="' . htmlspecialchars($row['product_name']) . '" />';
                echo '</div>';
                echo '<h4>' . htmlspecialchars($row['product_name']) . '</h4>';
                echo '<p class="price">Prix: ' . htmlspecialchars($row['price']) . ' $</p>';
                echo '<p>Quantité: ' . htmlspecialchars($row['quantitate']) . '</p>';
                echo '<div class="button-container">';
                echo '<form method="post">';
                echo '<input type="hidden" name="product_id" value="' . $row['id'] . '">';
                echo '<button class="addpanier" type="submit" name="add_to_cart" data-product-id="' . $row['id'] . '">Ajouter au Panier</button>';
                echo '</form>';
                echo '<button class="affdetails"><a href="details.php?id=' . $id . '">Voir les détails</a></button>        ';
                echo '</div>';
                echo '</div>';
                $id++;
            }
            echo '</div>';
        }

        ?>
    </section>


    <section id="section3">
        <h2 class="h2section">Souris</h2>
        <?php

        // Récupérer les produits depuis la base de données
        $query = "SELECT * FROM products WHERE categories = 'mouses'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo '<div class="product">';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="product-details">';
                echo '<div class="image-container">';
                echo '<img class="product-image" src="' . htmlspecialchars($row['product_image']) . '" alt="' . htmlspecialchars($row['product_name']) . '" />';
                echo '</div>';
                echo '<h4>' . htmlspecialchars($row['product_name']) . '</h4>';
                echo '<p class="price">Prix: ' . htmlspecialchars($row['price']) . ' $</p>';
                echo '<p id="errorMessage" class="quantity">Quantité: ' . htmlspecialchars($row['quantitate']) . '</p>';
                echo '<div class="button-container">';
                echo '<form method="post">';
                echo '<input type="hidden" name="product_id" value="' . $row['id'] . '">';
                echo '<button class="addpanier" type="submit" name="add_to_cart" data-product-id="' . $row['id'] . '">Ajouter au Panier</button>';
                echo '</form>';
                echo '<button class="affdetails"><a href="details.php?id=' . $id . '">Voir les détails</a></button>        ';
                echo '</div>';
                echo '</div>';
                $id++;
            }
            echo '</div>';
        }



        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
            $currentUserId = 1; // Exemple d'ID utilisateur - à adapter
            $productId = $_POST['product_id'];

            // Vérifier si le produit existe déjà dans le panier de l'utilisateur actuel
            $query = "SELECT * FROM panier WHERE product_id = $productId AND user_id = $currentUserId";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                // Si le produit existe déjà dans le panier, mettez à jour la quantité
                $row = mysqli_fetch_assoc($result);
                $quantity = $row['quantity']; // Récupérer la quantité actuelle du produit dans le panier

                // Récupérer la quantité disponible du produit dans la table products
                $queryProduct = "SELECT quantitate FROM products WHERE id = $productId";
                $resultProduct = mysqli_query($conn, $queryProduct);

                if ($resultProduct && mysqli_num_rows($resultProduct) > 0) {
                    $rowProduct = mysqli_fetch_assoc($resultProduct);
                    $availableQuantity = $rowProduct['quantitate']; // Récupérer la quantité disponible du produit

                    if ($quantity < $availableQuantity) {
                        // Augmenter la quantité du produit dans le panier
                        $newQuantity = $quantity + 1;
                        $updateQuery = "UPDATE panier SET quantity = $newQuantity WHERE product_id = $productId AND user_id = $currentUserId";
                        $updateResult = mysqli_query($conn, $updateQuery);

                        if ($updateResult) {
                            echo 'La quantité du produit a été mise à jour dans le panier avec succès';
                        } else {
                            echo 'Erreur lors de la mise à jour de la quantité dans le panier';
                        }
                    } else {
                        // Si la quantité maximale en stock est atteinte, afficher un message d'erreur via JavaScript
                        echo '<script>';
                        echo 'document.addEventListener(\'DOMContentLoaded\', function() {';
                        echo '    var button = document.querySelector(\'.addpanier[data-product-id="' . $productId . '"]\');';
                        echo '    button.style.color = \'red\';';
                        echo '    button.innerText  = \'Maximum quantity\';';
                        echo '    button.disabled = true;'; // Désactiver le bouton
                        echo '});';
                        echo '</script>';
                    }
                } else {
                    //gestion d'erreur 
                }
            } else {
                // Si le produit n'existe pas dans le panier, l'ajouter au panier avec une quantité initiale
                $selectedQuantity = 1; // Par défaut, ajoutez une seule unité - vous pouvez adapter cela selon votre logique
                $insertQuery = "INSERT INTO panier (user_id, product_id, quantity) VALUES ($currentUserId, $productId, $selectedQuantity)";
                $insertResult = mysqli_query($conn, $insertQuery);
            }
        } else {
            //gestion d'erreur 
        }


        // obtenir_nombre_produits_panier.php

        $currentUserId = 1; // Exemple d'ID utilisateur - à adapter

        $query = "SELECT SUM(quantity) AS total_items FROM panier WHERE user_id = $currentUserId";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $totalItems = $row['total_items']; // Nombre total d'articles dans le panier
        } else {
            $totalItems = 0;
        }


        ?>

    </section>

    </html><!-- La page affiche les produits avec un bouton "Ajouter au panier" pour chaque produit -->

    <script>
        // JavaScript ici pour utiliser le résultat PHP, par exemple :
        var itemCount = <?php echo $totalItems; ?>;
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('nombreProduitsPanier').innerText = itemCount;
        });


        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search');
            const productSections = document.querySelectorAll('.product');

            searchInput.addEventListener('input', function(event) {
                const searchText = event.target.value.toLowerCase();

                productSections.forEach(function(section) {
                    const products = section.querySelectorAll('.product-details');

                    products.forEach(function(product) {
                        const productName = product.querySelector('h4').innerText.toLowerCase();
                        const displayStyle = productName.includes(searchText) ? 'block' : 'none';

                        product.style.display = displayStyle;
                    });
                });
            });
        });
    </script>