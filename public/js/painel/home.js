$(document).ready(function () {
    $.fn.filepond.registerPlugin(FilePondPluginFileValidateType);

    $('#imagem').filepond({
        acceptedFileTypes: ['image/*'],
        server: {
            url: 'upload-image-tmp',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }
    });

    $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        info: false,
        lengthChange: false,
        searching: false,
        ajax: APP_URL+"/painel/carrossel-imagens/",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'content', name: 'content', orderable: false},
            {
                data: 'action', 
                name: 'action', 
                orderable: false, 
                searchable: false
            },
        ],
        columnDefs: [
            {width: "25%", "targets": 2},
            {width: "10%", "targets": 0},
        ],
        initComplete: function () {
            $('.view').click((e) => {
                var img = $(e.target).parents('td:first').siblings().eq(1).text();

                var name = img.split(".")[0];
                $('#exampleModalLabel').text(name);
                $('#exampleModal .modal-body').empty();
                $('#exampleModal .modal-body').append('<img src="http://127.0.0.1/clubedetiro76/public/images/'+img+'">');
                $('#exampleModal').modal();
            });

            $('.delete').click((e) => {
                bootbox.confirm("Deseja realmente excluir esta imagem? Esta ação será permanente.", function (result) {
                    if (result) {
                        var url = APP_URL+'/painel/imagem-delete';
                        var form = $('<form method="POST" action="' + url + '">' +
                        '<input type="hidden" name="_token" value="' + $('meta[name="csrf-token"]').attr('content') + '">' +
                        '<input type="hidden" name="imagem" value="' + $(e.target).parents('td:first').siblings().eq(0).text() + '">' +
                        '</form>');
                        $('body').append(form);
                        form.submit();
                    }
                });
            });
        }
    });
});