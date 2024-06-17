<?php
session_start();

if(!isset($_SESSION['valid'])){
    header("Location:" . site_url(''));
}

if(!isAdmin()){
    header("Location:" . site_url('/student/index'));
}

?>

<head>
    <title>UIT Student Update</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="./assets/js/index.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style type="text/css">
        .brand {
            background: #cbb09c !important;
        }

        .brand-text {
            color: #cbb09c !important;
        }

        form {
            max-width: 460px;
            margin: 20px auto;
            padding: 20px;
        }

        .error-message {
            color: red;
            font-size: 0.875rem;
            display: none;
        }

        #updateBtn:disabled {
            background-color: #d1d5db;
            cursor: not-allowed;
        }
    </style>
</head>

<body class="grey lighten-4 overflow-y-hidden">
    <?php require_once APP_ROOT. "/views/layouts/header.php"; ?>

    <div id="updateModal">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <form action="<?php echo site_url('/student/update/' . $student['code']); ?>" method="post" class="w-full max-w-lg mx-auto p-8">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="hoten">
                                Họ và tên
                            </label>
                            <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($student['username']); ?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="hoten" type="text" placeholder="Họ và tên">
                            <span class="error-message" id="username-error"></span>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="hoten">
                                Email
                            </label>
                            <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($student['email']); ?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="hoten" type="text" placeholder="Họ và tên">
                            <span class="error-message" id="email-error"></span>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="khoa">
                                Khoa
                            </label>
                            <input type="text" name="department" id="department" value="<?php echo htmlspecialchars($student['department']); ?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="khoa" type="text" placeholder="Khoa">
                            <span class="error-message" id="department-error"></span>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nganh">
                                Chuyên ngành
                            </label>
                            <input type="text" name="major" id="major" value="<?php echo htmlspecialchars($student['major']); ?>" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="nganh" type="text" placeholder="Ngành">
                            <span class="error-message" id="major-error"></span>
                        </div>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" id="updateBtn" disabled class="confirmUpdateBtn mr-2 inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Cập nhập
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php require_once APP_ROOT . "/views/layouts/footer.php"; ?>

    <script>
        $(document).ready(function() {
            let isValidUserName = true;
            let isValidEmail = true;
            let isValidDeparment = true;
            let isValidMajor = true;
            let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            let initialData = {
                username: $('#username').val().trim(),
                email: $('#email').val().trim(),
                department: $('#department').val().trim(),
                major: $('#major').val().trim()
            };

            function validateUserName(value) {
                if (value.trim() == '') {
                    $('#username-error').text('Vui lòng nhập thông tin').show();
                    isValidUserName = false;
                } else if (value.trim().length > 30) {
                    $('#username-error').text('Vui lòng nhập không quá 30 ký tự').show();
                    isValidUserName = false;
                } else {
                    $('#username-error').hide();
                    isValidUserName = true;
                }
            }

            function validateEmail(value) {
                if (value.trim() == '') {
                    $('#email-error').text('Vui lòng nhập thông tin').show();
                    isValidEmail = false;
                } else if (!emailPattern.test(value.trim())) {
                    $('#email-error').text('Vui lòng nhập đúng định dạng email').show();
                    isValidEmail = false;
                } else if (value.trim().length > 30) {
                    $('#email-error').text('Vui lòng nhập không quá 30 ký tự').show();
                    isValidEmail = false;
                } else {
                    $('#email-error').hide();
                    isValidEmail = true;
                }
            }

            function validateDepartment(value) {
                if (value.trim() == '') {
                    $('#department-error').text('Vui lòng nhập thông tin').show();
                    isValidDeparment = false;
                } else if (value.trim().length > 30) {
                    $('#department-error').text('Vui lòng nhập không quá 30 ký tự').show();
                    isValidDeparment = false;
                } else {
                    $('#department-error').hide();
                    isValidDeparment = true;
                }
            }

            function validateMajor(value) {
                if (value.trim() == '') {
                    $('#major-error').text('Vui lòng nhập không tin').show();
                    isValidMajor = false;
                } else if (value.trim().length > 30) {
                    $('#major-error').text('Vui lòng nhập không quá 30 ký tự').show();
                    isValidMajor = false;
                } else {
                    $('#major-error').hide();
                    isValidMajor = true;
                }
            }

            $('#username, #department, #major, #email').on('input', function() {
                const inputId = $(this).attr('id');
                let value = $(this).val();
                if (inputId === 'username') {
                    validateUserName(value)
                } else if (inputId === 'email') {
                    validateEmail(value);
                } else if (inputId === 'department') {
                    validateDepartment(value);
                } else if (inputId === 'major') {
                    validateMajor(value);
                }

                let initialValue = initialData[inputId];
        
                if (value.trim() === initialValue) {
                    $(this).removeClass('changed');
                } else {
                    $(this).addClass('changed'); 
                }

                $('#updateBtn').prop('disabled', 
                $('.changed').length !== 0 && isValidUserName && isValidEmail && isValidDeparment && isValidMajor  
                 ? false : true)
            });
        });
    </script>
</body>