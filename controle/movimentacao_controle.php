<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
ini_set('display_errors', 1);
error_reporting(E_ERROR);
include('../modelo/conexao.php');


$idMovimentacao = $_POST['idMov'];
$idUsuario = $_POST['idusuario'];
$ativo = $_POST['ativo'];
$localOrigem = $_POST['origem'];
$localDestino = $_POST['destino'];
$quantidadeMov = $_POST[' quantidade'];
$tipoMovimentacao = $_POST['tipo'];
$descricaoMov = $_POST['descricao'];	
$user=$_SESSION['id_user'];


$sqlTotal= "
SELECT
    quantidadeAtivo
FROM
    ativo
where
    idAtivo= $ativo
";
$result= mysqli_query($conexao, $sqlTotal) or die(false);
$ativosTotal = $result->fetch_assoc();

$quantidadeTotal= $ativosTotal['quantidadeAtivo'];

$sqlUso = "
    SELECT
      COALESCE(quantidadeUso,0) as quantidadeUso

    FROM
     movimentacao
     where
     idAtivo= $ativo
     and  statusMov = 'S'
";

$resultUso = mysqli_query($conexao,$sqlUso) or die (false);
$ativosUso = $resultUso->fetch_assoc();

$quantidadeUso= $ativosUso['quantidadeUso'];

if ($tipoMovimentacao == 'adicionar'){
    $soma_quantidade = $quantidadeUso + $quantidadeMov;
    if($quantidadeTotal < $soma_quantidade){
        echo "Não permito realizar a movimentação.
        quantidade de ativos em uso a mais a quantidade selecionada
        ultrapassa o total de ativos cadastrados";
        exit();
    }
}else if($tipoMovimentacao == 'remover'){
    if( $quantidadeUso-$quantidadeMov < 0){
        echo "Não permitido realizar a Movimentação. Quantidade de ativos que serão removidos é maior que a quantidade em uso!";
        exit();
    }
    $soma_quantidade = $quantidadeUso-$quantidadeMov ;
}else{
    if($quantidadeUso - $quantidadeMov < 0){
        echo "não permitido realizar a Movimentação.
        Quantidade de ativos que serão realocados é maior que a quantidade em uso!";
        exit();
    }
    $soma_quantidade = $quantidadeUso;
}

$queryUpdate = "
Update movimentacao
  set statusMov = 'N'
  where idAtivo= $ativo";

$result = mysqli_query($conexao,$queryUpdate) or die (false);

$query = "
insert into movimentacao(
idUsuario,
idAtivo,
localOrigem,
localDestino,
dataMovimentacao,
descricaoMov	,
quantidadeUso,
statusMov,
tipoMovimentacao,
quantidadeMov
)values(
'".$user."',
'".$ativo."',
'".$localOrigem."',
'".$localDestino."',
NOW(),
'".$descricaoMov."',
'".$quantidadeUso."',
'S',
'".$tipoMovimentacao."',
'".$quantidadeMov."'
)";
$result = mysqli_query($conexao,$query) or die (false);
if ($result) {
    echo "sucesso";
}else{
    echo 'erro';
}




?>