<?php
include_once('../controle/controle_session.php');
include_once('cabecario.php');
include_once('menu_superior.php');
include_once('../controle/funcoes.php');
include_once('../modelo/conexao.php');
$title= "Movimentações";

$ativos=busca_info_bd($conexao,'ativo');
$sql="SELECT idMovimentacao, 
descricaoMov, 
quantidadeMov, 
quantidadeUso,
statusMov, 
tipoMovimentacao,
localOrigem, 
localDestino,
dataMovimentacao, 

(SELECT descricaoAtivo FROM ativo m WHERE m.idAtivo = a.idAtivo) as ativo, 
(SELECT nomeUsuario FROM usuario u WHERE u.idUsuario = a.idUsuario) as usuario,
(SELECT quantidadeAtivo FROM ativo m WHERE m.idAtivo = a.idAtivo) as quantidadeTotalAtivo

FROM movimentacao a
Where statusMov = 'S'";


$result = mysqli_query($conexao, $sql) or die(false);
$movimentacoes = $result->fetch_all(MYSQLI_ASSOC);
?>
<head>
<link rel="stylesheet" href="../css/mov.css">

</head>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/cadastroMov.css">
    <script src="../js/movimentacao.js"></script>
    <title>Cadastro_ativos</title>
</head>
<body>

<div class="container">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" onclick="fechar_modal()" data-bs-target="#exampleModal" id="modal">Cadastrar Movimentação</button>

<div class="container">

<table class="table">
<thead>
  <tr >
    <th scope="col">Ativo</th>
    
    <th scope="col">Tipo</th>
    <th scope="col">Qtd ult mov</th>
    <th scope="col">Qtd.Uso</th>
    <th scope="col">Qtd.Total</th>
    <th scope="col">Loc.Origem</th>
    <th scope="col">Loc.Destino</th>
    <th scope="col">Data</th>
    <th scope="col">Descrição</th>
   
    
    
  </tr>
</thead>
<tbody>
    <?php
    foreach($movimentacoes as $movimentacao){
        ?>
    <tr>
      <td><?php echo $movimentacao['ativo']; ?></td>
      <td><?php echo $movimentacao['tipoMovimentacao']; ?></td>
      <td><?php echo $movimentacao['quantidadeMov']; ?></td>
      <td><?php echo $movimentacao['quantidadeUso']; ?></td>
      <td><?php echo $movimentacao['quantidadeTotalAtivo']; ?></td>
      <td><?php echo $movimentacao['localOrigem']; ?></td>
      <td><?php echo $movimentacao['localDestino']; ?></td>
      <td><?php 
    $dataCadastro = $movimentacao['dataMovimentacao'];
    echo date('d/m/Y H:i:s', strtotime($dataCadastro)); 
    ?></td>
      <td><?php echo $movimentacao['descricaoMov']; ?></td>
    
          </tr>
        
    
        
    
    <?php
}
?>
</div>

  </tbody>
  </table>

<input type="hidden" id="idMovimentacao" value="">

</div>
<?php 
include_once('modal_movimentacao.php');
?>
</div>
</body>
</html>