<?php
session_start();
// Hủy session
session_destroy();
unset($_SESSION['user']);
?>

<script>
    alert("Đăng xuất thành công");
    window.location.href = "./index.php";
</script>