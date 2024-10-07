<?php 
include_once 'connect.php';


class sanpham
{
    private $conn;
    function __construct()
    {
        $this->conn = new connect;
    }
    function danhsachsp()
    {
        $this->conn->constructor();
        $strSQL = "SELECT *
                   FROM sanpham
                   INNER JOIN thuonghieu ON sanpham.MaTH = thuonghieu.MaTH
                   INNER JOIN danhmucsp ON sanpham.MaDM = danhmucsp.MaDM
                   WHERE `TrangThai`='1'";
        $result = $this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    function sanpham($masp)
    {
        $this->conn->constructor();
        $strSQL = "SELECT * FROM `sanpham` WHERE MaSP='" . $masp . "'";
        $result = $this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    function timsanpham($ten){
        $this->conn->constructor();
        $strSQL = "SELECT * FROM `sanpham` WHERE `TenSP`LIKE '%".$ten."%'";
        $result = $this->conn->excuteSQL($strSQL);
        // $result['CountRow']=mysqli_num_rows($result);
        $this->conn->disconnect();
        return $result;
    }
    function search($ten){
        $this->conn->constructor();
        $strSQL = "SELECT *
                   FROM sanpham
                   INNER JOIN thuonghieu ON sanpham.MaTH = thuonghieu.MaTH
                   WHERE LIKE '%".$ten."%'";
        $result = $this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    function xoasanpham($masp){
        $this->conn->constructor();
        $strSQL = "UPDATE `sanpham` SET `TrangThai`='0' WHERE  MaSP='" . $masp . "'";
        $result = $this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    function dssanpham(){
        $this->conn->constructor();
        $strSQL="SELECT * FROM `sanpham` WHERE 1";
        $result=$this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    
    function suasanpham($masp,$giaban,$gianhap){
        $this->conn->constructor();
        $strSQL="UPDATE `sanpham` SET `GiaSP`=$giaban, GiaNhap=$gianhap
        WHERE MaSP =$masp";
        $result=$this->conn->excuteSQL($strSQL);
        return $result;
    }
    function UpdateAnh($masp,$linkanh){
        $this->conn->constructor();
        $strSQL="UPDATE `sanpham` SET`HinhAnh`='".$linkanh."' WHERE MaSP='".$masp."'";
        $this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
    }
    function ThemSP($data){
        $this->conn->constructor();
        $strSQL="SELECT COUNT(*) AS total FROM sanpham;";
        $result=$this->conn->excuteSQL($strSQL);
        $row=mysqli_fetch_assoc($result);
        $masp=$row['total'];
        $strSQL="INSERT INTO `sanpham`(`MaSP`, `TenSP`, `MaTH`, `MaDM`, `TrangThai`,`HinhAnh`) 
        VALUES ('".$masp."','".$data->TenSP."','".$data->MaTH."','".$data->TenDM."','1','". ($data->HinhAnh ?? ``)."')";
        $this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
}