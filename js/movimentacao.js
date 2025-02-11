$(document).ready(function () {
    $("#salvar_info").click(function () {
      let ativo = $("#ativo").val();
      let tipo_mov = $("#tipoMov").val();
      let quantidade_mov = $("#quantidade").val();
      let origem_mov = $("#origem").val();
      let destino_mov = $("#destino").val();
      let descricao_mov = $("#descricao").val();
      let idMov = $("#idMovimentacao").val();
  
        if(ativo == "" || tipo_mov == "" || quantidade_mov == ""){
            alert('Preencha todos os campos obrigatórios');
            return false;
        }

      $.ajax({
        type: 'POST',
        url: "../controle/movimentacao_controle.php",
        data: {
          ativo: ativo,
          tipo:tipo_mov,
          quantidade:quantidade_mov,
          origem:origem_mov,
          destino:destino_mov,
          descricao:descricao_mov,
          idMov: idMov
        },
        success: function (result) {
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Operação concluída com sucesso!",
            text: result, // Exibe a mensagem retornada do servidor
            background: "#F5F5F5",
            color: "#333",
            confirmButtonColor: "#ff4757",
            showConfirmButton: false,
            timer: 2000 // Duração do alerta
          }).then(() => {
            // Após o alerta, recarrega a página
            location.reload();
          });
        
        },
        error: function (xhr) {
          Swal.fire({
            position: "center",
            icon: "error",
            title: "Ocorreu um erro na operação.",
            text: xhr.responseText, // Mostra a mensagem de erro retornada pelo servidor
            background: "#F5F5F5",
            color: "#333",
            confirmButtonColor: "#ff4757"
          });
          
        }
      });
      
    });
  });

  function fechar_modal(){
    $("#ativo").val('');
        $("#tipoMov").val('');
        $("#quantidade").val('');
        $("#origem").val('');
        $("#destino").val('');
        $("#descricao").val('');
    }