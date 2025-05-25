<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>الملف الشخصي</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .profile-card {
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 320px;
        }

        .profile-card img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
            border: 3px solid #3498db;
        }

        .profile-card h2 {
            margin: 10px 0;
            color: #333;
        }

        .profile-card p {
            margin: 5px 0;
            color: #555;
            font-size: 15px;
        }

        .label {
            font-weight: bold;
            color: #666;
        }
    </style>
</head>
<body>

<?php
if (!isset($_GET['email']) || !isset($_GET['id']) || !isset($_GET['name'])) {
    echo "Unauthorized access. Please log in.";
    exit();
}
$name = $_GET['name'];
$email = $_GET['email'];
$id = $_GET['id'];
?>
<div class="profile-card">
    <img src="" alt="">
    <h2><?php print($name)?></h2>
    <p><span class="label">Email :</span> <?php  print("$email") ?></p>
    <p><span class="label">Student_ID :</span><?php  print("$id") ?> </p>
    <!--    <p><span class="label">التخصص:</span> major </p>-->
</div>

</body>
</html>