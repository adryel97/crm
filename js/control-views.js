var root = window.location.protocol + '//' +window.location.hostname;
$(document).ready(function () {
    getUser()
});



function getUser()
{
    $.ajax({
        type: "GET",
        url: root+"/system//control/template",
        dataType: "json",
        success: function (data) {
            $('.name__user--title').html(`<i class="fas fa-user-circle fa-lg"></i> ${data.name_user}`)
        }
    });
}

function getPictureActual()
{
    $.ajax({
        type: "GET",
        url: root+"/system/kanban/picture/actual",
        cache: false,
        dataType: "json",
        success: function (data) {
            if(data == false){
                $('.task').attr('href', `${root}/system/kanban/picture`);
            } else {
                $('.task').attr('href', `${root}/system/kanban/picture/${data[0].namePicture}/${data[0].idPicture}`);
            }
        }
    });
}