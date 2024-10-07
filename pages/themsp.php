<div class="model-them p-2">
    <div class="row">
        <div class="col-6">
        <form method="POST" enctype="multipart/form-data" id="formanh-sp">
            <input type="file" name="HinhAnh" id="fileanh-sp">
        </form>
        </div>
        <div class="col-6">
            <form id="form-themsp">
                <div class="modal_content-input-box form-group">
                    <label for="TenSP">Tên sản phẩm</label>
                    <input id="TenSP" name="TenSP">
                    <span class="form-message"></span>
                </div>
                <div class="modal_content-input-box form-group">
                    <label for="TenTH">Thương hiệu</label>
                    <select id="TenTH" name="MaTH">
                        <option value="0">---Chọn thương hiệu---</option>
                        <?php
                        include '../backend/models/thuonghieu.php';
                        $thuonghieu = new thuonghieu;
                        $result = $thuonghieu->dsthuonghieu();
                        if (mysqli_num_rows($result) > 0) {
                            $data = "";
                            while ($row = mysqli_fetch_assoc($result)) {
                                $data .= '<option value="' . $row['MaTH'] . '">' . $row['TenTH'] . '</option>';
                            }
                            echo $data;
                        }
                        ?>
                    </select>
                </div>
                <div class="modal_content-input-box form-group">
                    <label for="TenDM">Danh mục</label>
                    <select id="TenDM" name="TenDM">
                        <option value="0">---Chọn danh mục---</option>
                        <?php
                        include_once '../backend/models/danhmuc.php';
                        $danhmuc = new danhmuc;
                        $result = $danhmuc->get_danh_muc();
                        if (count($result) > 0) {
                                $data .= '<option value="' . $row['MaDM'] . '">' . $row['TenDanhMuc'] . '</option>';
                            echo $data;
                        }
                        ?>
                    </select>
                </div>
                <div class="modal_content-btn-box">
                    <button type="submit" class="btn-login btn-form btn-default" id="btn-register"><span>Xác nhận thêm sản phẩm</span></button>
                </div>
            </form>
        </div>
    </div>
    </form>
</div>
<script>
    Validator({
        form: "#form-themsp",
        rules: [
            Validator.isRequired("#TenSP"),
        ],
        errorElement: ".form-message",
        onSubmit: function(value) {
            const form = document.querySelector("#formanh-sp");
            const file = document.querySelector("#fileanh-sp");
            //Luồng gửi ảnh
            var formData = new FormData(form);
            var xhfile = new XMLHttpRequest();
            xhfile.open("POST", "./bakcend/controllers/upload.php");
            xhfile.send(formData);
            value['HinhAnh']=file.files[0]?.name
            console.log(value)
            var data = JSON.stringify(value);
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "./backend/controllers/sanpham.php?them");
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send("dataJSON=" + data);
            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 300) {
                    console.log(xhr.responseText);
                    ModalThongBao('Thành công','Thêm sản phẩm thành công')
                    $(".model-item.active").click();
                }
            }
        }
    })
</script>