<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: /project_1/dang_nhap.html"); 
    exit;
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thông tin tài khoản</title>
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin-top: 40px;
            flex-wrap: wrap;
        }
        .tenor-gif-embed {
            max-width: 350px;
            flex-shrink: 0;
        }

    </style>
</head>
<body>
    <div class="container">
        <!-- Maxwell cat -->
        <div class="tenor-gif-embed" data-postid="6886024936073981176" data-share-method="host" data-aspect-ratio="1" data-width="350px">
            <a href="https://tenor.com/view/blu-zushi-cat-maxwell-maxwell-the-cat-black-and-white-cat-gif-6886024936073981176"></a>
        </div>

        <div class = profile-box>
            <h2>Thông tin tài khoản</h2>
            Tên: <?= htmlspecialchars($user['name']) ?><br>
            Giới tính: <?= htmlspecialchars($user['gender']) ?><br>
            Email: <?= htmlspecialchars($user['email']) ?><br>
            Địa chỉ: <?= htmlspecialchars($user['address']) ?><br>
            SĐT: <?= htmlspecialchars($user['phonenumber']) ?><br>
            <br>
            <form action="/project_1/log_out.php" method="post" style="display:inline;">
                <button type="submit">Đăng xuất</button>
            </form>

        </div>

        <!-- Maxwell cat -->
        <div class="tenor-gif-embed" data-postid="6886024936073981176" data-share-method="host" data-aspect-ratio="1" data-width="350px">
            <a href="https://tenor.com/view/blu-zushi-cat-maxwell-maxwell-the-cat-black-and-white-cat-gif-6886024936073981176"></a>
        </div>
    </div>
    <script type="text/javascript" async src="https://tenor.com/embed.js"></script>
</body>
</html>
