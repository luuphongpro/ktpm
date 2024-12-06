<?php

require_once("config.php");
require_once('backend/models/donhang.php');
$donhang=new donhang();
$vnp_SecureHash = $_GET['vnp_SecureHash'];
$ma_don_hang=$_GET['vnp_TxnRef'];
$inputData = array();
foreach ($_GET as $key => $value) {
    if (substr($key, 0, 4) == "vnp_") {
        $inputData[$key] = $value;
    }
}

unset($inputData['vnp_SecureHash']);
ksort($inputData);
$i = 0;
$hashData = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
}

$secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
if ($secureHash == $vnp_SecureHash) {
    if ($_GET['vnp_ResponseCode'] == '00') {
        $donhang->update_payment($ma_don_hang,'1');
        // header("Location: http://localhost/clone%20web%20mypham/toichotoi-0.1.2/index.php?cart");
    } 
    else {
        echo "GD Khong thanh cong";
        }
} else {
    echo "Chu ky khong hop le";
}
?>
