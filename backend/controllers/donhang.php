<?php 
    include '../models/donhang.php';
    include '../models/sanpham.php';
    $donhang=new donhang;
    $sanpham=new sanpham;
    if(isset($_REQUEST['set'])){
        $data=$_REQUEST['dataJSON'];
        $data=json_decode($data);
        $ma_don_hang=$donhang->setHoadon($data);
        if(is_array($data->arr)){
            foreach($data->arr as $item){
                $flagChiTiet=$donhang->setChiTietDonHang($item);
                $tmp = $sanpham->giam_soluong($item->MaSP,$item->soluong);
                echo $tmp;
            }
        }
        else {
            $flagChiTiet=$donhang->setChiTietDonHang($data->arr[0]);
            $sanpham->giam_soluong($data->arr[0]->MaSP,$data->arr[0]->soluong);
        }
        echo $ma_don_hang;
    }
    else if(isset($_REQUEST['thongkethang'])){
        $result=$donhang->thongkethang();
        $array=[];
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                $array[]=$row;
            }
        }
        echo json_encode($array);
    }
?>