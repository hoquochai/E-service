const sendMail = (url, data) => {
    $.ajax({
        url: url,
        method: 'POST',
        data: data,
        beforeSend: function () {
            $("#overlay").fadeIn(300);
        },
        success: function (data) {
            if (data.status) {
                $('.alert-message').html('<p class="flag_msg msg_success">Send mail successfully</p>')
            } else {
                $('.alert-message').html('<p class="flag_msg msg_error">Send mail failure</p>')
            }
        },
        error: function () {
            $('.alert-message').html('<p class="flag_msg msg_error">An error occurred</p>');
        },
        complete: function () {
            $("#overlay").fadeOut(300);
            setTimeout(function () {
                $(".alert-message").fadeOut(300);
            }, 2000);
        },
    })
}
$(function () {
    const validator = $(".send-mail-fr").validate({
        rules: {
            receiver: {
                required: true,
                maxlength: 100,
                email: true
            },
            subject: {
                required: true,
                maxlength: 100,
            },
            content: {
                required: true,
                maxlength: 500,
            }
        },
        submitHandler: function () {
            const serverInfoElem = $('.server-info');
            const url = serverInfoElem.find('.url').data('value');
            const data = {
                api_key: serverInfoElem.find('.api_key').data('value'),
                receiver: $('input[name=receiver]').val(),
                subject: $('input[name=subject]').val(),
                content: $('textarea[name=content]').val(),
            }
            console.log(url, data);
            sendMail(url, data)
        }
    });
    $('.btn-send').click(function (event) {
        event.preventDefault();
        $(".send-mail-fr").submit();
    })
    $('.btn-reset').click(function (event) {
        $(".send-mail-fr").trigger("reset");
        validator.resetForm();
    });
})
