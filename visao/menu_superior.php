<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>Página de Navegação</title>
    
    <style>
        /* Estilos CSS começam aqui */
        
        /* Estilo para o corpo da página */
        body {
            font-family: Arial, sans-serif; /* Define a fonte usada na página */
            margin: 0; /* Remove as margens padrão da página */
            padding: 0; /* Remove o preenchimento (padding) padrão da página */
            background-color: #f4f4f4; /* Cor de fundo da página (cinza claro) */
            background-image: url('https://images.unsplash.com/photo-1521747116042-e13b7a2e2e70'); /* Imagem de fundo */
            background-size: cover; /* Faz a imagem de fundo cobrir toda a tela */
            background-position: center; /* Centraliza a imagem de fundo */
            background-repeat: no-repeat; /* Impede que a imagem de fundo se repita */
            min-height: 100vh; /* Garante que a altura da página ocupe toda a altura da tela */
        }

        /* Estilo para a barra superior */
        header {
            background-color: #000000; /* Cor de fundo da barra superior (preto) */
            padding: 20px 0; /* Preenchimento interno (espaço) de 20px no topo e na parte inferior da barra */
            position: relative; /* Posicionamento relativo, necessário para a posição absoluta de elementos dentro */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); /* Sombra suave para dar um efeito de profundidade */
        }

        /* Estilo para a logo na barra superior */
        .logo {
            position: absolute; /* Posiciona a logo de forma absoluta dentro do header */
            top: 10px; /* A logo fica 10px abaixo do topo da barra */
            left: 20px; /* A logo fica 20px à esquerda da barra */
            height: 50px; /* Define a altura da logo */
        }

        /* Estilo para o menu de navegação */
        nav ul {
            list-style-type: none; /* Remove os marcadores de lista (bullets) dos itens de navegação */
            padding: 0; /* Remove o preenchimento (padding) da lista */
            margin: 0; /* Remove a margem da lista */
            text-align: center; /* Centraliza os itens da lista horizontalmente */
            display: flex; /* Usa o layout flexbox para os itens de navegação ficarem em linha */
            justify-content: center; /* Alinha os itens horizontalmente no centro da tela */
            gap: 20px; /* Adiciona um espaço de 20px entre os itens */
        }

        /* Estilo para cada item de navegação */
        nav ul li {
            position: relative; /* Necessário para o posicionamento do submenu */
        }

        /* Estilo para os links no menu de navegação */
        nav ul li a {
            color: white; /* Cor do texto dos links */
            text-decoration: none; /* Remove o sublinhado dos links */
            padding: 12px 25px; /* Preenchimento (espaço) ao redor do texto dos links */
            display: block; /* Faz com que o link ocupe toda a largura do item da lista */
            font-size: 18px; /* Tamanho da fonte dos links */
            border-radius: 5px; /* Bordas arredondadas para os links */
            transition: background-color 0.3s ease; /* Efeito de transição suave quando a cor de fundo mudar */
        }

        /* Estilo para os links quando o mouse passa sobre eles (efeito de hover) */
        nav ul li a:hover {
            background-color: #ff6347; /* Muda a cor de fundo para laranja quando o mouse passa por cima */
        }

        /* Estilo para o submenu, inicialmente escondido */
        .submenu {
            display: none; /* O submenu começa oculto */
            position: absolute; /* O submenu será posicionado abaixo do item "Home" */
            top: 100%; /* Coloca o submenu logo abaixo do item de menu */
            left: 0; /* Alinha o submenu à esquerda do item de menu */
            background-color: #333; /* Cor de fundo do submenu (cinza escuro) */
            min-width: 200px; /* Largura mínima do submenu */
            list-style-type: none; /* Remove os marcadores de lista */
            padding: 0; /* Remove o preenchimento do submenu */
            margin: 0; /* Remove a margem do submenu */
            border-radius: 5px; /* Bordas arredondadas para o submenu */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); /* Sombra suave para o submenu */
        }

        /* Estilo para os links dentro do submenu */
        .submenu li a {
            padding: 12px 16px; /* Preenchimento dos itens do submenu */
            color: white; /* Cor do texto dos links do submenu */
            font-size: 16px; /* Tamanho da fonte dos links do submenu */
            text-decoration: none; /* Remove o sublinhado dos links do submenu */
            border-radius: 5px; /* Bordas arredondadas para os links do submenu */
        }

        /* Efeito de hover para os links do submenu */
        .submenu li a:hover {
            background-color: #ff6347; /* Muda a cor de fundo dos links do submenu quando o mouse passa sobre eles */
        }

        /* Exibe o submenu quando o mouse passa sobre o link "Home" ou quando o submenu está sendo sobrevoado */
        .usuario-link:hover + .submenu, 
        .submenu:hover {
            display: block; /* Torna o submenu visível */
        }

        /* Estilo para o botão de logout */
        .logout-btn {
            position: fixed; /* O botão de logout fica fixo na tela */
            top: 20px; /* Fica 20px abaixo do topo da tela */
            right: 20px; /* Fica 20px da margem direita da tela */
            padding: 12px 25px; /* Preenchimento interno do botão */
            font-size: 18px; /* Tamanho da fonte do botão */
            background-color: #ff6347; /* Cor de fundo do botão (laranja) */
            color: white; /* Cor do texto do botão */
            border: none; /* Remove a borda do botão */
            border-radius: 5px; /* Bordas arredondadas no botão */
            cursor: pointer; /* Adiciona um cursor de "mão" quando o mouse passa sobre o botão */
            transition: background-color 0.3s ease; /* Transição suave de cor ao passar o mouse */
        }

        /* Efeito de hover para o botão de logout */
        .logout-btn:hover {
            background-color: #ff4500; /* Altera a cor do botão para um tom mais forte de laranja quando o mouse passa sobre ele */
        }

    </style>
</head>
<body>

    <!-- Barra de navegação -->
    <header>
        <!-- Logo do site (imagem) -->
     
        
        <!-- Menu de navegação -->
        <nav>
            <ul>
                <!-- Menu principal -->
                <li><a href="#" class="usuario-link">Home</a>
                    <!-- Submenu que aparece ao passar o mouse sobre o item "Home" -->
                    <ul class="submenu">
                        <li><a href="usuario_cadastro.php">Cadastrar Usuário</a></li>
                        <li><a href="login_usuario.php">Login Usuário</a></li>
                    </ul>
                </li>
                <!-- Outros itens de navegação -->
                <li><a href="ativos.php">Ativos</a></li>
                <li><a href="pagina2.html">Movimentações</a></li>
            </ul>
        </nav>

        <!-- Botão de logout -->
        <button class="logout-btn"><a href='../controle/logout.php'>Logout</a></button>
    </header>

</body>
</html>
