class Product extends BasicHome{
    constructor(){
        super();
        this.logicCheckBox();
    }
    addCart(id,soluong=1){
        soluong=Number($(".input-qty").val()) || 1;
        if(this.Account?.flag){
            alert("Thêm sản phẩm vào đơn hàng thành công!")
            var xhr=new XHR();
            xhr.connect('GET',"./backend/controllers/sanpham.php?get&id="+id)
            .then((data)=>{
                console.log(data)
                var dataProduct=JSON.parse(data);
                if(this.Cart['arr'].some(value =>value['MaSP'] == dataProduct['MaSP'])){
                    this.Cart['arr'].forEach((value,index) => {
                        if(value['MaSP'] == dataProduct['MaSP']){
                            value['soluong']+=soluong
                        }
                    });
                }
                else {
                    dataProduct['soluong']=soluong;
                    this.Cart['arr'].push(dataProduct);
                }
                this.setCartData();
                this.updateCartCount();
            })
        }
        else 
            alert("Phải đăng nhập mới có thể mua hàng")
    }
    logicCheckBox(){
        const allCategoryCheckbox = $('#dm'); 
        const categoryCheckboxes = $('input[name="dm[]"]').not('#dm'); // Các checkbox danh mục con

        // Hàm chọn hoặc bỏ chọn tất cả các danh mục con khi tích vào All Category
        allCategoryCheckbox.on('change', function () {
            const isChecked = $(this).is(':checked');
            categoryCheckboxes.prop('checked', isChecked); // Chọn hoặc bỏ chọn các checkbox con
        });

        // Hàm kiểm tra khi có sự thay đổi ở các danh mục con
        categoryCheckboxes.on('change', function () {
            const allChecked = categoryCheckboxes.length === categoryCheckboxes.filter(':checked').length;
            allCategoryCheckbox.prop('checked', allChecked); // Tích All Category nếu tất cả danh mục con được chọn
        });

    }
}
const product=new Product();
console.log("check product")