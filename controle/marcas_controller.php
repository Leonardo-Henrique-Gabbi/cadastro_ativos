<?php
ini_set('display_errors', 1);
error_reporting(E_ERROR);
include('../modelo/conexao.php');
include('controle_session.php');
$descricao = $_POST['descricao'];

$user=$_SESSION['id_user'];
$acao= $_POST['acao'];
$idMarca = $_POST['idMarca'];
$statusMarca= $_POST['status'];
if($acao=='inserir'){
    $query="
insert into marca (
 descricaoMarca,
 statusMarca,
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
update marca set statusMarca= '$statusMarca' where idMarca=$idMarca";
//echo $sql;
$result= mysqli_query($conexao, $sql) or die(false);
if($result){
    echo "Status Alterado";

}
}

if($acao=='get_info'){
     $sql = "
    Select
     descricaoMarca
       
        From
         marca
        where
         idMarca= $idMarca
        
    ";
    $result = mysqli_query($conexao,$sql) or die (false);
$ativo= $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($ativo);
exit();  
}

if($acao== 'update'){
    $sql = "

update marca set
descricaoMarca='$descricao'


 where idMarca=$idMarca";
 //echo $sql;
$result= mysqli_query($conexao, $sql) or die(false);
if($result){
    echo "Informações Alteradas";
}
}
?>