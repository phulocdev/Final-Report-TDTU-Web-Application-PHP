<?php
require_once("./config/db.class.php");

class Area
{
    public $areaID;
    public $areaName;

    public function __construct($areaID, $areaName)
    {
        $this->areaID = $areaID;
        $this->areaName = $areaName;
    }

    public static function list_area()
    {
        $db = new Db();
        $sql = "SELECT * FROM area";
        $resul = $db->select_to_array($sql);
        return $resul;
    }

    public static function get_area_by_id($id)
    {
        $db = new Db();
        $sql = "SELECT * FROM area WHERE maKhuVuc = '$id'";
        $resul = $db->select_to_array($sql);
        return $resul;
    }
}
