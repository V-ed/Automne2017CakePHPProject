$(function () {
    $("#ajaxreq").click(function () {
        $.get($(this).attr('href'), {}, function (data) {
            $('#viewport').empty().append(data);
        });
        return(false);
    });
});
