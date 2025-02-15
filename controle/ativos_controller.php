<?php
ini_set('display_errors', 1);
error_reporting(E_ERROR);
include('../modelo/conexao.php');
include('controle_session.php');
$ativo = $_POST['ativo'];
$marca = $_POST['marca'];
$tipo = $_POST['tipo'];
$quantidade = $_POST['quantidade'];
$quantidadeMin= $_POST['quantidadeMinAtivo'];
$observacao = $_POST['observacao'];
$user=$_SESSION['id_user'];
$acao= $_POST['acao'];
$idAtivo = $_POST['idAtivo'];
$statusAtivo= $_POST['status'];
$img = $_FILES['img'];



if($acao=='inserir'){
$pasta_base = $_SERVER['DOCUMENT_ROOT'].'/aulasenac/projeto_cadastro/uploads/';

if (!file_exists($pasta_base)){
    mkdir($pasta_base);
}

$data = date("YmdHis");
$tipoImagem = $img['type'];
$quebraTipo = explode('/',$tipoImagem);
$extensao = $quebraTipo[1];

$result = move_uploaded_file($img['tmp_name'],$pasta_base.$data.'.'.$extensao);
if ($result == false){
    echo "Falha ao mover arquivo";
    exit();
}
 $urlImg = 'aulasenac/projeto_cadastro/uploads/'.$data.'.'.$extensao;   

    $query="
insert into ativo (
 descricaoAtivo,
 quantidadeAtivo,
 quantidadeMinAtivo,
 statusAtivo,
 observacaoAtivo,
 urlImagem,
 idMarca,
 idTipo,
 dataCadastro,
 usuarioCadastro
 )values(
  '".$ativo."',
   '".$quantidade."',
   '".$quantidadeMin."',
   'S',
    '".$observacao."',
    '".$urlImg."',
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
        quantidadeMinAtivo,
        observacaoAtivo,
        idMarca,
        idTipo,
        urlImagem
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

if ($acao == 'update') {
    $queryUpdate = "UPDATE 
                            ativo 
                    SET 
                            descricaoAtivo = '$ativo', 
                            quantidadeAtivo = '$quantidade', 
                             quantidadeMinAtivo = '$quantidadeMin', 
                            idTipo = '$tipo', 
                            idMarca = '$marca', 
                            observacaoAtivo = '$observacao'";

    if ($img && $img['error'] == 0) {
        $pasta_base = $_SERVER['DOCUMENT_ROOT'].'/aulasenac/projeto_cadastro/uploads/';
        $data = date("YmdHis");
        $extensao = explode('/', $img['type'])[1];

        $sql_remove= "SELECT urlImagem FROM ativo WHERE idAtivo=$idAtivo";
        $result_remove = mysqli_query($conexao,$sql_remove) or die(false);
        $info = $result_remove->fetch_all(MYSQLI_ASSOC);

        $img_antiga= $_SERVER['DOCUMENT_ROOT'].'/'.$info[0]['urlImagem'];
        unlink($img_antiga);

    }
        if (move_uploaded_file($img['tmp_name'], $pasta_base . $data . '.' . $extensao)) {
            $urlImg = 'aulasenac/projeto_cadastro/uploads/' . $data . '.' . $extensao;
            $queryUpdate .= ", urlImagem = '$urlImg'";
        }
    

    $queryUpdate .= " WHERE idAtivo = $idAtivo";

    if (mysqli_query($conexao, $queryUpdate)) {
        echo "Informações Alteradas";
    }
}
?>