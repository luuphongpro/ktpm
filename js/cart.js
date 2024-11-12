
class Cart extends BasicHome{
    constructor() {
        super();
        this.root = $("#root");
        this.tongHoaDon = 0;
        this.renderCart();
        $('.js_dathang').click(() =>{
            this.datDonHang();
        })
    }
    
    renderCart() {
        let tableContent = "";
        let summaryContent = "";

        this.tongHoaDon = this.Cart.arr.reduce((total, item, index) => {
            const itemTotal = item.GiaSP * item.soluong;
            tableContent += this.renderCartItem(item, index, itemTotal);
            summaryContent += this.renderCartSummary(item, itemTotal);
            return total + itemTotal;
        }, 0);

        this.updateCartDisplay(tableContent, summaryContent, this.tongHoaDon);
    }
    renderCartItem(item, index, itemTotal) {
        return `
            <tr>
                <td class="align-middle"><img src="#" alt="" style="width: 50px;"> ${item.TenSP}</td>
                <td class="align-middle">${item.GiaSP}</td>
                <td class="align-middle">
                    <div class="input-group quantity mx-auto" style="width: 100px;">
                        <button class="btn btn-sm btn-primary btn-minus" onclick="cart.decreaseItemCart(${item.MaSP})">
                            <i class="fa fa-minus"></i>
                        </button>
                        <input type="text" class="form-control form-control-sm bg-secondary text-center js_soluong${item.MaSP}"
                            value="${item.soluong}">
                        <button class="btn btn-sm btn-primary btn-plus" onclick="cart.increaseItemCart(${item.MaSP})">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </td>
                <td class="align-middle">${itemTotal}</td>
                <td class="align-middle"><button class="btn btn-sm btn-primary" onclick="cart.deleteItemCart(${index})">
                    <i class="fa fa-times"></i></button></td>
            </tr>
        `;
    }
    renderCartSummary(item, itemTotal) {
        return `
            <div class="d-flex justify-content-between mb-3 pt-1">
                <h6 class="font-weight-medium">${item.TenSP}</h6>
                <h6 class="font-weight-medium">${itemTotal}</h6>
            </div>
        `;
    }
    updateCartDisplay(tableContent, summaryContent, tongHoaDon) {
        $(".js_table_cart").html(tableContent);
        $(".card-body").html(summaryContent);
        $(".js_tongtien").text(tongHoaDon);
    }
    datDonHang() {
        var account = this.Account;
        if(account && this.Cart){
            account['tong'] = this.tongHoaDon
            account['arr']=this.Cart['arr']
            console.log(account)
            var xhr = new XHR()
            xhr.connect('POST',"./backend/controllers/donhang.php?set",account)
            .then((data) =>{
                console.log(data)
                var message=data;
                if(message=="sucsess")
                    alert("Đơn hàng đã đặt thành công")
                else 
                    alert("Đơn hàng bị lỗi, vui lòng kiểm tra kết nối mạng")
                this.Cart['arr'] = []
                this.setCartData()
                this.renderCart()
                this.updateCartCount()
            })
            // xhr.open("POST", "./backend/controllers/donhang.php?set")
            // xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            // xhr.send("dataJSON=" + JSON.stringify(account));
            // xhr.onload = function () {
            //     var message=xhr.responseText
            //     if(message=="sucsess")
            //         alert("Đơn hàng đã đặt thành công")
            //     else 
            //         alert("Đơn hàng bị lỗi, vui lòng kiểm tra kết nối mạng")
            //     Cart['arr'] = null
            //     localStorage.setItem("Cart", JSON.stringify(Cart))
            //     setTimeout(function(){
            //         location.reload()
            //     },0)
            // }
            
        }
        else {
            alert("Đặt hàng không thành công, vui lòng kiểm tra đăng nhập và giỏ hàng")
        }
    }
    increaseItemCart(index){
        var oldValue=Number($(".js_soluong"+index).val())
        console.log(oldValue)
        $(".js_soluong"+index).val(oldValue+1)
        this.Cart['arr'].forEach((value) => {
            if(value['MaSP']==index){
                // tongHoaDon+=Number(value['GiaSP'])
                value['soluong']=oldValue+1
            }
        })
        this.setCartData()
        this.renderCart()
    }
    decreaseItemCart(index){
        var oldValue=Number($(".js_soluong"+index).val())
        $(".js_soluong"+index).val(oldValue-1)
        this.Cart['arr'].forEach((value) => {
            if(value['MaSP']==index && oldValue>1){
                // tongHoaDon-=Number(value['GiaSP'])
                value['soluong']=oldValue-1
            }
        })
        this.setCartData()
        this.renderCart()
    }
    deleteItemCart(id) {
        const tableE = document.querySelector(".js_table_cart")
        console.log("truoc khi xoa", Cart['arr'])
        tableE.deleteRow(id)
        this.Cart['arr'].splice(id, 1)
        this.setCartData();
        this.renderCart();
        this.updateCartCount();
    }
}
const cart=new Cart()
