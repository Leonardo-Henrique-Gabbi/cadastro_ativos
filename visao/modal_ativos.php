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
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
          <div class="mb-1">
            <label for="recipient-name" class="col-form-label">Marca</label>
                  <select class="form-select" id="marca">
                  <option selected>Selecione a marca</option>
                  <option value="Lenovo">Lenovo</option>
                  <option value="Dell">Dell</option>
                  <option value="Positivo">Positivo</option>
                </select>
          </div>
          <div class="mb-1">
            <label for="recipient-name" class="col-form-label">Tipo</label>
                  <select class="form-select" id="tipo">
                  <option selected>Selecione o tipo</option>
                  <option value="Ferramentas">Ferramentas</option>
                  <option value="Hardware">Hardware</option>
                  <option value="Periféricos">Periféricos</option>
                </select>
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Observação Ativo</label>
            <input type="text" class="form-control" id="observacao">
          </div>

        
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