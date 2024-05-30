<?php
// Lấy đường dẫn (path)
$path = $_SERVER['REQUEST_URI'];
$current_path = pathinfo(basename($path))['filename'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Safe Tour | 52200103 - 52200069</title>
    <link rel="icon" type="image/x-icon" href="./assets/favicon/lgoo.png">
    <!-- RESET CSS -->
    <link rel="stylesheet" href="./assets/styles/reset.css" />
    <!-- BASE CSS -->
    <link rel="stylesheet" href="./assets/styles/base.css" />

    <!-- GG FONT -->
    <link rel="stylesheet" href="./assets/fonts/stylesheet.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet" />

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/styles/header.css">
    <link rel="stylesheet" href="./assets/styles/footer.css">
</head>

<body>
    <!-- HEADER - NAVBAR - REUSE FOR ALL PAGES -->
    <header>
        <div id="navbar" class="navbar">
            <div class="container">
                <div class="navbar__wrapper">
                    <!-- BRAND -->
                    <div class="navbar__brand">
                        <a href="#!"><img src="./assets/images/logo.png" alt="Safe Tour" class="navbar__logo" /></a>
                    </div>

                    <!-- NAVBAR LIST -->
                    <ul class="navbar__list">
                        <li><a href="./index.php" class="navbar__link <?php echo $current_path === '' || $current_path === 'index' ? 'active' : ''; ?>">Trang chủ</a></li>
                        <li><a href="./about.php" class="navbar__link <?php echo $current_path === 'about' ? 'active' : ''; ?>">Giới thiệu</a></li>
                        <li><a href="./destination.php" class="navbar__link <?php echo $current_path === 'destination' ? 'active' : ''; ?>">Điểm đến</a></li>
                        <li><a href="./blog.php" class="navbar__link <?php echo $current_path === 'blog' ? 'active' : ''; ?>">Bài viết</a></li>
                        <li><a href="./tour.php" class="navbar__link <?php echo $current_path === 'tour' ? 'active' : ''; ?>">Tours</a></li>
                        <li><a href="./contact.php" class="navbar__link <?php echo $current_path === 'contact' ? 'active' : ''; ?>">Liên hệ</a></li>
                    </ul>

                    <!-- NAVBAR ACTION -->
                    <div class="navbar__action">
                        <?php
                        session_start();
                        if (isset($_SESSION['user']) != "") {
                            echo '<span class="user-email">' . $_SESSION['user'] . '
                                    <a style="margin-left: 10px;" href="./logout.php" class="link-logout">Đăng xuất</a>
                                 </span>';
                        } else {
                            echo '<span>
                            <a href="./login.php" class="navbar-contact__btn btn">Đăng nhập</a>
                            <a href="./sign-up.php" class="navbar__sign-up">Đăng ký</a>
                          </span>';
                        }
                        ?>


                    </div>
                </div>
            </div>
        </div>
    </header>
</body>

</html>