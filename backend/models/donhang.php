<?php
include_once 'connect.php';





class donhang
{
    private $madonhang;
    private $conn;
    function __construct()
    {
        $this->conn = new connect;
    }
    function ngay($date)
    {
        $this->conn->constructor();
        $strSQL = "SELECT * 
        FROM chitietdonhang
        LEFT JOIN sanpham ON chitietdonhang.MaSP = sanpham.MaSP
        LEFT JOIN donhang ON donhang.MaDonHang=chitietdonhang.MaDonHang
        WHERE  donhang.NgayDatHang='" . $date . "'";
        $result = $this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    function timdonhang($madon)
    {
        $this->conn->constructor();
        $strSQL = "SELECT * 
        FROM chitietdonhang
        LEFT JOIN sanpham ON chitietdonhang.MaSP = sanpham.MaSP
        LEFT JOIN donhang ON donhang.MaDonHang=chitietdonhang.MaDonHang
        WHERE  donhang.MaDonHang='" . $madon . "'";

        $result = $this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    function timtheoSDT($sdt){
        $this->conn->constructor();
        $strSQL="SELECT * FROM `donhang` WHERE `MTaiKhoan`='".$sdt."'";
        $result=$this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    function timtheoID($id){
        $this->conn->constructor();
        $strSQL="SELECT * FROM `donhang` WHERE `MaDonHang`='".$id."'";
        $result=$this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    function khoangtime($from,$to){
        $this->conn->constructor();
        $strSQL = "SELECT * 
        FROM chitietdonhang
        LEFT JOIN sanpham ON chitietdonhang.MaSP = sanpham.MaSP
        LEFT JOIN donhang ON donhang.MaDonHang=chitietdonhang.MaDonHang
        WHERE NgayDatHang BETWEEN '" . $from . "' AND '" . $to . "'";
        // echo $strSQL;
        $result = $this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    function thongkethang(){
        $this->conn->constructor();
        $sql="SELECT 
                (MONTH(NgayDatHang)) AS month, 
                SUM(TongGiaTriDonHang) AS total
            FROM
                donhang
            WHERE 
                TrangThaiDonHang = '1' 
                AND YEAR(NgayDatHang) = YEAR(CURDATE()) -- Điều kiện chỉ lấy trong năm hiện tại
            GROUP BY MONTH(NgayDatHang); -- Nhóm theo tháng";
        $result = $this->conn->excuteSQL($sql);
        $this->conn->disconnect();
        return $result;
    }
    function setHoadon($data) {
        $this->conn->constructor();
        $strSQL="SELECT COUNT(*) as total FROM donhang;";
        $result=$this->conn->excuteSQL($strSQL);
        $row=mysqli_fetch_assoc($result);
        $this->madonhang=$row['total']+1;
        $strSQL = "INSERT INTO `donhang` (`MaDonHang`, `NgayDatHang`, `DiaChiGiaoHang`, `TrangThaiDonHang`, `TongGiaTriDonHang`, `MTaiKhoan`, `MaNhanVien`) 
        VALUES ('" . ($this->madonhang) . "', NOW(), '" . $data->diachi . "', '0', '" . $data->tong . "', '" . $data->SDT . "', '')";
        $result=$this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    
    function setChiTietDonHang($data){
        $this->conn->constructor();
        $strSQL="SELECT COUNT(*) as total FROM chitietdonhang;";
        $result=$this->conn->excuteSQL($strSQL);
        $row=mysqli_fetch_assoc($result);
        $strSQL="INSERT INTO `chitietdonhang`(`MaChiTietDonHang`, `SoLuong`, `GiaCa`, `MaDonHang`, `MaSP`) 
        VALUES ('".($row['total']+1)."','".$data->soluong."','".$data->GiaSP."','".($this->madonhang)."','".$data->MaSP."')";
        $result=$this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
}
