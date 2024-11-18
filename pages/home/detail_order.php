<?php 
    require './backend/models/donhang.php';
    $id = $_GET['id'];
    $donhang = new donhang();
    $result = $donhang->timdonhang($id);
    $array_donhang = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $array_donhang[] = $row;
        }
    }
?>
<!-- Modal -->
<div class="w-50 mx-auto">
    <div class="modal-header border-bottom-0">
        <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body text-start p-4">
        <hr class="mt-2 mb-4"
            style="height: 0; background-color: transparent; opacity: .75; border-top: 2px dashed #9e9e9e;">
        <?php foreach ($array_donhang as $id): ?>
            <div class="d-flex justify-content-between">
                <p class="fw-bold mb-0"><?= htmlspecialchars($id['TenSP']) ?></p>
                <p class="fw-bold mb-0">Qty: <?= htmlspecialchars($id['SoLuong']) ?></p>
                <p class="text-muted mb-0">$<?= htmlspecialchars($id['SoLuong'] * $id['GiaCa']) ?></p>
            </div>
        <?php endforeach; ?>
        <div class="d-flex justify-content-between">
            <p class="fw-bold">Total</p>
            <p class="fw-bold">$2125.00</p> <!-- Giá trị tổng ở đây có thể cần tính toán -->
        </div>
        <div>
            <ul class="tracking">
                <li class="item_tracking">Đặt hàng</li>
                <li class="item_tracking">Đơn hàng được xác nhận</li>
                <li class="item_tracking">Giao hàng</li>
            </ul>
        </div>
    </div>
</div>
