<title><?php echo !isset($_POST['document_id']) ?  "Thêm tour" : "Cập nhật tour" ?></title>
<!-- PHP Code for Submit new Document -->
<?php
if (isset($_POST['document_id'])) {
    require_once('./entities/tour.class.php');
    $infor_arr = Tour::get_infor_by_id($_POST['document_id']);
    $infor_update = reset($infor_arr);
}
?>

<?php
require_once('./entities/tour.class.php');
if (isset($_POST["btnSubmit"])) {
    $tourName = $_POST["txtTourName"];
    $price = $_POST["txtPrice"];
    $soCho = $_POST["txtSoCho"];
    $soNgay = $_POST["txtSoNgay"];
    $ngayKhoiHanh = new DateTime($_POST["txtNgayKhoiHanh"]);
    $videoDesc = $_POST["txtVideoDesc"];
    $soDiemDen = $_POST["txtSoDiemDen"];
    $maKhuVuc = $_POST["txtMaKhuVuc"];
    $HdvID = $_POST["txtHdvID"];
    $thumbnail = $_FILES["txtThumbnail"];

    $newTour = new Tour($tourName, $price, $soCho, $soNgay, $ngayKhoiHanh, $videoDesc, $soDiemDen, $maKhuVuc, $HdvID, $thumbnail);
    if ($_POST["action"] != "") {
        $inforUpdate_id =  $_POST["action"];
        $result = Tour::update(
            $inforUpdate_id,
            $tourName,
            $price,
            $soCho,
            $soNgay,
            $ngayKhoiHanh,
            $videoDesc,
            $soDiemDen,
            $maKhuVuc,
            $HdvID,
            $thumbnail
        );
    } else {
        $result = $newTour->save();
    }

    if (!$result) {
        header("Location: add_update_tour.php?failure");
    } else if ($_POST["action"] != "") {
        header("Location: add_update_tour.php?updated");
    } else {
        header("Location: add_update_tour.php?inserted");
    }
}
require_once('./entities/area.class.php');
require_once('./entities/hdv.class.php');
$areaList = Area::list_area();
$hdvList = Hdv::list_hdv();
?>

<?php
if (isset($_GET["inserted"])) {
?>
    <script>
        alert("Thêm mới thông tin tour thành công✅");
        window.location.href = './admin_tours.php';
    </script>
<?php } else if (isset($_GET["updated"])) { ?>
    <script>
        alert("Cập nhật thông tin tour thành công✅");
        window.location.href = './admin_tours.php';
    </script>
<?php } else if (isset($_GET["failure"])) {
?>
    <script>
        alert("Cập nhật / Thêm thông tin tour thất bại❌");
        window.location.href = './admin_tours.php';
    </script>
<?php
}
?>

<?php include_once('./header.php') ?>
<link rel="stylesheet" href="./assets/styles/add_update.css">

<body>
    <div class="container" style="margin-top: 30px">
        <h1 style="text-transform: uppercase; font-size: 32px; text-align: center; margin-bottom: 40px; color: #ab003c"><?php echo (isset($_POST['document_id']) && count($infor_arr) === 1) ? "Cập nhật tour du lịch" : "Thêm mới tour du lịch" ?></h1>
        <form method="post" enctype="multipart/form-data" class="row g-3" style="
        padding: 28px 30px;
        background-color: white;
        color: #000;
        border-radius: 16px;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
        border: 5px solid var(--primary-color);
    ">
            <!-- TÊN tour -->
            <div class="col-lg-6" style="margin-top: 20px">
                <label style="color: #000; font-size: 19px; font-weight: 500; font-style: italic;" class="form-label">Tên tour</label>
                <input style="border-width: 2px; border-color: #000" required name="txtTourName" type="text" class="form-control" value="<?php echo isset($_POST["txtTourName"]) ? $_POST["txtTourName"] : ((isset($_POST['document_id']) && count($infor_arr) === 1) ? $infor_update["tourName"] : ""); ?>" />
            </div>

            <!-- chi phí -->
            <div class="col-lg-6" style="margin-top: 20px">
                <label style="color: #000; font-size: 19px; font-weight: 500; font-style: italic;" class="form-label">Chi phí</label>
                <input style="border-width: 2px; border-color: #000" required name="txtPrice" type="text" class="form-control" value="<?php echo isset($_POST["txtPrice"]) ? $_POST["txtPrice"] : ((isset($_POST['document_id']) && count($infor_arr) === 1) ? $infor_update["price"] : ""); ?>" />
            </div>

            <!-- số chỗ -->
            <div class="col-lg-6" style="margin-top: 20px">
                <label style="color: #000; font-size: 19px; font-weight: 500; font-style: italic;" class="form-label">Số chỗ</label>
                <input style="border-width: 2px; border-color: #000" required name="txtSoCho" type="number" class="form-control" value="<?php echo isset($_POST["txtSoCho"]) ? $_POST["txtSoCho"] : ((isset($_POST['document_id']) && count($infor_arr) === 1) ? $infor_update["soCho"] : ""); ?>" />
            </div>

            <!-- số ngày -->
            <div class="col-lg-6" style="margin-top: 20px">
                <label style="color: #000; font-size: 19px; font-weight: 500; font-style: italic;" class="form-label">Số ngày</label>
                <input style="border-width: 2px; border-color: #000" required name="txtSoNgay" type="number" class="form-control" value="<?php echo isset($_POST["txtSoNgay"]) ? $_POST["txtSoNgay"] : ((isset($_POST['document_id']) && count($infor_arr) === 1) ? $infor_update["soNgay"] : ""); ?>" />
            </div>

            <!-- ngày khởi hành -->
            <div class="col-lg-6" style="margin-top: 20px">
                <label style="color: #000; font-size: 19px; font-weight: 500; font-style: italic;" class="form-label">Ngày khởi hành</label>
                <input style="border-width: 2px; border-color: #000" required name="txtNgayKhoiHanh" type="date" class="form-control" value="<?php echo isset($_POST["txtNgayKhoiHanh"]) ? $_POST["txtNgayKhoiHanh"] : ((isset($_POST['document_id']) && count($infor_arr) === 1) ? $infor_update["ngayKhoiHanh"] : ""); ?>" />
            </div>

            <!-- số điểm đến -->
            <div class="col-lg-6" style="margin-top: 20px">
                <label style="color: #000; font-size: 19px; font-weight: 500; font-style: italic;" class="form-label">Số điểm tham quan</label>
                <input style="border-width: 2px; border-color: #000" required name="txtSoDiemDen" type="number" class="form-control" value="<?php echo isset($_POST["txtSoDiemDen"]) ? $_POST["txtSoDiemDen"] : ((isset($_POST['document_id']) && count($infor_arr) === 1) ? $infor_update["soDiemDen"] : ""); ?>" />
            </div>

            <!-- Mã khu vực-->
            <div class="col-lg-2" style="margin-top: 20px; margin-bottom: 20px">
                <label style="color: #000; font-size: 19px; font-weight: 500; font-style: italic;" for="age" class="form-label">Mã khu vực</label>
                <select style="padding: 12px;" required name="txtMaKhuVuc" id="hocvi" class="form-select">
                    <option selected value="">----Chọn---</option>
                    <?php foreach ($areaList as $item) {
                        echo "<option value='" . $item["maKhuVuc"] . "'>" . $item["tenKhuVuc"] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Mã hướng dẫn viên-->
            <div class="col-lg-2" style="margin-top: 20px; margin-bottom: 20px">
                <label style="color: #000; font-size: 19px; font-weight: 500; font-style: italic;" for="age" class="form-label">Hướng dẫn viên</label>
                <select style="padding: 12px;" required name="txtHdvID" id="hocvi" class="form-select">
                    <option selected value="">----Chọn---</option>
                    <?php
                    foreach ($hdvList as $item) {
                        echo "<option value='" . $item["HdvID"] . "'>" . $item["hoTen"] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- số video mo ta -->
            <div class="col-lg-6" style="margin-top: 20px">
                <label style="color: #000; font-size: 19px; font-weight: 500; font-style: italic;" class="form-label">Điểm tham quan</label>
                <input style="border-width: 2px; border-color: #000" required name="txtVideoDesc" type="text" class="form-control" value="<?php echo isset($_POST["txtVideoDesc"]) ? $_POST["txtVideoDesc"] : ((isset($_POST['document_id']) && count($infor_arr) === 1) ? $infor_update["videoDesc"] : ""); ?>" />
            </div>

            <!-- THUMBNAIL -->
            <div style="margin-top: 30px">
                <label style="color: #000; font-size: 19px; font-weight: 500; font-style: italic;">Hình ảnh minh họa
                    <div class="mt-2">
                        <div class="col-lg-7" style="margin-top: 20px">
                            <div class="input-group mb-3">
                                <input style="border-width: 2px; border-color: #000" required type="file" class="form-control" id="avatarImg" accept="image/*" name="txtThumbnail" />
                                <label style="border-width: 2px; border-color: #000" style="color: #000; font-size: 19px; font-weight: 500; font-style: italic;" class="input-group-text" for="avatarImg"></label>
                            </div>
                        </div>
                    </div>
                </label>
            </div>

            <!-- Hidden input để lưu id của thông tin tour cần update -->
            <input type="hidden" name="action" value="<?php echo (isset($_POST['document_id']) && count($infor_arr) === 1) ? $_POST['document_id'] : "" ?>">
            <!-- Button submit -->
            <div class="col-12" style="margin-top: 40px">
                <div style="display: flex; justify-content: center">
                    <button name="btnSubmit" type="submit" class="btn btn-primary p-2" style="font-size: 17px; background: var(--primary-color); min-width: 100px; height: 50px; font-size: 15px; font-weight: 500"><?php echo (isset($_POST['document_id']) && count($infor_arr) === 1) ? "Cập nhật" : "Thêm" ?></button>
                </div>
            </div>
        </form>
    </div>
    <?php include_once('./footer.php') ?>