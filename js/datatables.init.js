$(function () {
    var defaultTable = {
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        },
        "processing": true,
        "serverSide": true,
        "ajax": "../_app/Library/WcTable/_ajax/Table.ajax.php?arq=1"
    };
    
    $('#example').DataTable($.extend(defaultTable,options));
    
    
    //############# GERAIS
    //DELETE CONFIRM
    $('#example').on('click', '.dt_delete_action', function (e) {
        var RelTo = $(this);
        if (RelTo.hasClass('btn_red')) {
            RelTo.addClass('btn_yellow').removeClass('btn_red');
        } else {
            var DelId = RelTo.attr('id');
            var Callback = RelTo.attr('callback');
            var Callback_action = RelTo.attr('callback_action');
            $('.workcontrol_upload p').html("Processando requisição, aguarde!");
            $('.workcontrol_upload').fadeIn().css('display', 'flex');
            $.post('_ajax/' + Callback + '.ajax.php', {callback: Callback, callback_action: Callback_action, del_id: DelId}, function (data) {
                if (data.trigger) {
                    Trigger(data.trigger);
                } 
                dataTable.row( RelTo.parents('tr') ).remove().draw();
                  $('.workcontrol_upload').fadeOut();       
            }, 'json');
        }


        window.setTimeout(function () {
            RelTo.addClass('btn_red').removeClass('btn_yellow');
        }, 5000);
        e.preventDefault();
        e.stopPropagation();
    });
})