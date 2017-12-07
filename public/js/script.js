$(document).ready(function () {
    $('#create').on("click", function () {
        var id = $('#sendid').html();
        var author = $('#senduser').html();
        var text = $('#text').val();
        $.ajax({
            url: '/comments/create',
            method: 'post',
            data: {
                id: id,
                text: text,
                author: author
            },
            success: function (html) {
                $('#comments').html(html);
            }
        });

    });

    var flag = true;
    $('#comments_down').css('cursor', 'pointer').on('click', function () {
        if(flag == true){
            flag =!flag;
            $('#comments_down').html('показать');
            $('#comments').hide();
        } else {
            flag =!flag;
            $('#comments_down').html('скрыть');
            $('#comments').show();
        }

    });

});