<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                        <li class="logincadastro"><a href="cadastro.php">Cadastro</a></li>
                        <li class="logincadastro"><a href="login.php">Login</a></li>
                    <?php endif; ?>
                    <!-- Botão de Carrinho -->
                    <li>
                        <a href="#" onclick="toggleCart()">
                            <i class="fa fa-shopping-cart"></i>
                            <span id="cart-count">0</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="menu-icon" onclick="menutoggle()">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
        </div>
    </div>

    <div class="cart-sidebar" id="cartSidebar">
        <button class="close-btn" onclick="toggleCart()">&times;</button>
        <h2>Carrinho de Compras</h2>
        <div id="cartItems"></div>
        <button class="btn" onclick="checkout()">Finalizar Compra</button>
    </div>

    <div class="overlay" id="overlay" onclick="toggleCart()"></div>

    </div>
    </header>

    <div class="small-container">
        <div class="row row-2">
            <h2>Todos os Produtos</h2>
        </div>

        <!--Primeira fileira-->
        <div class="row">
            <div class="col-4">
                <img src="../img/hand_grip.png" alt="handgrip"><a></a>
                <h4>Hand Grip Regulável Hidrolight</h4><a></a>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>R$20.00</p>
                <button class="btn add-to-cart" data-product-id="1">Adicionar ao Carrinho</button>

            </div>
            <div class="col-4">
                <img src="../img/peso.png" alt="peso"><a></a>
                <h4>Kettlebell Emborrachado 26kg - Peso Academia Exercit Esportes </h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <p>R$439,40</p>
                <button class="btn add-to-cart" data-product-id="1">Adicionar ao Carrinho</button>
            </div>

            <div class="col-4">
                <img src="../img/halter.webp" alt="halter"><a></a>
                <h4>Dumbbell Halter de Ferro 1kg</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>$15.00</p>
                <button class="btn add-to-cart" data-product-id="1">Adicionar ao Carrinho</button>
            </div>
        </div>

        <!--Segunda fileira-->
        <div class="row">
            <div class="col-4">
                <img src="../img/halteres.webp" alt="halteres"><a></a>
                <h4>2 Halteres Rosca + 24kg D Anilhas Sport 31mm - Peso Academia</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>R$830.00</p>
                <button class="btn add-to-cart" data-product-id="1">Adicionar ao Carrinho</button>
            </div>
            <div class="col-4">
                <img src="../img/halter1.webp" alt="halter1"><a></a>
                <h4>Kit Halteres De Anilhas E Barras Fitness - 18 Peças</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <p>R$193.45</p>
                <button class="btn add-to-cart" data-product-id="1">Adicionar ao Carrinho</button>
            </div>
            <div class="col-4">
                <img src="../img/anilha.jpg" alt="anilha"><a></a>
                <h4>POLIMET Anilha de Ferro Pintada, Unissex Adulto</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>R$32.19</p>
                <button class="btn add-to-cart" data-product-id="1">Adicionar ao Carrinho</button>
            </div>
        </div>

        <!--Terceira fileira-->
        <div class="row">
            <div class="col-4">
                <img src="../img/cinturao.jpg" alt="cinturao"><a></a>
                <h4>Cinturão de Musculação Muvin – Tamanho Ajustável</h4>
                <div class="rating">

                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>R$79.90</p>
                <button class="btn add-to-cart" data-product-id="1">Adicionar ao Carrinho</button>
            </div>
            <div class="col-4">
                <img src="../img/caneleira.jpg" alt="caneleira"><a></a>
                <h4>Par Caneleira Tornozeleira de Peso Punch </h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <p>R$21.78</p>
                <button class="btn add-to-cart" data-product-id="1">Adicionar ao Carrinho</button>
            </div>
            <div class="col-4">
                <img src="../img/bola.jpg" alt="bola"><a></a>
                <h4>Bola Suiça Premium para Pilates</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>R$49.90</p>
                <button class="btn add-to-cart" data-product-id="1">Adicionar ao Carrinho</button>
            </div>
        </div>

        <div class="page-btn">
            <span><a href="produtos.php">1</a></span>
            <span>2</span>
            <span>&#8594;</span>
        </div>

    </div>

    <div class="overlay" id="overlay" onclick="toggleCart()"></div>

    <div id="cartSidebar" class="cart-sidebar">
        <button class="close-btn" onclick="toggleCart()">&times;</button>
        <h2>Carrinho</h2>
        <div id="cartItems">
            <!-- Itens do carrinho serão renderizados aqui -->
        </div>
        <button onclick="checkout()">Finalizar Compra</button>
    </div>

    <script type="text/javascript">
        var isLoggedIn = <?php echo json_encode(isset($_SESSION['user_id'])); ?>;
        console.log("isLoggedIn:", isLoggedIn);
    </script>
        });

    <script src="../JS/script.js"></script>
</body>

</html>
    </script>
</body>

</html>