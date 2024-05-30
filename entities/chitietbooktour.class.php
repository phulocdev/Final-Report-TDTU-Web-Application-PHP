<?php
require_once("./config/db.class.php");

class ChiTietBookTour
{
    public $bookTourID;
    public $customerID;
    public $tourID;
    public $payType;

    public function __construct($customerID, $tourID, $payType)
    {
        $this->customerID = $customerID;
        $this->tourID = $tourID;
        $this->payType = $payType;
    }

    public function save()
    {
        $db = new Db();
        $sql = "INSERT INTO chitietbooktour(customerID, tourID, payType) VALUES
        ('$this->customerID', '$this->tourID', '$this->payType')";
        $result = $db->query_execute($sql);
        return $result;
    }

    public static function list_ctbk()
    {
        $db = new Db();
        $sql = "SELECT * FROM chitietbooktour";
        $result = $db->select_to_array($sql);
        return $result;
    }


    public static function get_ctbk_by_id($id)
    {
        $db = new Db();
        $sql = "SELECT * FROM chitietbooktour WHERE bookTourID = '$id'";
        $result = $db->select_to_array($sql);
        return $result;
    }

    public static function update(
        $bookTourID,
        $customerID,
        $tourID,
        $payType,
    ) {

        $db = new Db();
        $sql = "UPDATE chitietbooktour SET customerID = '$customerID', tourID = '$tourID', payType = '$payType' WHERE bookTourID = '$bookTourID'";
        $result_update = $db->query_execute($sql);
        return $result_update;
    }

    public static function delete($id)
    {
        $db = new Db();
        $sql_delete = "DELETE FROM chitietbooktour WHERE 'bookTourID' = '$id'";
        $result_delete = $db->query_execute($sql_delete);
        return $result_delete;
    }
}
