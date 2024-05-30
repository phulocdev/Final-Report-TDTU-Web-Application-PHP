<?php
if (isset($_POST['document_id'])) {
    $documentID = $_POST['document_id'];

    require_once('./entities/user.class.php');
    $result = User::delete($documentID);

    if ($result) {
?>
        <script>
            alert("Xóa user thành công");
            window.location.href = 'admin_user.php';
        </script>
    <?php
        exit();
    } else {
    ?>
        <script>
            alert("Xóa user thất bại");
            window.location.href = 'admin_user.php';
        </script>
<?php
        exit();
    }
}
?>