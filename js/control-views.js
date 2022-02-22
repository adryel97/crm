var root = window.location.protocol + '//' +window.location.hostname;

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


function getPicturesAll()
{
    $.ajax({
        type: "GET",
        url: root+"/system/kanban/picture/allPictures",
        cache: false,
        dataType: "json",
        success: function (data) {
            if(data.length > 0){
                $('.diver').html(`
                <li><hr class="dropdown-divider"></li>
                <li><h6 class="dropdown-header">MEUS QUADROS</h6></li>
                `);
            }
            $.each(data, function (index, value) { 
                 $('.list_pictures--menu').append(`
                    <li><a class="dropdown-item" href="${root}/system/kanban/picture/${slugify(value.name_picture, {lower: true})}/${value.id_picture}">${value.name_picture}</a></li>
                 `)
            });
        }
    });
}