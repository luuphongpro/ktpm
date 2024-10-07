<?php 
    include '../models/phieunhap.php';
    include '../models/sanpham.php';
    $phieunhap=new phieunhap;
    $sanpham=new sanpham;
    if(isset($_REQUEST['row'])){
        $result=$phieunhap->CountRow();
        $row=mysqli_fetch_assoc($result);
        echo $row['total'];
    }
    else if(isset($_REQUEST['phieunhap'])){
        $data=$_REQUEST['phieunhap'];
        $data=json_decode($data);
        $phieunhap->LuuPhieuNhap($data);
    }
    if(isset($_REQUEST['chitietphieunhap'])){
        $data=$_REQUEST['chitietphieunhap'];
        $data=json_decode($data);
        foreach ($data as $value) {
            $phieunhap->LuuChiTiet($value);
            if($value->GiaSP)
                $sanpham->suasanpham($value->maSP,$value->GiaSP,$value->donGia);
        }
    }
    else if(isset($_REQUEST['thongkethang'])){
        $result=$phieunhap->thongkethang();
        $array=[];
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                $array[]=$row;
            }    
        }
        echo json_encode($array);
    }
?>