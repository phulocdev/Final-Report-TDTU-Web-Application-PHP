<?php
require_once("./config/db.class.php");

class Customer
{
    public $customerID;
    public $soCMND;
    public $email;
    public $phoneNumber;
    public $address;

    public function __construct($soCMND, $email, $phoneNumber, $address)
    {
        $this->soCMND = $soCMND;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->address = $address;
    }

    public function save()
    {
        $db = new Db();
        $sql = "INSERT INTO customer(soCMND, email, phoneNumber, address) VALUES
        ('$this->soCMND', '$this->email', '$this->phoneNumber', '$this->address')";
        $result = $db->query_execute($sql);
        return $result;
    }

    public static function list_customer()
    {
        $db = new Db();
        $sql = "SELECT * FROM customer";
        $result = $db->select_to_array($sql);
        return $result;
    }

    public static function get_customer_by_cmnd($cmnd)
    {
        $db = new Db();
        $sql = "SELECT * FROM customer WHERE soCMND = '$cmnd'";
        $result = $db->select_to_array($sql);
        return $result;
    }

    public static function get_customer_by_email($email)
    {
        $db = new Db();
        $sql = "SELECT * FROM customer WHERE email = '$email'";
        $result = $db->select_to_array($sql);
        return $result;
    }

    public static function update(
        $customerID,
        $soCMND,
        $email,
        $phoneNumber,
        $address
    ) {

        $db = new Db();
        $sql = "UPDATE customer SET soCMND = '$soCMND', email = '$email', phoneNumber = '$phoneNumber', address = '$address' WHERE customerID = '$customerID'";
        $result_update = $db->query_execute($sql);
        return $result_update;
    }

    public static function delete($id)
    {
        $db = new Db();
        $sql_delete = "DELETE FROM customer WHERE customerID = '$id'";
        $result_delete = $db->query_execute($sql_delete);
        return $result_delete;
    }
}
