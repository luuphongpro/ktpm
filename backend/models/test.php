<?php
include_once 'connect.php';

$conn = new connect;
$conn->constructor();
$strSQL = "SELECT * FROM sanpham;";
$result = $conn->excuteSQL($strSQL);
$row = mysqli_fetch_array($result);

if (!$row) {
    echo 'Null';
} else {
    print_r($row);
}
