<?php
include_once('menu_superior.php');
include_once('../modelo/conexao.php');
include_once('../controle/funcoes.php');

$info_bd = busca_info_bd($conexao,'usuario');
include('cabecario.php');
$admin = $_SESSION['admin'];
?>
<head>
<link rel="stylesheet" href="../css/listar.css">
</head>

<body>
    <div class="container">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Usuario</th>
      <th scope="col">Turma</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($info_bd as $user){
     ?>
     <tr>
        <td>
          <?php
          if ($admin == "S"){
          ?>
        
            <a href="alterar_usuario.php?idUsuario=<?php echo $user['idUsuario']?>">
            <?php echo $user['nomeUsuario']; ?>

    </a>
    <?php
          }else{
            echo $user['nomeUsuario'];
          }
    ?>
    
        </td>
        <td>
        <?php
          if ($admin == "S"){
          ?>
        
        <a href="alterar_usuario.php?idUsuario=<?php echo $user['idUsuario']?>">
            <?php echo $user['usuario']; ?>
    </a>
    <?php
          }else{
            echo $user['usuario'];
          }
    ?>
        </td>
        <td>
        <?php
          if ($admin == "S"){
          ?>
        
        <a href="alterar_usuario.php?idUsuario=<?php echo $user['idUsuario']?>">
            <?php echo $user['turmaUsuario']; ?>
    </a>
    <?php
          }else{
            echo $user['turmaUsuario'];
          }
    ?>
        </td>
      </tr>
      <?php
    }
    ?>
    
  </tbody>
</table>
</div>
</body>
</html>