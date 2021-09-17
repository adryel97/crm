var root = window.location.protocol + '//' +window.location.hostname
$(document).ready(function () {
    createPicture();
});

function createPicture()
{
    $('#formCreatePicture').submit(function (e) { 
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function (){
                $('.btn__save--picture')
                .html(`Salvando <i class="ms-2 gg-spinner"></i>`)
                .addClass('disabled');
            },
            success: function (response) {
                /*console.log(response);*/
                updatePicture()
            },
            complete: function (){
                    $('.btn__save--picture')
                    .html('Salvar')
                    .removeClass('disabled');
                    getPictureActual()
            }
        });
    });
}

function updatePicture()
{
    $.ajax({
        type: "GET",
        url: "http://www.crm.local/system/kanban/picture/actual",
        cache: false,
        dataType: "json",
        success: function (data) {
            var routerPicture = `${root}/system/kanban/picture/${data}`
            window.location.href = routerPicture;
            console.log(routerPicture);
        }
    });
}