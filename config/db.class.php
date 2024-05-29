<?php
class Db
{
    // Biến dùng để kết nối cơ sở dữ liệu MySQL
    protected static $connection;

    // Hàm khởi tạo kết nối
    public function connect()
    {
        // Trong trường hợp: kết nối chưa được khởi tạo
        if (!isset(self::$connection)) {
            // Lấy Giới thiệu kết nối từ tập tin config.ini
            $config = parse_ini_file("config.ini");
            self::$connection = new mysqli("localhost", $config["username"], $config["password"], $config["databasename"]);
        }

        // Handle Error if cannot connect to Database MySQL
        if (self::$connection == false) {
            return false;
        }
        return self::$connection;
    }

    // Function execute process query 
    public function query_execute($queryString)
    {
        $connection = $this->connect();

        $connection->query("SET NAMES utf8");
        $result = $connection->query($queryString);
        return $result;
    }

    // Function return result array
    public function select_to_array($queryString)
    {
        $rows = array();
        $result = $this->query_execute($queryString);
        if ($result == false) return false;

        while ($item = $result->fetch_assoc()) {
            $rows[] = $item;
        }
        return $rows;
    }
}
