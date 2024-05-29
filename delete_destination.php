<?php
if (isset($_POST['document_id'])) {
    $documentID = $_POST['document_id'];

    require_once('./entities/destination.class.php');
    $result = Destination::delete($documentID);

    if ($result) {
?>
        <script>
            alert("Xóa địa điểm thành công");
            window.location.href = 'admin_destination.php';
        </script>
    <?php
        exit();
    } else {
    ?>
        <script>
            alert("Xóa địa điểm thất bại");
            window.location.href = 'admin_destination.php';
        </script>
<?php
        exit();
    }
}
?>