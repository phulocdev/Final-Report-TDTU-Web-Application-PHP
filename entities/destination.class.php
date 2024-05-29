<?php
require_once("./config/db.class.php");

class Destination
{
    public $maDiaDiem;
    public $tenDiaDiem;
    public $maKhuVuc;
    public $maQuocGia;
    public $thumbnail;

    public function __construct($tenDiaDiem, $maKhuVuc, $maQuocGia, $thumbnail)
    {
        $this->tenDiaDiem = $tenDiaDiem;
        $this->maKhuVuc = $maKhuVuc;
        $this->thumbnail = $thumbnail;
        $this->maQuocGia = $maQuocGia;
    }


    public function save()
    {
        $file_thumbnail_temp = $this->thumbnail['tmp_name'];
        $destination_thumbnail = $this->thumbnail['name'];
        $timestamp = date("Y") . date("m") . date("d") . date("h") . date("i") . date("s");
        $filepath_thumbnail = "./uploads/destination/" . $timestamp . $destination_thumbnail;

        if (!move_uploaded_file($file_thumbnail_temp, $filepath_thumbnail)) return false;

        $db = new Db();
        $sql = "INSERT INTO destination(tenDiaDiem, maKhuVuc, maQuocGia, thumbnail) values 
         ('$this->tenDiaDiem', '$this->maKhuVuc', '$this->maQuocGia','$filepath_thumbnail')";
        $result = $db->query_execute($sql);
        return $result;
    }

    public static function list_destination()
    {
        $db = new Db();
        $sql = "SELECT * FROM destination";
        $result = $db->select_to_array($sql);
        return $result;
    }


    public static function get_infor_by_id($id)
    {
        $db = new Db();
        $sql = "SELECT * FROM destination WHERE maDiaDiem = '$id'";
        $result = $db->select_to_array($sql);
        return $result;
    }

    public static function update(
        $maDiaDiem,
        $tenDiaDiem,
        $maKhuVuc,
        $maQuocGia,
        $thumbnail
    ) {
        // Tạo đg dẫn cho avatar mới
        $file_thumbnail_temp = $thumbnail['tmp_name'];
        $user_avatar_image =  $thumbnail['name'];
        $timestamp = date("Y") . date("m") . date("d") . date("h") . date("i") . date("s");
        $filepath_thumbnail = "./uploads/destination/" . $timestamp . $user_avatar_image;

        if (!move_uploaded_file($file_thumbnail_temp, $filepath_thumbnail)) return false;

        // Xử lý upload file tài liệu (.docx .pdf .xlxs .pptx)
        $db = new Db();

        // Xóa image and file của document cũ
        $sql1 = "SELECT thumbnail FROM destination WHERE maDiaDiem = '$maDiaDiem'";
        $oldInfor = $db->select_to_array($sql1);

        if (count($oldInfor) == 0) return false;

        // Lấy đường dẫn của hình ảnh và file tài liệu từ kết quả truy vấn
        $infor_avatar_old = $oldInfor[0]['thumbnail'];

        // Xóa hình ảnh và file CŨ tài liệu từ máy chủ
        if (file_exists($infor_avatar_old)) {
            unlink($infor_avatar_old); // Xóa hình ảnh
        }

        // Thực hiện truy vấn SQL UPDATE
        $sql = "UPDATE destination SET 
            tenDiaDiem = '$tenDiaDiem', 
            maKhuVuc = '$maKhuVuc', 
            maQuocGia = '$maQuocGia',
            thumbnail = '$filepath_thumbnail'
            WHERE maDiaDiem='$maDiaDiem'";

        // Thực thi truy vấn và kiểm tra kết quả
        $result_update = $db->query_execute($sql);

        return $result_update;
    }

    public static function delete($id)
    {
        $db = new Db();
        // Trước tiên, lấy đường dẫn của hình ảnh và file tài liệu từ cơ sở dữ liệu
        $sql = "SELECT thumbnail FROM destination WHERE maDiaDiem = '$id'";
        $result = $db->select_to_array($sql);

        if (count($result) == 0) {
            // Không tìm thấy tài liệu với ID cung cấp
            return false;
        }

        // Lấy đường dẫn của hình ảnh và file tài liệu từ kết quả truy vấn
        $avatarImgPath = $result[0]['thumbnail'];

        // Xóa tài liệu từ cơ sở dữ liệu
        $sql_delete = "DELETE FROM destination WHERE maDiaDiem = '$id'";
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
