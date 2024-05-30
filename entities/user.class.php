<?php
require_once("./config/db.class.php");


class User
{
    public $email;
    public $password;
    public $role;

    public function __construct($u_email, $u_password, $role)
    {
        $this->email = $u_email;
        $this->password = $u_password;
        $this->role = $role;
    }

    public function save()
    {
        $db = new Db();
        $sql = "INSERT INTO user (Email, Password, Role) VALUES ('" . mysqli_real_escape_string($db->connect(), $this->email) . "', '" . md5(mysqli_real_escape_string($db->connect(), $this->password)) . "', 0)";
        $result = $db->query_execute($sql);
        return $result;
    }

    public static function checkLogin($email, $password)
    {
        $md5Password = md5($password);
        $db = new Db();
        $sql = "SELECT * FROM user WHERE Email='$email' AND Password='$md5Password'";
        $result = $db->select_to_array($sql);
        return count($result) === 1;
    }

    public static function getAccount($email)
    {
        $db = new Db();
        $sql = "SELECT * FROM user WHERE Email='$email'";
        $result = $db->select_to_array($sql);
        return $result;
    }

    public static function list_user()
    {
        $db = new Db();
        $sql = "SELECT * FROM user";
        $result = $db->select_to_array($sql);
        return $result;
    }

    public static function delete($email)
    {
        $db = new Db();
        $sql = "DELETE FROM user WHERE Email='$email'";
        $result = $db->query_execute($sql);
        return $result;
    }
}
