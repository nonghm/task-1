<?php require 'database.php';

if ($_POST['password'] !== $_POST['repassword']) {
    die("Mật khẩu không khớp. <a href='dang_ki.html'>Thử lại</a>");
}

$name = $_POST['name'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$address = $_POST['address'];
$phonenumber = $_POST['phonenumber'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$check = $conn->prepare("SELECT id FROM users WHERE email = ?");
$check->bind_param("s", $email);
$check->execute();
$check_result = $check->get_result();

if ($check_result->num_rows > 0) {
    ?>
    <!DOCTYPE html>
    <html lang="vi">
    <head>
        <meta charset="UTF-8">
        <title>Email đã tồn tại</title>
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
                max-width: 350px;
                flex-shrink: 0;
            }
            .message-box {
                font-size: 40px;
            }
            .message-box a {
                display: block;
                font-size: 40px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <!-- GIF bên trái -->
            <div class="tenor-gif-embed" data-postid="9245830375664146503" data-share-method="host" data-aspect-ratio="0.95" data-width="350px">
                <a href="https://tenor.com/view/cat-wow-stunned-amazing-mad-cat-gif-9245830375664146503">Cat Wow GIF</a>
            </div>

            <div class = "message-box">
                <p><strong>Email đã tồn tại!</strong></p>
                <a href="dang_ki.html">Thử lại</a>
            </div>

            <!-- GIF bên phải -->
            <div class="tenor-gif-embed" data-postid="9245830375664146503" data-share-method="host" data-aspect-ratio="0.95" data-width="350px">
                <a href="https://tenor.com/view/cat-wow-stunned-amazing-mad-cat-gif-9245830375664146503">Cat Wow GIF</a>
            </div>
        </div>

        <script type="text/javascript" async src="https://tenor.com/embed.js"></script>
    </body>
    </html>
    <?php
    exit;
}

$sql = "INSERT INTO users (name, gender, email, address, phonenumber, password)
        VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Lỗi prepare: " . $conn->error);
}

$stmt->bind_param("ssssss", $name, $gender, $email, $address, $phonenumber, $password);

if ($stmt->execute()) {
    ?>
    <!DOCTYPE html>
    <html lang="vi">
    <head>
        <meta charset="UTF-8">
        <title>Email đã tồn tại</title>
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
                max-width: 350px;
                flex-shrink: 0;
            }
            .message-box2 {
                font-size: 40px;
            }
            .message-box2 a {
                display: block;
                font-size: 40px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <!-- GIF bên trái -->
            <div class="tenor-gif-embed" data-postid="24526146" data-share-method="host" data-aspect-ratio="1" data-width="100%">
                <a href="https://tenor.com/view/party-cat-gif-24526146">Party Cat Sticker</a>
            </div> 

            <div class = "message-box2">
                <p><strong>Đăng ký thành công</strong></p>
                <a href="dang_nhap.html">Đăng nhập</a>
            </div>

            <!-- GIF bên phải -->
            <div class="tenor-gif-embed" data-postid="24526146" data-share-method="host" data-aspect-ratio="1" data-width="100%">
                <a href="https://tenor.com/view/party-cat-gif-24526146">Party Cat Sticker</a>
            </div> 

        <script type="text/javascript" async src="https://tenor.com/embed.js"></script>
    </body>
    </html>
    <?php
    exit;
} else {
    echo "Lỗi: " . $conn->error;
}
?>
