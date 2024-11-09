<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre</title>
    <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/sobre.css">
</head>
<body>
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
                        <li><a href="../backend/api/logout.php">Sair</a></li>
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

<div class="wrapper">
    <h1>Integrantes do grupo</h1>
    <div class="our_team">
        <div class="team_member">
          <div class="member_img">
            <img src="../img/foto.png" alt="our_team">
            
          </div>
          <h3>Lucas Yuji Tamashiro</h3>        
          <p><b>RA:202208700561</b></p>
        </div>

        <div class="team_member">
           <div class="member_img">
             <img src="../img/foto.png" alt="our_team">
             
          </div>
          <h3>Gabriel de Sousa Silveira</h3>          
          <p><b>RA:202302381911</b></p>
        </div>
      
        <div class="team_member">
           <div class="member_img">
            <img src="../img/foto.png" alt="our_team">
          </div>
          <h3>Gustavo Pascoal Novais Batista</h3>
          <p><b>RA:202302380931</b></p>
      </div>  
    </div>
</div>


      <!-- footer -->
           <div class ="footer">
        <div class="container">                                  
             <hr>
             <p class="copyright">Copyright 2023 - SupraPrime</p>           
        </div>
        </div>
            
            
            <script>
                var menuItems=document.getElementById("MenuItems");
                
                MenuItems.style.maxHeight="0px";
                function menutoggle(){
                    if(MenuItems.style.maxHeight == "0px"){
                        MenuItems.style.maxHeight="200px";
                    }
                    else{
                        MenuItems.style.maxHeight="0px";
                    }
                }
            </script>

</body>
</html>