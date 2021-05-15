$(document).ready(function () {

    var err_email, err_username, err_password, err_confPass;

    $('.check_email').keyup(function (e) { 
       
        var email = $('.check_email').val();
        $.ajax({
            type: "POST",
            url: "authenticate.php",
            data: {
                "check_submit_email": 1,
                "email_id": email,
            },
            success: function (response) {
                $('.error_email').text(response);
                err_email = $('.error_email').text();

                //if there is response message, means that the email exists
                if(response) 
                {
                    //Disable the register button if email exists
                    $('button[type="submit"]').prop('disabled', true);
                }
                else 
                {
                    //If there is no any errors to be changed
                    if(err_email === "" && err_username === "" && err_confPass === "" && err_password === "") {
                        //Enable the register button if no input error
                        $('button[type="submit"]').prop('disabled', false);
                    }
                }
            }
        });
    });

    $('.check_username').keyup(function (e) { 
       
        var username = $('.check_username').val();
        $.ajax({
            type: "POST",
            url: "authenticate.php",
            data: {
                "check_submit_username": 1,
                "username_id": username,
            },
            success: function (response) {
                $('.error_username').text(response);
                err_username = $('.error_username').text();

                //if there is response message, means that the username exists
                if(response) 
                {
                    //Disable the register button if username exists
                    $('button[type="submit"]').prop('disabled', true);
                }
                else 
                {
                    //If there is no any errors to be changed
                    if(err_email === "" && err_username === "" && err_confPass === "" && err_password === "") {
                        //Enable the register button if no input error
                        $('button[type="submit"]').prop('disabled', false);
                    }
                }
            }
        });
    });

    $('.check_password').keyup(function (e) { 
        
        var password = $('.check_password').val();

        if(password === "") {
            $('.error_Password').text("Please enter the password");
            $('button[type="submit"]').prop('disabled', true);
        }
        else if(password.length < 6) {
            $('.error_Password').text("Password length should be more than 6 characters");
            $('button[type="submit"]').prop('disabled', true);
        }
        else {
            $('.error_Password').text("");
        }
        err_password = $('.error_Password').text();

        //If there is no any errors to be changed
        if(err_email === "" && err_username === "" && err_confPass === "" && err_password === "") {
            //Enable the register button if no input error
            $('button[type="submit"]').prop('disabled', false);
        }
    });

    $('.check_confirm_password').keyup(function (e) { 
        
        var password = $('.check_password').val();
        var confPass = $('.check_confirm_password').val();
        
        if(password != confPass) {
            $('.error_confPass').text("Confirm password doesn't match with password. Please enter again.");
            $('button[type="submit"]').prop('disabled', true);
        }
        else {
            $('.error_confPass').text("");
        }
        err_confPass = $('.error_confPass').text();

        //If there is no any errors to be changed
        if(err_email === "" && err_username === "" && err_confPass === "" && err_password === "") {
            //Enable the register button if no input error
            $('button[type="submit"]').prop('disabled', false);
        }
    });

});
