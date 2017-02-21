$(function () {
    $('[data-toggle="tooltip"]').tooltip();

    $('.delete').on('click', function () {
        $('#Modal_Delete').modal('show');
    });

    $('.back-btn').on('click', function () {
        parent.history.back();
        return false;
    });

    $('.logout').on('click', function (e) {
        $.post("/template/workers/logout.php", {}, function () {
            window.location.reload();
        });

        e.preventDefault();
    });

    $(document).on('click', '.login-user', function (e) {
        var $form = $('#Form_Login'),
            email = $form.find('[name="email"]').val(),
            password = $form.find('[name="password"]').val();

        $('.error-label').hide();

        $.post("/template/workers/auth_ajax.php", {email: email, password: password}, function (response) {
            $.each(response, function (key, value) {
                if(key == "no_error") {
                    window.location.reload();
                }
                $.each($form.find('.check'), function () {
                    if($(this).attr('name') == key) {
                        $(this).parent().find('.error-label').show().text(value);
                    }
                });
            });
        }, "json");

        e.preventDefault();
    });

    $(document).on('click', '.register-user', function (e) {
        var $form = $('#Form_Register'),
            name = $form.find('[name="name"]').val(),
            email = $form.find('[name="email"]').val(),
            password1 = $form.find('[name="password1"]').val(),
            password2 = $form.find('[name="password2"]').val(),
            keystring = $form.find('[name="keystring"]').val();

        $('.error-label').hide();

        console.log(name, email, password1, keystring);

        $.post("/template/workers/register_ajax.php", {name: name, email: email, password1: password1, password2: password2, keystring: keystring}, function (response) {
            $.each(response, function (key, value) {
                if(key == "no_error") {
                    window.location.reload();
                }
                $.each($form.find('.check'), function () {
                    if($(this).attr('name') == key) {
                        $(this).parent().find('.error-label').show().text(value);
                    }
                });
            });
        }, "json");

        e.preventDefault();
    });

    $(document).on('click', '.message-submit', function (e) {
        var $form = $('#Form_Message'),
            email = $form.find('[name="email"]').val(),
            messageTitle = $form.find('[name="messageTitle"]').val(),
            messageText = $form.find('[name="messageText"]').val();

        $('.error-label').hide();

        $.post("/template/workers/submit_message_ajax.php", {email: email, messageTitle: messageTitle, messageText: messageText}, function (response) {
            $.each(response, function (key, value) {
                if(key == "no_error") {
                    $('#Modal_Message').modal('hide');
                    $('#Modal_Success').modal('show');
                    $form.find('.form-control').val("");
                }
                $.each($form.find('.check'), function () {
                    if($(this).attr('name') == key) {
                        $(this).parent().find('.error-label').show().text(value);
                    }
                });
            });
        }, "json");

        e.preventDefault();
    });

    $(document).on('click', '.delete', function (e) {
        var id = $(this).data("id"),
            $row = $('tr#' + id);

        $(document).on('click', '.confirm-delete', function (e) {
            $.post("/template/workers/delete_message_ajax.php", {id: id}, function (response) {
                $('#Modal_Delete').modal('hide');
                if (response == 1) {
                    if ($row.length) {
                        window.location.reload();
                    } else {
                        history.go(-1);
                    }
                } else {
                    $('#Modal_Error').modal('show');
                }
            });

            e.preventDefault();
        });

        e.preventDefault();
    });

    $(document).on('click', '.publish', function (e) {
        var id = $(this).data("id"),
            $row = $('tr#' + id),
            $button = $(this);

        $.post("/template/workers/publish_message_ajax.php", {id: id}, function (response) {
            if (response == 1) {
                if ($row.length) {
                    $row.removeClass('warning');
                    $button.tooltip('hide');
                }
                $button.remove();
            } else {
                $('#Modal_Error').modal('show');
            }
        });

        e.preventDefault();
    });
});