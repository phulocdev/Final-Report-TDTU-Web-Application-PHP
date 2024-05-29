<title><?php echo !isset($_POST['document_id']) ?  "Thêm địa điểm du lịch" : "Cập nhật địa điểm du lịch" ?></title>
<!-- PHP Code for Submit new Document -->
<?php
if (isset($_POST['document_id'])) {
    require_once('./entities/destination.class.php');
    $infor_arr = Destination::get_infor_by_id($_POST['document_id']);
    $infor_update = reset($infor_arr);
}
?>

<?php
require_once('./entities/destination.class.php');
if (isset($_POST["btnSubmit"])) {
    $desName = $_POST["txtDestinationName"];
    $areaID = $_POST["txtAreaID"];
    $countryID = $_POST["txtCountryID"];
    $thumbnail = $_FILES["txtThumbnail"];
    $newDesti = new Destination($desName, $areaID, $countryID, $thumbnail);

    if ($_POST["action"] != "") {
        $inforUpdate_id =  $_POST["action"];
        $result = Destination::update(
            $inforUpdate_id,
            $desName,
            $areaID,
            $countryID,
            $thumbnail
        );
    } else {
        $result = $newDesti->save();
    }

    if (!$result) {
        header("Location: add_update_destination.php?failure");
    } else if ($_POST["action"] != "") {
        header("Location: add_update_destination.php?updated");
    } else {
        header("Location: add_update_destination.php?inserted");
    }
}
require_once('./entities/area.class.php');
require_once('./entities/country.class.php');
$areaList = Area::list_area();
$countryList = Country::list_country();
?>

<?php
if (isset($_GET["inserted"])) {
?>
    <script>
        alert("Thêm mới thông tin địa điểm du lịch thành công✅");
        window.location.href = './admin_destination.php';
    </script>
<?php } else if (isset($_GET["updated"])) { ?>
    <script>
        alert("Cập nhật thông tin địa điểm du lịch thành công✅");
        window.location.href = './admin_destination.php';
    </script>
<?php } else if (isset($_GET["failure"])) {
?>
    <script>
        alert("Cập nhật / Thêm thông tin địa điểm du lịch thất bại❌");
        window.location.href = './admin_destination.php';
    </script>
<?php
}
?>

<?php include_once('./header.php') ?>
<link rel="stylesheet" href="./assets/styles/add_update.css">

<body>
    <div class="container" style="margin-top: 30px">
        <h1 style="text-transform: uppercase; font-size: 32px; text-align: center; margin-bottom: 40px; color: #ab003c"><?php echo (isset($_POST['document_id']) && count($infor_arr) === 1) ? "Cập nhật địa điểm du lịch du lịch" : "Thêm mới địa điểm du lịch du lịch" ?></h1>
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

            <!-- TÊN địa điểm du lịch -->
            <div class="col-lg-6" style="margin-top: 20px">
                <label style="color: #000; font-size: 19px; font-weight: 500; font-style: italic;" class="form-label">Tên địa điểm du lịch</label>
                <input style="border-width: 2px; border-color: #000" required name="txtDestinationName" type="text" class="form-control" value="<?php echo isset($_POST["txtDestinationName"]) ? $_POST["txtDestinationName"] : ((isset($_POST['document_id']) && count($infor_arr) === 1) ? $infor_update["tenDiaDiem"] : ""); ?>" />
            </div>

            <!-- Mã khu vực-->
            <div class="col-lg-2" style="margin-top: 20px; margin-bottom: 20px">
                <label style="color: #000; font-size: 19px; font-weight: 500; font-style: italic;" for="age" class="form-label">Mã khu vực</label>
                <select style="padding: 12px;" required name="txtAreaID" id="hocvi" class="form-select">
                    <option selected value="">----Chọn---</option>
                    <?php foreach ($areaList as $item) {
                        echo "<option value='" . $item["maKhuVuc"] . "'>" . $item["tenKhuVuc"] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Mã quốc gia-->
            <div class="col-lg-2" style="margin-top: 20px; margin-bottom: 20px">
                <label style="color: #000; font-size: 19px; font-weight: 500; font-style: italic;" for="age" class="form-label">Mã quốc gia</label>
                <select style="padding: 12px;" required name="txtCountryID" id="hocvi" class="form-select">
                    <option selected value="">----Chọn---</option>
                    <?php
                    foreach ($countryList as $item) {
                        echo "<option value='" . $item["maQuocGia"] . "'>" . $item["tenQuocGia"] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- THUMBNAIL -->
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

            <!-- Hidden input để lưu id của thông tin địa điểm du lịch cần update -->
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