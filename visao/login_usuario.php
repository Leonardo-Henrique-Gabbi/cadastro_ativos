
<?php
session_start();
if(isset($_GET['erro']) && $_GET['erro']=='acesso_negado'){
    echo "<script>alert('Usuario não autenticado);'</script>";
}
if(isset($_GET['error_auten']) && $_GET['error_auten']=='s'){
  echo "<script>alert('senha ou usuario invalido');</script>";
}

include_once('cabecario.php');

?>

<body>
<div class="container">
<form action="../controle/login_usuario_controle.php" method="post" id="formulario">
  <div class="box">
  <h1 id="title">Login</h1>
      <div class="mb-2">
    <label for="nome" class="form-label">Nome Usuario</label>
    <input type="text"  class="form-control" id="nome" placeholder="Digite seu nome aqui" name="usuario" required >
  </div>
  <div class="mb-2">
    <label for="senha" class="form-label">Senha</label>
    <input type="password" class="form-control" id="senha" placeholder="Digite sua senha aqui" name="senha" required >
  </div>
  
  <button type="submit" class="btn btn-primary">Salvar</button>
  </div>
</form>


</div> 
</body>
</html>
