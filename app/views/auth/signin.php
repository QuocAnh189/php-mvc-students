<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        .error-message {
            color: red;
            font-size: 0.875rem; 
            display: none; 
        }

        #signin-btn:disabled {
            background-color: #d1d5db;
            cursor: not-allowed; 
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg w-96">
            <h2 class="text-2xl font-bold mb-6 text-center">Đăng nhập</h2>
            <form action="<?php echo site_url('/auth/signin'); ?>" method="post" class="space-y-4">
                <div>
                    <label for="username" class="block mb-2 text-sm">Tên đăng nhập</label>
                    <input type="text" id="username" name="username" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <span class="error-message"></span>
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm">Mật khẩu</label>
                    <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <span class="error-message"></span>
                </div>
                <div>
                    <button id="signin-btn" disabled type="submit" class="w-full text-white py-2 rounded-lg bg-blue-500 hover:bg-blue-600">Đăng nhập</button>
                </div>
                <p class="mt-4 text-sm text-center">Chưa có tài khoản? <a href="<?php echo site_url('/auth/signup')?>" class="text-blue-500 hover:underline">Đăng ký</a></p>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            function updateButtonState() {
                let username = $('#username').val().trim();
                let password = $('#password').val().trim();
                $('#signin-btn').prop('disabled',username && password? false:true);
            }

            $('#username, #password').on('input', function() {
                let input = $(this).val().trim();
                let errorElement = $(this).next('.error-message');

                if (input === '') {
                    errorElement.text('Vui lòng nhập thông tin').show();
                } else {
                    errorElement.hide();
                }
                updateButtonState();
            });
        });
    </script>
</body>
</html>