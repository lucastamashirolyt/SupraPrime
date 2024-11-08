<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <?php session_start(); ?>
    <div class="header">
        <div class="navbar">
            <div class="logo">
                <a href="../index.php"><img src="../img/logo.png" alt="logo" width="70"></a>
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="produtos.php">Produtos</a></li>
                    <li><a href="sobre.php">Sobre</a></li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li><a href="dashboard.php"><img src="../img/profile.png" alt="Perfil" width="30"></a></li>
                        <li><a href="../PHP/logout.php">Sair</a></li>
                    <?php else: ?>
                        <li><a href="cadastro.php">Cadastro</a></li>
                        <li><a href="login.php">Login</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
            <div class="menu-icon" onclick="menutoggle()">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
        </div>
    </div>

    <div class="small-container">
        <div class="row row-2">
            <h2>Todos os Produtos</h2>
        </div>

        <!--Primeira fileira-->
        <div class="row">
            <div class="col-4">
                <img src="../img/Max-TitaniumBaunilha.png" alt="logo"><a></a>
                <h4>Kit : Mass Titanium 3Kg + Creatina 100G + Bcaa 60 Caps - Max TitaniumBaunilha</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>R$50.00</p>
                <button class="btn add-to-cart" data-product-id="1">Adicionar ao Carrinho</button>
            </div>
            <div class="col-4">
                <img src="../img/creatina1.png" alt="creatina1"><a></a>
                <h4>Creatina - Universal (200g) </h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <p>R$35.00</p>
                <button class="btn add-to-cart" data-product-id="2">Adicionar ao Carrinho</button>
            </div>

            <div class="col-4">
                <img src="../img/CREATINA.png" alt="creatina"><a></a>
                <h4>Creatina Pura Probiotica 100g</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>R$15.00</p>
                <button class="btn add-to-cart" data-product-id="3">Adicionar ao Carrinho</button>
            </div>
        </div>

        <!--Segunda fileira-->
        <div class="row">
            <div class="col-4">
                <img src="../img/wheyp.png" alt="whey"><a></a>
                <h4>Whey Protein Gold Standard 100% 907g</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>R$50.00</p>
                <button class="btn add-to-cart" data-product-id="4">Adicionar ao Carrinho</button>
            </div>
            <div class="col-4">
                <img src="../img/protein.jpg" alt="protein"><a></a>
                <h4>Nutri Whey Protein</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <p>R$50.00</p>
                <button class="btn add-to-cart" data-product-id="5">Adicionar ao Carrinho</button>
            </div>
            <div class="col-4">
                <img src="../img/isolate.png" alt="isolete"><a></a>
                <h4>Isolate Protein Mix 1,8kg</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>R$50.00</p>
                <button class="btn add-to-cart" data-product-id="6">Adicionar ao Carrinho</button>
            </div>
        </div>

        <!--Terceira fileira-->
        <div class="row">
            <div class="col-4">
                <img src="../img/whey1.png" alt="whey1"><a></a>
                <h4>WHEY PROTEIN ISO PROTEIN BLEND 2kg</h4>
                <div class="rating">

                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>R$80.00</p>
                <button class="btn add-to-cart" data-product-id="7">Adicionar ao Carrinho</button>
            </div>
            <div class="col-4">
                <img src="../img/11.jpg" alt="img11"><a></a>
                <h4>Pré Treino Prohibido Hardcore Pre-Workout, 3VS Nutrition </h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <p>R$80.00</p>
                <button class="btn add-to-cart" data-product-id="8">Adicionar ao Carrinho</button>
            </div>
            <div class="col-4">
                <img src="../img/pre-treino.png" alt="pre_treino"><a></a>
                <h4>Pré-treino Diabo Verde</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>R$80.00</p>
                <button class="btn add-to-cart" data-product-id="9">Adicionar ao Carrinho</button>
            </div>
        </div>

        <div class="page-btn">
            <span>1</span>
            <span><a href="produtos2.php">2</a></span>
            <span>&#8594;</span>
        </div>

    </div>


    <!-- footer -->
    <div class="footer">
        <div class="container">
            <hr>
            <p class="copyright">Copyright 2023 - SupraPrime</p>
        </div>
    </div>


    <script src="/JS/script.js"></script>

    <!-- 
        <script>
        var menuItems = document.getElementById("MenuItems");
        MenuItems.style.maxHeight = "0px";
        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px";
            }
            else {
                MenuItems.style.maxHeight = "0px";
            }
        }

        function toggleCart() {
            var cartSidebar = document.getElementById("cartSidebar");
            var overlay = document.getElementById("overlay");
            if (cartSidebar.style.right === "-300px" || cartSidebar.style.right === "") {
                cartSidebar.style.right = "0px";
                overlay.style.display = "block";
            } else {
                cartSidebar.style.right = "-300px";
                overlay.style.display = "none";
            }
        }

        var cart = [];

        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function () {
                var productId = this.getAttribute('data-product-id');
                addToCart(productId);
                toggleCart(); // Adiciona esta linha para fechar a tela lateral
            });
        });

        function addToCart(productId) {
            var product = {
                id: productId,
                name: "Produto " + productId,
                price: Math.floor(Math.random() * 100) + 1,
                quantity: 1
            };

            var existingProduct = cart.find(p => p.id === productId);
            if (existingProduct) {
                existingProduct.quantity++;
            } else {
                cart.push(product);
            }

            renderCart();
        }

        function renderCart() {
            var cartItems = document.getElementById('cartItems');
            cartItems.innerphp = '';
            cart.forEach(product => {
                var item = document.createElement('div');
                item.className = 'cart-item';
                item.innerphp = `
                    <span>${product.name}</span>
                    <span>${product.quantity} x R$${product.price}</span>
                `;
                cartItems.appendChild(item);
            });
        }

        function checkout() {
            alert('Compra finalizada!');
            cart = [];
            renderCart();
            toggleCart();
        }
    </script>
    -->
</body>

</html>