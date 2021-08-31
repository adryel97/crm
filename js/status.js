$(document).ready(function () {
    createStatus();

    $( ".content__list" ).sortable({
        connectWith: "ul",
    })
});

function createStatus()
{
    $('#formCreateStatus').submit(function (e) { 
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function (){
                $('.btn__save--status')
                .html(`Salvando <i class="ms-2 gg-spinner"></i>`)
                .addClass('disabled');
            },
            success: function (response) {
                console.log(response);
            },
            complete: function (){
                    $('.btn__save--status')
                    .html('Salvar')
                    .removeClass('disabled');
            }
        });
    });
}
