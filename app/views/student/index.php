<?php 
require_once APP_ROOT . '/models/StudentModel.php';

session_start();
if(!isset($_SESSION['valid'])){
    header("Location:" . site_url(''));
}

?>

<head>
    <title>UIT Student</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdn.tailwindcss.com"></script> 
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
    </style>
</head>

<body class="grey lighten-4">

    <?php require_once APP_ROOT . "/views/layouts/header.php"; ?>

    <div class="flex flex-col items-center">
        <h2 class="text-3xl font-black py-4">Thông tin Sinh viên</h2>
        <table class="w-[90%] border-collapse border border-gray-400">
            <thead>
                <tr>
                    <th class="border border-gray-400 px-4 py-2">MSSV</th>
                    <th class="border border-gray-400 px-4 py-2">Họ và tên</th>
                    <th class="border border-gray-400 px-4 py-2">Email</th>
                    <th class="border border-gray-400 px-4 py-2">Khoa</th>
                    <th class="border border-gray-400 px-4 py-2">Ngành</th>
                    <th class="<?php isAdmin() ? "border border-gray-400 px-4 py-2" : "" ?>"><?php echo isAdmin() ? "Tùy chọn": ""?></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td class="border border-gray-400 px-4 py-2"><?php echo $student['code']; ?></td>
                    <td class="border border-gray-400 px-4 py-2"><?php echo $student['username']; ?></td>
                    <td class="border border-gray-400 px-4 py-2"><?php echo $student['email']; ?></td>
                    <td class="border border-gray-400 px-4 py-2"><?php echo $student['department']; ?></td>
                    <td class="border border-gray-400 px-4 py-2"><?php echo $student['major']; ?></td>
                    <td class="<?php echo isAdmin() ? "border border-gray-400 px-4 py-2 flex align-item gap-4" : "none" ?>">
                        <a class="text-blue-500 hover:text-blue-600 updateBtn" href="<?php echo site_url('/student/update/' . $student['code']); ?>"><?php echo isAdmin() ? "Sửa": ""?></a>
                        <a href="<?php echo site_url('/student/delete/' . $student['code']); ?>" onclick="return confirm('Are you sure?')" class="text-red-500 hover:text-red-600 ml-2 deleteBtn"><?php echo isAdmin() ? "Xóa": ""?></a>
                    </td>
                </tr>
               
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php require_once APP_ROOT . "/views/layouts/modal-confirm.php"; ?>
    <?php require_once APP_ROOT . "/views/layouts/footer.php"; ?>

</body>