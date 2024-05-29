<?php
if (isset($_POST['document_id'])) {
    $documentID = $_POST['document_id'];

    require_once('./entities/country.class.php');
    $result = Country::delete($documentID);

    if ($result) {
?>
        <script>
            alert("Xóa quôc gia thành công");
            window.location.href = 'admin_country.php';
        </script>
    <?php
        exit();
    } else {
    ?>
        <script>
            alert("Xóa quôc gia thất bại");
            window.location.href = 'tailieu.php';
        </script>
<?php
        exit();
    }
}
?>