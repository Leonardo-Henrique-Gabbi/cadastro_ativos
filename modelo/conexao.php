<?php
//conexão com banco de dados
$conexao= mysqli_connect('localhost','root','','ativo');//hostname,username,senha,banco de dados
if(!$conexao){
    echo "falha na conexão";
    exit();
}else{
    echo 'conectou';
}

?>