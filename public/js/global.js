$(document).ready(function () {
    $status_button = $(".status--check").html();

    var type_action = {
        select_key: function () {
            $('.password-input').addClass('hide');
            $('.password-input').val('');
            $('.username-input').removeClass('hide');
            $('.key-file').removeClass('hide');
        },
        select_normal: function () {
            $('.username-input').removeClass('hide');
            $('.password-input').removeClass('hide');
            $('.key-file').addClass('hide');
            $('.key-file').val('');
        },
        select_anonymous: function () {
            $('.username-input').addClass('hide');
            $('.username-input').val('');
            $('.password-input').addClass('hide');
            $('.password-input').val('');
            $('.key-file').addClass('hide');
            $('.key-file').val('');
        }
    };

    $('#protocol').change(function () {
        var protocol = $('#protocol :selected').val();
        if (protocol == 'ftp') {
            $('#type option[value=key]').remove();
        } else {
            $('#type').append(new Option("Key File", "key"));
        }
        $('#type option[value=normal]').prop('selected', 'selected');
        type_action.select_normal();
    });

    $('#type').change(function () {
        var type = $('#type :selected').val();
        if (type == 'key') type_action.select_key();
        else if (type == 'normal') type_action.select_normal();
        else if (type = 'anonymous') type_action.select_anonymous();
    });
});

function checkStatus(div, url) {
    $("#" + div).html('loading...');
    $.ajax({
        'url': url,
        data: {},
        success: function(xhr, status) {
            $("#status").html('<b>Success</b> ' + $status_button);
        },
        error: function (xhr, status) {
            $("#status").html('<b>Error</b> ' + $status_button);
        }
    });
}