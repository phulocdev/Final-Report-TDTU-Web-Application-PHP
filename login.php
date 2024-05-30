<?php
session_start();

// Kiểm tra người dùng đã đăng nhập chưa
if (isset($_SESSION['user'])) {
  // Người dùng đã đăng nhập, trả về trang chủ
  header("Location: index.php");
  exit; // Dừng thực hiện script sau khi chuyển hướng
}

require_once("./entities/user.class.php");

// Kiểm tra giá trị được gửi từ form đăng ký
if (isset($_POST['btn-signup'])) {
  $u_email = $_POST['txtEmail'];
  $u_password = $_POST['txtPassword'];

  // Kiểm tra xem tài khoản đã tồn tại chưa

  if (User::getAccount($u_email) == null) {
?>
    <!-- Tài khoản không tồn tại, chuyển hướng về trang đăng nhập -->
    <script>
      alert('Tài khoản không tồn tại. Vui lòng đăng ký');
      window.location = './login.php';
    </script>";
<?php
    exit;
  }

  $result = User::checkLogin($u_email, $u_password);

  if (!$result) {
    // Email hoặc mật khẩu không chính xác, hiển thị thông báo và tiếp tục ở trang hiện tại
    echo "<script>alert('Vui lòng kiểm tra lại email và mật khẩu');</script>";
  } else {
    // Đăng nhập thành công, lưu Giới thiệu người dùng vào session và chuyển hướng đến trang phù hợp
    $_SESSION['user'] = $u_email;
    $userArr = User::getAccount($u_email);
    $userRole = $userArr[0]['role'];
    $redirectUrl = ($userRole == 1) ? './admin_country.php' : './index.php';
    header("Location: $redirectUrl");
    exit;
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> Đăng nhập</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="./assets/favicon/logo.png" />

  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="./assets/styles/login.css" />
</head>

<body>
  <div class="login__wrapper">
    <div class="login__row">
      <div class="login__content">
        <h1 class="login__title" style="font-size: 45px;">Chào mừng bạn đã đến với Safe Tour</h1>
        <p style="font-size: 20px;">Hãy đăng nhập để có thể sử dụng dịch vụ của chúng tôi</p>
        <a class="home-link" href="./index.php">🏠Trang chủ</a>
      </div>

      <div class="login__main">
        <form method="post" class="login-form">
          <h2 class="login-title">Đăng nhập</h2>
          <div class="mb-3">
            <label for="email" class="form-label">Email </label>
            <input require name="txtEmail" type="email" class="form-control" id="email" placeholder="Enter your email..." />
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Password </label>
            <input require name="txtPassword" type="Password" class="form-control" id="password" placeholder="Enter your password..." />
          </div>

          <div>
          </div>

          <div style="display: flex; justify-content: center">
            <button name="btn-signup" type="submit" class="btn btn-login btn-primary">
              Log In
            </button>
          </div>

          <span class="signUp-desc">Bạn chưa có tài khoản? <a href="./sign-up.php">Đăng ký tại đây!!!</a></span>
        </form>
      </div>
    </div>
  </div>
</body>

</html>