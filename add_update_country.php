<title><?php echo !isset($_POST['document_id']) ?  "Thêm quốc gia" : "Cập nhật quốc gia" ?></title>
<!-- PHP Code for Submit new Document -->

<?php
if (isset($_POST['document_id'])) {
    require_once('./entities/country.class.php');
    $infor_arr = Country::get_infor_by_id($_POST['document_id']);
    $infor_update = reset($infor_arr);
}
?>

<?php
require_once('./entities/country.class.php');
// Trường hợp thêm mới bài viết
if (isset($_POST["btnSubmit"])) {
    // Lấy dữ liệu của form thêm mới thông tin
    $countryID = $_POST["txtCountryID"];
    $countryName = $_POST["txtCountryName"];
    $rating = $_POST["txtRating"];
    $thumbnail = $_FILES["txtThumbnail"];

    $newCountry = new Country(
        $countryID,
        $countryName,
        $rating,
        $thumbnail,
    );

    // trường hợp update
    if ($_POST["action"] != "") {
        $inforUpdate_id =  $_POST["action"];
        $result = Country::update(
            $countryID,
            $countryName,
            $rating,
            $thumbnail,
        );
    } else {
        $result = $newCountry->save();
    }

    //Truy vấn lỗi
    if (!$result) {
        header("Location: add_update_country.php?failure");
    } else if ($_POST["action"] != "") {
        header("Location: add_update_country.php?updated");
    } else {
        header("Location: add_update_country.php?inserted");
    }
}
?>

<?php
if (isset($_GET["inserted"])) {
?>
    <script>
        alert("Thêm mới thông tin quốc gia thành công✅");
        window.location.href = './admin_country.php';
    </script>
<?php } else if (isset($_GET["updated"])) { ?>
    <script>
        alert("Cập nhật thông tin quốc gia thành công✅");
        window.location.href = './admin_country.php';
    </script>
<?php } else if (isset($_GET["failure"])) {
?>
    <script>
        alert("Cập nhật / Thêm thông tin quốc gia thất bại❌");
        window.location.href = './admin_country.php';
    </script>
<?php
}
?>

<?php include_once('./header.php') ?>
<link rel="stylesheet" href="./assets/styles/add_update.css">

<body>
    <div class="container" style="margin-top: 30px">
        <h1 style="text-transform: uppercase; font-size: 32px; text-align: center; margin-bottom: 40px; color: #ab003c"><?php echo (isset($_POST['document_id']) && count($infor_arr) === 1) ? "Cập nhật quốc gia du lịch" : "Thêm mới quốc gia du lịch" ?></h1>
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

            <!-- MÃ QUỐC GIA -->
            <div class="col-lg-6">
                <label style="color: #000; font-size: 19px; font-weight: 500; font-style: italic;" class="form-label">Mã quốc gia</label>
                <input style="border-width: 2px; border-color: #000" required name="txtCountryID" type="text" class="form-control" value="<?php echo isset($_POST["txtCountryName"]) ? $_POST["txtCountryName"] : ((isset($_POST['document_id']) && count($infor_arr) === 1) ? $infor_update["maQuocGia"] : ""); ?>" />
            </div>


            <!-- TÊN QUỐC GIA -->
            <div class="col-lg-6" style="margin-top: 20px">
                <label style="color: #000; font-size: 19px; font-weight: 500; font-style: italic;" class="form-label">Tên quốc gia</label>
                <input style="border-width: 2px; border-color: #000" required name="txtCountryName" type="text" class="form-control" value="<?php echo isset($_POST["txtCountryName"]) ? $_POST["txtCountryName"] : ((isset($_POST['document_id']) && count($infor_arr) === 1) ? $infor_update["tenQuocGia"] : ""); ?>" />
            </div>

            <!-- ĐÁNH GIÁ -->
            <div class="col-lg-2" style="margin-top: 20px; margin-bottom: 20px">
                <label style="color: #000; font-size: 19px; font-weight: 500; font-style: italic;" for="age" class="form-label">Đánh giá</label>
                <input style="border-width: 2px; border-color: #000" required name="txtRating" type="text" class="form-control" id="age" value="<?php echo isset($_POST["txtRating"]) ? $_POST["txtRating"] : ((isset($_POST['document_id']) && count($infor_arr) === 1) ? $infor_update["danhGia"] : ""); ?>" />
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

            <!-- Hidden input để lưu id của thông tin quốc gia cần update -->
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