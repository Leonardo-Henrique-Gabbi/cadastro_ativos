<?php
include_once('cabecario.php'); 
?>

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
            <label for="recipient-name" class="col-form-label">Descrição do Tipo</label>
            <input type="text" class="form-control" id="descricao">
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