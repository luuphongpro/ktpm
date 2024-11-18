<?php
require_once("product_actions.php");
include './backend/models/sanpham.php';
$sanpham=new sanpham;
$array=array();
function filterSanphamByPrice($sanpham, $selectedPrice) {
    $priceRanges = [
        'price-all' => [0, PHP_INT_MAX],
        'price-1' => [0, 100000],
        'price-2' => [101000, 200000],
        'price-3' => [201000, 300000],
        'price-4' => [301000, 400000],
        'price-5' => [401000, PHP_INT_MAX]
    ];

    $filteredSanpham = array_filter($sanpham, function($sp) use ($selectedPrice, $priceRanges) {
        $priceRange = $priceRanges[$selectedPrice];
        return intval($sp['GiaSP']) >= $priceRange[0] && intval($sp['GiaSP']) <= $priceRange[1];
    });

    return $filteredSanpham;
}
if(isset($_GET['search_query'])){
    $search_query=$_GET['search_query'];
    $data=$sanpham->timsanpham($search_query);
    if(mysqli_num_rows($data)>0){
        while($row=mysqli_fetch_assoc($data)){
            $array[]=$row;
        }
    }
    else echo '<div class="ms-4">Không có sản phẩm nào phù hợp!</div>';
}
else if(isset($_GET['price'])) {
    $price=$_GET['price'];
    $dm=isset($_GET['dm']) ? $_GET['dm'] : ["all"];
    $data_sanpham=[];
    if($dm[0]=='all'){
        $result = $sanpham->dssanpham();
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                $array[]=$row;
            }
        }
        $spLocGia = filterSanphamByPrice($array, $price);
        $array=array_merge($data_sanpham,$spLocGia);
    }
    else {
        foreach ($dm as $item) {
            $result = $sanpham->dssanpham_danhmuc($item);
            $spLocGia = filterSanphamByPrice($result, $price);
            $array=array_merge($data_sanpham,$spLocGia);
        }
    }
    
}
else {
    $data=$sanpham->danhsachsp();
    if(mysqli_num_rows($data)>0){
        while($row=mysqli_fetch_assoc($data)){
            $array[]=$row;
        }
    }
    else echo '<div class="ms-4">Không có sản phẩm nào phù hợp!</div>';
}

?>

<!-- Hiển thị danh sách sản phẩm từ cơ sở dữ liệu -->
<?php foreach ($array as $sp): ?>
    <?php if($sp['GiaSP']!=0):?>
    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
        <div class="card product-item border-0 mb-4">
            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                <img class="img-fluid w-100" src="./img/<?php echo $sp['HinhAnh']; ?>" alt="<?php echo $sp['TenSP']; ?>">
            </div>
            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                <h6 class="text-truncate mb-3"><?php echo $sp['TenSP']; ?></h6>
                <div class="d-flex justify-content-center">
                    <h6><?php echo $sp['GiaSP']; ?></h6>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between bg-light border">
                <!-- Nút Xem Nhanh -->
                <a href="index.php?detail_product&id=<?php echo $sp['MaSP'] ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem nhanh</a>
                <!-- Nút Thêm vào Giỏ Hàng -->
                <button class="btn btn-sm text-dark p-0" onclick="product.addCart(<?php echo $sp['MaSP'] ?>)"><i class="fas fa-shopping-cart text-primary mr-1" ></i>Thêm vào giỏ hàng</button>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php endforeach; ?>

