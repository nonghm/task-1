<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'database.php';
session_start();

if (!isset($_POST['email'], $_POST['password'])) {
    die("Thiếu thông tin đăng nhập.");
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user'] = $user;
    header("Location: /project_1/profile.php");
    exit;
} else {
    echo '
    <!DOCTYPE html>
    <html lang="vi">
    <head>
        <meta charset="UTF-8">
        <title>Đăng nhập thất bại</title>
        <style>
            .container {
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 20px;
                margin-top: 50px;
                flex-wrap: wrap;
            }
            .tenor-gif-embed {
                max-width: 300px;
                flex-shrink: 0;
            }
            .error {
            font-size: 50px;
            font-weight: bold;
            }
            .error a {
            display: block;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <!-- GIF bên trái -->
            <div class="tenor-gif-embed" data-postid="7092770805902844215" data-share-method="host" data-aspect-ratio="1" data-width="300px">
                <a href="https://tenor.com/view/aaaah-cat-gato-gato-gritando-gif-7092770805902844215">Aaaah Cat Sticker</a>
            </div>

            <div class="error">
                Sai email hoặc mật khẩu.<br>
                <a href="dang_nhap.html">Quay lại đăng nhập</a>
            </div>

            <!-- GIF bên phải -->
            <div class="tenor-gif-embed" data-postid="7092770805902844215" data-share-method="host" data-aspect-ratio="1" data-width="300px">
                <a href="https://tenor.com/view/aaaah-cat-gato-gato-gritando-gif-7092770805902844215">Aaaah Cat Sticker</a>
            </div>
        </div>

        <script type="text/javascript" async src="https://tenor.com/embed.js"></script>
    </body>
    </html>
    ';
}

?>
