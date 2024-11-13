<?php 
    include '../models/donhang.php';
    $donhang=new donhang;
    if(isset($_REQUEST['set'])){
        $data=$_REQUEST['dataJSON'];
        $data=json_decode($data);
        $ma_don_hang=$donhang->setHoadon($data);
        if(is_array($data->arr)){
            foreach($data->arr as $item){
                $flagChiTiet=$donhang->setChiTietDonHang($item);
            }
        }
        else {
            $flagChiTiet=$donhang->setChiTietDonHang($data->arr[0]);
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