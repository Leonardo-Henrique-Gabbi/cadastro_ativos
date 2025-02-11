<?php
ini_set('display_errors', 1);
error_reporting(E_ERROR);
include_once('../controle/controle_session.php');
include_once('../modelo/conexao.php');
$title="Relatório Gerado";
include_once('menu_superior.php');
include_once('cabecario.php');

$ativo= $_POST['ativo'];
$dataIni=$_POST['dataIni'];
$dataFim= $_POST['dataFim'];
$marca= $_POST['marca'];
$tipo= $_POST['tipo'];
$user = $_POST['user'];
$tipoMov= $_POST['tipoMov'];

$sql="
SELECT
(SELECT descricaoAtivo from ativo a where a.idAtivo = m.idAtivo) as ativo,
(SELECT nomeUsuario from usuario u where u.idUsuario = m.idUsuario) as usuario,
descricaoMov, 
quantidadeMov, 
quantidadeUso,
statusMov, 
tipoMovimentacao,
localOrigem, 
localDestino,
dataMovimentacao

FROM movimentacao m

WHERE
m.idAtivo is not null
";
if($ativo != '' && $ativo != null){
$sql.= " AND m.idAtivo =$ativo"; 
}else{
    if($marca != '' && $marca != null){
        $sql.=" and m.idAtivo in(SELECT a.idAtivo from ativo a where a.idMarca=$marca) ";
    }

    if($tipo != '' && $tipo != null){
        $sql.=" and m.idAtivo in(SELECT a.idAtivo from ativo a where a.idTipo=$tipo) ";
    }
}
if($user != '' && $user != null){
    $sql.= " AND m.idUsuario =$user"; 
}
if($tipoMov != '' && $tipoMov != null){
    $sql.= " AND m.tipoMovimentação =$tipoMov"; 
}
if($dataIni != '' && $dataIni != null){
    $sql.= " AND m.dataMovimentacao >'$dataIni'"; 
}
if($dataFim != '' && $dataFim != null){
    $sql.= " AND m.dataMovimentacao >'$dataFim'"; 
}

$result= mysqli_query($conexao, $sql) or die(false);
$movimentacoes = $result->fetch_all(MYSQLI_ASSOC);


?>




<head>
<link rel="stylesheet" href="../css/gerar.css">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Relatorio gerado</h1>
         
        </div>

        <div class="table-responsive">
            <table class="table tabela_personalizada" id="tabela">
                <thead>
                    <tr>
                        <th scope="col">Ativo</th>
                        <th scope="col">Usuário</th>
                        <th scope="col">TipoM</th>
                        <th scope="col">Qtd Uso</th>
                        <th scope="col">Qtd Últ Mov</th>
                        <th scope="col">Local Origem</th>
                        <th scope="col">Local Destino</th>
                        <th scope="col">Data</th>
                        <th scope="col">Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($movimentacoes as $movimentacao): ?>
                    <tr>
                        <td><?php echo $movimentacao['ativo']; ?></td>
                        <td><?php echo $movimentacao['usuario']; ?></td>
                        <td><?php echo $movimentacao['tipoMovimentacao']; ?></td>
                        <td><?php echo $movimentacao['quantidadeUso']; ?></td>
                        <td><?php echo $movimentacao['quantidadeMov']; ?></td>
                        <td><?php echo $movimentacao['localOrigem']; ?></td>
                        <td><?php echo $movimentacao['localDestino']; ?></td>
                        <td><?php echo date('d/m/Y H:i:s', strtotime($movimentacao['dataMovimentacao'])); ?></td>
                        <td><?php echo $movimentacao['descricaoMovimentacao']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

   
    <script src="../js/relatorios.js"></script>
</body>