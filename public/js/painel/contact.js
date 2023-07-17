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
});