$(document).ready(function(){
    $("#salva_info").click(function(){
     let descricao_ativo = $("#descricao").val();
     let quantidade_ativo = $("#quantidade").val();
     let marca_ativo = $("#marca").val();
     let tipo_ativo = $("#tipo").val();
     let observacao_ativo = $("#observação").val();
     alert(descricao_ativo);

     $.ajax({type: 'POST',
        url: "../controle/ativos_controller.php",
        data: {
            ativo: descricao_ativo,
            marca:marca,
            tipo:tipo,
            quantidade:quantidade,
            observacao:observacao
        },
        success: function(result){
        console.log(result);
      }});
    });
    
    });
  