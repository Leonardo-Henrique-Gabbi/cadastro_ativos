<?php
include_once('cabecario.php')

 ?>
 
 <!DOCTYPE html>
 <html lang="pt-br">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ativos</title>
 </head>
 <body>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar Ativo</h1>
        <button type="button" onclick="limpar_modal()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Descrição do Ativo</label>
            <input type="text" class="form-control" id="descricao">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Quantidade</label>
            <input type="number" class="form-control" id="quantidade">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">QuantidadeMin</label>
            <input type="number" class="form-control" id="quantidadeMin">
          </div>
          <div class="mb-1">
            <label for="recipient-name" class="col-form-label">Marca</label>
                  <select class="form-select" id="marca">
                  <option selected>Selecione a marca</option>
                  <?php
                  foreach($marcas as $marca){
                    echo '<option value="'.$marca['idMarca'].'">'.$marca['descricaoMarca'].'</option>';
                  }
                  ?>
                </select>
          </div>
          <div class="mb-1">
            <label for="recipient-name" class="col-form-label">Tipo</label>
                  <select class="form-select" id="tipo">
                  <option selected>Selecione o tipo</option>
                  <option value="1">Ferramentas</option>
                  <option value="2">Periféricos</option>
                  <option value="3">Hardware</option>
                </select>
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Observação Ativo</label>
            <input type="text" class="form-control" id="observacao">
          </div>
          <div class="mb-3">
  <label for="formFile" class="form-label">Imagem Ativo</label>
  <input class="form-control" accept="image/png, image/jpeg, image/WEBP" type="file" id="imgAtivo">
</div>
<div class="mb-3 div_previer" style="display:none;">
  <label for="formFile" class="form-label">Preview imagem</label>
                    <img  id="previewImagem" style=" width: 150px; position: relative;left:20%;">
        
        
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary" >Limpar</button>
        <button type="button" class="btn btn-primary" id="salvar_info">Salvar</button>
      </div>
      </form>
    </div>
  </div>
</div>
</body>
</head>