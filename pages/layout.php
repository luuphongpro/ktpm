<?php

if(isset($_GET['product'])){
    include_once './pages/shop.php';
}
else if(isset($_GET['cart'])){
    include_once './pages/cart.php';
    if(isset($_GET['payment'])){
        include_once './payment/return_payment.php';
    }
}
else if(isset($_GET['detail'])){
    // include_once './pages/cart.php';
}
else if(isset(($_GET['review_order']))){
    if(isset($_GET['id'])){
        include_once './pages/home/detail_order.php';
    }
    else {
        include_once './pages/home/review_order.php';
    }
}
else if(isset($_GET['detail_product'])){
    include_once './detail_product.php';
}
else {
    include_once './pages/home.php';
}