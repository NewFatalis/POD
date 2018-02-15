//SIGN IN VALIDATION
//$(function () {
//    $('#sign_in').validate({
//        highlight: function (input) {
//            console.log(input);
//            $(input).parents('.form-line').addClass('error');
//        },
//        unhighlight: function (input) {
//            $(input).parents('.form-line').removeClass('error');
//        },
//        errorPlacement: function (error, element) {
//            $(element).parents('.input-group').append(error);
//        }
//    });
//});

//SIGN UP VALIDATION
$(function () {
    $('#sign_up').validate({
        rules: {
            'terms': {
                required: true
            },
            'confirm': {
                equalTo: '[name="password"]'
            }
        },
        highlight: function (input) {
            console.log(input);
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.input-group').append(error);
            $(element).parents('.form-group').append(error);
        }
    });
});

//FORGOT PASS VALIDATION
$(function () {
    $('#forgot_password').validate({
        highlight: function (input) {
            console.log(input);
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.input-group').append(error);
        }
    });
});