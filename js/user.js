$(document).ready(function () {
    createUser();
});


function createUser(){
    $('#createUserForm').submit(function (e) { 
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: $(this).attr('data-action'),
            data: $(this).serialize(),
            dataType: "json",
            success: function (response) {
            }
        });
    });
}