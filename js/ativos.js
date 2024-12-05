$(document).ready(function(){
    $("#salvar_info").click(function(){
     let descricao_ativo = $("#descricao").val();
     let quantidade_ativo = $("#quantidade").val();
     let marca_ativo = $("#marca").val();
     let tipo_ativo = $("#tipo").val();
     let observacao_ativo = $("#observacao").val();
     let idAtivo = $("#idAtivo").val();
     
     if(idAtivo== ""){
      acao='inserir';
     }else{
      acao='update';
     }

     $.ajax({
        type: 'POST',
        url: "../controle/ativos_controller.php",
        data: {
            acao:acao,
            ativo: descricao_ativo,
            marca:marca_ativo,
            tipo:tipo_ativo,
            quantidade:quantidade_ativo,
            observacao:observacao_ativo,
            idAtivo: idAtivo
        },
        success: function(result){
          alert(result);
          location.reload();
     } 
        });
    });
    
    });

    function muda_status(status,idAtivo){
  
      $.ajax({
        type: 'POST',
        url: "../controle/ativos_controller.php",
        data: {
            acao:'alterar_status',
            status:status,
            idAtivo:idAtivo
        },
        success: function(result){
          alert(result);
          location.reload();
     } 
    });
  } 
  
  function editar(idAtivo){
    
    $('#idAtivo').val(idAtivo);
    $.ajax({
      type: 'POST',
      url: "../controle/ativos_controller.php",
      data: {
          acao:'get_info',
          idAtivo:idAtivo
      },
      success: function(result){
        retorno=JSON.parse(result)
        $('#btn_modal').click();
        
         $("#descricao").val(retorno[0]['descricaoAtivo']);
      $("#quantidade").val(retorno[0]['quantidadeAtivo']);
      $("#marca").val(retorno[0]['idMarca']);
      $("#tipo").val(retorno[0]['idTipo']);
      $("#observacao").val(retorno[0]['observacaoAtivo']);
      
     console.log(retorno)
      
   } 
  });
  $ ('#modal'). click();
  };
  function limpar_modal(){
    $("#descricao").val('');
      $("#quantidade").val('');
      $("#marca").val('');
      $("#tipo").val('');
      $("#observacao").val('');
      $("idAtivo").val('');
  }