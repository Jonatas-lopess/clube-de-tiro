$(document).ready(function () {
    var width = $(window).width();
    var x,y;

    if (width < 500) {
        $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            info: false,
            lengthChange: false,
            searching: false,
            ajax: APP_URL+"/painel/get-users/",
            columns: [
                {data: 'name', name: 'name', orderable: false},
                {data: 'role', name: 'role'},
                {
                    data: 'action', 
                    name: 'action', 
                    orderable: false, 
                    searchable: false
                },
            ],
            columnDefs: [
                {width: "25%", "targets": 2},
                {width: "10%", "targets": 1},
            ],    
            initComplete: function (s, data) {
                $('.edit').click((e) => {
                    function checkId(u) {
                        return u.id = id;
                    }
                    var id = $(e.target).parents('td:first').siblings().eq(0).text();
                    var user = data.data.find(checkId);

                    $('#name').val(user.name);
                    $('#email').val(user.email);
                    $('#exampleModalLabel').text('Registro - ' + user.name);
                    x = $('#password').parents('div.divpass').detach();
                    y = $('#password-confirm').parents('div.divpass').detach();
                    $('#role').val(user.role);
                    $('#exampleModal').modal();
                });

                $('.delete').click((e) => {
                    bootbox.confirm("Deseja realmente excluir este usúario? Esta ação será permanente.", function (result) {
                        if (result) {
                            var url = APP_URL+'/painel/user-delete';
                            var form = $('<form method="POST" action="' + url + '">' +
                            '<input type="hidden" name="_token" value="' + $('meta[name="csrf-token"]').attr('content') + '">' +
                            '<input type="text" name="user" value="' + $(e.target).parents('td:first').siblings().eq(0).text() + '" />' +
                            '</form>');
                            $('body').append(form);
                            form.submit();
                        }
                    });
                });
            }
        });
    } else {
        $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            info: false,
            lengthChange: false,
            searching: false,
            ajax: APP_URL+"/painel/get-users/",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name', orderable: false},
                {data: 'role', name: 'role'},
                {
                    data: 'action', 
                    name: 'action', 
                    orderable: false, 
                    searchable: false
                },
            ],
            columnDefs: [
                {width: "25%", "targets": 3},
                {width: "10%", "targets": [0,2]},
            ],
            initComplete: function (s, data) {
                $('.edit').click((e) => {
                    function checkId(u) {
                        return u.id == id;
                    }
                    var id = parseInt($(e.target).parents('td:first').siblings().eq(0).text());
                    var user = data.data.find(checkId);

                    $('#exampleModalLabel2').text('Registro - ' + user.name);
                    $('#name2').val(user.name);
                    $('#role2').val(user.role);
                    $('#user').val(user.id);
                    $('#exampleModal2').modal();
                });

                $('.delete').click((e) => {
                    bootbox.confirm("Deseja realmente excluir este usúario? Esta ação será permanente.", function (result) {
                        if (result) {
                            var url = APP_URL+'/painel/user-delete';
                            var form = $('<form method="POST" action="' + url + '">' +
                            '<input type="hidden" name="_token" value="' + $('meta[name="csrf-token"]').attr('content') + '">' +
                            '<input type="hidden" name="user" value="' + $(e.target).parents('td:first').siblings().eq(0).text() + '">' +
                            '</form>');
                            $('body').append(form);
                            form.submit();
                        }
                    });
                });
            }
        });
    };
});