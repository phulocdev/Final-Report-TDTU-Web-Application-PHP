<?php
require_once("./config/db.class.php");


class Country
{
    public $maQuocGia;
    public $tenQuocGia;
    public $danhGia;
    public $thumbnail;

    public function __construct($maQuocGia, $tenQuocGia, $danhGia, $thumbnail)
    {
        $this->maQuocGia = $maQuocGia;
        $this->tenQuocGia = $tenQuocGia;
        $this->danhGia = $danhGia;
        $this->thumbnail = $thumbnail;
    }


    public function save()
    {
        $file_thumbnail_temp = $this->thumbnail['tmp_name'];
        $country_thumbnail = $this->thumbnail['name'];
        $timestamp = date("Y") . date("m") . date("d") . date("h") . date("i") . date("s");
        $filepath_thumbnail = "./uploads/country/" . $timestamp . $country_thumbnail;

        if (!move_uploaded_file($file_thumbnail_temp, $filepath_thumbnail)) return false;

        $db = new Db();
        $sql = "INSERT INTO country VALUES
         ('$this->maQuocGia', '$this->tenQuocGia', '$this->danhGia', '$filepath_thumbnail')";
        $result = $db->query_execute($sql);
        return $result;
    }

    public static function list_country()
    {
        $db = new Db();
        $sql = "SELECT * FROM country";
        $result = $db->select_to_array($sql);
        return $result;
    }


    public static function get_infor_by_id($id)
    {
        $db = new Db();
        $sql = "SELECT * FROM country WHERE maQuocGia = '$id'";
        $result = $db->select_to_array($sql);
        return $result;
    }

    public static function update(
        $maQuocGia,
        $tenQuocGia,
        $danhGia,
        $thumbnail
    ) {
        // Tạo đg dẫn cho avatar mới
        $file_thumbnail_temp = $thumbnail['tmp_name'];
        $user_avatar_image =  $thumbnail['name'];
        $timestamp = date("Y") . date("m") . date("d") . date("h") . date("i") . date("s");
        $filepath_thumbnail = "./uploads/country/" . $timestamp . $user_avatar_image;

        if (!move_uploaded_file($file_thumbnail_temp, $filepath_thumbnail)) return false;

        // Xử lý upload file tài liệu (.docx .pdf .xlxs .pptx)
        $db = new Db();

        // Xóa image and file của document cũ
        $sql1 = "SELECT thumbnail FROM country WHERE maQuocGia = '$maQuocGia'";
        $oldInfor = $db->select_to_array($sql1);

        if (count($oldInfor) == 0) return false;

        // Lấy đường dẫn của hình ảnh và file tài liệu từ kết quả truy vấn
        $infor_avatar_old = $oldInfor[0]['thumbnail'];

        // Xóa hình ảnh và file CŨ tài liệu từ máy chủ
        if (file_exists($infor_avatar_old)) {
            unlink($infor_avatar_old); // Xóa hình ảnh
        }

        // Thực hiện truy vấn SQL UPDATE
        $sql = "UPDATE country SET 
            tenQuocGia = '$tenQuocGia', 
            danhGia = '$danhGia', 
            thumbnail = '$filepath_thumbnail'
            WHERE maQuocGia='$maQuocGia'";

        // Thực thi truy vấn và kiểm tra kết quả
        $result_update = $db->query_execute($sql);

        return $result_update;
    }

    public static function delete($id)
    {
        $db = new Db();
        // Trước tiên, lấy đường dẫn của hình ảnh và file tài liệu từ cơ sở dữ liệu
        $sql = "SELECT thumbnail FROM country WHERE maQuocGia = '$id'";
        $result = $db->select_to_array($sql);

        if (count($result) == 0) {
            // Không tìm thấy tài liệu với ID cung cấp
            return false;
        }

        // Lấy đường dẫn của hình ảnh và file tài liệu từ kết quả truy vấn
        $avatarImgPath = $result[0]['thumbnail'];

        // Xóa tài liệu từ cơ sở dữ liệu
        $sql_delete = "DELETE FROM country WHERE maQuocGia = '$id'";
        $result_delete = $db->query_execute($sql_delete);

        // Kiểm tra xem việc xóa từ cơ sở dữ liệu thành công không
        if (!$result_delete) {
            return false;
        }
        // Xóa hình ảnh và file tài liệu từ máy chủ
        if (file_exists($avatarImgPath)) {
            unlink($avatarImgPath); // Xóa hình ảnh
        }
        return true;
    }
}
