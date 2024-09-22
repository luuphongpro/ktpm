<?php
include_once 'connect.php';




class nhacungcap {
    private $conn;
    function __construct()
    {
        $this->conn = new connect;
    }
    function dsnhacc(){
        $this->conn->constructor();
        $strSQL ="SELECT * FROM `nhacungcap` WHERE `TrangThai`='1'";
        $result = $this->conn->excuteSQL($strSQL);
        return $result;
    }
    function suanhacc($data){
        $this->conn->constructor();
        $strSQL="UPDATE `nhacungcap` SET `TenNCC`='".$data->TenNCC."',`DiaChi`='".$data->DiaChi."',`Email`='".$data->Email."',`SoDienThoai`='".$data->SoDienThoai."' 
        WHERE MaNCC ='".$data->MaNCC."'";
        $result=$this->conn->excuteSQL($strSQL);
        return $result;
    }
    function search($ten){
        $this->conn->constructor();
        $strSQL = "SELECT *
                   FROM nhacungcap
                   WHERE LIKE '%".$ten."%'";
        $result = $this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    function nhaCC($mancc)
    {
        $this->conn->constructor();
        $strSQL = "SELECT * FROM `nhacungcap` WHERE MaNCC='" . $mancc . "'";
        $result = $this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    function themncc($data){
        $this->conn->constructor();
        $strSQL="SELECT COUNT(*) as total FROM nhacungcap";
        $result = $this->conn->excuteSQL($strSQL);
        $row=mysqli_fetch_array($result);
        $macc= $row['total']+1;
        $strSQL = "INSERT INTO `nhacungcap`(`MaNCC`, `TenNCC`, `DiaChi`, `Email`, `SoDienThoai`, `TrangThai`) VALUES ('".$macc."','".$data->TenNCC."','".$data->DiaChi."','".$data->Email."','".$data->SoDienThoai."', '1')";
        $result = $this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    function xoanhacc($mancc){
        $this->conn->constructor();
        $strSQL = "UPDATE `nhacungcap` SET `TrangThai`='0' WHERE  MaNCC='" . $mancc . "'";
        $result = $this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
}