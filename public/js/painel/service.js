$(document).ready(function () {  
    table = $('#table-service').DataTable({
        info: false,
        lengthChange: false,
        searching: false,
        processing: true,
        serverSide: true,
        ajax: APP_URL+'/painel/get-services/',
        columns: [
            {data:'name', orderable: false},
            {data:'action', orderable: false}
        ],
        columnDefs: [
            {width: "75%", "targets": 0}
        ],
        initComplete: function (s, data) {
            $('.edit').click((e) => {
                var serviceName = $(e.target).parents('td:first').siblings().eq(0).text();
                var service = data.data.find(obj => obj.name == serviceName);

                $('#exampleModalLabel2').text('Serviço - ' + serviceName);
                $('#name2').val(serviceName);
                $('#service').val(service.id);
                $('#description2').val(service.description);
                $('#exampleModal2').modal();
            });

            $('.delete').click((e) => {
                var serviceName = $(e.target).parents('td:first').siblings().eq(0).text();
                var service = data.data.find(obj => obj.name = serviceName);

                bootbox.confirm("Deseja realmente excluir este serviço? Esta ação será permanente.", function (result) {
                    if (result) {
                        var url = APP_URL+'/painel/service-delete';
                        var form = $('<form method="POST" action="' + url + '">' +
                        '<input type="hidden" name="_token" value="' + $('meta[name="csrf-token"]').attr('content') + '">' +
                        '<input type="hidden" name="service" value="' + service.id + '">' +
                        '</form>');
                        $('body').append(form);
                        form.submit();
                    }
                });
            })
        }
    });
});