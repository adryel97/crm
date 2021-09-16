$(document).ready(function () {
    getPictureActual();
});

function getPictureActual()
{
    $.ajax({
        type: "GET",
        url: "http://www.crm.local/system/kanban/picture/actual",
        cache: false,
        dataType: "json",
        success: function (data) {
            console.log(data);
            if(data == false){
                $('.task').attr('href', 'http://www.crm.local/system/kanban/picture');
            } else {
                $('.task').attr('href', 'http://www.crm.local/system/kanban/picture/'+data);
            }
        }
    });
}