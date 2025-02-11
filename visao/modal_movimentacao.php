<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar Movimentação</h1>
        <button type="button" onclick="fechar_modal()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
        <div class="mb-1">
            <label for="recipient-name" class="col-form-label">Ativo</label>
                  <select class="form-select" id="ativo" required>
                  <option selected>Selecione o ativo</option>
                      <?php 
                      foreach($ativos as $ativo){
                        echo '<option value="'.$ativo['idAtivo'].'">'.$ativo['descricaoAtivo'].'</option>';
                      }
                      ?>
                </select>
          </div>

          <div class="mb-1">
            <label for="recipient-name" class="col-form-label">Tipo de Movimentação</label>
                  <select class="form-select" id="tipoMov" required>
                  <option selected>Selecione o tipo</option>
                  <option selected>Remover</option>
                  <option selected>Realocar</option>
                  <option selected>Adicionar</option>
                </select>
          </div>

          
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Quantidade</label>
            <input type="number" class="form-control" id="quantidade" required >
          </div>
          
          
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label" >Local Origem</label>
            <input type="text" class="form-control" id="origem" >
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label" >Local Destino</label>
            <input type="text" class="form-control" id="destino" >
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label" >Descricao</label>
            <input type="text" class="form-control" id="descricao" >
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