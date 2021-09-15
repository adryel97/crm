$(document).ready(function () {
    logout();
});
function logout()
{
    $('#logout').click(function () { 
        router = $(this).attr('router'),
        $.ajax({
            type: "POST",
            url: router,
            success: function (data) {
                window.location.href = router;
            }
        });
    });
}