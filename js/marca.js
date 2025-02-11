$(document).ready(function(){
    $("#salvar_info").click(function(){
     let descricao_marca = $("#descricao").val();
     let idMarca = $("#idMarca").val();
     
     if(idMarca== ""){
      acao='inserir';
     }else{
      acao='update';
     }

     $.ajax({
        type: 'POST',
        url: "../controle/marcas_controller.php",
        data: {
            acao:acao,
            descricao: descricao_marca,
            idMarca: idMarca
        },
        success: function(result){
          alert(result);
          location.reload();
     } 
        });
    });
    
    });

    function muda_status(status,idMarca){
  
      $.ajax({
        type: 'POST',
        url: "../controle/marcas_controller.php",
        data: {
            acao:'alterar_status',
            status:status,
            idMarca:idMarca
        },
        success: function(result){
          alert(result);
          location.reload();
     } 
    });
  } 
  
  function editar(idMarca){
    
    $('#idMarca').val(idMarca);
    $.ajax({ 
      type: 'POST',
      url: "../controle/marcas_controller.php",
      data: {
          acao:'get_info',
          idMarca:idMarca
      },
      success: function(result){
        retorno=JSON.parse(result)
        $('#btn_modal').click();
        
         $("#descricao").val(retorno[0]['descricaoMarca']);
    
      
     console.log(retorno)
      
   } 
  });
  $ ('#modal'). click();
  };
  function limpar_modal(){
    $("#descricao").val('');
  }