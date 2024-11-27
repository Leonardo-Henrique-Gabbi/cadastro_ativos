<?php
include('../controle/controle_session.php');
include_once('../modelo/conexao.php');
include_once('../controle/funcoes.php');
$usuario_altera= $_GET['idUsuario'];
$info_bd = busca_info_bd($conexao,'usuario','idUsuario',$usuario_altera);
foreach($info_bd as $user){
$nome= $user['nomeUsuario'];
$turma= $user['turmaUsuario'];
$id_user= $user['idUsuario'];
}
include_once('cabecario.php');
?>


<body><!-- corpo da página-->
    <div class="container">
    <form action="../controle/alterar_usuario_controle.php" method="POST">
      <input type="hidden" value="<?php echo $id_user?>" name="id">
      <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" required placeholder="Coloque seu nome" value="<?php echo $nome?>" name="nome" >
      </div>
      <div class="mb-3">
        <label for="turma" class="form-label">Turma</label>
        <input type="text" required name="turma" id= "turma" value="<?php echo $turma?>" placeholder="Informe sua turma" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary">Salvar</button>
      </form>
      </div>
    </body>
</html>