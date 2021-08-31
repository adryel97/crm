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
                console.log(response);
            },
            complete: function (){
                    $('.btn__save--picture')
                    .html('Salvar')
                    .removeClass('disabled');
            }
        });
    });
}