$(document).ready( function () {
    new DataTable('#table', {
        layout: {
            topStart: {
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
             }
            },
            language: {
                search: "Pesquisar:",
                paginate: {
                    previous: "Anterior",
                    next: "Próximo "
                },
                info: "Exibindo END de TOTAL registros"
            }
        });
    });