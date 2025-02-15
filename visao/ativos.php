<?php
include_once('../controle/controle_session.php');
include_once('cabecario.php');
include_once('menu_superior.php');
include_once('../controle/funcoes.php');
include_once('../modelo/conexao.php');
$marcas=busca_info_bd($conexao,'marca');
$tipos=busca_info_bd($conexao,'tipo');
$sql = "SELECT 
idAtivo,
descricaoAtivo,
quantidadeAtivo,
quantidadeMinAtivo,
statusAtivo,
observacaoAtivo,
(SELECT descricaoMArca from marca m WHERE m.idMarca = a.idMarca) as marca,
(SELECT descricaoTipo from tipo t WHERE t.idTipo = a.idTipo) as tipo,
(SELECT usuario from usuario u WHERE u.idUsuario = a.usuarioCadastro) as usuario,
dataCadastro
FROM ativo a";
$result = mysqli_query($conexao,$sql) or die (false);
$ativos_bd= $result->fetch_all(MYSQLI_ASSOC);
?>
<head>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" onclick="fechar_modal()" data-bs-target="#exampleModal" id="modal">Cadastrar Modal</button>
<form method="GET" action="../controle/url.php" class="form-busca">
    <input type="text" name="busca" placeholder="Buscar produto no Mercado Livre" required>
    <button type="submit">Buscar</button>
</form>

</head>

<script src="../js/ativos.js"></script>
<body>
    <div class="container">
    <button type="button" id="btn_modal" onclick= "limpar_modal()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="modal">Cadastrar Ativo</button>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Descrição</th>
      <th scope="col">Marca</th>
      <th scope="col">Tipo</th>
      <th scope="col">Quantidade</th>
      <th scope="col">QuantidadeMin</th>
      <th scope="col">Observação</th>
      <th scope="col">Data Cadastro</th>
      <th scope="col">Usuario Cadastro</th>
      <th style="text-align:center;"> Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($ativos_bd as $ativo){
     ?>
     <tr>
        <td>  <?php echo $ativo['descricaoAtivo']; ?></td>
        <td>  <?php echo $ativo['marca']; ?></td>
        <td>  <?php echo $ativo['tipo']; ?></td>
        <td>  <?php echo $ativo['quantidadeAtivo']; ?></td>
        <td>  <?php echo $ativo['quantidadeMinAtivo'];?></td>
        <td>  <?php echo $ativo['observacaoAtivo']; ?></td>
        <td>  <?php

      
        $dataCadastro = $ativo['dataCadastro'];
        echo date('d/m/Y H:i:s', strtotime($dataCadastro));
       ?></td>
        <td>  <?php echo $ativo['usuario']; ?></td>
        <td>
          <div class= "acoes" style= "display: flex;justify-content: space-between;">
            <div class= "muda_status">
              <?php
              if( $ativo['statusAtivo']=="S"){
              ?>
              <div class="inativo" onclick="muda_status('N','<?php echo $ativo['idAtivo'];?>')">
              <i class="bi bi-toggle-on"></i>
              </div>
              <?php
              }else{
                ?>
               <div class="ativo" onclick="muda_status('S','<?php echo $ativo['idAtivo'];?>')">
               <i class="bi bi-toggle-off"></i>
              </div>
              <?php  
               }
              ?>

            </div>

            <div class="edit" >
            <i class="bi bi-pencil-square" onclick="editar('<?php echo $ativo['idAtivo'] ?>')"></i>
              </div>

            </div>
          </div>
            
        </td>
      </tr>
      <?php
    }
    ?>
    
  </tbody>
</table>
<input type= "hidden" id="idAtivo" value="">
</div>
<?php
$info_bd = busca_info_bd($conexao,'ativo');
include_once('modal_ativos.php');

?>