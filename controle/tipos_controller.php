<?php
ini_set('display_errors', 1);
error_reporting(E_ERROR);
include('../modelo/conexao.php');
include('controle_session.php');
$descricao = $_POST['descricao'];

$user=$_SESSION['id_user'];
$acao= $_POST['acao'];
$idTipo = $_POST['idTipo'];
$statusTipo= $_POST['status'];
if($acao=='inserir'){
    $query="
insert into Tipo (
 descricaotipo,
 statusTipo,
 dataCadastro,
 usuarioCadastro
 )values(
  '".$descricao."',
   'S',
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
update tipo set statusTipo= '$statusTipo' where idTipo=$idTipo";
//echo $sql;
$result= mysqli_query($conexao, $sql) or die(false);
if($result){
    echo "Status Alterado";

}
}

if($acao=='get_info'){
     $sql = "
    Select
     descricaoTipo
       
        From
         tipo
        where
         idTipo= $idTipo
        
    ";
    $result = mysqli_query($conexao,$sql) or die (false);
$ativo= $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($ativo);
exit();  
}

if($acao== 'update'){
    $sql = "

update tipo set
descricaoTipo='$descricao'


 where idTipo=$idTipo";
 //echo $sql;
$result= mysqli_query($conexao, $sql) or die(false);
if($result){
    echo "Informações Alteradas";
}
}
?>