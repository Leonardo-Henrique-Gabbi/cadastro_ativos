<?php
include_once('cabecario.php');
include_once('../controle/controle_session.php');
include_once('../controle/funcoes.php');
include('../modelo/conexao.php');
$title="Marcas";
include('menu_superior.php');
$sql = "SELECT 
idMarca,
descricaoMarca,
statusMarca,
dataCadastroMarca,
(SELECT usuario from usuario u WHERE u.idUsuario = a.usuarioCadastro) as usuario
FROM 
marca a";



$result = mysqli_query($conexao,$sql) or die (false);
$marcas= $result->fetch_all(MYSQLI_ASSOC);
?>
<head>
<link rel="stylesheet" href="../css/marca.css">

</head>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/marca.js"></script>
    <title>Marcas</title>
</head>
<body>
    
</body>
</html>
<body>
    <div class="container">
        <div class="d-flex">
            <button type="button" class="btn btn-primary cadastrar"  onclick= "limpar_modal()" data-bs-toggle="modal" data-bs-target="#exampleModal" id="modal"> Cadastrar Marca</button>
       
            <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Descrição</th>
      <th scope="col">Data Cadastro</th>
      <th scope="col">Usuario Cadastro</th>
      <th style="text-align:center;"> Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($marcas as $marca){
     ?>
     <tr>
        <td>  <?php echo $marca['idMarca']; ?></td>

        <td>  <?php echo $marca['descricaoMarca']; ?></td>

        <td>  <?php

      
        $dataCadastro = $marca['dataCadastroMarca'];
        echo date('d/m/Y H:i:s', strtotime($dataCadastro));
       ?></td>


        <td>  <?php echo $marca['usuario']; ?></td>
        <td>
          <div class= "acoes" style= "display: flex;justify-content: space-between;">
            <div class= "muda_status">
              <?php
              if( $marca['statusMarca']=="S"){
              ?>
              <div class="inativo" onclick="muda_status('N','<?php echo $marca['idMarca'];?>')">
              <i class="bi bi-toggle-off"></i>
              </div>
              <?php
              }else{
                ?>
               <div class="ativo" onclick="muda_status('S','<?php echo $marca['idMarca'];?>')">
              
               <i class="bi bi-toggle-on"></i>
              </div>
              <?php  
               }
              ?>

            </div>

            <div class="edit" >
            <i class="bi bi-pencil-square" onclick="editar('<?php echo $marca['idMarca'] ?>')"></i>
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
<input type= "hidden" id="idMarca" value="">
       
        </div>



        <?php
        include_once('modal_marca.php');
        ?>
    </div>
</body>