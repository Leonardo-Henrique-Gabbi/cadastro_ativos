<?php
ini_set('display_errors', 0);
error_reporting(E_ERROR);
include('../modelo/conexao.php');
include('controle_session.php');
$ativo = $_POST['ativo'];
$marca = $_POST['marca'];
$tipo = $_POST['tipo'];
$quantidade = $_POST['quantidade'];
$observacao = $_POST['observacao'];
$user=$_SESSION['id_user'];
$acao= $_POST['acao'];
$idAtivo = $_POST['idAtivo'];
$statusAtivo= $_POST['status'];
if($acao=='inserir'){
    $query="
insert into ativo (
 descricaoAtivo,
 quantidadeAtivo,
 statusAtivo,
 observacaoAtivo,
 idMarca,
 idTipo,
 dataCadastro,
 usuarioCadastro
 )values(
  '".$ativo."',
   '".$quantidade."',
   'S',
    '".$observacao."',
     '".$marca."',
     '".$tipo."',
     NOW(),
     '".$user."'
 )

";

$result= mysqli_query($conexao, $query) or die(false);
if($result){
    echo "Cadastro realizado";
}

}

if($acao == 'alterar_status'){
$sql = "
update ativo set statusAtivo = '$statusAtivo' where idAtivo=$idAtivo";
//echo $sql;
$result= mysqli_query($conexao, $sql) or die(false);
if($result){
    echo "Status Alterado";

}
}

if($acao=='get_info'){
    $sql = "
    Select
     descricaoAtivo,
        quantidadeAtivo,
        observacaoAtivo,
        idMarca,
        idTipo
        from
         ativo
        where
         idAtivo = $idAtivo
        
    ";
    $result = mysqli_query($conexao,$sql) or die (false);
$ativo= $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($ativo);
exit();  
}

if($acao== 'update'){
    $sql = "

update ativo set
descricaoAtivo='$ativo',
idMarca= '$marca',
idTipo= '$tipo',
quantidadeAtivo = '$quantidade',
observacaoAtivo = '$observacao'

 where idAtivo=$idAtivo";
 //echo $sql;
$result= mysqli_query($conexao, $sql) or die(false);
if($result){
    echo "Informações Alteradas";
}
}
?>