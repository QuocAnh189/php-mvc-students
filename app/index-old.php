
<?php 
include 'models/StudentModel.php'; 
require_once __DIR__ .  '/../vendor/autoload.php';
require_once __DIR__ . '/helpers/helpers.php'; 

?>

<head>
    <title>UIT Student</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdn.tailwindcss.com"></script> 
    <script src="./assets/js/index.js"></script>
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
    <?php
    $connection = pg_connect("host=postgres dbname=firstapp user=postgres password=QuocAnh-1809");
    if(!$connection){
        echo "DB An error occurred.<br>";
        exit;
    }

    $result = pg_query($connection,"SELECT * FROM students");
    if(!$result){
        echo "TB An error occurred.<br>";
        exit;
    }
    ?>

    <table class="w-[90%] border-collapse border border-gray-400">
            <thead>
                <tr>
                    <th class="border border-gray-400 px-4 py-2">MSSV</th>
                    <th class="border border-gray-400 px-4 py-2">Họ và tên</th>
                    <th class="border border-gray-400 px-4 py-2">Khoa</th>
                    <th class="border border-gray-400 px-4 py-2">Ngành</th>
                    <th class="border border-gray-400 px-4 py-2">Tùy chọn</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($row = pg_fetch_assoc($result)) : ?>
                <tr>
                    <td class="border border-gray-400 px-4 py-2"><?php echo $row['code']; ?></td>
                    <td class="border border-gray-400 px-4 py-2"><?php echo $row['username']; ?></td>
                    <td class="border border-gray-400 px-4 py-2"><?php echo $row['department']; ?></td>
                    <td class="border border-gray-400 px-4 py-2"><?php echo $row['major']; ?></td>
                    <td class="border border-gray-400 px-4 py-2 flex align-item gap-4">
                        <button class="text-blue-500 hover:text-blue-600 updateBtn">Sửa</button>
                        <button class="text-red-500 hover:text-red-600 ml-2 deleteBtn">Xóa</button>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
    </table>

</body>

