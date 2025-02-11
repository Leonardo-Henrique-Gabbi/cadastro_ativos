$(document).ready(function(){
    $("#salvar_info").click(function(){
     let descricao_ativo = $("#descricao").val();
     let quantidade_ativo = $("#quantidade").val();
     let marca_ativo = $("#marca").val();
     let tipo_ativo = $("#tipo").val();
     let observacao_ativo = $("#observacao").val();
     let idAtivo = $("#idAtivo").val();

     let imgAtivo = $("#imgAtivo");
     console.log(imgAtivo);
     img=imgAtivo[0].files[0];
     
     if(idAtivo== ""){
      acao='inserir';
     }else{
      acao='update';
     }
     var formData = new FormData();
     formData.append('acao',acao);
     formData.append('ativo',descricao_ativo);
     formData.append('marca',marca_ativo);
     formData.append('tipo',tipo_ativo);
     formData.append('quantidade',quantidade_ativo);
     formData.append('observacao',observacao_ativo);
     formData.append('idAtivo',idAtivo);
     formData.append('img',img);
     
     $.ajax({
        type: 'POST',
        url: "../controle/ativos_controller.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function(result){
          alert(result);
          //location.reload();
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
      if (retorno[0]['urlImagem'] !="") {
        $("#previewImagem").attr("src", window.location.protocol + "//" + window.location.host+'/'+retorno[0]['urlImagem']);
        $(".div_previer").attr('style', 'display:block');
      } else {
        $(".div_previer").attr('style','display:none');
      }
    
      
   } 
  });
 
  };
  function limpar_modal(){
    $("#descricao").val('');
    $("#quantidade").val('');
    $("#marca").val('');
    $("#tipo").val('');
    $("#observacao").val('');
  
    $("#previewImagem").attr("src", ""); 
  $(".div_previer").hide(); 
  
}