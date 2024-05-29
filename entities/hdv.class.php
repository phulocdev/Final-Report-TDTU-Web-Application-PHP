<?php
require_once("./config/db.class.php");

class HDV
{
    public $hdvID;
    public $hdvName;

    public function __construct($hdvID, $hdvName)
    {
        $this->hdvID = $hdvID;
        $this->hdvName = $hdvName;
    }

    public static function list_hdv()
    {
        $db = new Db();
        $sql = "SELECT * FROM hdv";
        $resul = $db->select_to_array($sql);
        return $resul;
    }

    public static function get_hdv_by_id($id)
    {
        $db = new Db();
        $sql = "SELECT * FROM hdv WHERE HdvID = '$id'";
        $resul = $db->select_to_array($sql);
        return $resul;
    }
}
