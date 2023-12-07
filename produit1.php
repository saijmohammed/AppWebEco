<body>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="stye eco.css" />
        <link rel="stylesheet" href="product.css">
        <link rel="icon " href="photo/casque1.jpg">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
        <title>ShoppingPlanet</title>
    </head>

    <body>
        <header>
            <div class="category-logo">
                <a href="#"><i class="fas fa-user"></i></a>
            </div>
            <div class="logo">
                <h1><a href="home.php">ShoppingPlanet</a></h1>
            </div>
            <div class="search-box">
                <form>
                    <input type="search" id="search" name="search" placeholder="Rechercher des produits" />
                    <button type="submit" class="button" name="search">
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
                            <hr>
                            <li><a href="#section1">Claviers</a></li>
                            <hr>
                            <li><a href="#section2">Écouteurs</a></li>
                            <hr>
                            <li><a href="#section3">Souris</a></li>
                            <hr>
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
                    <div class="compte">
                        <a><i class="fas fa-user"></i></a>
                    </div>
                </ul>
            </nav>
        </header>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
    </body>

    <section id="section1">
        <h2 class="h2section">Claviers</h2>
        <?php
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
                echo '<h4>Name product: ' . htmlspecialchars($row['product_name']) . '</h4>';
                echo '<p class="price">Prix: ' . htmlspecialchars($row['price']) . ' $</p>';
                echo '<p>Quantité: ' . htmlspecialchars($row['quantitate']) . '</p>';
                echo '<div class="button-container">';
                echo '<button class="addpanier" onclick="addToCart(' . htmlspecialchars($row['id']) . ')">Ajouter au Panier</button>';
                echo '<button class="affdetails"><a href="details.php?id=' . $id . '">Voir les détails</a></button>';
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
        // Inclure votre fichier de connexion à la base de données
        require_once('connection.php');

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
                echo '<h4>Name product: ' . htmlspecialchars($row['product_name']) . '</h4>';
                echo '<p class="price">Prix: ' . htmlspecialchars($row['price']) . ' $</p>';
                echo '<p>Quantité: ' . htmlspecialchars($row['quantitate']) . '</p>';
                echo '<div class="button-container">';
                echo '<button class="addpanier" onclick="addToCart(' . htmlspecialchars($row['id']) . ')">Ajouter au Panier</button>';
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
        // Inclure votre fichier de connexion à la base de données
        require_once('connection.php');

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
                echo '<h4>Name product: ' . htmlspecialchars($row['product_name']) . '</h4>';
                echo '<p class="price">Prix: ' . htmlspecialchars($row['price']) . ' $</p>';
                echo '<p>Quantité: ' . htmlspecialchars($row['quantitate']) . '</p>';
                echo '<div class="button-container">';
                echo '<button class="addpanier" onclick="addToCart(' . htmlspecialchars($row['id']) . ')">Ajouter au Panier</button>';
                echo '<button class="affdetails"><a href="details.php?id=' . $id . '">Voir les détails</a></button>        ';
                echo '</div>';
                echo '</div>';
                $id++;
            }
            echo '</div>';
        }


        ?>
    </section>

    </html><!-- La page affiche les produits avec un bouton "Ajouter au panier" pour chaque produit -->

    <script>
        function updateCartItemCount() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'obtenir_nombre_produits_panier.php', true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var itemCount = parseInt(xhr.responseText);
                        if (!isNaN(itemCount)) {
                            document.getElementById('nombreProduitsPanier').innerText = itemCount;
                            // Mettre à jour le contenu de l'élément HTML avec le nouveau nombre d'articles
                        } else {
                            console.log('Réponse non numérique');
                        }
                    } else {
                        console.log('Erreur de la requête');
                    }
                }
            };
            xhr.send();
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Appeler la fonction pour mettre à jour le nombre de produits au chargement de la page
            updateCartItemCount();
        });



        function addToCart(productId) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'verifier_panier.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.exists) {
                            var data = response.quantity;
                            updateQuantityInCart(productId, data);
                        } else {
                            addNewProductToCart(productId);
                        }
                    } else {
                        console.log('Erreur de la requête');
                    }
                }
            };
            xhr.send('product_id=' + productId);
        }

        function addNewProductToCart(productId) {
            // Code pour ajouter un nouveau produit au panier
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'ajouter_panier.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Mettre à jour l'interface utilisateur si nécessaire
                        updateCartItemCount(); // Mettre à jour le nombre de produits dans le panier
                    } else {
                        console.log('Erreur lors de l\'ajout au panier');
                    }
                }
            };
            xhr.send('product_id=' + productId);
        }

        function updateQuantityInCart(productId, currentQuantity) {
            var newQuantity = parseInt(currentQuantity) + 1;
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'mettre_a_jour_quantite_panier.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Mettre à jour l'interface utilisateur si nécessaire
                        updateCartItemCount(); // Mettre à jour le nombre de produits dans le panier
                    } else {
                        console.log('Erreur lors de la mise à jour de la quantité dans le panier');
                    }
                }
            };
            xhr.send('product_id=' + productId + '&new_quantity=' + newQuantity);
        }
    </script>