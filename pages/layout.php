<?php

if(isset($_GET['product'])){
    include_once './pages/shop.php';
}
else if(isset($_GET['cart'])){
    include_once './pages/cart.php';
}
else if(isset($_GET['detail'])){
    // include_once './pages/cart.php';
}
else {
    include_once './pages/home.php';
}