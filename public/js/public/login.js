$(document).ready(function () {
    if (localStorage.getItem('login-token')) {
        $("#my_logout").show();
        $("#my_account").show();
        $("#my_login").css("display", "none");
    }
    $(document).on('click', '#login', function (event) {
        event.preventDefault();
        $.ajax({
            url: "/api/login",
            type: "post",
            headers: {
                'Accept': 'application/json',
            },
            data: {
                email: $('#email_login').val(),
                password: $('#password_login').val()
            },
            success: function (response) {
                localStorage.setItem('login-token', response.result.token);
                window.localStorage.setItem('user', JSON.stringify(response.result.user));
                alert("Login success");
                window.location.href = 'http://' + window.location.hostname;
            },
            statusCode: {
                401: function (response) {
                    alert(response.responseJSON.error);
                    $('input[type="password"]').val('');
                }
            }
        });
    });

    $(document).on('click', '#my_logout', function (event) {
        event.preventDefault();
        var token = localStorage.getItem('login-token');
        $.ajax({
          url: "/api/logout",
          type: "post",
          headers: {
            'Accept': 'application/json',
            'Authorization': 'Bearer ' + token
          },
          success: function (response) {
            localStorage.removeItem('login-token');
            localStorage.removeItem('user');
            window.location.href = 'http://' + window.location.hostname;
          }
        });
    });

    $(document).on('click', '#register', function (event) {
        event.preventDefault();
         $.ajax({
            url: "/api/register",
            type: "post",
            headers: {
                'Accept': 'application/json'
            },
            data: {
                full_name: $('#register_name').val(),
                email: $('#register_email').val(),
                password: $('#register_password').val(),
                phone: $('#register_phone').val(),
                address: $('#register_address').val(),
            },
             success: function (response) {
                 localStorage.setItem('login-token', response.result.token);
                 window.localStorage.setItem('user', JSON.stringify(response.result.user));
                 alert("Success!");
                 window.location.href = 'http://' + window.location.hostname;
             },
             error: function (response) {
                errors = Object.keys(response.responseJSON.errors);
                errors.forEach(error => {
                    $('#' + error + '_error').html(response.responseJSON.errors[error]);
                    $('#' + error + '_error').show();
                });
             }
         });
     })
})
