<?php
if (isset($_POST['document_id'])) {
    $documentID = $_POST['document_id'];

    require_once('./entities/tour.class.php');
    $result = Tour::delete($documentID);

    if ($result) {
?>
        <script>
            alert("Xóa tour thành công");
            window.location.href = 'admin_tours.php';
        </script>
    <?php
        exit();
    } else {
    ?>
        <script>
            alert("Xóa tour thất bại");
            window.location.href = 'admin_tours.php';
        </script>
<?php
        exit();
    }
}
?>