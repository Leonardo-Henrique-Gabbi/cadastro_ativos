<?php
include('menu_superior.php');

?>
<head>
<style>
/* Estilos gerais */
body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #f8f9fa; /* Fundo claro */
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; /* Centraliza verticalmente */
    color: #333; /* Cor do texto */
}

/* Caixa centralizada */
.caixa-centralizada {
    background-color: #ffffff; /* Fundo branco */
    border-radius: 15px; /* Bordas arredondadas */
    padding: 30px;
    max-width: 600px; /* Largura máxima */
    width: 90%; /* Responsivo */
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Sombra suave */
    text-align: center; /* Centraliza o texto */
    border: 1px solid #e0e0e0; /* Borda sutil */
}

/* Título */
.caixa-centralizada h1 {
    font-size: 2rem;
    margin-bottom: 20px;
    color: #007bff; /* Cor azul para o título */
}

/* Parágrafos */
.caixa-centralizada p {
    font-size: 1rem;
    line-height: 1.6; /* Espaçamento entre linhas */
    margin-bottom: 15px;
    color: #555; /* Cor do texto mais suave */
}

/* Texto em negrito */
.caixa-centralizada strong {
    color: #007bff; /* Cor azul para destacar */
}

/* Responsividade */
@media (max-width: 768px) {
    .caixa-centralizada h1 {
        font-size: 1.5rem; /* Título menor em telas pequenas */
    }

    .caixa-centralizada p {
        font-size: 0.9rem; /* Texto menor em telas pequenas */
    }
}
</style>    
</head>    

<body>

<!-- Caixa centralizada com as informações -->
<div class="caixa-centralizada">
        <h1>Bem-vindo à página de controle de ativos do Senac</h1>
        <p>Para melhor compreensão, nesta página estarão disponíveis o login e controle de usuários. Você deve acessar com sua conta em <strong>Home</strong> para ter acesso e realizar alterações ou criar um novo cadastro.</p>
        <p><strong>Caso queira apenas olhar, não será necessário fazer login.</strong></p>
    </div>

</body>