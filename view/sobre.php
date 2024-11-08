<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre</title>
    <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/sobre.css">
</head>
<body>
    
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="../index.php"><img src="../img/logo.png" alt="logo"></a>
            </div>
           <nav>
                <ul id="MenuItems">
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../view/produtos.php">Produtos</a></li>
                    <li><a class="sobre" href="sobre.php">Sobre</a></li>
                    <li class="logincadastro"><a href="../view/login.php">Login</a></li>
                    <li class="logincadastro"><a href="../view/cadastro.php">Cadastro</a></li>
                </ul>
            </nav>
            <img src="../img/menu.png" class="menu-icon" onClick="menutoggle()" alt="logoMenu">
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