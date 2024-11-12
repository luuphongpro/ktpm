<?php 
include '../models/sanpham.php';
$sanpham=new sanpham;
if(isset($_REQUEST['search_query'])){
    $parmas=$_REQUEST['search_query'];
    $data=$sanpham->search($parmas);
    $array=array();
    if(mysqli_num_rows($data)>0){
        while($row=mysqli_fetch_assoc($data))
        $array[]=$row;
    }
    echo json_encode($array);
}
