<?php include_once 'header.php' ?>
<link rel="stylesheet" href="./assets/styles/add_update.css">

<?php
require_once('./entities/customer.class.php');
require_once('./entities/chitietbooktour.class.php');

if (isset($_POST["btnSubmit"])) {
    $name = $_POST["txtName"];
    $soCMND = $_POST["txtCCCD"];
    $email = $_POST["txtEmail"];
    $tourID = $_POST["txtTourID"];
    $phoneNumber = $_POST["txtPhoneNumber"];
    $payType = $_POST["pay-type"];
    $address = $_POST["txtAddress"];

    $result = false;
    if (Customer::get_customer_by_cmnd($soCMND) == null && Customer::get_customer_by_email($email) == null) {
        // add new customer khi chua co customer đó trong database
        $newCustomer = new Customer($soCMND, $email, $phoneNumber, $address);
        $newCustomer->save();

        // add new ctbk
        $customer = Customer::get_customer_by_cmnd($soCMND);
        $customerID = $customer[0]['customerID'];
        $newChiTietBookTour = new ChiTietBookTour($customerID, $tourID, $payType);
        $result = $newChiTietBookTour->save();
    } else {
        $customer = Customer::get_customer_by_cmnd($soCMND);
        $customerID = $customer[0]['customerID'];
        $newChiTietBookTour = new ChiTietBookTour($customerID, $tourID, $payType);
        $result = $newChiTietBookTour->save();
    }

    if (!$result) {
        header("Location: book_tour.php?failure");
    } else if ($_POST["action"] != "") {
        header("Location: book_tour.php?updated");
    } else {
        header("Location: book_tour.php?inserted");
    }
}
?>

<!-- Show thông  bao thanh cong hoac that bai -->
<?php
if (isset($_GET["inserted"])) {
?>
    <script>
        alert("Đặt tour thành công✅");
        window.location.href = './index.php';
    </script>
<?php } else if (isset($_GET["updated"])) { ?>
    <script>
        alert("Cập nhật tour thành công✅");
        window.location.href = './index.php';
    </script>
<?php } else if (isset($_GET["failure"])) {
?>
    <script>
        alert("Đặt tour thất bại❌");
        window.location.href = './index.php';
    </script>
<?php
}
?>

<div class="container">
    <div style="margin-top: 40px; margin-bottom: 40px;">
        <h1 class="subTitle" style="text-align: center;">Book Tour</h1>
        <form action="book_tour.php" method="post" style="
            margin-top: 40px;
            padding: 28px 30px;
            background-color: white;
            color: #000;
            border-radius: 16px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            border: 5px solid var(--primary-color);
        ">
            <div class="form-group" style="margin-top: 20px">
                <label for="name">Họ tên</label>
                <input type="text" name="txtName" id="name" class="form-control">
            </div>
            <div class="form-group" style="margin-top: 20px">
                <label for="cccd">Số CMND</label>
                <input type="text" name="txtCCCD" id="cccd" class="form-control">
            </div>
            <div class="form-group" style="margin-top: 20px">
                <label for="email">Email</label>
                <input type="email" name="txtEmail" id="email" class="form-control">
            </div>
            <div class="form-group" style="margin-top: 20px">
                <label for="phoneNumber">Số điện thoại</label>
                <input type="text" name="txtPhoneNumber" id="phoneNumber" class="form-control">
            </div>
            <div class="form-group" style="margin-top: 20px">
                <label>
                    Phương thức thanh toán
                    <select name="pay-type" id="">
                        <option value="-1">--- Chọn ---</option>
                        <option value="0">Thanh toán trực tiếp</option>
                        <option value="1">Thanh toán chuyển khoản</option>
                    </select>
                </label>
            </div>

            <div class="form-group" style="margin-top: 20px">
                <label for="address">Địa chỉ</label>
                <input type="text" name="txtAddress" id="address" class="form-control">
            </div>

            <input type="hidden" name="txtTourID" value="<?php echo (isset($_POST['tour_id'])) ? $_POST['tour_id'] : "" ?>">
            <div style="margin-top: 40px; text-align: center">
                <button name="btnSubmit" class="btn-confirm" type="submit">Gửi</button>
            </div>
        </form>
    </div>
</div>

<?php include_once 'footer.php' ?>