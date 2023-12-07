<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>

<body>
    <div class="divproduct">
        <div class="divproduct1">
            <div class="divpanier">
                <h2>product_name</h2>
                <img class="imgpanier" src="photo/casque1.jpg" alt="product img" />
                <p class="price">Prix: 10$ </p>
                <p>Quantité: 1 </p>
                <div class="quantity-container" style="display: inline;">
                    <button style="display: inline;" onclick="updateQuantity('decrement')">-</button>
                    <input type="text" id="quantityInput" value="1" readonly>
                    <button style="display: inline;" onclick="updateQuantity('increment')">+</button>
                </div>
            </div>
            <div class="divpanier">
                <h3>description</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo voluptatibus aliquid porro iusto, rem ab corporis reiciendis harum doloremque mollitia aut magni architecto officiis vitae placeat sequi fugiat minima quisquam distinctio? Laboriosam explicabo voluptatem dicta ullam, quod qui, illum inventore repellendus aliquid recusandae, nesciunt atque quas? Repudiandae qui harum odit mollitia sunt at sapiente nihil voluptate nisi cupiditate soluta minus placeat, recusandae eius omnis et in, ipsum perspiciatis fuga neque? Dolore, optio ut? Veniam optio neque consequuntur unde ducimus, magnam in repudiandae suscipit totam tempore provident vel cumque pariatur est quos ad. Vel, consequuntur doloremque eligendi id libero provident neque.</p>

            </div>
        </div>
        <button>Supprimer</button>
        <!-- Vous pouvez avoir un bouton pour déclencher la récupération des IDs -->
    </div>
</body>

</html>


<script>

    function updateQuantity(action) {
        let quantityInput = document.getElementById('quantityInput');
        let currentValue = parseInt(quantityInput.value);

        if (action === 'increment') {
            quantityInput.value = currentValue + 1;
        } else if (action === 'decrement' && currentValue > 1) {
            quantityInput.value = currentValue - 1;
        }
        <?php
        session_start();
        require_once('connection.php');

        
        if (isset($_SESSION['product_id'])) {
            $product_id = $_SESSION['product_id'];
            // Utilisez $product_id dans votre logique pour cette action
            // Par exemple, effectuer une mise à jour de la quantité pour ce produit
        } else {
            // Gérer le cas où l'ID du produit n'est pas trouvé dans la session
        }
        

        ?>

        let productId = $product_id; /* ID de votre produit */
        let userId = 1; /* ID de votre utilisateur */
        let newQuantity = parseInt(quantityInput.value);

        // Envoi de la nouvelle quantité au serveur via AJAX
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'update_quantity.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('product_id=' + productId + '&user_id=' + userId + '&quantity=' + newQuantity);
    }
</script>