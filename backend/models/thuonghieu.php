<?php
include_once 'connect.php';





class thuonghieu {
    private $conn;
    function __construct()
    {
        $this->conn = new connect;
    }
    function dsthuonghieu(){
        $this->conn->constructor();
        $strSQL ="SELECT * FROM `thuonghieu` WHERE 1";
        $result = $this->conn->excuteSQL($strSQL);
        return $result;
    }
}