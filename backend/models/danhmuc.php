<?php
include_once 'connect.php';


class danhmuc {
    private $conn;
    function __construct()
    {
        $this->conn = new connect;
    }
    function get_danh_muc(){
        $this->conn->constructor();
        $strSQL ="SELECT * FROM `danhmucsp` WHERE 1";
        $result = $this->conn->excuteSQL($strSQL);
        if ($result) {
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $data; 
        } 
        return []; 
    }
}