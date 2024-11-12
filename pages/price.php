<?php 
    include './backend/models/danhmuc.php';
    $danhmuc=new danhmuc();
    $data=$danhmuc->get_danh_muc();
?>
<!-- Form lọc theo giá -->
<form id="price_sp">
    <input type="hidden" name="product">
<!-- Shop Sidebar Start -->
    <!-- Price Start -->
    <div class="border-bottom mb-4 pb-4">
        <h5 class="font-weight-semi-bold mb-4">Lọc theo giá</h5>
        <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3"> <!-- Thay đổi từ checkbox sang radio -->
            <input type="radio" class="custom-control-input" name="price" id="price-all" value="price-all" 
            <?php if(isset($_GET['price'])){
                    if($_GET['price']=='price-all')
                        echo 'checked';
                    }
                else echo 'checked';
            ?>> 
            <label class="custom-control-label" for="price-all">Tất cả</label>
            <span class="badge border font-weight-normal">1000</span>
        </div>
        <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3"> <!-- Thay đổi từ checkbox sang radio -->
            <input type="radio" class="custom-control-input" name="price" id="price-1" value="price-1" <?php if(isset($_GET['price'])){
                    if($_GET['price']=='price-1')
                        echo 'checked';
                    }
            ?>>
            <label class="custom-control-label" for="price-1">0 - 100</label>
            <span class="badge border font-weight-normal">150</span>
        </div>
        <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3"> <!-- Thay đổi từ checkbox sang radio -->
            <input type="radio" class="custom-control-input" name="price" id="price-2" value="price-2" <?php if(isset($_GET['price'])){
                    if($_GET['price']=='price-2')
                        echo 'checked';
                    }
            ?>>
            <label class="custom-control-label" for="price-2">100 - 200</label>
            <span class="badge border font-weight-normal">295</span>
        </div>
        <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3"> <!-- Thay đổi từ checkbox sang radio -->
            <input type="radio" class="custom-control-input" name="price" id="price-3" value="price-3" <?php if(isset($_GET['price'])){
                    if($_GET['price']=='price-3')
                        echo 'checked';
                    }
            ?>>
            <label class="custom-control-label" for="price-3">200 - 300</label>
            <span class="badge border font-weight-normal">246</span>
        </div>
        <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3"> <!-- Thay đổi từ checkbox sang radio -->
            <input type="radio" class="custom-control-input" name="price" id="price-4" value="price-4" <?php if(isset($_GET['price'])){
                    if($_GET['price']=='price-4')
                        echo 'checked';
                    }
            ?>>
            <label class="custom-control-label" for="price-4">300 - 400</label>
            <span class="badge border font-weight-normal">145</span>
        </div>
        <div class="custom-control custom-radio d-flex align-items-center justify-content-between"> <!-- Thay đổi từ checkbox sang radio -->
            <input type="radio" class="custom-control-input" name="price" id="price-5" value="price-5" <?php if(isset($_GET['price'])){
                    if($_GET['price']=='price-5')
                        echo 'checked';
                    }
            ?>>
            <label class="custom-control-label" for="price-5">400 - 500</label>
            <span class="badge border font-weight-normal">168</span>
        </div>
        <!-- Submit button -->
    </div>
<!-- </form> -->
    <div class="mb-5">
    <!-- <form id="danhmuc_form"> -->
        <h5 class="font-weight-semi-bold mb-4">Danh Mục</h5>
        <div
            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
            <input type="checkbox" class="custom-control-input" id="dm" name="dm[]" value="all"
            <?php 
                if(isset($_GET['dm'])){
                    $dm=$_GET['dm'];
                    foreach($dm as $item){
                        if($item=='all')
                            echo 'checked';
                    }
                }
            ?>>
            <label class="custom-control-label" for="dm">All Category</label>
            <span class="badge border font-weight-normal"></span>
        </div>
        <?php foreach ($data as $item): ?>
        <div
            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
            <input type="checkbox" class="custom-control-input" id="<?php echo 'dm'.$item['MaDM']; ?>" name="dm[]" value="<?php echo $item['MaDM']; ?>"
            <?php 
                if(isset($_GET['dm'])){
                    $dm=$_GET['dm'];
                    if (in_array($item['MaDM'], $dm)) {
                        echo 'checked';
                    }
                }
            ?>>
            <label class="custom-control-label" for="<?php echo 'dm'.$item['MaDM'] ?>"><?php echo $item['TenDanhMuc']; ?></label>
            <span class="badge border font-weight-normal"></span>
        </div>
        <?php endforeach; ?>
    </div>
    <button type="submit" class="btn btn-primary btn_formprice">Submit</button>

</form>

        
