<?php
include_once('../controle/controle_session.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>Página de Navegação</title>
    
    <style>
    
        
        
        body {
            font-family: Arial, sans-serif; 
            margin: 0; 
            padding: 0; 
            background-color: #f4f4f4; 
            background-image: url('https://images.unsplash.com/photo-1521747116042-e13b7a2e2e70'); 
            background-size: cover;
            background-position: center; 
            background-repeat: no-repeat; 
            min-height: 100vh; 
        }

        
        header {
            background-color: #000000; 
            padding: 20px 0; 
            position: relative; 
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); 
        }

        
        .logo {
            position: absolute; 
            top: 10px;
            left: 20px; 
            height: 50px; 
        }

        
        nav ul {
            list-style-type: none; 
            padding: 0; 
            margin: 0; 
            text-align: center; 
            display: flex; 
            justify-content: center; 
            gap: 20px; 
        }

        
        nav ul li {
            position: relative; 
        }

        
        nav ul li a {
            color: white; 
            text-decoration: none; 
            padding: 12px 25px; 
            display: block; 
            font-size: 18px; 
            border-radius: 5px; 
            transition: background-color 0.3s ease; 
        }

        
        nav ul li a:hover {
            background-color: #ff6347; 
        }

        
        .submenu {
            display: none; 
            position: absolute; 
            top: 100%; 
            left: 0; 
            background-color: #333; 
            min-width: 200px; 
            list-style-type: none; 
            padding: 0;
            margin: 0; 
            border-radius: 5px; 
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); 
        }

        
        .submenu li a {
            padding: 12px 16px; 
            color: white; 
            font-size: 16px; 
            text-decoration: none; 
            border-radius: 5px; 
        }

        
        .submenu li a:hover {
            background-color: #ff6347; 
        }

        
        .usuario-link:hover + .submenu, 
        .submenu:hover {
            display: block; 
        }

    
        .logout-btn {
            position: fixed; 
            top: 20px; 
            right: 20px; 
            padding: 12px 25px; 
            font-size: 18px; 
            background-color: #ff6347; 
            color: white; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer; 
            transition: background-color 0.3s ease; 
        }

        
        .logout-btn:hover {
            background-color: #ff4500; 
        }

    </style>
</head>
<body>

    
    <header>

     
        
        <!-- Menu de navegação -->
        <nav>
            <ul>
                <!-- Menu principal -->
                <li><a href="#" class="usuario-link">Home</a>
                    <!-- Submenu que aparece ao passar o mouse sobre o item "Home" -->
                    <ul class="submenu">
                        <li><a href="usuario_cadastro.php">Cadastrar Usuário</a></li>
                        <li><a href="listar_usuario.php">Listar Usuário</a></li>
                    </ul>
                </li>
                <!-- Outros itens de navegação -->
                <li><a class="usuario-link" href="ativos.php">Cadastros</a>
                <ul class="submenu">
                        <li><a href="ativos.php">Ativos</a></li>
                        <li><a href="marcas.php">Marcas</a></li>
                        <li><a href="tipos.php">Tipos</a></li>
                    </ul>       
            </li>

                <li><a href="movimentacao_ativo.php">Movimentações</a></li>
                <li><a href="relatorio.php">Relatório</a></li>
            </ul>
        </nav>

        <!-- Botão de logout -->
        <button class="logout-btn"><a href='../controle/logout.php'>Logout</a></button>
    </header>

</body>
</html>
