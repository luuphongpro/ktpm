<?php
include_once 'connect.php';

class taikhoan
{
    private $conn;
    function __construct()
    {
        $this->conn = new connect;
    }
    function timtk($sdt)
    {
        $this->conn->constructor();
        $strSQL = "SELECT * FROM `taikhoan` WHERE SDT='" . $sdt . "' AND TrangThai='active' ";
        $result = $this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    function themtk($data)
    {
        $this->conn->constructor();
        $strSQL = "INSERT INTO `taikhoan`(`UserName`, `MatKhau`, `SDT`, `TenNhomQuyen`, `TrangThai`, `DiaChi`) 
            VALUES ('" . $data->UserName . "','" . $data->MatKhau . "','" . $data->SDT . "','KH', 'active','".$data->DiaChi."')";
        $result = $this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    function xoatk($sdt)
    {
        $this->conn->constructor();
        $strSQL = "UPDATE `taikhoan` SET `TrangThai`='deleted' WHERE SDT='".$sdt."' ";
        $result = $this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    function suatk($data)
    {
        $this->conn->constructor();
        $strSQL = "UPDATE `taikhoan` 
        SET `UserName`='" . $data->UserName . "',`MatKhau`='" . $data->MatKhau . "'WHERE SDT='" . $data->SDT . "'";
        $result = $this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    function suaquyen($data){
        $this->conn->constructor();
        $strSQL="UPDATE `taikhoan` SET `TenNhomQuyen`='".$data->quyen."' WHERE `SDT`='".$data->user1_register."'";
        $result=$this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    function dstaikhoan(){
        $this->conn->constructor();
        $strSQL = "SELECT * FROM `taikhoan` WHERE TrangThai='active' AND TenNhomQuyen='KH'";
        $result=$this->conn->excuteSQL($strSQL);
        return $result;
    }
}