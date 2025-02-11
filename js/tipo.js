$(document).ready(function(){
    $("#salvar_info").click(function(){
     let descricao_tipo = $("#descricao").val();
     let idTipo = $("#idtipo").val();
     
     if(idTipo== ""){
      acao='inserir';
     }else{
      acao='update';
     }

     $.ajax({
        type: 'POST',
        url: "../controle/tipos_controller.php",
        data: {
            acao:acao,
            descricao: descricao_tipo,
            idTipo: idTipo
        },
        success: function(result){
          alert(result);
          location.reload();
     } 
        });
    });
    
    });

    function muda_status(status,idTipo){
  
      $.ajax({
        type: 'POST',
        url: "../controle/tipos_controller.php",
        data: {
            acao:'alterar_status',
            status:status,
            idTipo:idTipo
        },
        success: function(result){
          alert(result);
          location.reload();
     } 
    });
  } 
  
  function editar(idTipo){
    
    $('#idTipo').val(idTipo);
    $.ajax({ 
      type: 'POST',
      url: "../controle/tipos_controller.php",
      data: {
          acao:'get_info',
          idTipo:idTipo
      },
      success: function(result){
        retorno=JSON.parse(result)
        $('#btn_modal').click();
        
         $("#descricao").val(retorno[0]['descricaoTipo']);
    
      
     console.log(retorno)
      
   } 
  });
  $ ('#modal'). click();
  };
  function limpar_modal(){
    $("#descricao").val('');
  }