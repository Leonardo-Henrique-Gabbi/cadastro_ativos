
<?php
include_once('../controle/controle_session.php');
include_once('cabecario.php');
?>
<body>
    <div class="container">
    <form action="../controle/cadastrar_usuario_controle.php" method="POST">
  <div class="mb-3">
    <label for="nome" class="form-label">Nome</label>
    <input type="text" class="form-control" id="nome" required placeholder="Coloque seu nome" name="nome" >
  </div>
  <div class="mb-3">
    <label for="turma" class="form-label">Turma</label>
    <input type="text" required name="turma" id= "turma" placeholder="Informe sua turma" class="form-control">
  </div>
  <div class="mb-3">
    <label type="usuario" class="form-label"> Usuario</label>
    <input type="text" required name="usuario" id="usuario" placeholder="Crie seu usuario" class="form-control">
  </div>
  <div class="mb-3">
    <label type="senha" class="form-label"> Senha</label>
    <input type="text" required name="senha" placeholder="Crie sua senha" id="senha" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Salvar</button>
</form>