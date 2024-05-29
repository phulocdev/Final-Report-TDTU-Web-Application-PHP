<?php
session_start();

use LDAP\Result;

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
  $u_repass = $_POST['txtRePassword'];

  // Kiểm tra mật khẩu nhập lại
  if ($u_password !== $u_repass) {
?>
    <script>
      alert("Vui lòng kiểm tra lại mật khẩu");
      window.location.href = './sign-up.php'
    </script>
  <?php
    return;
  }

  // Kiểm tra xem tài khoản đã tồn tại chưa
  $userArr = User::getAccount($u_email);
  $existUser = reset($userArr);
  if ($existUser) {
  ?>
    <script>
      alert("Tài khoản này đã tồn tại");
      window.location.href = './sign-up.php'
    </script>
  <?php
    return;
  }

  // Nếu không có lỗi, tiếp tục xử lý đăng ký tài khoản
  $account = new User($u_email, $u_password, 0);
  $result = $account->save();

  if (!$result) {
  ?>
    <script>
      alert("Có lỗi xảy ra, vui lòng kiểm tra lại Giới thiệu");
    </script>
  <?php
  } else {
    $_SESSION['user'] = $u_email;
  ?>
    <script>
      alert("Đăng ký tài khoản thành công");
      window.location.href = './index.php';
    </script>
<?php
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Đăng ký</title>
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
        <h1 class="login__title" style="font-size: 45px">Chào mừng bạn đã đến với Safe tour</h1>
        <p style="font-size: 20px">Bạn cần phải đăng ký tài khoản để có thể sử dụng hệ thống</p>
        <a class="home-link" href="./index.php">🏠Trang chủ</a>
      </div>

      <div class="login__main">
        <form autocomplete="off" method="post" class="login-form">
          <h2 class="login-title">Đăng ký</h2>
          <div class="mb-3">
            <label for="email" class="form-label">Email </label>
            <input require name="txtEmail" type="email" class="form-control" id="email" placeholder="Enter your email..." />
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Password </label>
            <input require name="txtPassword" type="Password" class="form-control" id="password" placeholder="Enter your password..." />
          </div>

          <div class="mb-3">
            <label for="rePassword" class="form-label">Nhập lại password
            </label>
            <input require name="txtRePassword" type="Password" class="form-control" id="rePassword" placeholder="Enter your password..." />
          </div>

          <div style="display: flex; justify-content: center">
            <button type="submit" class="btn btn-login btn-primary" name="btn-signup">
              Sign Up
            </button>
          </div>

          <span class="signUp-desc">Bạn đã có tài khoản? <a href="./login.php">Đăng nhập tại đây</a></span>
        </form>
      </div>
    </div>
  </div>
</body>

</html>