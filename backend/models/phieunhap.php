<?php
include_once 'connect.php';





class phieunhap{
    private $conn;
    function __construct(){
        $this->conn=new connect;
    }
    function CountRow(){
        $this->conn->constructor();
        $strSQL="SELECT COUNT(*) as total FROM phieunhap;";
        $result=$this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    function LuuPhieuNhap($data){
        $this->conn->constructor();
        $strSQL="INSERT INTO `phieunhap`(`maPhieuNhap`, `maNhanVien`, `maNhaCC`, `ngayLap`, `tongTien`) 
        VALUES ('".$data->maPhieuNhap."','".$data->maNhanVien."','".$data->maNhaCC."',NOW(),'".$data->tongTien."')";
        $result=$this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    function TimPhieuNhap($id){
        $this->conn->constructor();
        $strSQL="SELECT * 
        FROM PhieuNhap
        JOIN chitietphieunhap ON PhieuNhap.maPhieuNhap = chitietphieunhap.maPhieuNhap
        JOIN sanpham ON chitietphieunhap.maSP = sanpham.MaSP
        JOIN nhacungcap on PhieuNhap.maNhaCC=nhacungcap.MaNCC
        WHERE PhieuNhap.maPhieuNhap='".$id."';";
        $result=$this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    function LuuChiTiet($data){
        $this->conn->constructor();
        $sanpham=new sanpham;
        $resultSP=$sanpham->sanpham($data->maSP);
        $rowSP=mysqli_fetch_assoc($resultSP);
        $strSQL="INSERT INTO `chitietphieunhap`(`maPhieuNhap`, `maSP`, `soLuong`, `donGia`) 
        VALUES ('".$data->maPhieuNhap."','".$data->maSP."','".$data->soLuong."','".$data->donGia."')";
        $result=$this->conn->excuteSQL($strSQL);
        $strSQL="UPDATE `sanpham` SET `SoLuongSP`='".($rowSP['SoLuongSP']+$data->soLuong)."' WHERE `MaSP`='".$data->maSP."'";
        $this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    function DSPhieuNhap(){
        $this->conn->constructor();
        $strSQL="SELECT * 
        FROM PhieuNhap
        JOIN nhacungcap on PhieuNhap.maNhaCC=nhacungcap.MaNCC";
        $result=$this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
}
