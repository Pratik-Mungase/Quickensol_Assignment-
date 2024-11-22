$(document).ready(function () {

    $('#open_register').click(function () {
        $('.login').addClass('d-none');
        $('.register').removeClass('d-none');
    })
    $('#open_login').click(function () {
        $('.register').addClass('d-none');
        $('.login').removeClass('d-none');
    })


    // Login Logic with Validations
    $("#login_btn").click(function (event) {
        const username = $('#username').val().trim();
        const password = $('#password').val().trim();
    
        // Regular Expressions for Validation
        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;
        const usernameRegex = /^[a-zA-Z0-9_@#$]+$/;
    
        let isValid = true;
    
        // Username Validation
        if (username === "") {
            $('#username_error').removeClass('d-none').text("Username cannot be empty.");
            isValid = false;
        } else if (emailRegex.test(username) || usernameRegex.test(username)) {
            $('#username_error').addClass('d-none');
        } else {
            $('#username_error').removeClass('d-none').text("Enter a valid email address.");
            isValid = false;
        }
    
        // Password Validation
        if (password === "") {
            $('#password_error').removeClass('d-none').text("Password cannot be empty.");
            isValid = false;
        } else if (!passwordRegex.test(password)) {
            $('#password_error').removeClass('d-none').text("Password must be at least 6 characters long and include one uppercase, one number, and one special character.");
            isValid = false;
        } else {
            $('#password_error').addClass('d-none');
        }
    
        if (isValid) {
            // If validation passes, submit the form
            $("#login_form").submit();
        }
        else {
            // Prevent form submission if validation fails
            event.preventDefault();
        }
    });


    $('#username').on('keyup', () => {
        const username = $('#username').val().trim();
        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        const usernameRegex = /^[a-zA-Z0-9_@#$]+$/;

        if (emailRegex.test(username) || usernameRegex.test(username)) {
            $('#username_error').addClass('d-none');
        } else {
            $('#username_error').removeClass('d-none');
        }
    });

    $('#password').on('keyup', () => {
        const password = $('#password').val().trim();
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;

        if (passwordRegex.test(password)) {
            $('#password_error').addClass('d-none');
        } else {
            $('#password_error').removeClass('d-none');
        }
    });



    $('#togglePasswordLogin').click(function () {

        const passwordInputRegister = document.getElementById('password');
        const type = passwordInputRegister.type === 'password' ? 'text' : 'password';
        passwordInputRegister.type = type;

        // Toggle the icon
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    })

    $('#togglePasswordReg').click(function () {

        const passwordInputRegister = document.getElementById('register_password');
        const type = passwordInputRegister.type === 'password' ? 'text' : 'password';
        passwordInputRegister.type = type;
        console.log('togglePasswordReg');
        // Toggle the icon
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    })
    $('#toggleConfirmPasswordReg').click(function () {

        const passwordInputRegister = document.getElementById('register_con_password');
        const type = passwordInputRegister.type === 'password' ? 'text' : 'password';
        passwordInputRegister.type = type;

        // Toggle the icon
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    })



    $("#register_btn").click(function (event) {

        const username = $('#register_username').val().trim();
        const email = $('#register_email').val().trim();
        const password = $('#register_password').val().trim();
        const confirm_password = $('#register_con_password').val().trim();
        const profile = $('#profile_photo').val();
    
        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;
    
        let isValid = true;
    
        // Username validation
        if (username === '') {
            $('#register_username_err').removeClass('d-none').text("Username cannot be empty.");
            isValid = false;
        } else {
            $('#register_username_err').addClass('d-none');
        }
    
        // Email validation
        if (emailRegex.test(email)) {
            $('#register_email_error').addClass('d-none');
        } else {
            $('#register_email_error').removeClass('d-none').text("Enter a valid email address.");
            isValid = false;
        }
    
        // Password validation
        if (passwordRegex.test(password)) {
            $('#reg_password_error').addClass('d-none');
        } else {
            $('#reg_password_error').removeClass('d-none').text("Password must be at least 6 characters long and include an uppercase letter, a number, and a special character.");
            isValid = false;
        }
    
        // Confirm password validation
        if (confirm_password === '') {
            $('#con_password_error').removeClass('d-none').text("Confirm password cannot be empty.");
            isValid = false;
        } else if (password !== confirm_password) {
            $('#con_password_error').removeClass('d-none').text("Passwords do not match.");
            isValid = false;
        } else {
            $('#con_password_error').addClass('d-none');
        }
    
        // Profile photo validation
        if (profile === '') {
            $('#profile_photo_err').removeClass('d-none').text("Please upload a profile photo.");
            isValid = false;
        } else {
            $('#profile_photo_err').addClass('d-none');
        }
    
        if (isValid) {
            // If validation passes, submit the form
            $("#login_form").submit();
        }
        else {
            // Prevent form submission if validation fails
            event.preventDefault();
        }
    });
    
    $('#register_username').on('keyup', () => {
        const register_username = $('#register_username').val();

        if (register_username == '')
            $('#register_username_err').removeClass('d-none');
        else
            $('#register_username_err').addClass('d-none');

    });
    $('#register_email').on('keyup', () => {
        const register_email = $('#register_email').val();
        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        if (emailRegex.test(register_email))
            $('#register_email_error').addClass('d-none');
        else
            $('#register_email_error').removeClass('d-none');

    });
    $('#register_password').on('keyup', () => {
        const register_password = $('#register_password').val().trim();
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;

        if (passwordRegex.test(register_password)) {
            $('#reg_password_error').addClass('d-none');
        } else {
            $('#reg_password_error').removeClass('d-none');
        }
    });
    $('#register_con_password').on('keyup', () => {
        const register_con_password = $('#register_con_password').val().trim();
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;

        if (passwordRegex.test(register_con_password)) {
            $('#con_password_error').addClass('d-none');
        } else {
            $('#con_password_error').removeClass('d-none');
        }
    });
    $('#profile_photo').on('change', () => {
        const profilePhoto = $('#profile_photo')[0].files.length; 

        if (profilePhoto === 0) {
            $('#profile_photo_err').removeClass('d-none');  
        } else {
            $('#profile_photo_err').addClass('d-none');  
        }
    });



    // Toggle Update passwords
    $('#current_password_eye').click(function () {

        const passwordInputRegister = document.getElementById('current_password');
        const type = passwordInputRegister.type === 'password' ? 'text' : 'password';
        passwordInputRegister.type = type;
        // Toggle the icon
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    })
   
    $('#current_password').on('keyup', () => {
        const current_password = $('#current_password').val().trim();
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;

        if (passwordRegex.test(current_password)) {
            $('#cur_password_error').addClass('d-none');
        } else {
            $('#cur_password_error').removeClass('d-none');
        }
    });

    $('#register_con_password').on('keyup', () => {
        const pass1 = $('#register_password').val();
        const pass2 = $('#register_con_password').val();

        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;

        if (passwordRegex.test(pass2)) {            
            if(pass1!=pass2)
                $('#passMatch').removeClass('d-none')
            else
            $('#passMatch').addClass('d-none')
        }
    })


});
