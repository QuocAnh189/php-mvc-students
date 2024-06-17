<?php require_once APP_ROOT . '/services/AuthService.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrQkTyxmtzHd7eHEF1TRJvT6xjLuvp3eMa2OJoXeMyRphAs8gMDJK3Mh07La76PpEAZH5ReZ0mpmXZ1yA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        .error-message {
            color: red;
            font-size: 0.875rem; 
            display: none; 
        }

        #signup-btn:disabled {
            background-color: #d1d5db; 
            cursor: not-allowed; 
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-10 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Đăng ký</h2>
            <form action="<?php echo site_url('/auth/signup'); ?>" method="post" autocomplete="off" class="space-y-6">
                <div>
                    <label for="username" class="block mb-2 text-sm">Tên đăng nhập</label>
                    <input type="text" id="username" name="username" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <span class="error-message" id="username-error"></span>
                </div>
                <div >
                    <label for="password" class="block mb-2 text-sm">Mật khẩu</label>
                    <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <span class="error-message" id="password-error"></span>
                </div>
                <div class="input-container">
                    <label for="confirm_password" class="block mb-2 text-sm">Xác nhận mật khẩu</label>
                    <input type="password" id="confirm_password" name="confirm_password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <span class="error-message" id="confirm-password-error"></span>
                </div>
                <div>
                    <label class="block mb-2 text-sm">Bạn muốn là ?</label>
                    <div class="flex items-center mb-4">
                        <input type="radio" checked="true" id="admin" name="role" value="user" class="mr-2" required>
                        <label for="admin" class="mr-4">User</label>
                        <input type="radio" id="user" name="role" value="admin" class="mr-2">
                        <label for="user">Admin</label>
                    </div>
                </div>
                <div>
                    <button id="signup-btn" disabled type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Đăng ký</button>
                </div>
            </form>
            <p class="mt-6 text-sm text-center">Đã có tài khoản? <a href="<?php echo site_url('/auth/signin')?>" class="text-blue-500 hover:underline">Đăng nhập</a></p>
        </div>
    </div>
    <script>
         $(document).ready(function() {
            let isValidUserName = false;
            let isValidPassword = false;
            let isValidConfirmPassword = false;

            // $('input').each(function(){
            //     $(this).val('')
            // })

            function validateUsername(value) {
                if (value.trim().length < 5) {
                    $('#username-error').text('Tên đăng nhập phải có ít nhất 5 ký tự').show();
                    isValidUserName = false;
                } else if (value.trim().length > 20) {
                    $('#username-error').text('Tên đăng nhập không được quá 20 ký tự').show();
                    isValidUserName = false;
                } else {
                    $('#username-error').hide();
                    isValidUserName = true;
                }
            }

            function validatePassword(value) {
                const passwordError = $('#password-error');

                const regexLowercase = /[a-z]/;
                const regexUppercase = /[A-Z]/;
                const regexDigit = /\d/;
                const regexSpecialChar = /[\W_]/;

                if (!regexLowercase.test(value)) {
                    passwordError.text('Mật khẩu phải chứa ít nhất một chữ thường').show();
                    isValidPassword = false;
                } else if (!regexUppercase.test(value)) {
                    passwordError.text('Mật khẩu phải chứa ít nhất một chữ hoa').show();
                    isValidPassword = false;
                } else if (!regexDigit.test(value)) {
                    passwordError.text('Mật khẩu phải chứa ít nhất một chữ số').show();
                    isValidPassword = false;
                } else if (!regexSpecialChar.test(value)) {
                    passwordError.text('Mật khẩu phải chứa ít nhất một ký tự đặc biệt').show();
                    isValidPassword = false;
                } else {
                    passwordError.hide();
                    isValidPassword = true;
                }
            }

            function validateConfirmPassword(value) {
                const password = $('#password').val();

                if (password !== value) {
                    $('#confirm-password-error').text('Mật khẩu xác nhận không khớp').show();
                    isValidConfirmPassword = false;
                } else {
                    $('#confirm-password-error').hide();
                    isValidConfirmPassword = true;
                }
            }


            $('#username, #password, #confirm_password').on('input', function() {
                const inputId = $(this).attr('id');
                let value = $(this).val();
                if (inputId === 'username') {
                    validateUsername(value);
                } else if (inputId === 'password') {
                    validatePassword(value);
                } else if (inputId === 'confirm_password') {
                    validateConfirmPassword(value);
                }

                $('#signup-btn').prop('disabled', isValidUserName && isValidPassword && isValidConfirmPassword ? false : true);
            });
         })
    </script>
</body>
</html>