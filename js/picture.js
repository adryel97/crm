var root = window.location.protocol + '//' +window.location.hostname

$(document).ready(function () {
    createPicture();
    getPictures();
    editTask();
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

function getPictures()
{
    $.ajax({
        type: "GET",
        url: root+"/system/kanban/picture/allPictures",
        cache: false,
        dataType: "json",
        success: function (data) {
            $.each(data, function (index, value) { 
                 $('.list_pictures').append(`
                 <a class="dropdown-item" href="${root}/system/kanban/picture/${slugify(value.name_picture, {lower: true})}/${value.id_picture}">${value.name_picture}</a>
                 `)
            });
        }
    });
}

function updatePicture()
{
    $.ajax({
        type: "GET",
        url: root+"/system/kanban/picture/actual",
        cache: false,
        dataType: "json",
        success: function (data) {
            var routerPicture = `${root}/system/kanban/picture/${slugify(data[0].namePicture, {lower: true})}/${data[0].idPicture}`
            window.location.href = routerPicture;
        }
    });
}